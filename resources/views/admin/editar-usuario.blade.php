@extends('layouts.mainAdmin')

@section('reporte')
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

    <div class="row justify-content-center mt-5">
        <div class="container">
            <div class="col-md-12 my-3 mb-4">
                <form class="d-flex justify-content-end">
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" id="q"
                        onkeyup="search()" style="width: 250px">
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
                                @if ($usuario->rol == 1)
                                    <td>Usuario</td>
                                @elseif ($usuario->rol == 2)
                                    <td>Jefe</td>
                                @elseif ($usuario->rol == 3)
                                    <td>Técnico</td>
                                @endif
                                <td>{{ $usuario->email }}</td>
                                <td class="d-flex">
                                    <button style="width: 100%" type="button" class="btn btn-link" data-bs-toggle="modal"
                                        data-bs-target="#efg{{ $usuario->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>
                                    <button style="width: 100%" type="button" class="btn btn-link" data-bs-toggle="modal"
                                        st data-bs-target="#abcd{{ $usuario->id }}">
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

                            <!-- Modal editar -->
                            <div class="modal fade" id="efg{{ $usuario->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar rol.</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form class="" id="editarRol{{ $usuario->id }}" method="POST"
                                            action="{{ route('editar-rol', $usuario->id) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Rol</label>
                                                    <select class="form-select" id="validationDefault04" required
                                                        name="rol">
                                                        @if ($usuario->rol == 1)
                                                            <option selected disabled>
                                                                Usuario
                                                            </option>
                                                            <option value="2">
                                                                Jefe
                                                            </option>
                                                            <option value="3">
                                                                Técnico
                                                            </option>
                                                        @elseif ($usuario->rol == 2)
                                                            <option selected disabled>
                                                                Jefe
                                                            </option>
                                                            <option value="1">
                                                                Usuario
                                                            </option>
                                                            <option value="3">
                                                                Técnico
                                                            </option>
                                                        @elseif ($usuario->rol == 3)
                                                            <option selected disabled>
                                                                Técnico
                                                            </option>
                                                            <option value="2">
                                                                Jefe
                                                            </option>
                                                            <option value="1">
                                                                Usuario
                                                            </option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id='myajax' style="width: 100%"
                                                    class="btn btn-primary">Cambiar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Eliminar -->
                            <div class="modal fade" id="abcd{{ $usuario->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar usuario.</h1>
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

    <script type="text/javascript">
        function search() {
            var num_cols, display, input, filter, table_body, tr, td, i, txtValue;
            num_cols = 5;
            input = document.getElementById("q");
            filter = input.value.toUpperCase();
            table_body = document.getElementById("the_table_body");
            tr = table_body.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                display = "none";
                for (j = 0; j < num_cols; j++) {
                    td = tr[i].getElementsByTagName("td")[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            display = "";
                        }
                    }
                }
                tr[i].style.display = display;
            }
        }
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
