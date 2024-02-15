<div class="max-w-6xl mx-auto">
    <div class="flex flex-col">
        <div class="p-2 m-2">
            <div class="w-full mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col">
                    <div class="px-3 py-2 -my-2 overflow-x-auto bg-white rounded-md sm:-mx-6 lg:-mx-8">
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
                                                        j{{ $post->user->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $post->title }}</div>
                                            <div class="text-sm text-gray-500">{{ substr($post->body, 0, 40) }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
                                    {{-- <x-button.circle primary
                                            icon="pencil"
                                            wire:click="update({{ $category->id }})"
                                    />
                                    <x-button.circle primary
                                            icon="trash"
                                            wire:click="delete({{ $category->id }})"
                                    /> --}}
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
    </div>
</div>
