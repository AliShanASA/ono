<?php

namespace App\Livewire\Partials;
use App\Models\LoomModel;
use App\Models\Unit;

use Livewire\Component;

class Loom extends Component
{
  public $unitData;
  public $loomData = [];
  public $activeUnit = null;
  public $displayUnit, $displayLoom;

  public function mount()
  {
    $this->unitData = Unit::all();
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
    $this->displayUnit = $unitId;
    $this->displayLoom = $loomId;
  }
}

