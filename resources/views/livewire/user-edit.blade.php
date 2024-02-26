<div>
    <x-dialog-modal wire:model.live="modalEdit" submit="edit">
        <x-slot name="title">
            Form Edit User
        </x-slot>
        <x-slot name="content">
{{-- @dump($form) --}}

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-ts-errors />
                </div>

                <div class="col-span-12">
                    <x-ts-input label="Nome" wire:model="form.name" />
                </div>
                <div class="col-span-6">
                    <x-ts-input label="E-mail" wire:model="form.email" />
                </div>
                <div class="col-span-6">
                    <x-model-escolas />
                </div>
                <div class="col-span-6">
                    <x-model-cargos/>
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
                <div class="col-span-2 sm:col-span-6">
                    <x-ts-select.styled wire:model="form.selectedRoles" :options="[
                        ['label' => 'Admin', 'value' => 1],
                        ['label' => 'Diretor', 'value' => 2],
                        ['label' => 'Demanda', 'value' => 3],
                    ]" select="label:label|value:value" />
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
