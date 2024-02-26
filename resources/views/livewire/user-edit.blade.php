<div>
    <x-dialog-modal wire:model.live="modalEdit" submit="edit">
        <x-slot name="title">
            Form Edit User
        </x-slot>
        <x-slot name="content">

            <x-ts-errors />
            
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-ts-input label="Nome" name="name" wire:model="form.name" />
                </div>
                <div class="col-span-12">
                    <x-ts-input label="E-mail" name="email" wire:model="form.email" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
