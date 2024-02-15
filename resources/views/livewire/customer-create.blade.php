<div>
    <x-button @click="$wire.set('modalCustomerCreate', true)">Create Customer</x-button>

    <x-dialog-modal wire:model.live="modalCustomerCreate" submit="save">
        <x-slot name="title">
            Form Customer
        </x-slot>

        <x-slot name="content">
            <h1>Formulário do cliente</h1>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalCustomerCreate', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
