@extends('admin_layout.app')
@section('content')
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Product</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form action="{{ URL::to('/product-update/' . $products->product_id) }}" role="" method="POST"
                                class="tm-edit-product-form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">Product Code
                                    </label>
                                    <input id="name" name="product_code" value="{{ $products->product_code }}" type="text"
                                        placeholder="Product Name" class="form-control validate" readonly />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Product Name
                                    </label>
                                    <input id="name" name="product_name" value="{{ $products->product_name }}" type="text"
                                        placeholder="Product Name" class="form-control validate" required />
                                </div>
                                <div class="form-group mb-3">

                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Product Quantity
                                    </label>
                                    <input id="name" name="product_quantity" type="text" placeholder="Product Quantity"
                                        class="form-control validate" value="{{ $products->product_quantity }}"
                                        required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category">Category</label>
                                    <select class="custom-select tm-select-accounts" id="category_id"
                                        value="{{ $category->name }}" name="category_id">
                                        <option selected>Select category</option>
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <?php $dash = ''; ?>
                                                <option value="{{ $category->id }}" @if ($category->id == $products->category_id) selected @endif>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    {{-- <label>Update Image</label> --}}

                                    {{-- <input type="file" id="files" name="product_image" style="display:none;" />
                                    <label for=files>{{ $products->product_image }}</label> --}}

                                </div>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12  mb-4">
                            <div class="form-group mb-3">
                                <label for="name">Product Price
                                </label>
                                <input type="number" id="name" name="product_price" type="text"
                                    class="form-control validate" placeholder="Product Price"
                                    value="{{ $products->product_price }}" required />
                            </div>
                            <div class="form-group mb-3">
                                <div>
                                    <label>Description</label>
                                </div>
                                <textarea class="form-control validate" rows="3" name="product_des"
                                    placeholder="Product Description" value="{{ $products->product_des }}"
                                    required>{{ $products->product_des }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <div>
                                    <label>Image : </label>
                                    <input type="file" id="files" name="product_image" class="hidden" />
                                    <label for=files>{{ $products->product_image }}</label>
                                </div>
                                <img src="{{ asset('products/' . $products->product_image) }}" class="img-fluid"
                                    style="max-width: 1000px; max-height: 150px;" />

                            </div>
                        </div>



                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">Update Product
                                Now</button>
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
    <script>
        $("#files").change(function() {
            $("#lable_file").html($(this).val().split("\\").splice(-1, 1)[0] || "Select file");
        });
    </script>
@endsection
