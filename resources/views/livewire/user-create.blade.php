<div>
    {{-- @dump($dados) --}}
    <x-ts-button @click="$wire.set('modalCreate', true)" color="secondary">+</x-ts-button>

    <x-dialog-modal wire:model="modalCreate" submit="save">
        <x-slot name="title">
            Form User Create
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">
                
                <x-ts-errors />

                <div class="col-span-12">
                    <x-ts-input label="Nome" name="name" wire:model="form.name" />
                </div>
                <div class="col-span-12">
                    <x-ts-input label="E-mail" name="email" wire:model="form.email" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalCreate', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
