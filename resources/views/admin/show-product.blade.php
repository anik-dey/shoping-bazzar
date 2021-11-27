@extends('admin_layout.app')
@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Template Main CSS & JS File -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js">
    </script>
    <script>
        jQuery(document).ready(function($) {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ],
            });

        });
    </script>

    </head>

    <body>
        <div class="container p-5">
            <table id="example" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr align="center">
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Category Name</th>
                        <th>View Details</th>

                    </tr>
                </thead>
                <tbody>
                    @if (isset($products))
                        @foreach ($products as $item)
                            <tr align="center">
                                <td>{{ $item->product_code }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->product_des }}</td>
                                <td>{{ $item->product_quantity }}</td>
                                <td>{{ $item->product_price }}</td>
                                <td><a
                                        href="{{ URL::to('/product-status/' . $item->product_id) }}">{{ $item->product_status }}</a>
                                </td>
                                <td>{{ $item->category->name }}</td>
                                <td><a href="" <button type="button"><i class="fa fa-edit"></i></button></td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
                <tfoot>
                    <tr align="center">
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Category Name</th>
                        <th>View Details</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </body>
@endsection
