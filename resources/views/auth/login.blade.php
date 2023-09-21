<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center my-2"> Login Form</h3>
                <div class="card p-4 my-3 shadow-sm">
                    <form
                        method="POST"
                        action=""
                    >
                        @csrf

                        <div class=" my-3">
                            <label for="exampleInputEmail1">Email address</label>
                            <input
                                required
                                type="email"
                                name="email"class="form-control"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                placeholder="Enter email"
                                value="{{ old("email") }}"
                            >
                            <x-error name="email" />
                        </div>
                        <div class=" my-3">
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
