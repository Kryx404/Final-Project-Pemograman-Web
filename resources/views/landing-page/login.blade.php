@extends('landing-page.layout.main')
@section('login')
    <link rel="stylesheet" href="css/style-login.css">

    @include('landing-page.partials.navbar')

    <section>

        <div class="section row justify-content-center">
            <div class= "col-md-4 pt-5">

                <div class="form-signin">
                    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
                    <h1 class="h3 mb-3 fw-normal">Masuk</h1>

                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg" type="submit">Masuk</button>
                    </form>
                </div>
            </div>
        </div>


    </section>

    @include('landing-page.partials.footer')
@endsection
