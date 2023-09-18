<x-layout>
    <x-setting heading="Publish new post">

        <x-form.post :post="null"/>
        {{-- <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" />

            <x-form.input name="slug" />

            <x-form.input name="thumbnail" type="file" />

            <x-form.textarea name="exerpt" />

            <x-form.textarea name="body" />

            <x-form.field>
                <x-form.label name="category_id" />

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />

            </x-form.field>
            <div>
                <div class="flex space-x-8">
                    <x-form.button name="button" value="Publish" />
                    <x-form.button name="button" value="Save Draft" />
                    <x-form.button name="button" value="Schedule" />
                </div>


            </div>
        </form> --}}

    </x-setting>
</x-layout>
