<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">

        <x-ts-errors />

        <div class="col-span-6 sm:col-span-4">
            <x-ts-password label="Senha atual" wire:model="state.current_password"/>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-ts-password label="Nova senha" wire:model="state.password"/>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-ts-password label="Confirma a nova senha" wire:model="state.password_confirmation"/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-ts-button color="secondary" sm>
            {{ __('Save') }}
        </x-ts-button>
    </x-slot>
</x-form-section>
