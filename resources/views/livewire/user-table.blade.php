<div>
    {{-- @dump($data) --}}
    <div class="flex justify-between mb-2 -mt-2">
        <x-ts-input wire:model.blur="form.name" placeholder="Pesquisar.." class=""/>
        <livewire:user-create />
    </div>
    <table class="min-w-full mt-2 divide-y divide-gray-200">
        <thead>
            <tr>
                <x-table-th @click="$wire.sortField('id')" class="text-center">
                    <x-sort :$sortDirection :$sortBy :field="'id'"/>ID
                </x-table-th>

                <x-table-th @click="$wire.sortField('name')" >
                    <x-sort :$sortDirection :$sortBy :field="'name'"/>Nome
                </x-table-th>

                <x-table-th @click="$wire.sortField('escola_id')" >
                    <x-sort :$sortDirection :$sortBy :field="'escola_id'"/>Escola
                </x-table-th>

                <x-table-th @click="$wire.sortField('cargo_id')" >
                    <x-sort :$sortDirection :$sortBy :field="'cargo_id'"/>Cargo
                </x-table-th>

                <x-table-th></x-table-th>
            </tr>
        </thead>
        <tbody>
            @isset($data)
                @foreach ($data as $user)
                    <tr>
                        <x-table-td class="text-center">{{ $user->id }}</x-table-td>

                        <x-table-td>
                            <span>{{ $user->name }} - {{ $user->matricula }}</span><br>
                            <span class="text-xs text-slate-500">{{ $user->email }}</span>
                        </x-table-td>
                        <x-table-td>{{ $user->escola->name }}</x-table-td>

                        <x-table-td>{{ $user->cargo->name }}</x-table-td>

                        <x-table-td class="text-center">

                            <x-ts-button icon="pencil" color="secondary"  outline
                            @click="$dispatch('dispatch-user-table-edit', { id: '{{ $user->id}}' })"/>

                            <x-ts-button icon="finger-print" color="teal"  outline href="{{ route('password.reset', $user->id) }}"/>

                                <button wire:click="resetPassword">Redefinir Senha</button>

                            <x-ts-button icon="x-mark" color="red"  outline
                            @click="$dispatch('dispatch-user-table-delete', {id: '{{ $user->id }}', name: '{{ $user->name }}' })"/>

                        </x-table-td>
                    </tr>
                @endforeach
            @endisset
        </tbody>
    </table>
    <div class="flex px-2 py-3 space-x-2 bg-gray-50">
            <div class="w-full">
                {{ $data->onEachSide(1)->links() }}
            </div>
            <div>
            <x-ts-select.native wire:model.live="paginate" :options="[
                ['label' => '5 por página', 'value' => 5],
                ['label' => '10 por página', 'value' => 10],
                ['label' => '25 por página', 'value' => 25],
                ['label' => '50 por página', 'value' => 50],
                ['label' => '100 por página', 'value' => 100],
            ]" select="label:label|value:value" />
        </div>
    </div>
</div>
