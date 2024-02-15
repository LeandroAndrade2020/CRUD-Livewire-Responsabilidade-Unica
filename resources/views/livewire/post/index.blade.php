<div class="max-w-6xl mx-auto">
    @php /** @var \App\Models\Post $post */ @endphp
    <div class="flex flex-col">
        <div class="p-2 m-2">
            <div class="w-full mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col">
                    <div class="px-3 py-2 -my-2 overflow-x-auto bg-white rounded-md sm:-mx-6 lg:-mx-8">
                        <div class="flex items-end justify-end">
                            <livewire:post.create />
                        </div>
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full overflow-x-auto divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Title
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                    src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $post->user->name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $post->user->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $post->title }}</div>
                                            <div class="text-sm text-gray-500">{{ substr($post->body, 0, 40) }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                            <x-button wire:click="update({{ $post->id }})" class="bg-teal-500">Editar</x-button>
                                            <x-button wire:click="delete({{ $post->id }})" class="bg-red-500">Eliminar</x-button>
                                        </td>
                                    </tr>

                                    @endforeach
                                    <!-- More rows... -->

                                </tbody>
                            </table>
                        </div>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
        <livewire:post.update />
        <livewire:post.delete />
    </div>
</div>
