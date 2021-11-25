@extends('admin_layout.app')
@section('content')
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Add Product</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form action="" class="tm-edit-product-form">
                                <div class="form-group mb-3">
                                    <label for="name">Product Name
                                    </label>
                                    <input id="name" name="name" type="text" class="form-control validate" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control validate" rows="3" required></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Product Quantity
                                    </label>
                                    <input id="name" name="name" type="text" class="form-control validate" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category">Category</label>
                                    <select class="custom-select tm-select-accounts" id="category">
                                        <option selected>Select category</option>
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <?php $dash = ''; ?>
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>


                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12  mb-4">
                            <div class="form-group mb-3">
                                <label for="name">Product Price
                                </label>
                                <input type="number" id="name" name="name" type="text" class="form-control validate"
                                    required />
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12  mb-4">
                            <div class="form-group mb-3">
                                <label for="name">
                                    <input type="file" id="name" name="name" type="text" class="form-control validate"
                                        required />
                                </label>

                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $("#expire_date").datepicker();
        });
    </script>
@endsection
