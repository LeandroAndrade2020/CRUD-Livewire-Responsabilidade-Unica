<div>
    {{-- @dump($data) --}}
    <div class="flex justify-between mb-2 -mt-2">
        <x-ts-input wire:model.blur="form.name" placeholder="Pesquisar.." class=""/>
        <livewire:user-create />
    </div>
    <table class="min-w-full mt-2 divide-y divide-gray-200">
        <thead>
            <tr>
                <th @click="$wire.sortField('id')" class="px-3 py-2 border cursor-pointer whitespace-nowrap border-spacing-1">
                    <x-sort :$sortDirection :$sortBy :field="'id'"/>ID
                </th>
                <th @click="$wire.sortField('name')" class="px-3 py-2 border cursor-pointer whitespace-nowrap border-spacing-1">
                    <x-sort :$sortDirection :$sortBy :field="'name'"/>Name
                </th>
                <th @click="$wire.sortField('email')" class="px-3 py-2 border cursor-pointer whitespace-nowrap border-spacing-1">
                    <x-sort :$sortDirection :$sortBy :field="'email'"/>Email
                </th>
                <th class="px-3 py-2 border whitespace-nowrap border-spacing-1">Action</th>
            </tr>
        </thead>
        <tbody>
            @isset($data)
                @foreach ($data as $user)
                    <tr>
                        <td class="px-3 py-2 text-center border whitespace-nowrap border-spacing-1">{{ $user->id }}</td>
                        <td class="px-3 py-2 border whitespace-nowrap border-spacing-1">{{ $user->name }}</td>
                        <td class="px-3 py-2 border whitespace-nowrap border-spacing-1">{{ $user->email }}</td>
                        <td class="px-3 py-2 text-center border border-spacing-1">
                            <x-ts-button @click="$dispatch('dispatch-user-table-edit', { id: '{{ $user->id}}' })"
                                icon="pencil" color="secondary"  outline/>
                            <x-ts-button @click="$dispatch('dispatch-user-table-delete', {id: '{{ $user->id }}', name: '{{ $user->name }}' })"
                                icon="x-mark" color="red"  outline />
                        </td>
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
