<div class="min-h-screen flex flex-col items-center justify-start bg-gray-100 p-6">
  <h1 class="text-2xl font-bold text-indigo-700 mb-6">Details</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-5xl">
    
    <!-- Quality Form -->
    <div class="bg-white shadow-md rounded-lg p-6">
      <form wire:submit.prevent='addQuality' class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Quality</label>
          <input wire:model='quality' type="text" required
                 class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>
        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md transition-colors duration-200">
          Submit
        </button>
        <p class="{{ $response == '200' ? 'block' : 'hidden' }} text-green-600 text-sm">✔️ Success</p>
        <p class="{{ $response == '201' ? 'block' : 'hidden' }} text-red-600 text-sm">❌ Fail</p>
      </form>
    </div>

    <!-- Worker Name Form -->
    <div class="bg-white shadow-md rounded-lg p-6">
      <form wire:submit.prevent='addWorkerName' class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Worker Name</label>
          <input wire:model='worker_name' type="text" required
                 class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>
        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md transition-colors duration-200">
          Submit
        </button>
        <p class="{{ $response == '202' ? 'block' : 'hidden' }} text-green-600 text-sm">✔️ Success</p>
        <p class="{{ $response == '203' ? 'block' : 'hidden' }} text-red-600 text-sm">❌ Fail</p>
      </form>
    </div>

  </div>
</div>
