@extends('layouts.mainCliente')

@section('content')
    @if (session('status'))
        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
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

    <div class="d-flex justify-content-between">
        <h1>Entidades</h1>
        <div class="modal-footer">
            <button style="width:100%" class="btn btn-success mx-4" type="submit" id="eliminarArticulo" data-bs-toggle="modal"
                data-bs-target="#abcd">Crear</button>
        </div>
    </div>

    <!-- Modal crear -->
    <div class="modal fade" id="abcd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="row g-3" method="post" action="{{ route('guardar.entidad') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Entidad.</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body px-4 py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tipo entidad *</label>
                                    <select class="form-select" id="tipoEntidad_id" required name="tipoEntidad_id">
                                        <option selected disabled value="">Seleccione tipo</option>
                                        @foreach ($tipo_entidades as $tipo_entidad)
                                            <option value="{{ $tipo_entidad->id }}">
                                                {{ $tipo_entidad->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">nombre *</label>
                                    <input type="text" class="form-control" id="nombre" placeholder="nombre" required
                                        name="nombre">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">nombreRepresentante *</label>
                                    <input type="text" class="form-control" id="nombreRepresentante"
                                        placeholder="nombreRepresentante" required name="nombreRepresentante">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">apellidosRepresentante
                                        *</label>
                                    <input type="text" class="form-control" id="apellidosRepresentante"
                                        placeholder="apellidosRepresentante" required name="apellidosRepresentante">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">telefono *</label>
                                    <input type="number" class="form-control" id="inputCrear" placeholder="telefono"
                                        required name="telefono">
                                </div>

                                <div class="">
                                    <label for="exampleFormControlInput1" class="form-label">titular *</label>
                                    <input type="text" class="form-control" id="titular" placeholder="titular" required
                                        name="titular">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">direccion *</label>
                                    <input type="text" class="form-control" id="direccion" placeholder="direccion"
                                        required name="direccion">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">cuenta *</label>
                                    <input type="text" class="form-control" id="cuenta" placeholder="cuenta" required
                                        name="cuenta">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">moneda
                                        *</label>
                                    <input type="text" class="form-control" id="moneda" placeholder="moneda" required
                                        name="moneda">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">codigoReeup *</label>
                                    <input type="text" class="form-control" id="codigoReeup"
                                        placeholder="codigoReeup" required name="codigoReeup">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">codigoNit *</label>
                                    <input type="text" class="form-control" id="codigoNit" placeholder="codigoNit"
                                        required name="codigoNit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer px-4 py-3">
                        <button style="width:100%" class="btn btn-success" type="submit"
                            id="eliminarArticulo">Crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
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
                        <th>tipoEntidad_id</th>
                        <th>nombre</th>
                        {{-- <th>nombreRepresentante</th>
                        <th>apellidosRepresentante</th> --}}
                        <th>telefono</th>
                        <th>direccion</th>
                        <th>cuenta</th>
                        <th>moneda</th>
                        <th>codigoReeup</th>
                        <th>codigoNit</th>
                        <th>titular</th>
                        {{-- <th>fecha</th> --}}
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="the_table_body">
                    @foreach ($entidades as $entidad)
                        <tr>
                            <td>{{ $entidad->tipoEntidad->nombre }}</td>
                            <td>{{ $entidad->nombre }}</td>
                            {{--  <td>{{ $entidad->nombreRepresentante }}</td>
                            <td>{{ $entidad->apellidosRepresentante }}</td> --}}
                            <td>{{ $entidad->telefono }}</td>
                            <td>{{ $entidad->direccion }}</td>
                            <td>{{ $entidad->cuenta }}</td>
                            <td>{{ $entidad->moneda }}</td>
                            <td>{{ $entidad->codigoReeup }}</td>
                            <td>{{ $entidad->codigoNit }}</td>
                            <td>{{ $entidad->titular }}</td>
                            {{-- <td>{{ $entidad->created_at }}</td> --}}
                            <td><button style="width: 100%" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#show{{ $entidad->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </button></td>
                            <td><button style="width: 100%" type="button" class="btn btn-warning"
                                    data-bs-toggle="modal" data-bs-target="#efg{{ $entidad->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button></td>
                            <td><button style="width: 100%" type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#abcd{{ $entidad->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </button></td>
                        </tr>

                        <!-- Modal Eliminar -->
                        <div class="modal fade" id="abcd{{ $entidad->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Entidad.</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <h5>Está seguro que quiere aliminar la Entidad
                                                <strong>{{ $entidad->nombre }}</strong> ?
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button style="width:100%" class="btn btn-danger" type="submit"
                                            id="eliminarArticulo"
                                            onclick="eliminarEntidad({{ $entidad->id }})">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal show -->
                        <div class="modal fade" id="show{{ $entidad->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles.</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-4 py-3">
                                        <div class="row">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <h3>nombreRepresentante: {{ $entidad->nombreRepresentante }}</h3>
                                                </li>
                                                <li class="list-group-item">
                                                    <h3>apellidosRepresentante: {{ $entidad->apellidosRepresentante }}</h3>
                                                </li>
                                                <li class="list-group-item">
                                                    <h3>fecha: {{ $entidad->created_at }}</h3>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal editar -->
                        <div class="modal fade" id="efg{{ $entidad->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <form class="row g-3" method="POST"
                                    action="{{ route('update.entidad', $entidad->id) }}">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Entidad.</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body px-4 py-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Tipo
                                                            entidad *</label>
                                                        <select class="form-select" id="tipoEntidad_id" required
                                                            name="tipoEntidad_id">
                                                            @foreach ($tipo_entidades as $tipo_entidad)
                                                                <option value="{{ $tipo_entidad->id }}">
                                                                    {{ $tipo_entidad->nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">nombre
                                                            *</label>
                                                        <input type="text" class="form-control" id="nombre"
                                                            placeholder="nombre" required name="nombre"
                                                            value="{{ $entidad->nombre }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">nombreRepresentante *</label>
                                                        <input type="text" class="form-control"
                                                            id="nombreRepresentante" placeholder="nombreRepresentante"
                                                            required name="nombreRepresentante"
                                                            value="{{ $entidad->nombreRepresentante }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">apellidosRepresentante
                                                            *</label>
                                                        <input type="text" class="form-control"
                                                            id="apellidosRepresentante"
                                                            placeholder="apellidosRepresentante" required
                                                            name="apellidosRepresentante"
                                                            value="{{ $entidad->apellidosRepresentante }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">telefono
                                                            *</label>
                                                        <input type="number" class="form-control" id="inputCrear"
                                                            placeholder="telefono" required name="telefono"
                                                            value="{{ $entidad->telefono }}">
                                                    </div>

                                                    <div class="">
                                                        <label for="exampleFormControlInput1" class="form-label">titular
                                                            *</label>
                                                        <input type="text" class="form-control" id="titular"
                                                            placeholder="titular" required name="titular"
                                                            value="{{ $entidad->titular }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">direccion
                                                            *</label>
                                                        <input type="text" class="form-control" id="direccion"
                                                            placeholder="direccion" required name="direccion"
                                                            value="{{ $entidad->direccion }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">cuenta
                                                            *</label>
                                                        <input type="text" class="form-control" id="cuenta"
                                                            placeholder="cuenta" required name="cuenta"
                                                            value="{{ $entidad->cuenta }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">moneda
                                                            *</label>
                                                        <input type="text" class="form-control" id="moneda"
                                                            placeholder="moneda" required name="moneda"
                                                            value="{{ $entidad->moneda }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">codigoReeup *</label>
                                                        <input type="text" class="form-control" id="codigoReeup"
                                                            placeholder="codigoReeup" required name="codigoReeup"
                                                            value="{{ $entidad->codigoReeup }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">codigoNit
                                                            *</label>
                                                        <input type="text" class="form-control" id="codigoNit"
                                                            placeholder="codigoNit" required name="codigoNit"
                                                            value="{{ $entidad->codigoNit }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer px-4 py-3">
                                            <button style="width:100%" class="btn btn-warning" type="submit"
                                                id="eliminarArticulo">Editar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{-- ajax eliminar --}}
    <script>
        function eliminarEntidad(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/eliminarEntidad/' + id,
                type: 'POST',
                success: function(result) {
                    location.reload();
                }
            })
        };
    </script>

    <script type="text/javascript">
        function search() {
            var num_cols, display, input, filter, table_body, tr, td, i, txtValue;
            num_cols = 10;
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

    {{-- Validar telef --}}
    <script>
        let input = document.querySelector('#inputCrear');
        input.addEventListener('input', function() {
            let valor = this.value;
            let regex = /^\d{0,7}$/;
            if (!regex.test(valor)) {
                this.value = valor.slice(0, -1);
            }
        });
    </script>
@endsection
