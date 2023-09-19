<x-layout>
    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10">

            <x-panel>
                @php
                    $user = auth()->user();
                @endphp
                <h1 class="text-center font-bold text-xl">{{ $user->name }}'s Profile</h1>

                <form method="POST" action="/profile/{{ $user->username }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <x-form.input name="name" autocomplete="name" value="{{ $user->name }}" />
                    <x-form.input name="username" autocomplete="nickname" value="{{ $user->username }}" />
                    <x-form.input name="email" type="email" autocomplete="email" value="{{ $user->email }}" />
                    <div class="flex">

                        <x-form.input name="avatar" type="file" :value="old('avatar', $user->avatar ?? null)" />
                        <img class="max-h-20 max-w-20 my-4 mx-8 rounded-xl"
                            src="{{ asset('storage/' . ($user->avatar ?? 'avatar.svg')) }}"
                            alt="User Thumbnail">

                    </div>

                    <x-form.input name="old_password" type="password" autocomplete="password" />
                    <x-form.input name="new_password" type="password" autocomplete="password" />
                    <x-form.input name="retype_new_password" type="password" autocomplete="password" />

                    <x-form.button value="Update" />

                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
