{{-- Custom Logo Component for Filament Admin Panel --}}
<div class="flex items-center justify-center">
    @if (file_exists(public_path('images/logo.png')))
        <img
            src="{{ asset('images/logo.png') }}"
            alt="{{ config('app.name') }}"
            class="h-12 w-auto"
        />
    @elseif (file_exists(public_path('images/logo.svg')))
        <img
            src="{{ asset('images/logo.svg') }}"
            alt="{{ config('app.name') }}"
            class="h-12 w-auto"
        />
    @else
        {{-- Fallback to text logo if image not found --}}
        <span class="text-xl font-bold text-gray-800 dark:text-white">
            {{ config('app.name') }}
        </span>
    @endif
</div>

