<div class="flex h-full">
  <div class="w-[15%] border-r border-indigo-400 shadow-md">
    <p class="bg-blue-600 text-white mb-2 text-sm font-semibold text-center">Units</p>
    <ul x-data="{ open: @entangle('activeUnit').defer }" class="space-y-2 text-sm">
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
    <div class="flex flex-col p-5">
      <div class="flex flex-row gap-2">
      <p>Testing</p>
      <p>{{$displayLoom}}</p>
    </div>
    <div class="border border-black p-3 rounded-md bg-white shadow-lg">
      <div class="flex flex-col">
        <div class="flex flex-row justify-between">
        <p>testing</p>
        <p>testing</p>
        <p>testing</p>
      </div>
      <div class="flex flex-row justify-between">
        <p>testing</p>
        <p>testing</p>
        <p>testing</p>
      </div>
      <div class="flex flex-row justify-between">
        <p>testing</p>
      </div>
      <div>
        <table class="min-w-full border-collapse border border-gray-300">
          <tbody>
            <tr class="bg-gray-100">
              <td class="sticky left-0 bg-gray-100 font-semibold text-left px-4 py-3 border border-gray-300 w-36">Date</td>
              <td class="text-center border border-gray-300 px-4 py-3">2023-10-02</td>
              <td class="text-center border border-gray-300 px-4 py-3">2023-10-03</td>
              <td class="text-center border border-gray-300 px-4 py-3">2023-10-04</td>
              <td class="text-center border border-gray-300 px-4 py-3">2023-10-05</td>
              <td class="text-center border border-gray-300 px-4 py-3">2023-10-06</td>
              <td class="text-center border border-gray-300 px-4 py-3">2023-10-07</td>
              <td class="text-center border border-gray-300 px-4 py-3">2023-10-08</td>
              <td class="sticky right-0 bg-gray-100 font-semibold text-center px-4 py-3 border border-gray-300 w-20">Total</td>
            </tr>
            <tr>
              <td class="sticky left-0 bg-white font-semibold text-left px-4 py-3 border border-gray-300 w-36">String 1</td>
              <td class="text-center border border-gray-300 px-4 py-3">Alpha</td>
              <td class="text-center border border-gray-300 px-4 py-3">Beta</td>
              <td class="text-center border border-gray-300 px-4 py-3">Gamma</td>
              <td class="text-center border border-gray-300 px-4 py-3">Delta</td>
              <td class="text-center border border-gray-300 px-4 py-3">Epsilon</td>
              <td class="text-center border border-gray-300 px-4 py-3">Zeta</td>
              <td class="text-center border border-gray-300 px-4 py-3">Eta</td>
              <td class="sticky right-0 bg-white border border-gray-300 w-20"></td>
            </tr>
            <tr>
              <td class="sticky left-0 bg-white font-semibold text-left px-4 py-3 border border-gray-300 w-36">Integer</td>
              <td class="text-center border border-gray-300 px-4 py-3 font-mono font-bold text-indigo-700">5</td>
              <td class="text-center border border-gray-300 px-4 py-3 font-mono font-bold text-indigo-700">3</td>
              <td class="text-center border border-gray-300 px-4 py-3 font-mono font-bold text-indigo-700">7</td>
              <td class="text-center border border-gray-300 px-4 py-3 font-mono font-bold text-indigo-700">2</td>
              <td class="text-center border border-gray-300 px-4 py-3 font-mono font-bold text-indigo-700">8</td>
              <td class="text-center border border-gray-300 px-4 py-3 font-mono font-bold text-indigo-700">6</td>
              <td class="text-center border border-gray-300 px-4 py-3 font-mono font-bold text-indigo-700">4</td>
              <td class="sticky right-0 bg-gray-100 font-semibold text-indigo-900 text-center px-4 py-3 border border-gray-300 w-20">35</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>