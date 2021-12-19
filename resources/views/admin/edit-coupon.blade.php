@extends('admin_layout.app')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <section class="content" style="padding:20px 30%;">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Coupon</h3>
                    </div>

                    <form role="form" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Coupon Code*</label>
                                        <input type="text" name="code" class="form-control" placeholder="Coupon Code"
                                            value="{{ $coupons->code }}" required />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Coupon Type*</label>
                                        <select type="text" name="coupon_type" class="form-control">
                                            <option value="">Select</option>
                                            <?php $dash = ''; ?>
                                            <option value="fixed" @if ($coupons->type == 'fixed') selected @endif>Fixed</option>
                                            <option value="percent" @if ($coupons->type == 'percent') selected @endif>Percent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Coupon Value*</label>
                                        <input type="number" name="coupon_value" class="form-control"
                                            placeholder="Coupon Value" value="{{ $coupons->value }}" required />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Cart Value*</label>
                                        <input type="number" name="cart_value" class="form-control"
                                            placeholder="Cart Value" value="{{ $coupons->cart_value }}" required />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Expire Date</label>
                                        <input type="date" name="expiry_date" id="expiry-date" class="form-control"
                                            placeholder="Expiry-Date" value="{{ $coupons->expiry_date }}" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>

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
    </section>
@endsection
