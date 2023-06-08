@extends('layouts.mainAdmin')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-12 my-3 mb-4 d-flex justify-content-between">
            <form class="d-flex justify-content-end">
                <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" id="q"
                    onkeyup="search()" style="width: 250px">
            </form>
        </div>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Email destino</th>
                        <th scope="col">Usuario destino</th>
                        <th scope="col">Hecho por</th>
                    </tr>
                </thead>
                <tbody id="the_table_body">
                    @foreach ($trazas as $traza)
                        <tr>
                            <td scope="row">{{ $traza->created_at }}</td>
                            <td>{{ $traza->tipoTraza }}</td>
                            <td>{{ $traza->emailDest }}</td>
                            <td>{{ $traza->usuarioDest }}</td>
                            <td>{{ $traza->usuarioCrea }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
@endsection
