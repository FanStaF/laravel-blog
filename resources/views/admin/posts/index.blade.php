<x-layout>

    <x-sidebar heading="Publish new post">

        <x-slot name="sidebar"><x-admin-aside/></x-slot>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Blog Post Title
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>

                                    <th scope="col" class="relative px-6 py-3" colspan="2">
                                        <span
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">

                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="{{ asset('storage/' . $post->thumbnail) }}"
                                                        alt="Blog Thumbnail">
                                                </div>

                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a href="{{ route('post', ['post' => $post]) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                @if (!$post->published_at)
                                                    class="w-full px-20 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-300 text-red-800">
                                                    Draft
                                                @elseif ($post->published_at > Illuminate\Support\Carbon::now())
                                                    class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Sceduled {{ $post->published_at->format('M d Y H:i') }}
                                                @elseif ($post->published_at < Illuminate\Support\Carbon::now())
                                                    class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Published {{ $post->published_at->format('M d Y H:i')  }}
                                                @endif
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                            <a href="/admin/posts/{{ $post->id }}/edit"
                                                class="text-blue-500 hover:text-iblue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="/admin/posts/{{ $post->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-400 hover:text-red-600">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </x-sidebar>
</x-layout>
