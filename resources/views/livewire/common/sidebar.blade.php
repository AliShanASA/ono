<div class="w-[18%] border-r border-indigo-400 bg-gray-900 text-gray-100 flex flex-col items-center shadow-2xl min-h-screen">
  <!-- Logo -->
  <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="h-20 w-20 mt-4 mb-6">

  <!-- Menu -->
  <ul class="w-full space-y-2 px-2" x-data="{ 
      open: {{ request()->routeIs('loom-management') || request()->routeIs('filter') || request()->routeIs('reports') || request()->routeIs('details') ? 'true' : 'false' }}
    }"
  >

    <a 
      href="{{ route('dashboard') }}" 
      wire:navigate 
      class="block w-full p-3 cursor-pointer rounded-lg transition-colors duration-200 font-medium text-sm tracking-wide 
        {{ request()->routeIs('dashboard') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}"
    >
      Dashboard
    </a>  

    <!-- Option with Submenu -->
    <li class="w-full">
      <div @click="open = !open" 
           class="flex justify-between items-center p-3 hover:bg-indigo-800 cursor-pointer rounded-lg transition-colors duration-200"
      >
        <span class="font-medium text-sm tracking-wide">Loom</span>
        <svg :class="{'rotate-180': open}" class="h-4 w-4 text-indigo-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>

      <!-- Suboptions -->
      <div x-show="open" x-transition class="ml-4 mt-2 space-y-1">
        <a 
          href="{{ route('loom-management') }}" 
          wire:navigate 
          class="block w-full p-2 rounded-md cursor-pointer text-sm 
                 {{ request()->routeIs('loom-management') ? 'bg-indigo-800 text-white' : 'text-gray-300 hover:bg-indigo-800 hover:text-white' }} 
                 transition-colors duration-150"
        >
          Loom Management
        </a>
        <a 
          href="{{ route('filter') }}" 
          class="block w-full p-2 rounded-md cursor-pointer text-sm 
                 {{ request()->routeIs('filter') ? 'bg-indigo-800 text-white' : 'text-gray-300 hover:bg-indigo-800 hover:text-white' }} 
                 transition-colors duration-150"
        >
          Filter by Quality
        </a>
        <a 
          href="{{ route('reports') }}" 
          class="block w-full p-2 rounded-md cursor-pointer text-sm 
                 {{ request()->routeIs('reports') ? 'bg-indigo-800 text-white' : 'text-gray-300 hover:bg-indigo-800 hover:text-white' }} 
                 transition-colors duration-150"
        >
          Reports
        </a>
        <a 
          href="{{ route('details') }}" 
          class="block w-full p-2 rounded-md cursor-pointer text-sm 
                 {{ request()->routeIs('details') ? 'bg-indigo-800 text-white' : 'text-gray-300 hover:bg-indigo-800 hover:text-white' }} 
                 transition-colors duration-150"
        >
          Details Management
        </a>
      </div>
    </li>

    <!-- Other Options -->
     <a 
      href="{{ route('warehouse') }}" 
      wire:navigate 
      class="block w-full p-3 cursor-pointer rounded-lg transition-colors duration-200 font-medium text-sm tracking-wide 
        {{ request()->routeIs('warehouse') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}"
    >
      Dashboard
    </a>  
    <li wire:click='logout' class="p-3 cursor-pointer rounded-lg hover:bg-indigo-800 transition-colors duration-200 font-medium text-sm tracking-wide">
      Logout
    </li>
  </ul>
</div>
