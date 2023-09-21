<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center"> Register Form</h3>
                <div class="card p-4 my-3 shadow-sm">
                    <form
                        enctype="multipart/form-data"
                        method="POST"
                        action=""
                    >
                        @csrf
                        <div class="form-group my-3">
                            <label for="exampleInputEmail1">Name</label>
                            <input
                                required
                                type="text"
                                name="name"
                                class="form-control"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                placeholder="Enter Your Name"
                                value="{{ old("name") }}"
                            >
                            <x-error name="name" />

                        </div>

                        <div class="form-group my-3">
                            <label for="exampleInputEmail1">User Name</label>
                            <input
                                required
                                type="text"
                                name="username"class="form-control"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                placeholder="Enter Username"
                                value="{{ old("username") }}"
                            >
                            <x-error name="username" />
                        </div>
                        <div class="form-group my-3">
                            <label for="exampleInputEmail1">Email address</label>
                            <input
                                type="email"
                                name="email"class="form-control"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                placeholder="Enter email"
                                value="{{ old("email") }}"
                            >
                            <x-error name="email" />
                        </div>
                        <div class="form-group my-3">
                            <label for="exampleInputPassword1">Password</label>
                            <input
                                required
                                type="password"
                                name="password"class="form-control"
                                id="exampleInputPassword1"
                                placeholder="Password"
                            >
                            <x-error name="password" />
                        </div>
                        <div class="form-group my-3">
                            <label for="exampleInputPassword1">Avator</label>
                            <input
                                required
                                type="file"
                                name="avator"
                                class="form-control"
                                id="avator"
                                placeholder="Avator"
                            >
                            <x-error name="avator" />
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
