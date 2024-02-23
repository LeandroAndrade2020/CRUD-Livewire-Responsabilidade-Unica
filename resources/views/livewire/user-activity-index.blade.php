<div>
    <div class="max-w-6xl mx-auto">
        <div class="p-2 m-2">
            @can('inclusao_access')
            <div class="mb-3">
                <select wire:model.live='escola_id' class="w-1/3 border-none rounded-md shadow-sm text-slate-600">
                    <option value="">Selecione uma escola..</option>
                    @foreach($escolas as $escola)
                    <option value="{{$escola->id}}">
                        {{ $escola->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            @endcan
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                                <tr>
                                    <x-th>Escola</x-th>
                                    <x-th>Nome</x-th>
                                    <x-th>Último acesso</x-th>
                                    <x-th class="text-center">Status</x-th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($users as $user)
                                <tr class="my-4">
                                    <x-td>{{ $user->escola->name }}</x-td>
                                    <x-td>{{ $user->name }}</x-td>
                                    <x-td>{{ Carbon\Carbon::parse($user->ultimo_acesso_at)->diffForHumans() }}</x-td>
                                    <x-td class="text-{{ $user->ultimo_acesso_at >= now()->subMinutes(2) ? 'teal' : 'red' }}-500  text-center">
                                        {{ $user->ultimo_acesso_at >= now()->subMinutes(2) ? 'Online' : 'OffLine'}}
                                    </x-td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex px-2 py-3 space-x-2 bg-gray-50">
                            <div class="w-full">
                                {{ $users->links() }}
                            </div>
                            <div>
                                <select wire:model.live="perPage"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md cursor-pointer hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                                    <option value="5">5 por página</option>
                                    <option value="10">10 por página</option>
                                    <option value="50">50 por página</option>
                                    <option value="100">100 por página</option>
                                    <option value="250">250 por página</option>
                                    <option value="1000">1000 por página</option>
                                    <option value="10000">10000 por página</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
