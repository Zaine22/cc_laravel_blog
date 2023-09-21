<x-admin-layout>
    <h3 class="text-center">Blogs</h3>
    <x-card-wrapper>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Avatar</th>
                    <th
                        scope="col"
                        colspan="2"
                    >Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td> <img
                                src="/storage/{{ $user->avator }}"
                                width="60"
                                height="60"
                                alt=""
                            ></td>

                        <td><a
                                href="/admin/users/{{ $user->username }}/edit"
                                class="btn btn-warning"
                            >Edit</a></td>
                        <td>
                            <form
                                action="/admin/users/{{ $user->username }}/delete"
                                method="POST"
                            >
                                @csrf
                                @method("DELETE")
                                <button
                                    type="submit"
                                    class="btn btn-danger"
                                >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </x-card-wrapper>
</x-admin-layout>
