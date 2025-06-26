<div 
    x-data="{
        show: false,
        message: '',
        type: 'success',
        timeout: null,

        init() {
            window.addEventListener('toast', event => {
                this.message = event.detail.message;
                this.type = event.detail.type || 'success';
                this.show = true;

                clearTimeout(this.timeout);
                this.timeout = setTimeout(() => this.show = false, 3000);
            });
        }
    }"
    x-show="show"
    x-transition:enter="transform ease-out duration-300 transition"
    x-transition:enter-start="translate-x-full opacity-0"
    x-transition:enter-end="translate-x-0 opacity-100"
    x-transition:leave="transform ease-in duration-200 transition"
    x-transition:leave-start="translate-x-0 opacity-100"
    x-transition:leave-end="translate-x-full opacity-0"
    class="fixed top-5 right-5 w-80 px-4 py-3 rounded-lg shadow-lg text-white text-sm z-50 flex items-start gap-3"
    :class="{
        'bg-green-600': type === 'success',
        'bg-red-600': type === 'error'
    }"
    x-cloak
>
    <!-- Icon -->
    <div class="mt-1">
        <template x-if="type === 'success'">
            <span>✅</span>
        </template>
        <template x-if="type === 'error'">
            <span>❌</span>
        </template>
    </div>

    <!-- Message -->
    <div class="flex-1" x-text="message"></div>
</div>
