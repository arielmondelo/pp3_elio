@extends('layouts.mainAdmin')

@section('content')
    @if (session('status'))
        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('status') }}");
        </script>
    @endif

    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card mt-4" style="width: auto">
                <h3 class="px-4 pt-4">Crear Usuario</h3>
                <div class="card-body">
                    <form class="row g-3" method="POST" id="crearUsuario" action="{{ route('guardar-usuario') }}">
                        @csrf
                        <div class="col-12">
                            <input type="text" style="display:none" class="form-control" id="rol" name="rol"
                                value="3">
                        </div>
                        <div class="col-12">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                                name="nombre" required value="{{ old('nombre') }}">
                            @error('nombre')
                                <div class="invalid-feedback">El nombre debe tener al menos 4 caracteres</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="Correo" class="form-label">Correo *</label>
                            <input type="email" class="form-control @error('correo') is-invalid @enderror" id="Correo"
                                name="correo" required value="{{ old('correo') }}">
                            @error('correo')
                                <div class="invalid-feedback">Este correo ya existe</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="nombre" class="form-label">Contraseña *</label>
                            <input type="password" class="form-control @error('pass') is-invalid @enderror" id="pass"
                                name="pass" required>
                            @error('pass')
                                <div class="invalid-feedback">La contraseña debe tener al menos 8 caracteres</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="nombre" class="form-label">Repetir contraseña *</label>
                            <input type="password" class="form-control" id="repetir-pass" name="repetir-pass" required>
                        </div>
                        <div class="col-12 mb-2">
                            <span id="mensaje-error" class="error">Las contraseñas no coinciden</span>
                        </div>
                        <div class="col-12 mb-2">
                            <button style="width: 100%;" class="btn btn-success" type="submit">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-md-12 my-3 mb-4">
                    <form class="d-flex justify-content-end">
                        <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar"
                            id="q" onkeyup="search()" style="width: 250px">
                    </form>
                </div>
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Fecha Creación</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Correo</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="the_table_body">
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td scope="row">{{ $usuario->created_at }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>Gestor</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td class="d-flex">
                                        <button style="width: 100%" type="button" class="btn btn-link"
                                            data-bs-toggle="modal" st data-bs-target="#abcd{{ $usuario->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                style="color:red !important" fill="currentColor" class="bi bi-x-circle"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Eliminar -->
                                <div class="modal fade" id="abcd{{ $usuario->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar usuario.
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <h5>Está seguro que desea eliminar usuario usuario:
                                                        <strong>{{ $usuario->email }}</strong> ?
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button style="width:100%" class="btn btn-danger" type="submit"
                                                    id="eliminarArticulo"
                                                    onclick="eliminarUsuario({{ $usuario->id }})">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        .error {
            display: none;
            color: red;
        }
    </style>

    <script>
        var form = document.getElementById('crearUsuario');
        var mensajeError = document.getElementById('mensaje-error');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var pass1 = document.getElementById('pass').value;
            var pass2 = document.getElementById('repetir-pass').value;

            if (pass1 === pass2) {
                form.submit();
            } else {
                mensajeError.style.display = 'block'; // Muestra el mensaje de error
                setTimeout(function() {
                    mensajeError.style.display = 'none';
                }, 6000);
            }
        });
    </script>

    {{-- ajax eliminar --}}
    <script>
        function eliminarUsuario(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'eliminar/' + id,
                type: 'POST',
                success: function(result) {
                    location.reload();
                    if (response.success) {
                        toastr.success('Usuario eliminado');
                    } else {
                        toastr.error(response.message);
                    }
                }
            })
        };
    </script>
@endsection
