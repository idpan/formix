<x-filament::page>
    <form wire:submit.prevent="create" class="space-y-6">
        {{ $this->form }}

        <x-filament::button type="submit" color="primary">
            Simpan Cost Planning
        </x-filament::button>
    </form>
</x-filament::page>