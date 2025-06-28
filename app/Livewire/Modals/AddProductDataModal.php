<?php

namespace App\Livewire\Modals;

use App\Services\AddData\AddProductData;
use Livewire\Component;
class AddProductDataModal extends Component
{
  protected $listeners = ['OpenModal' => 'isOpen'];
  public $isProductModal, $stockId, $loomId, $unitId, $date, $product, $response, $stockQuality;
  public $isLoading = false;
    public function render()
    {
        return view('livewire.modals.add-product-data-modal');
    }
    public function isOpen($stockId, $loomId, $unitId, $stockQuality){
      $this->stockId = $stockId;
      $this->loomId = $loomId;
      $this->unitId = $unitId;
      $this->stockQuality = $stockQuality;
      $this->isProductModal = true;
    }
    public function isClose(){
      $this->isProductModal = false;
    }

    public function addProductData(AddProductData $addProductData): void{
      $response=$addProductData->addData($this->stockId, $this->loomId, $this->unitId, $this->date, $this->product, $this->stockQuality);
      if($response === '250'){
        $this->isClose();
        $this->dispatch('updateProductList');
        $this->dispatch('toast', message:'Product data added successfully', type:'success');
      } else {
        $this->dispatch('toast' , message:'Error occoured while adding data.', type:'error');
      }
    }

    
}
