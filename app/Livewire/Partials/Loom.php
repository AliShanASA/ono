<?php

namespace App\Livewire\Partials;
use App\Models\LoomModel;
use App\Models\Production;
use App\Models\QualityModel;
use App\Models\Stock;
use App\Models\Unit;

use App\Services\Getdata\GetProductData;

use App\Models\WorkerNameModel;
use Livewire\Component;

class Loom extends Component
{
  protected $listeners = ['updateProductList' => 'updateProduct'];
  public $unitData, $isModal, $isLoomSelected, $workerNames, $qualities, $stockQuantity, $stockQuality, $stockDate, $stockTime, $stockWidth, $stockWorkerName, $response, $isLoading, $currentStockId, $productData, $productQuality, $deleteProductId, $openDeleteConfirmation, $deleteStockId, $isStock = false, $productSum, $isNew;
  public $loomData = [];
  public $stockData;
  public $activeUnit = null;
  public $displayUnit, $displayLoom;

  public function mount()
  {
    $this->unitData = Unit::all();
    $this->workerNames = WorkerNameModel::all();
    $this->qualities = QualityModel::all();

  }

  public function getLoomData($id)
  {
    $this->activeUnit = $id;
    $this->loomData = LoomModel::where('unit_id', $id)->get();
  }

  public function render()
  {
    return view('livewire.partials.loom');
  }

  public function updateProduct(GetProductData $getProductData)
  {
    $this->productSum = null;
    if ($this->currentStockId) {
      $this->productData = $getProductData->getData($this->currentStockId);
      foreach ($this->productData as $data) {
        $this->productSum += $data->product;
      }
    }
  }

  public function setDisplayUnit($unitId, $loomId, GetProductData $getProductData)
  {
    $this->productData = null;
    $this->currentStockId = null;
    $this->isLoomSelected = true;
    $this->displayUnit = $unitId;
    $this->displayLoom = $loomId;
    $this->productSum = null;
    $this->latestStock();
    if ($this->stockData) {
      $this->productData = $getProductData->getData($this->currentStockId);
      foreach ($this->productData as $data) {
        $this->productSum += $data->product;
      }
      $this->productQuality = $this->stockData->quality;
    }
  }

  public function openModal($isNew)
  {
    $this->isNew = $isNew;
    if ($this->isNew == false) {
      $stock = Stock::where('id', $this->currentStockId)->first();
      $this->stockQuality = $stock->quality;
      $this->stockQuantity = $stock->inital_quantity;
      $this->stockWidth = $stock->width;
      $this->stockWorkerName = $stock->worker_name;
      $this->stockDate = $stock->date;
      $this->stockTime = $stock->time;
    }
    $this->isModal = true;
  }
  public function closeModal()
  {
    $this->stockQuality = null;
    $this->stockQuantity = null;
    $this->stockWidth = null;
    $this->stockWorkerName = null;
    $this->stockDate = null;
    $this->stockTime = null;
    $this->isModal = false;
  }
  public function addStockData()
  {
    $this->validate();
    $data = [
      'loom_id' => $this->displayLoom,
      'unit_id' => $this->displayUnit,
      'inital_quantity' => $this->stockQuantity,
      'quality' => $this->stockQuality,
      'width' => $this->stockWidth,
      'date' => $this->stockDate,
      'time' => $this->stockTime,
      'worker_name' => $this->stockWorkerName,
      'product_produced' => 0,
    ];
    try {
      Stock::create($data);
      $this->latestStock();
      $this->dispatch('updateProductList');
      $this->closeModal();
      $this->dispatch('toast', message: 'New stock added successfully', type: 'success');
    } catch (\Throwable $e) {
      $this->dispatch('toast', message: 'Error Occoured while adding stock data.', type: 'error');
    }
  }

  public function openProductModal($id, $isUpdateProduct)
  {
    if ($isUpdateProduct) {
      $this->dispatch('openUpdateProductModal', productId: $id, isUpdate: $isUpdateProduct);
    } else {
      $this->dispatch('OpenModal', stockId: $this->currentStockId, unitId: $this->displayUnit, loomId: $this->displayLoom, stockQuality: $this->productQuality);
    }

  }

  public function deleteStock()
  {
    try {
      $stock = Stock::where('id', $this->deleteStockId);
      $stock->delete();
      $this->currentStockId = null;
      $this->latestStock();
      $this->dispatch('updateProductList');
      $this->closeDeleteConfirmation();
      $this->dispatch('toast', message: 'Stock has been deleted successfully', type: 'success');
    } catch (\Exception $e) {
      $this->dispatch('toast', message: 'Error occoured while deleting the stock.', type: 'error');
    }
  }

  public function deleteProduct()
  {
    try {
      $product = Production::where('id', $this->deleteProductId)->first();
      $tempDeleteProduct = $product->product;
      $stock = Stock::findOrFail($this->currentStockId);
      $stock->update([
        'product_produced' => $stock->product_produced - $tempDeleteProduct,
      ]);
      $stock->update([
        'remaining_quantity' => $stock->inital_quantity - $stock->product_produced,
      ]);
      $product->delete();
      $this->closeDeleteConfirmation();
      $this->dispatch('updateProductList');
      $this->dispatch('toast', message: 'Product has been deleted successfully.', type: 'success');
    } catch (\Exception $e) {
      dd($e);
    }
  }

  public function openDeleteConfirmationModal($id, $isStock)
  {
    $this->isStock = $isStock;
    if ($isStock) {
      $this->deleteStockId = $id;
    } else {
      $this->deleteProductId = $id;
    }
    $this->openDeleteConfirmation = true;
  }

  public function closeDeleteConfirmation()
  {
    $this->deleteProductId = null;
    $this->deleteStockId = null;
    $this->openDeleteConfirmation = false;
  }

  public function updateStock()
  {
    $this->validate();
    try {
      $stock = Stock::findOrFail($this->currentStockId);
      $stock->update([
        'quality' => $this->stockQuality,
        'inital_quantity' => $this->stockQuantity,
        'width' => $this->stockWidth,
        'worker_name' => $this->stockWorkerName,
        'date' => $this->stockDate,
        'time' => $this->stockTime,
      ]);
      $remaining = $stock->inital_quantity - $stock->product_produced;
      $stock->update([
        'remaining_quantity' => $remaining
      ]);
      $this->latestStock();
      $this->closeModal();
      $this->dispatch('toast', messgae: 'Stock data has been updated successfully', type: 'success');
    } catch (\Exception $e) {
      dd($e);
    }
  }

  public function latestStock()
  {
    $this->currentStockId = null;
    $this->stockData = Stock::where('unit_id', $this->displayUnit)->where('loom_id', $this->displayLoom)->latest()->first();
    if ($this->stockData) {
      $this->currentStockId = $this->stockData->id;
    }
  }

  protected function rules()
  {
    return [
      'stockQuality' => 'required|string|max:255',
      'stockQuantity' => 'required|numeric|min:1',
      'stockDate' => 'required|date',
      'stockTime' => 'required',
      'stockWorkerName' => 'required|string|max:255',
      'stockWidth' => 'required|numeric|min:1',
    ];
  }
}

