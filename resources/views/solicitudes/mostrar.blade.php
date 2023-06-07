
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
        <h1>Solicitudes</h1>
        <div class="modal-footer">
            <button style="width:100%" class="btn btn-success mx-4" type="submit" id="eliminarArticulo" data-bs-toggle="modal"
                data-bs-target="#abcd">Crear</button>
        </div>
    </div>

    <!-- Modal crear -->
    <div class="modal fade" id="abcd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="row g-3" method="post" action="{{ route('guardar.solicitud') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Solicitud.</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body px-4 py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tipo Solicitud *</label>
                                    <select class="form-select" id="tipoSolicitud_id" required name="tipoSolicitud_id">
                                        <option selected disabled value="">Seleccione tipo</option>
                                        @foreach ($tipoSolitudes as $tipoSolicitud)
                                            <option value="{{ $tipoSolicitud->id }}">
                                                {{ $tipoSolicitud->nombre }}
                                            </option>  
                                        @endforeach
                                    </select>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">No. Expediente *</label>
                                    <input type="text" class="form-control" id="numeroExpediente" placeholder="Numero de Expediente" required
                                        name="numeroExpediente">
                                </div>    

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Fecha de inicio </label>
                                    <input type="date" class="form-control" id="fechaInicio" placeholder="AA/MM/YYYY" name="fechaInicio 
                                    name="fechaInicio">
                                </div>      
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Fecha Fin </label>
                                        <input type="date" class="form-control" id="fechaFin" placeholder="AA/MM/YYYY" 
                                            name="fechaFin">
                                    </div>
                                    <div class="mb-3">
                                    <label for="exampleFormControlTextarea1">Descripcion</label>
                                    <textarea class="form-control" id="descripcion" placeholder="Escribe una descripcion" 
                                            name="descripcion"></textarea>
                                    </div>                                     
                                    <label for="exampleFormControlInput1" class="form-label">Contrato *</label>
                                    <select class="form-select" id="contrato_id" required name="contrato_id">
                                        <option selected disabled value="">Seleccione ...</option>
                                         @foreach ($contratos as $contrato)
                                            <option value="{{ $contrato->id }}">
                                                {{ $contrato->nombre }}
                                            </option>  
                                        @endforeach
                                    </select>
                                 </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nombre del Producto *</label>
                                    <input type="text" class="form-control" id="nombreProducto"
                                        placeholder="Producto" required name="nombreProducto">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Version *</label>
                                    <input type="number" class="form-control" id="versionProducto" placeholder="v.1.0.0"
                                        required name="versionProducto">
                                </div>

                                <!-- <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Correo *</label>
                                    <input type="email" class="form-control" id="inputCrear" placeholder="correo"
                                        required name="correo">
                                </div> -->


                                <!--  Falta estado -->



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
                        <th>No. Expediente</th>
                        <th>Tipo de Solicitud</th>
                        <th>Pertenece al Contrato</th>
                        <th>Estado</th>
                        <th>Producto</th>
                        <th>Version</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="the_table_body">
                    @foreach ($solicitudes as $solicitud)
                        <tr>
                            <td>{{ $solicitud->numeroExpediente }}</td>
                            <td>{{ $solicitud->tipoSolicitud->nombre}}</td>
                            <td>{{ $solicitud->contrato->numeroContrato }}</td>
                            <td>{{ $solicitud->estado }}</td> 
                            <td>{{ $solicitud->nombreProducto }}</td>
                            <td>{{ $solicitud->versionProducto }}</td>

                            <td><button style="width: 100%" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#show{{ $solicitud->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </button></td>
                            <td><button style="width: 100%" type="button" class="btn btn-warning"
                                    data-bs-toggle="modal" data-bs-target="#efg{{ $solicitud->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button></td>
                            <td><button style="width: 100%" type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#abcd{{ $solicitud->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </button></td>
                        </tr>

                        <!-- Modal Eliminar -->
                        <div class="modal fade" id="abcd{{ $solicitud->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Solicitud.</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <h5>Está seguro que quieres eliminar la Solicitud? </h5>
                                                <strong>{{ $solicitud->numeroExpediente }}</strong> ?
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button style="width:100%" class="btn btn-danger" type="submit"
                                            id="eliminarArticulo"
                                            onclick="eliminarSolicitud({{ $solicitud->id }})">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal show -->
                        <div class="modal fade" id="show{{ $solicitud->id }}" tabindex="-1"
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
                                                    <h3>Pertenece al contrato: {{ $solicitud->contrato->numeroContrato }}</h3>
                                                </li>
                                                <li class="list-group-item">
                                                    <h3>Nombre del producto: {{ $solicitud->nombreProducto }}</h3>
                                                </li>
                                                <li class="list-group-item">
                                                    <h3>Fecha de inicio: {{ $solicitud->fechaInicio }}</h3>
                                                </li>
                                                <!-- <li class="list-group-item">
                                                    <h3>Telefono: {{ $coordinador->telefono }}</h3>
                                                </li>
                                                <li class="list-group-item">
                                                    <h3>Correo: {{ $coordinador->correo }}</h3>
                                                </li>  -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal editar -->
                        <div class="modal fade" id="efg{{ $solicitud->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <form class="row g-3" method="POST"
                                    action="{{ route('update.solicitud', $solicitud->id) }}">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Solicitud.</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body px-4 py-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Tipo Solicitud *</label>
                                                        <select class="form-select" id="tipoSolicitud_id" required name="tipoSolicitud_id">
                                                        <!-- <option selected disabled value="{{$tipoSolitudes->id}}">{{$tipoSolitudes->nombre}}</option> -->
                                                         @foreach ($tipoSolitudes as $tipoSolicitud)
                                                            <option value="{{ $tipoSolicitud->id }}">
                                                                {{ $tipoSolicitud->nombre }}
                                                            </option>  
                                                        @endforeach
                                                        </select>
                                                    </div>
                            
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">No. Expediente *</label>
                                                        <input type="text" class="form-control" id="numeroExpediente" placeholder="Numero de Expediente" required
                                                         name="numeroExpediente" value="{{ $solicitud->numeroExpediente}}">
                                                    </div>    

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Fecha de inicio </label>
                                                        <input type="date" class="form-control" id="fechaInicio" placeholder="{{date()}}" 
                                                        name="fechaInicio" value="fechaInicio" >
                                                    </div>      
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Fecha Fin </label>
                                                        <input type="date" class="form-control" id="fechaFin" placeholder="{{date()}}" 
                                                        name="fechaFin" value="fechaFin">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1">Descripcion</label>
                                                        <textarea class="form-control" id="descripcion" placeholder="Escribe una descripcion" 
                                                        name="descripcion" value="descripcion"></textarea>
                                                    </div>   

                                                    <div class="mb-3">                                 
                                                        <label for="exampleFormControlInput1" class="form-label">Contrato *</label>
                                                        <select class="form-select" id="contrato_id" required name="contrato_id">
                                                        
                                                            @foreach ($contratos as $contrato)
                                                                <option value="{{ $contrato->id }}">
                                                                {{ $contrato->nombre }}
                                                                </option>  
                                                            @endforeach
                                                        </select>
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nombre del Producto *</label>
                                                        <input type="text" class="form-control" id="nombreProducto"
                                                            placeholder="Producto" required name="nombreProducto" value = "$solicitud->nombreProducto" >
                                                    </div>
                            
                                
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Version *</label>
                                                        <input type="number" class="form-control" id="versionProducto" placeholder="v.1.0.0"
                                                            required name="versionProducto" value = "$solicitud->versionProducto">
                                                    </div> 
                                                    <!-- <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Correo *</label>
                                                        <input type="email" class="form-control" id="inputCrear" placeholder="correo" required name="correo">
                                                    </div> --><!--  Falta estado -->
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
        function eliminarSolicitud(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/eliminarSolicitud/' + id,
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
    <!-- <script>
        let input = document.querySelector('#inputCrear');
        input.addEventListener('input', function() {
            let valor = this.value;
            let regex = /^\d{0,7}$/;
            if (!regex.test(valor)) {
                this.value = valor.slice(0, -1);
            }
        });
    </script> -->
@endsection
