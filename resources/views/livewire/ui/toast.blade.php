<div 
  x-data="{ show: false, message: '', type: 'success' }"
  x-show="show"
  x-transition:enter="transition ease-out duration-300"
  x-transition:enter-start="opacity-0 translate-x-5"
  x-transition:enter-end="opacity-100 translate-x-0"
  x-transition:leave="transition ease-in duration-300"
  x-transition:leave-start="opacity-100 translate-x-0"
  x-transition:leave-end="opacity-0 translate-x-5"
  @toast.window="
      message = $event.detail.message;
      type = $event.detail.type || 'success';
      show = true;
      setTimeout(() => show = false, 3000);
  "
  :class="{
    'bg-green-100 text-green-800 border-green-200': type === 'success',
    'bg-red-100 text-red-800 border-red-200': type === 'error',
    'bg-yellow-100 text-yellow-800 border-yellow-200': type === 'warning',
  }"
  class="fixed top-5 right-5 z-100 flex items-start gap-3 w-full max-w-sm p-4 text-sm border rounded-lg shadow-lg"
  style="display: none;"
  role="alert"
>
  <!-- Icon -->
  <template x-if="type === 'success'">
    <svg class="w-5 h-5 mt-0.5 shrink-0 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg>
  </template>
  <template x-if="type === 'error'">
    <svg class="w-5 h-5 mt-0.5 shrink-0 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
  </template>
  <template x-if="type === 'warning'">
    <svg class="w-5 h-5 mt-0.5 shrink-0 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z" />
    </svg>
  </template>

  <!-- Message -->
  <div class="flex-1 font-medium" x-text="message"></div>

  <!-- Close button -->
  <button @click="show = false" class="transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
    </svg>
  </button>
</div>
