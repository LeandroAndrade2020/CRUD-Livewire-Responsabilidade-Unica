<div>
    {{-- @dump($data) --}}
    <x-select wire:model.live="paginate" class='mt-4 text-sm border'>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </x-select>
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
                <th @click="$wire.sortField('address')" class="px-3 py-2 border cursor-pointer whitespace-nowrap border-spacing-1">
                    <x-sort :$sortDirection :$sortBy :field="'address'"/>Address
                </th>
                <th class="px-3 py-2 border whitespace-nowrap border-spacing-1">Action</th>
            </tr>
            <tr>
                <td class="px-3 py-2 border border-spacing-1"><x-input wire:model.live="form.id" type="search" class="w-full text-sm"/></td>
                <td class="px-3 py-2 border border-spacing-1"><x-input wire:model.live="form.name" type="search" /></td>
                <td class="px-3 py-2 border border-spacing-1"><x-input wire:model.live="form.email" type="search" /></td>
                <td class="px-3 py-2 border border-spacing-1"><x-input wire:model.live="form.address" type="search" /></td>
                <td class="px-3 py-2 border border-spacing-1"></td>
            </tr>
        </thead>
        <tbody>
            @isset($data)
                @foreach ($data as $customer)
                    <tr>
                        <td class="px-3 py-2 text-center border whitespace-nowrap border-spacing-1">{{ $customer->id }}</td>
                        <td class="px-3 py-2 border whitespace-nowrap border-spacing-1">{{ $customer->name }}</td>
                        <td class="px-3 py-2 border whitespace-nowrap border-spacing-1">{{ $customer->email }}</td>
                        <td class="px-3 py-2 border whitespace-nowrap border-spacing-1">{{ substr($customer->address ,0 ,10)}}</td>
                        <td class="px-3 py-2 border whitespace-nowrap border-spacing-1">
                            <x-button @click="$dispatch('dispatch-customer-table-edit', { id: '{{ $customer->id}}' })" type="button">Editar</x-button>
                            <x-danger-button @click="$dispatch('dispatch-customer-table-delete', {id: '{{ $customer->id }}', name: '{{ $customer->name }}' })" >Delete</x-danger-button>
                        </td>
                    </tr>
                @endforeach
            @endisset
        </tbody>
    </table>
    <div class="mt-3">
        {{ $data->onEachSide(1)->links() }}
    </div>
</div>
