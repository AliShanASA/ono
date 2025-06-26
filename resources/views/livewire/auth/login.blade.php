<div class="min-h-screen bg-gray-200 dark:bg-gray-700 flex items-center justify-center flex-row gap-1 p-4">
  <div class="absolute transition-all duration-500 ease-in-out transform 
opacity-100 scale-100 translate-x-0 border border-indigo-500 p-5 rounded-md shadow-lg bg-gray-50 dark:bg-gray-800 w-full md:max-w-lg">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900 dark:text-gray-100">Sign in to your account</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" wire:submit.prevent="login">
        <div>
          <label class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Username</label>
          <div class="mt-2">
            <input type="text" required wire:model.defer="username" class="block w-full rounded-md bg-gray-100  px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
           
          </div>
        </div>
  
        <div>
          <div class="flex items-center justify-between">
            <label class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Password</label>   
          </div>
          <div class="relative mt-2 flex flex-row">
            <input type="{{$isView?'text':'password'}}"  wire:model.defer="password" required class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            <i wire:click="openViewPassword" class="absolute {{$isView?'hidden':''}} bi bi-eye right-2 top-1 text-lg cursor-pointer"></i>
            <i wire:click="closeViewPassword" class="absolute {{$isView?'':'hidden'}} bi bi-eye-slash right-2 top-1 text-lg cursor-pointer"></i>
          </div>
        </div>
        @error('authError') <p class="text-sm text-red-500">{{ $message }}</p>@enderror
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
        </div>
      </form>
    </div>
</div>


</div>