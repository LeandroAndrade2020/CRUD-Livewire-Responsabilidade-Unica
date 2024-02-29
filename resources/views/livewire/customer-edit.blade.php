<div>
    <x-dialog-modal wire:model.live="modalCustomerEdit" submit="edit">
        <x-slot name="title">
            Form Edit Customer
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <div class="col-span-12">
                    <x-ts-errors />
                </div>

                <div class="col-span-12">
                    <x-ts-input label="Nome" wire:model="form.name" />
                </div>
                <div class="col-span-12">
                    <x-ts-input label="E-mail" wire:model="form.email" />
                </div>
                <div class="col-span-12">
                    <x-ts-input label="Endereço" wire:model="form.address" />
                </div>
                <div class="col-span-12">
                    <x-ts-select.styled placeholder="Selecione.."
                    label="APOIOS" wire:model.live='form.apoios'
                    select="label:label|value:value" multiple
                    :options="[
                            ['label' => 'Não necessita ', 'value' => 1],
                            ['label' => 'Necessita ', 'value' => 2],
                            ['label' => 'AAE / ADI ', 'value' => 3],
                            ['label' => 'Escriba', 'value' => 4],
                            ['label' => 'Estagiário', 'value' => 5],
                            ['label' => 'Interprete de LIBRAS', 'value' => 6],
                            ['label' => 'Leitor ', 'value' => 7],
                            ['label' => 'Orientador ', 'value' => 8],
                            ['label' => 'Prof. Interlocutor de LIBRAS', 'value' => 9],
                            ['label' => 'Quando necessário', 'value' => 10],
                            ['label' => 'Solicitado ADI/AAE ', 'value' => 11],
                            ['label' => 'Solicitado Estagiário', 'value' => 12],
                            ['label' => 'Solicitado Interprete de LIBRAS ', 'value' => 13],
                        ]" />
                        {{-- @dump($form->apoios) --}}
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
