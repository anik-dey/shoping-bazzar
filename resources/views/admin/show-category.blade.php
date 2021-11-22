@extends('admin_layout.app')
@section('content')
    <div class="card-body p-0">
        {{-- <div>
            <a href="" <button type="button" class="btn btn-block btn-info btn-lg">Info</button></a>
        </div> --}}
        <div class="box-header with-border" align="right">
            <a class="add-new" href="{{ Route('createCategory') }}">
                <button class="btn btn-primary btn-lg">Add New Category</button>
            </a>
        </div>
        <section class="content">
            <div class="container-fluid">
                <h2 class="text-center display-4">Search</h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-lg" placeholder="Type Category Name"
                                    id="myInput" onkeyup="myFunction()">
                                <div class="input-group-append">
                                    <button type="" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Category Name</th>
                    <th>Parent Category</th>
                    <th>Time</th>
                    <th style="width: 100px" align="center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($categories))
                    <?php $_SESSION['i'] = 0; ?>
                    @foreach ($categories as $item)
                        <?php $_SESSION['i'] = $_SESSION['i'] + 1; ?>
                        <tr>
                            <?php $dash = ''; ?>
                            <td>{{ $_SESSION['i'] }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if (isset($item->parent_id))
                                    {{ $item->parent->name }}
                                @else
                                    None
                                @endif
                            </td>
                            <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                            <td><a href="{{ URL::to('/category-delete/' . $item->id) }}" <button type="button"
                                    class="btn btn-block btn-danger btn-sm">Delete</button>
                                </a>
                                <a href="{{ URL::to('/category-edit/' . $item->id) }}" <button type="button"
                                    class="btn btn-block btn-primary btn-sm">Edit</button> </a>
                            </td>

                        </tr>
                    @endforeach
                    <?php unset($_SESSION['i']); ?>
                @endif
            </tbody>
        </table>
    </div>
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
