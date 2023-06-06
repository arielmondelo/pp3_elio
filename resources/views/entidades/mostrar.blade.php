@extends('layouts.mainCliente')

@section('content')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                        data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>

    <div class="d-flex justify-content-between">
        <h1>Entidades</h1>
        <div class="modal-footer">
            <button style="width:100%" class="btn btn-success mx-4" type="submit" id="eliminarArticulo"
                data-bs-toggle="modal" data-bs-target="#abcd">Crear</button>
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
                                    <input type="number" class="form-control" id="telefono" placeholder="telefono"
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
                                    <input type="text" class="form-control" id="moneda" placeholder="moneda"
                                        required name="moneda">
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
                        <th scope="col">tipoEntidad_id</th>
                        <th scope="col">nombre</th>
                        <th scope="col">nombreRepresentante</th>
                        <th scope="col">apellidosRepresentante</th>
                        <th scope="col">telefono</th>
                        <th scope="col">direccion</th>
                        <th scope="col">cuenta</th>
                        <th scope="col">moneda</th>
                        <th scope="col">codigoReeup</th>
                        <th scope="col">codigoNit</th>
                        <th scope="col">titular</th>
                        <th scope="col">fecha</th>
                        <th scope="col">-</th>
                    </tr>
                </thead>
                <tbody id="the_table_body">
                    @foreach ($entidades as $entidad)
                        <tr>
                            <td>{{ $entidad->tipoEntidad->nombre }}</td>
                            <td>{{ $entidad->nombre }}</td>
                            <td>{{ $entidad->nombreRepresentante }}</td>
                            <td>{{ $entidad->apellidosRepresentante }}</td>
                            <td>{{ $entidad->telefono }}</td>
                            <td>{{ $entidad->direccion }}</td>
                            <td>{{ $entidad->cuenta }}</td>
                            <td>{{ $entidad->moneda }}</td>
                            <td>{{ $entidad->codigoReeup }}</td>
                            <td>{{ $entidad->codigoNit }}</td>
                            <td>{{ $entidad->titular }}</td>
                            <td>{{ $entidad->created_at }}</td>
                            <td><button style="width: 100%" type="button" class="btn btn-warning"
                                    data-bs-toggle="modal" data-bs-target="#efg{{ $entidad->id }}"
                                     onclick="enviarID({{ $entidad->id }} )">
                                    Editar
                                </button></td>
                            <td><button style="width: 100%" type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#abcd{{ $entidad->id }}">
                                    eliminar
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

                        <!-- Modal editar -->
                        <div class="modal fade" id="efg{{ $entidad->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <form class="row g-3" method="POST" action="{{ route('update.entidad', $entidad) }}">
                                    @csrf
                                    @method('put')
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
                                                            <option selected disabled
                                                                value="{{ $entidad->tipoEntidad_id }}">
                                                                {{ $entidad->tipoEntidad->nombre }}
                                                            </option>
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
                                                        <input type="number" class="form-control" id="telefono"
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
@endsection
