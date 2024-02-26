<div>
    <x-dialog-modal wire:model.live="modalEdit" submit="edit">
        <x-slot name="title">
            Form Edit User
        </x-slot>
        <x-slot name="content">

            <x-ts-errors />

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-ts-input label="Nome" wire:model="form.name" />
                </div>
                <div class="col-span-6">
                    <x-ts-input label="E-mail" wire:model="form.email" />
                </div>
                <div class="col-span-6">
                    <x-ts-select.styled label="Escola" wire:model.live="form.escola_id"
                        :request="route('api.escolas')" select="label:name|value:id" />
                </div>
                <div class="col-span-6">
                    <x-ts-select.styled label="Cargo" wire:model.live="form.cargo_id"
                    :request="route('api.cargos')" select="label:name|value:id" />
                </div>
                <div class="col-span-6">
                    <x-ts-input label="Matrícula" wire:model="form.matricula" />
                </div>
                <div class="col-span-6">
                    <x-ts-input label="CPF" wire:model="form.cpf" x-mask="999.999.999-99" />
                </div>
                <div class="col-span-6">
                    <x-ts-input label="Data de nascimento" wire:model="form.data_nascimento" type="date" />
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
