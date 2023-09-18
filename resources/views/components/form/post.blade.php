@props(['post', 'method' => null])

<form action="/admin/posts/{{ $post->id ?? '' }}" method="post" enctype="multipart/form-data">
    @csrf
    @if ($method)
        @method($method)
    @endif

    <x-form.input name="title" :value="old('title', $post->title ?? '')" />
    <x-form.input name="slug" :value="old('slug', $post->slug ?? '')" />
    <x-form.field>
        <x-form.label name="user_id" />
        <select name="user_id" id="user_id" active='request()->is("$categories/{$category->slug}")'>
            @foreach (App\Models\User::all() as $user)
                <option value="{{ $user->id }}" {{ $user->id == ($post->author->id ?? null) ? 'selected' : '' }}>
                    {{ $user->name }}</option>
            @endforeach
        </select>
    </x-form.field>

    <div class="flex mt-t">
        <div class="flex-1">
            <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail ?? null)" />
            <x-date-label heading="Created: ">{{ $post?->created_at->format('M d Y H:i') }}</x-date-label>
            <x-date-label heading="Last Edit: ">{{ $post?->updated_at->format('M d Y H:i') }}</x-date-label>
            <div class="flex">
                <x-date-label heading="Published: " />

                <input type="date" name="published_at"
                    value="{{ $post?->published_at?->format('Y-m-d') ?? now()->format('Y-m-d') }}" />
            </div>
        </div>
        <img class="max-h-40 max-w-40 my-4 ml-4 rounded-xl" src="{{ asset('storage/' . ($post->thumbnail ?? 'thumbnails/illustration-1.png')) }}"
            alt="Blog Thumbnail">
    </div>


    <x-form.textarea name="exerpt" rows="5">{{ old('exerpt', $post?->exerpt) }}</x-form.textarea>

    <x-form.textarea name="body" rows="10">{{ old('body', $post?->body) }}</x-form.textarea>

    <x-form.field>
        <x-form.label name="category_id" />

        <select name="category_id" id="category_id" required>
            @foreach (\App\Models\Category::all() as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $post?->category->id) == $category->id ? 'selected' : '' }}>
                    {{ ucwords($category->name) }}</option>
            @endforeach
        </select>

        <x-form.error name="category" />

    </x-form.field>

    <div class="inline-flex space-x-8 placepconten-center">
        <x-form.button name="button" value="Publish" />
        <x-form.button name="button" value="Save Draft" />
        <x-form.button name="button" value="Schedule" />
    </div>
</form>
