@extends('landing-page.layout.main')


@section('login')
    <link rel="stylesheet" href="css/style-login.css">

    @include('landing-page.partials.navbar')

    <section>

        <form action="/login" method="post">
            @csrf
            <div class="section row justify-content-center">
                <div class= "col-md-4 pt-5">

                    <div class="form-floating">
                        {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
                        <h1 class="h3 mb-3 fw-normal">Masuk</h1>
                        <div class="form-floating mb-3w">
                            <input type="username" name="username"
                                class="form-control @error('username')
                                is-invalid
                            @enderror"
                                id="floatingInput" placeholder="username" id="username" required
                                value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password"
                                class="form-control @error('password')
                                is-invalid
                            @enderror"
                                id="password" placeholder="Password">
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        @if (session('loginError'))
                        <div class="alert alert-danger">
                            {{ session('loginError') }}
                        </div>
                    @endif


                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg" type="submit">Masuk</button>
                    </div>
                </div>
            </div>
        </form>

        <small class="d-block text-center mt-3">Belum punya akun? <a href="/daftar">Daftar</a></small>

    </section>

    @include('landing-page.partials.footer')
@endsection
