@props(["user"])
<x-admin-layout>
    <h3 class="my-3 text-center">Edit User Info</h3>

    <x-card-wrapper>
        <form
            enctype="multipart/form-data"
            action="/admin/users/{{ $user->username }}/update"
            method="POST"
        >
            @method("patch")
            @csrf
            <x-form.input
                name="name"
                value="{{ $user->name }}"
            />
            <x-form.input
                name="username"
                value="{{ $user->username }}"
            />
            <x-form.input
                name="email"
                value="{{ $user->email }}"
            />

            <x-form.input
                name="avator"
                type="file"
            />
            <img
                src=" /storage/{{ $user->avator }}"
                alt=""
                width="200px"
                height="200px"
            >
            <div class="d-flex justify-content-start mt-3">
                <button
                    type="submit"
                    class="btn btn-primary form-submit"
                >Submit</button>
            </div>
        </form>
    </x-card-wrapper>

</x-admin-layout>
