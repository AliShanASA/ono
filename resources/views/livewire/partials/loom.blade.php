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
  <div class="w-[85%] text-black overflow-y-auto">
    <div class="{{$isLoomSelected?'':'hidden'}}">
    <div class="h-10 border-b border-indigo-500 flex items-center px-4 justify-between">
      <div class="flex flex-row gap-1">
        <p class="font-bold">Loom:</p>
        <p>{{$displayLoom}}</p>
      </div>
      <div class="flex flex-row gap-1">
        <p class="font-bold">Unit:</p>
        <p>{{$displayUnit}}</p>
      </div>
      <div class="flex flex-row gap-1">
        <p class="font-bold">Testing:</p>
        <p>Testing</p>
      </div>
      <div class="flex flex-row gap-1">
        <p class="font-bold">Testing:</p>
        <p>Testing</p>
      </div>
    </div>
    <div class="p-2 flex flex-row gap-1">
      <div class="w-[40%] ">
        <div class="text-sm p-1 bg-indigo-600 rounded-md text-white text-center w-[28%]">
        Stock Details
        </div>
        <div class="mt-2 w-full flex flex-col gap-1 px-2 bg-white rounded-md shadow-lg py-2 border border-indigo-500 font-mono">
          <div class="flex flex-row justify-between">
            <p class="font-bold">Stock Code</p>
            <p>1</p>
          </div>
          <div class="flex flex-row justify-between">
            <p class="font-bold">Quality</p>
            <p class="text-sm flex items-center justify-center">Testing Testing Testing Testing</p>
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
          <div class="flex items-center justify-center">
          <div class="bg-red-600 justify-center rounded-sm shadow-lg cursor-pointer text-white p-1 flex text-center w-[100%] hover:bg-red-800">
            Delete
          </div>
        </div>
        </div>
        <div class="flex flex-row items-center justify-end mt-2 gap-2">
          <div class="bg-gray-100 justify-center rounded-sm shadow-lg cursor-pointer text-black border border-indigo-500 p-1 flex text-center w-[30%] hover:bg-gray-300">Update</div>
          <div wire:click='openModal' class="bg-indigo-600 justify-center rounded-sm shadow-lg cursor-pointer text-white p-1 flex text-center w-[30%] hover:bg-indigo-800">Add New</div>
        </div>
      </div>
      <div class="w-[60%]">
        <div class="p-1 bg-indigo-600 rounded-md text-white text-sm text-center w-[28%]">
        Last 7 Days Data
        </div>
        <div class="bg-white rounded-md shadow-lg overflow-x-auto max-h-120 mt-2 border border-indigo-500">
          <table class="w-full table-auto border-collapse mb-1 font-mono">
            <thead class="bg-white">
              <tr>
                <th class="px-2 py-2 text-left">Date</th>
                <th class="px-2 py-2 text-left">Quality</th>
                <th class="px-2 py-2 text-left">Product</th>
                <th class="px-2 py-2 text-left">Actions</th>
              </tr>
            </thead>
            <tbody class="text-sm">
              <tr class="hover:bg-gray-50 text-left">
                <td class="px-2 py-2 border-t">12-3-2025</td>
                <td class="px-2 py-2 border-t overflow-x-auto">Testing</td>
                <td class="px-2 py-2 border-t">12</td>
                <td class="px-2 py-2 border-t space-x-2">
                  <i class="bi bi-pencil-square text-blue-600 cursor-pointer"></i>
                  <i class="bi bi-trash3 text-red-600 cursor-pointer"></i>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="flex flex-row items-center justify-end mt-2 gap-2">
          <div class="bg-gray-100 justify-center rounded-sm shadow-lg cursor-pointer text-black border border-indigo-500 p-1 flex text-center w-[30%] gap-1"> 
            <p>Total:</p>
            <p>450</p>
          </div>
          <div class="bg-indigo-600 justify-center rounded-sm shadow-lg cursor-pointer text-white p-1 flex text-center w-[30%] hover:bg-indigo-800">Add New</div>
        </div>
      </div>
    </div>
  </div>
  <div class="{{$isLoomSelected?'hidden':'flex'}} items-center justify-center">Please select loom to view data.</div>
</div>
<div class="fixed inset-0 z-50  items-center justify-center bg-black/50 {{$isModal?'flex':'hidden'}}">
<!-- Modal container -->
<div class="relative p-4 w-full max-w-xl">
 <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
   <!-- Modal header -->
   <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-600 rounded-t">
     <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
       Add New Stock
     </h3>
     <button  wire:click='closeModal'
              type="button"
             class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
             data-modal-toggle="crud-modal">
       <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
               d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
       </svg>
       <span class="sr-only">Close modal</span>
     </button>
          </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5 flex flex-col items-end">
                <div class="grid gap-4 mb-4 grid-cols-3">
                    <div class="col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select category</option>
                            <option value="TV">TV/Monitors</option>
                            <option value="PC">PC</option>
                            <option value="GA">Gaming/Console</option>
                            <option value="PH">Phones</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="w-[35%] text-white inline-flex items-center bg-indigo-700 hover:bg-indgo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new product
                </button>
            </form>
        </div>
    </div>
</div> 
</div>