<?php

namespace App\Livewire\Modals;

use App\Models\Production;
use App\Models\Stock;
use Livewire\Component;
class AddProductDataModal extends Component
{
  protected $listeners = ['OpenModal' => 'isOpen', 'openUpdateProductModal' => 'openUpdate'];
  public $isProductModal, $stockId, $loomId, $unitId, $date, $product, $response, $updateProductId, $stockQuality, $updateProduct, $previousProduct, $updateStock, $isUpdate;
  public $isLoading = false;
  public function render()
  {
    return view('livewire.modals.add-product-data-modal');
  }
  public function isOpen($stockId, $loomId, $unitId, $stockQuality)
  {
    $this->isUpdate = false;
    $this->stockId = $stockId;
    $this->loomId = $loomId;
    $this->unitId = $unitId;
    $this->stockQuality = $stockQuality;
    $this->isProductModal = true;
  }
  public function isClose()
  {
    $this->stockId = null;
    $this->loomId = null;
    $this->unitId = null;
    $this->stockQuality = null;
    $this->product = null;
    $this->date = null;
    $this->isProductModal = false;
  }

  public function addProductData(): void
  {
    $this->validate();
    try {
      $stock = Stock::findOrFail($this->stockId);
      if ($stock->remaining > $this->product) {
        $this->addError('product', 'Product value must less the remaining value');
        return;
      }
      $data = [
        'stock_id' => $this->stockId,
        'loom_id' => $this->loomId,
        'unit_id' => $this->unitId,
        'product' => $this->product,
        'quality' => $this->stockQuality,
        'date' => $this->date,
      ];
      Production::create($data);
      $previousProduct = $stock->product_produced;
      $newProductProduced = $previousProduct + $this->product;
      $remaining = $stock->inital_quantity - $newProductProduced;
      $stock->update([
        'product_produced' => $newProductProduced,
        'remaining_quantity' => $remaining,
      ]);
      $this->dispatch('updateProductList');
      $this->isClose();
      $this->dispatch('toast', message: 'Product data added successfully', type: 'success');
    } catch (\Throwable $th) {
      dd($th);
    }
  }
  public function openUpdate($productId, $isUpdate)
  {
    $this->isUpdate = $isUpdate;
    $this->updateProductId = $productId;
    $this->updateProduct = Production::findOrFail($productId);
    $this->updateStock = Stock::findOrFail($this->updateProduct->stock_id);
    $this->product = $this->updateProduct->product;
    $this->previousProduct = $this->updateProduct->product;
    $this->date = $this->updateProduct->date;
    $this->isProductModal = true;
  }

  public function updateLatestProduct()
  {
    $this->validate();
    try {
      $this->updateProduct->update([
        'product' => $this->product,
        'date' => $this->date,
      ]);
      $difference = $this->updateProduct->product - $this->previousProduct;
      $this->updateStock->update([
        'product_produced' => $this->updateStock->product_produced + ($difference),
      ]);
      $this->updateStock->update([
        'remaining_quantity' => $this->updateStock->inital_quantity - $this->updateStock->product_produced,
      ]);
      $this->isClose();
      $this->dispatch('updateProductList');
      $this->dispatch('toast', message: 'Product data added successfully', type: 'success');
    } catch (\Exception $e) {
      dd($e);
    }
  }

  protected function rules()
  {
    return [
      'product' => 'required|numeric|min:1',
      'date' => 'required|date'
    ];
  }

}
