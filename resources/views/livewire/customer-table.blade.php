<div>
    {{-- @dump($data) --}}
    <table class="min-w-full mt-4 divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-3 py-2 border whitespace-nowrap border-spacing-1">#</th>
                <th class="px-3 py-2 border whitespace-nowrap border-spacing-1">Action</th>
                <th class="px-3 py-2 border whitespace-nowrap border-spacing-1">ID</th>
                <th class="px-3 py-2 border whitespace-nowrap border-spacing-1">Name</th>
                <th class="px-3 py-2 border whitespace-nowrap border-spacing-1">Email</th>
                <th class="px-3 py-2 border whitespace-nowrap border-spacing-1">Address</th>
            </tr>
        </thead>
        <tbody>
            @isset($data)
                @foreach ($data as $customer)
                    <tr>
                        <td class="px-3 py-2 text-center border whitespace-nowrap border-spacing-1">{{ $loop->iteration }}</td>
                        <td class="px-3 py-2 border whitespace-nowrap border-spacing-1">
                            <x-button wire:click="edit({{ $customer->id }})">Edit</x-button>
                        </td>
                        <td class="px-3 py-2 text-center border whitespace-nowrap border-spacing-1">{{ $customer->id }}</td>
                        <td class="px-3 py-2 border whitespace-nowrap border-spacing-1">{{ $customer->name }}</td>
                        <td class="px-3 py-2 border whitespace-nowrap border-spacing-1">{{ $customer->email }}</td>
                        <td class="px-3 py-2 border whitespace-nowrap border-spacing-1">{{ substr($customer->address ,0 ,10)}}</td>
                    </tr>
                @endforeach
            @endisset
        </tbody>
    </table>
</div>
