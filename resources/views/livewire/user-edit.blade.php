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
                <div class="col-span-2 sm:col-span-3">
                    {{-- <div class="w-full mb-3 space-y-2 text-xs">
                        <label for="selectedRoles" class="text-gray-700 dark:text-gray-200">Roles</label>
                        <select wire:model.live="selectedRoles"
                            class="py-2 mt-2 space-y-0.5 text-gray-700 border-gray-300 rounded-md shadow-md overscroll-contain soft-scrollbar form-multiselect dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 ">
                            @foreach($roles as $id => $role)
                            <option value="{{ $id }}" {{ in_array($id, old('roles', $user->roles->pluck('id')->toArray())) ? '
                                selected' : '' }}>
                                {{ $role }}
                            </option>
                            @endforeach
                        </select>
                    </div> --}}
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
