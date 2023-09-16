<x-layout>
    <x-setting heading="Edit: {{ $post->title }}">
        <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" />
            <x-form.input name="slug" :value="old('slug', $post->slug)" />

            <div class="flex mt-t">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                </div>
                <img class="max-h-40 max-w-40 my-4 ml-4 rounded-xl" src="{{ asset('storage/' . $post->thumbnail) }}"
                    alt="Blog Thumbnail">
            </div>


            <x-form.textarea name="exerpt" rows="5">{{ old('exerpt', $post->exerpt) }}</x-form.textarea>

            <x-form.textarea name="body" rows="10">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category_id" />

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category->id) == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />

            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>

    </x-setting>
</x-layout>
