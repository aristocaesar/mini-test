<x-layouts auth={{true}}>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-12 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-12">
                                <div class="p-5">
                                    @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                    @endif

                                    @if(session()->has('loginError'))
                                    <div class="alert alert-danger">
                                        {{session('loginError')}}
                                    </div>
                                    @endif
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Masuk!</h1>
                                    </div>
                                    <form action="/admin" class="user" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username"
                                                title="username"
                                                name="username"
                                                placeholder="Masukkan Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Masukkan Password" name="password" title="password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</x-layouts>