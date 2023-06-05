@extends('layouts.mainCliente')

@section('content')
    <div class="d-flex justify-content-between">
        <h1>Entidades</h1>
        <div class="modal-footer">
            <button style="width:100%" class="btn btn-success" type="submit" id="eliminarArticulo" data-bs-toggle="modal"
                data-bs-target="#abcd">Crear</button>
        </div>
    </div>

    <!-- Modal Eliminar -->
    <div class="modal fade" id="abcd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Entidad.</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="row g-3" method="POST" action="{{ route('guardar.entidad') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tipo entidad *</label>
                            <select class="form-select" id="validationDefault04" required name="estado">
                                <option selected disabled value="">Seleccione tipo</option>
                                @foreach ($entidades as $entidad)
                                    <option value="{{ $entidad->tipoEntidad_id }}">
                                        {{ $entidad->tipoEntidades->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">tipoEntidad_id *</label>
                            <input type="text" class="form-control" id="tipoEntidad_id" placeholder="tipoEntidad_id"
                                required name="tipoEntidad_id">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Chapa *</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Chapa"
                                required name="chapa">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kilometraje *</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1"
                                placeholder="Kilometraje" required name="km">
                        </div>

                        <div class="">
                            <label for="exampleFormControlInput1" class="form-label">Chofer *</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Chofer"
                                required name="chofer">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button style="width:100%" class="btn btn-success" type="submit"
                            id="eliminarArticulo">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
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
                                <td>{{ $entidad->tipoEntidad_id }}</td>
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
                                <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ajax --}}
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
