<div class="flex h-full">
  <div class="w-[15%] border-r border-l border-indigo-400 shadow-md">
    <p class="bg-indigo-600 text-white mb-2 text-sm font-semibold text-center py-[10px]">Units</p>
    <ul x-data="{ open: @entangle('activeUnit').defer }" class="space-y-2 text-sm px-1">
      @foreach ($unitData as $unit)
      <li class="w-full">
        <div 
          @click="$wire.getLoomData({{ $unit->id }}); open = open === {{ $unit->id }} ? null : {{ $unit->id }}"
          class="flex justify-between items-center hover:bg-indigo-500 hover:text-white cursor-pointer rounded-md p-1 transition-colors duration-200 "
        >
          <span class="font-medium text-sm tracking-wide">Unit {{ $unit->id }}</span>
          <i 
            class="open === {{ $unit->id }} ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" 
            class="text-indigo-400 transition-transform duration-200" 
            style="open === {{ $unit->id }} ? 'transform: rotate(180deg)' : 'transform: rotate(0deg)'"
          ></i>
        </div>
        <!-- Suboptions -->
        <div 
          x-show="open === {{ $unit->id }}" 
          x-transition:enter="transition ease duration-300" 
          x-transition:enter-start="opacity-0 transform scale-y-95" 
          x-transition:enter-end="opacity-100 transform scale-y-100" 
          x-transition:leave="transition ease duration-200" 
          x-transition:leave-end="opacity-0 transform scale-y-95" 
          class="ml-4 mt-2 space-y-1"
        >
          @if($activeUnit === $unit->id)
            @foreach ($loomData as $index => $loom)
            <p 
              wire:click="setDisplayUnit({{$unit->id}}, {{$loom->id}})"
              class=" p-1 text-black rounded-md cursor-pointer text-sm transition-colors duration-150 {{$displayLoom == $loom->id && $displayUnit == $unit->id ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-500 hover:text-white'}}"
              x-transition:enter="transition ease duration-300 delay-[calc({{ $index }}*50ms)]"
              x-transition:enter-start="opacity-0 transform translate-x-4"
              x-transition:enter-end="opacity-100 transform translate-x-0"
            >
              Loom {{ $loom->id }}
            </p>
            @endforeach
          @endif
        </div>
      </li>
      @endforeach
    </ul>
  </div>

  <!-- Inner Main Content -->
  <div class="w-[85%]  text-black overflow-y-auto">
    <div class="h-10 border-b border-black flex items-center px-4 justify-between">
      <div class="flex flex-row">
        <p class="font-bold">Testing:</p>
        <p>Testing</p>
      </div>
      <div class="flex flex-row">
        <p class="font-bold">Testing:</p>
        <p>{{$displayUnit}}</p>
      </div>
      <div class="flex flex-row">
        <p class="font-bold">Testing:</p>
        <p>Testing</p>
      </div>
    </div>
    <div class="p-2 flex flex-row gap-1">
      <div class="w-[50%] ">
        <div class="p-2 bg-indigo-600 rounded-md text-white text-center w-[28%]">
        Stock Details
        </div>
        <div class="mt-2 w-full flex flex-col gap-1 px-10 bg-white rounded-md shadow-lg py-2">
          <div class="flex flex-row justify-between">
            <p class="font-bold">Stock Code</p>
            <p>1</p>
          </div>
          <div class="flex flex-row justify-between">
            <p class="font-bold">Quality</p>
            <p>1</p>
          </div>
          <div class="flex flex-row justify-between">
            <p class="font-bold">Quantity</p>
            <p>1</p>
          </div>
          <div class="flex flex-row justify-between">
            <p class="font-bold">Product Produced</p>
            <p>1</p>
          </div>
          <div class="flex flex-row justify-between">
            <p class="font-bold">Remaining</p>
            <p>1</p>
          </div>
          <div class="flex flex-row justify-between">
            <p class="font-bold">Worker Name</p>
            <p>1</p>
          </div>
          <div class="flex flex-row justify-between">
            <p class="font-bold">Date</p>
            <p>1</p>
          </div>
          <div class="flex flex-row justify-between">
            <p class="font-bold">Time</p>
            <p>1</p>
          </div>
          <div class="flex flex-row justify-between">
            <p class="font-bold">Status</p>
            <p>1</p>
          </div>
        </div>
      </div>
      <div class="w-[50%]">
        <div class="p-2 bg-indigo-600 rounded-md text-white text-center w-[28%]">
        Last 7 Days Data
        </div>
        <table class="w-full mt-2">
          <tr>
            <th>Date</th>
            <th>Quality</th>
            <th>Product</th>
            <th>Actions</th>
          </tr>
        </table>
      </div>
    </div>

  </div>
</div>