<x-filament-panels::page.simple>
    <div class="fixed inset-0 w-full h-full">
        <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=1920&q=80"
            alt="Hutan rimbun" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gray-900/60"></div>
    </div>

    <div class="relative z-10">
        @if (filament()->auth()->hasRegistration())
            <x-slot name="subheading">
                {{ __('filament-panels::pages/auth/login.actions.register.before') }}
                {{ $this->registerAction }}
            </x-slot>
        @endif

        <div class="bg-white/90 backdrop-blur-sm rounded-xl shadow-xl p-8">
            <x-filament-panels::form.actions :actions="$this->getCachedFormActions()" :full-width="$this->hasFullWidthFormActions()" />
        </div>
    </div>
</x-filament-panels::page.simple>
