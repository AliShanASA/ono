<?php

namespace App\Livewire\Partials;
use App\Models\LoomModel;
use App\Models\QualityModel;
use App\Models\Unit;

use App\Models\WorkerNameModel;
use Livewire\Component;

class Loom extends Component
{
  public $unitData, $isModal, $isLoomSelected, $workerNames, $qualities;
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

  public function setDisplayUnit($unitId, $loomId)
  {
    $this->isLoomSelected = true;
    $this->displayUnit = $unitId;
    $this->displayLoom = $loomId;

  }
  public function openModal()
  {
    $this->isModal = true;
  }
  public function closeModal()
  {
    $this->isModal = false;
  }
}

