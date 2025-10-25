<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <div class="flex flex-wrap items-center gap-4 justify-start mt-6">
            @foreach ($this->getFormActions() as $action)
                {{ $action }}
            @endforeach
        </div>
    </form>
</x-filament-panels::page>

