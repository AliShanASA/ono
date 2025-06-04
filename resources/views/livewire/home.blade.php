<div class="h-screen flex">
  <!-- Sidebar -->
  <div class="w-[18%] border-r border-indigo-400 bg-gray-900 text-gray-100 flex flex-col items-center shadow-2xl">
    <!-- Logo -->
    <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="h-20 w-20">

    <!-- Menu -->
    <ul x-data="{ open: false }" class="w-full space-y-2 px-1">
      <li @click="open = false" wire:click="setViewComponent('Dashboard')" class="p-3  cursor-pointer rounded-lg transition-colors duration-200 font-medium text-sm tracking-wide {{$viewComponenet == 'Dashboard' ? 'bg-indigo-600': 'hover:bg-indigo-800'}}">Dashboard</li>
      <!-- Option with Submenu -->
      <li  class="w-full">
        <div @click="open = !open" class="flex justify-between items-center p-3 hover:bg-indigo-800 cursor-pointer rounded-lg transition-colors duration-200">
          <span class="font-medium text-sm tracking-wide">Option 1</span>
          <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="text-indigo-400"></i>
        </div>
        <!-- Suboptions -->
        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-end="opacity-0 transform -translate-y-2" class="ml-4 mt-2 space-y-1">
          <p wire:click="setViewComponent('Loom')" class="{{$viewComponenet == 'Loom' ? 'bg-indigo-600': 'hover:bg-indigo-800 hover:text-white'}} p-2  rounded-md cursor-pointer text-sm text-gray-300  transition-colors duration-150">Suboption 1</p>
          <p wire:click="setViewComponent('Filter')" class="{{$viewComponenet == 'Filter' ? 'bg-indigo-600': 'hover:bg-indigo-800 hover:text-white'}} p-2  rounded-md cursor-pointer text-sm text-gray-300  transition-colors duration-150">Suboption 2</p>
          <p wire:click="setViewComponent('Report')" class="{{$viewComponenet == 'Report' ? 'bg-indigo-600': 'hover:bg-indigo-800 hover:text-white'}} p-2  rounded-md cursor-pointer text-sm text-gray-300  transition-colors duration-150">Suboption 2</p>
          <p wire:click="setViewComponent('Details')" class="{{$viewComponenet == 'Details' ? 'bg-indigo-600': 'hover:bg-indigo-800 hover:text-white'}} p-2  rounded-md cursor-pointer text-sm text-gray-300  transition-colors duration-150">Suboption 2</p>
        </div>
      </li>

      <!-- Other Options -->
      <li @click="open = false" wire:click="setViewComponent('Warehouse')" class="p-3  cursor-pointer rounded-lg transition-colors duration-200 font-medium text-sm tracking-wide {{$viewComponenet == 'Warehouse' ? 'bg-indigo-600': 'hover:bg-indigo-800'}}">Warehouse</li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="w-[82%] bg-gray-100 flex flex-col shadow-2xl">
    <div class="h-10 border-b border-indigo-500 flex flex-row justify-between px-1 py-1">
      <p>Testing</p>
      <p>Testing</p>
    </div>
    <div class=" flex-grow overflow-y-auto text-black h-screen">
      @if($viewComponenet == 'Dashboard')
      @livewire("partials.{$viewComponenet}")
      @elseif($viewComponenet == 'Loom')
        @livewire("partials.{$viewComponenet}")
      @elseif($viewComponenet == 'Filter')
      @livewire("partials.{$viewComponenet}")
      @elseif($viewComponenet == 'Report')
      @livewire("partials.{$viewComponenet}")
      @elseif($viewComponenet == 'Details')
      @livewire("partials.{$viewComponenet}")
      @elseif($viewComponenet == 'Warehouse')
      @livewire("partials.{$viewComponenet}")
      @endif
      
    </div>
  </div>
</div>