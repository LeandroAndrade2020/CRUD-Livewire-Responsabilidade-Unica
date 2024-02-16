<div>
    <x-dialog-modal wire:model.live="modalCustomerEdit" submit="edit">
        <x-slot name="title">
            Form Edit Customer
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Name -->
                <div class="col-span-6">
                    <x-label for="form.name" value="Nome" />
                    <x-input id="form.name" class="block w-full mt-1" type="text" wire:model="form.name" require autocomplete="form.name"/>
                    <x-input-error for="form.name" class="mt-1"/>
                </div>
                <!-- Email -->
                <div class="col-span-6">
                    <x-label for="form.email" value="Email" />
                    <x-input id="form.email" class="block w-full mt-1" type="email" wire:model="form.email" require autocomplete="form.email"/>
                    <x-input-error for="form.email" class="mt-1"/>
                </div>
                <!-- Address -->
                <div class="col-span-12">
                    <x-label for="form.address" value="Endereço" />
                    <x-input id="form.address" class="block w-full mt-1" type="text" wire:model="form.address" require autocomplete="form.address"/>
                    <x-input-error for="form.address" class="mt-1"/>
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalCustomerEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
