<?php

namespace App\Livewire\Partials;
use App\Models\LoomModel;
use App\Models\QualityModel;
use App\Models\Stock;
use App\Models\Unit;

use App\Services\AddData\AddStockData;
use App\Services\LatestStock;

use App\Models\WorkerNameModel;
use Livewire\Component;

class Loom extends Component
{
  public $unitData, $isModal, $isLoomSelected, $workerNames, $qualities, $stockQuantity, $stockQuality, $stockDate, $stockTime, $stockWidth, $stockWorkerName, $response, $isLoading, $currentStockId;
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


  public function setDisplayUnit($unitId, $loomId, LatestStock $latestStock)
  {
    $this->currentStockId = null;
    $this->isLoomSelected = true;
    $this->displayUnit = $unitId;
    $this->displayLoom = $loomId;
    $this->stockData = $latestStock->getLatestStock($this->displayUnit, $this->displayLoom);
    if($this->stockData){ 
      $this->currentStockId=$this->stockData->id;
    }
  }

  public function openModal()
  {
    $this->isModal = true;
  }
  public function closeModal()
  {
    $this->isModal = false;
  }
  public function addStockData(AddStockData $addStockData, LatestStock $latestStock){
    $this->validate([
      'stockQuantity' => 'required|numeric|min:1',
      'stockWidth' => 'required|numeric|min:1'
    ]);
    $this->isLoading = true;
    $this->response = $addStockData->addData($this->displayLoom, $this->displayUnit, $this->stockQuantity, $this->stockQuality, $this->stockWidth, $this->stockDate, $this->stockTime, $this->stockWorkerName);
    if($this->response){
      $this->stockQuantity = '';
      $this->stockWidth = '';
     $this->stockQuality = null;
     $this->stockDate = null;
     $this->stockTime = null;
     $this->stockWorkerName=null;
     $this->stockData = $latestStock->getLatestStock($this->displayUnit, $this->displayLoom);
     $this->currentStockId = $this->stockData->id;  
     $this->dispatch('toast', message:'Data has been added successfully', type:'success');
    }
    $this->isLoading=false;
    $this->isModal = false;
  }

  public function openProductModal(){
    $this->dispatch('OpenModal', stockId:$this->currentStockId, unitId:$this->displayUnit, loomId:$this->displayLoom);
  }

  public function deleteStock($stockId, LatestStock $latestStock){
     try{
      $stock = Stock::where('id', $stockId);  
      $stock->delete();
      $this->currentStockId = null;
      $this->stockData = $latestStock->getLatestStock($this->displayUnit, $this->displayLoom);
      if($this->stockData){
        $this->currentStockId = $this->stockData->id;
      }
      $this->dispatch('toast', message:'Stock has been deleted successfully', type:'success');
     } catch(\Exception $e)
     {
      $this->dispatch('toast', message:'Error occoured while deleting the stock.', type:'error');
     }
  }
}
  
