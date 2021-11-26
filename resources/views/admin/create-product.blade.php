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
                            <form action="" role="form" method="POST" class="tm-edit-product-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">Product Name
                                    </label>
                                    <input id="name" name="product_name" value="{{ old('product_name') }}" type="text"
                                        placeholder="Product Name" class="form-control validate" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control validate" rows="3" name="product_des"
                                        placeholder="Product Description" value="{{ old('product_des') }}"
                                        required></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Product Quantity
                                    </label>
                                    <input id="name" name="product_quantity" type="text" placeholder="Product Quantity"
                                        class="form-control validate" value="{{ old('product_quantity') }}" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category">Category</label>
                                    <select class="custom-select tm-select-accounts" id="category_id"
                                        value="{{ old('category_id') }}" name="category_id">
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
                                <input type="number" id="name" name="product_price" type="text"
                                    class="form-control validate" placeholder="Product Price"
                                    value="{{ old('product_price') }}" required />
                            </div>
                            <div class="form-group mb-3">
                                <div>
                                    <label>Product Status</label>
                                </div>

                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn bg-olive active">
                                        <input type="radio" name="option" value="Active" id="option_b1" autocomplete="off"
                                            checked> Active
                                    </label>
                                    <label class="btn bg-olive">
                                        <input type="radio" name="option" value="Inactive" id="option_b2"
                                            autocomplete="off"> Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12  mb-4">
                            <div class="form-group mb-3">
                                <label for="name">
                                    <input type="file" id="name" name="product_image" type="text"
                                        class="form-control validate" required />
                                </label>

                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
                        </div>
                        </form>
                        @if ($errors->any())
                            <div>
                                @foreach ($errors->all() as $error)
                                    <li class="alert alert-danger">{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        @if (\Session::has('error'))
                            <div>
                                <li class="alert alert-danger">{!! \Session::get('error') !!}</li>
                            </div>
                        @endif

                        @if (\Session::has('success'))
                            <div>
                                <li class="alert alert-success">{!! \Session::get('success') !!}</li>
                            </div>
                        @endif
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
