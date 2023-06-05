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

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    {{--  < input type="text" value="{{ old('email') }}"
                                        class="form-control rounded-left @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email" required autocomplete="email" autofocus>
                                         --}}

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Correo">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group mb-4">
                                    {{--              <input id="password" type="password"
                                        class="form-control rounded-left @error('password') is-invalid @enderror"
                                        id="pass"placeholder="Contraseña" required autocomplete="current-password"> --}}

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Contraseña">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                        style="background-color: #ff6600 !important; border-color: #ff6600 !important;"
                                        class="form-control btn btn-primary rounded submit px-3">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
