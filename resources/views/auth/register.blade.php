@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-5" style="background-color: white">

                    <div class="card-body">
                        <div class="login-wrap p-4">
                            <div class="icon d-flex align-items-center justify-content-center mb-4">
                                <img src="./images/calisoft.png" width="106px" alt="" srcset="">
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <input id="name" type="text"
                                        class="form-control mb-3 @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Usuario">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <input id="email" type="email"
                                        class="form-control mb-3 @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <input id="password" type="password"
                                        class="form-control mb-3 @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Contraseña">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" placeholder="Repetir Contraseña">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit"
                                        style="background-color: #ff6600 !important; border-color: #ff6600 !important;"
                                        class="form-control btn btn-primary rounded submit px-3">
                                        Registrarse
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
