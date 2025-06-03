<div class="min-h-screen bg-gray-200 dark:bg-gray-700 flex items-center justify-center flex-row gap-1 p-4">
  <div class="absolute transition-all duration-500 ease-in-out transform 
{{$isRegister ? 'opacity-0 scale-95 translate-x-20 pointer-events-none' : 'opacity-100 scale-100 translate-x-0'}}
border border-indigo-500 p-5 rounded-md shadow-lg bg-gray-50 dark:bg-gray-800 w-full md:max-w-lg">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900 dark:text-gray-100">Sign in to your account</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" wire:submit="verify">
        <div>
          <label for="email" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Email address</label>
          <div class="mt-2">
            <input type="email" name="email" id="email" required wire:model="newEmail" class="block w-full rounded-md bg-gray-100  px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
           
          </div>
        </div>
  
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Password</label>
            <div class="text-sm">
              <a class="cursor-pointer font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
            </div>   
          </div>
          <div class="relative mt-2 flex flex-row">
            <input type="{{$isView?'text':'password'}}" name="password" id="password" wire:model="newPassword" required class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            <i wire:click="openViewPassword" class="absolute {{$isView?'hidden':''}} bi bi-eye right-2 top-1 text-lg cursor-pointer"></i>
            <i wire:click="closeViewPassword" class="absolute {{$isView?'':'hidden'}} bi bi-eye-slash right-2 top-1 text-lg cursor-pointer"></i>
          </div>
          <p class="{{$response == '204' ? '' : 'hidden'}} text-sm text-red-600 pl-1">Passowrd Incorrect</p>
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
        </div>
      </form>
      <p class="{{$response == '203' ? 'flex' : 'hidden'}} text-green-600">Login Successfull</p>
      <p class="{{$response == '205' ? 'flex' : 'hidden'}} text-red-600">No account found.</p>
      <p class="mt-10 text-center text-sm/6 text-gray-500">
        Not a member?
        <a wire:click="openRegister" class="font-semibold text-indigo-600 hover:text-indigo-500 cursor-pointer">Register account</a>
      </p>
    </div>

  <button onclick="document.documentElement.classList.toggle('dark')" class="dark:text-white text-black">Toggle Dark Mode</button>
</div>
<div class="absolute transition-all duration-500 ease-in-out transform 
{{$isRegister ? 'opacity-100 scale-100 translate-x-0' : 'opacity-0 scale-95 -translate-x-20 pointer-events-none'}}
border border-indigo-500 p-5 rounded-md shadow-lg bg-gray-50 dark:bg-gray-800 w-full md:max-w-lg">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900 dark:text-gray-100">Register a new account!</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" wire:submit="register">
      <div>
        <label for="username" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Username</label>
        <div class="mt-2">
          <input type="text" name="username" id="username" autocomplete="username" required wire:model="registerName" class="block w-full rounded-md bg-gray-100  px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>
      <div>
        <label for="registerEmail" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Email address</label>
        <div class="mt-2">
          <input type="email" name="registerEmail" id="registerEmail" required wire:model="registerEmail" class="block w-full rounded-md bg-gray-100  px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
          <p class="{{$response == '201' ? '' : 'hidden'}} text-sm text-red-600 pl-1">Email already exists. Try with another email.</p>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Password</label>
         
        </div>
        <div class="relative mt-2 flex flex-row">
          <input type="{{$isView?'text':'password'}}" name="password" id="password" wire:model="registerPassword" required class="block w-full rounded-md bg-gray-100 px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
          <i wire:click="openViewPassword" class="absolute {{$isView?'hidden':''}} bi bi-eye right-2 top-1 text-lg cursor-pointer"></i>
          <i wire:click="closeViewPassword" class="absolute {{$isView?'':'hidden'}} bi bi-eye-slash right-2 top-1 text-lg cursor-pointer"></i>
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
      </div>
    </form>
    <p class="{{$response == '202' ? 'flex' : 'hidden'}} text-green-600">Registeration Successful</p>
    <p class="mt-10 text-center text-sm/6 text-gray-500">
      Already have an account?
      <a wire:click="closeRegister" class="font-semibold text-indigo-600 hover:text-indigo-500 cursor-pointer">Back to Login</a>
    </p>

  </div>
</div>

</div>