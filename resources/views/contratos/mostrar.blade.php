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
        <h1>Contratos</h1>
        <div class="modal-footer">
            <button style="width:100%" class="btn btn-success mx-4" type="submit" id="eliminarArticulo" data-bs-toggle="modal"
                data-bs-target="#abcd">Crear</button>
        </div>
    </div>

    <!-- Modal crear -->
    <div class="modal fade" id="abcd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="row g-3" method="post" action="{{ route('guardar.contrato') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Contrato.</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body px-4 py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Entidad *</label>
                                    <select class="form-select" id="entidad_id" required name="entidad_id">
                                        <option selected disabled value="">Seleccione una entidad</option>
                                        @foreach ($entidades as $entidad)
                                            <option value="{{ $entidad->id }}">
                                                {{ $entidad->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Asignado a *</label>
                                    <select class="form-select" id="user_id" required name="user_id">
                                        <option selected disabled value="">Usuario</option>
                                        @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario->id }}">
                                                {{ $usuario->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">No. Contrato *</label>
                                    <input type="text" class="form-control" id="numeroContrato"
                                        placeholder="No. Contrato" required name="numeroContrato">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Descripcion </label>
                                    <textarea type="" class="form-control" id="descripcion" placeholder="Escribe una descripcion..." required
                                        name="descripcion"></textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Firmado *</label>
                                    <input type="date" class="form-control" id="fechaInicio" placeholder="AAAA/MM/YYYY"
                                        required name="fechaInicio">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Vence *</label>
                                    <input type="date" class="form-control" id="fechaFin" placeholder="AAAA/MM/YYYY"
                                        required name="fechaFin">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Monto *</label>
                                    <input type="number" class="form-control form-icon-trailing" id="monto"
                                        placeholder="Monto" required name="monto">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Estado *</label>
                                    <input type="text" class="form-control form-icon-trailing" id="estado"
                                        placeholder="Estado" required name="estado">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer px-4 py-3">
                        <button style="width:100%" class="btn btn-success" type="submit" id="">Crear</button>
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
                        <th>No. Contrato</th>
                        <th>Entidad</th>
                        <th>Vence </th>
                        <th>Monto</th>
                        <th>Asignado a</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="the_table_body">
                    @foreach ($contratos as $contrato)
                        <tr>
                            <td>{{ $contrato->numeroContrato }}</td>
                            <td>{{ $contrato->entidad ? $contrato->entidad->nombre : 'N/A' }}</td>
                            <td>{{ $contrato->fechaFin }}</td>
                            <td>{{ $contrato->monto }}</td>
                            <td>{{ $contrato->usuario->id /* ? $contrato->usuario->rol : 'N/A' */ }}</td>
                            {{--  <td>{{ $entidad->moneda }}</td>
                            <td>{{ $entidad->codigoReeup }}</td>
                            <td>{{ $entidad->codigoNit }}</td>
                            <td>{{ $entidad->titular }}</td> --}}
                            {{-- <td>{{ $entidad->created_at }}</td> --}}
                            <td><button style="width: 100%" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#show{{ $contrato->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </button></td>
                            <td><button style="width: 100%" type="button" class="btn btn-warning"
                                    data-bs-toggle="modal" data-bs-target="#efg{{ $contrato->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button></td>
                            <td><button style="width: 100%" type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#abcd{{ $contrato->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </button></td>
                        </tr>

                        <!-- Modal Eliminar -->
                        <div class="modal fade" id="abcd{{ $contrato->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Contrato.</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <h5>Está seguro que quiere eliminar el contrato
                                                <strong>{{ $contrato->numeroContrato }}</strong> ?
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button style="width:100%" class="btn btn-danger" type="submit"
                                            id="eliminarArticulo"
                                            onclick="eliminarContrato({{ $contrato->id }})">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal show -->
                        <div class="modal fade" id="show{{ $contrato->id }}" tabindex="-1"
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
                                                    <h3>Descripción: {{ $contrato->descripcion }}</h3>
                                                </li>
                                                <li class="list-group-item">
                                                    <h3>No. Contrato: {{ $contrato->numeroContrato }}</h3>
                                                </li>
                                                <li class="list-group-item">
                                                    <h3>Firmado: {{ $contrato->fechaInicio }}</h3>
                                                </li>
                                                <li class="list-group-item">
                                                    <h3>Vence: {{ $contrato->fechaFin }}</h3>
                                                </li>
                                                <li class="list-group-item">
                                                    <h3>Monto: {{ $contrato->monto }}</h3>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal editar -->
                        <div class="modal fade" id="efg{{ $contrato->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <form class="row g-3" method="POST"
                                    action="{{ route('update.contrato', $contrato->id) }}">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Contrato.</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body px-4 py-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Entidad
                                                            *</label>
                                                        <select class="form-select" id="entidad_id" required
                                                            name="entidad_id">
                                                            @foreach ($entidades as $entidad)
                                                                <option value="{{ $entidad->id }}">
                                                                    {{ $entidad->nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Asignado
                                                            a *</label>
                                                        <select class="form-select" id="user_id" required
                                                            name="user_id">
                                                            @foreach ($usuarios as $usuario)
                                                                <option value="{{ $usuario->id }}">
                                                                    {{ $usuario->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">No.
                                                            Contrato
                                                            *</label>
                                                        <input type="text" class="form-control" id="numeroContrato"
                                                            placeholder="No.Contrato" required name="numeroContrato"
                                                            value="{{ $contrato->numeroContrato }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Firmado
                                                            *</label>
                                                        <input type="date" class="form-control" id="fechaInicio"
                                                            placeholder="" required name="fechaInicio"
                                                            value="{{ $contrato->fechaInicio }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Vence
                                                            *</label>
                                                        <input type="date" class="form-control" id="fechaFin"
                                                            placeholder="" required name="fechaFin"
                                                            value="{{ $contrato->fechaFin }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Monto
                                                            *</label>
                                                        <input type="number" class="form-control form-icon-trailing"
                                                            id="monto" placeholder="" required name="monto"
                                                            value="{{ $contrato->monto }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Descripcion *</label>
                                                        <textarea type="" class="form-control" id="descripcion" placeholder="Escribe una descripcion..." required
                                                            name="descripcion">{{ $contrato->descripcion }}</textarea>
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
        function eliminarContrato(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/eliminarContrato/' + id,
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

    {{-- Validar telef 
    <script>
        let input = document.querySelector('#inputCrear');
        input.addEventListener('input', function() {
            let valor = this.value;
            let regex = /^\d{0,7}$/;
            if (!regex.test(valor)) {
                this.value = valor.slice(0, -1);
            }
        });
    </script> --}}
@endsection
