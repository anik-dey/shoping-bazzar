@extends('user_layout.app')
@section('title')
@endsection

@section('content')

    <!-- belle/shop-left-sidebar.html   11 Nov 2019 12:37:31 GMT -->

    <body class="template-collection belle">
        <div class="pageWrapper">
            <!--Search Form Drawer-->
            <div class="search">
                <div class="search__form">
                    <form class="search-bar__form" action="#">
                        <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                        <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..."
                            aria-label="Search" autocomplete="off">
                    </form>
                    <button type="button" class="search-trigger close-btn"><i class="icon anm anm-times-l"></i></button>
                </div>
            </div>
            <!--End Search Form Drawer-->

            <!--Body Content-->
            <div id="page-content">
                <!--Collection Banner-->

                <!--End Collection Banner-->

                <div class="container">
                    <div class="row">
                        <!--Sidebar-->
                    @section('landing-content')
                        <!--End Sidebar-->
                        <!--Main Content-->
                        <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">


                            <div class="productList product-load-more">
                                <!--Toolbar-->
                                <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product
                                    Filters</button>
                                <div class="toolbar">
                                    <div class="filters-toolbar-wrapper">
                                        <div class="row">
                                            <div
                                                class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">
                                                <a href="" title="Grid View" class="change-view change-view--active">
                                                    <img src="{{ asset('frontend/assets/images/grid.jpg') }}"
                                                        alt="Grid" />
                                                </a>
                                                <a href="" title="List View" class="change-view">
                                                    <img src="{{ asset('frontend/assets/images/list.jpg') }}"
                                                        alt="List" />
                                                </a>
                                            </div>
                                            <div
                                                class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                                <span class="filters-toolbar__product-count">Showing:
                                                    {{ count($products) }}
                                                </span>
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-4 text-right">
                                                <div class="filters-toolbar__item">
                                                    <label for="SortBy" class="hidden">Sort</label>
                                                    <select name="SortBy" id="SortBy"
                                                        class="filters-toolbar__input filters-toolbar__input--sort">
                                                        <option value="title-ascending" selected="selected">Sort</option>
                                                        <option>Best Selling</option>
                                                        <option>Alphabetically, A-Z</option>
                                                        <option>Alphabetically, Z-A</option>
                                                        <option>Price, low to high</option>
                                                        <option>Price, high to low</option>
                                                        <option>Date, new to old</option>
                                                        <option>Date, old to new</option>
                                                    </select>
                                                    <input class="collection-header__default-sort" type="hidden"
                                                        value="manual">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--End Toolbar-->
                                <div class="grid-products grid--view-items">
                                    <div class="row">
                                        @foreach ($products as $item)
                                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                                <!-- start product image -->

                                                <div class="product-image">
                                                    <!-- start product image -->
                                                    <a href="{{ URL::to('/product-details/' . $item->product_id) }}">
                                                        <!-- image -->
                                                        <img class="primary blur-up lazyload"
                                                            data-src="{{ asset('products/' . $item->product_image) }}"
                                                            src="{{ asset('products/' . $item->product_image) }}"
                                                            alt="image" title="product">
                                                        <!-- End image -->
                                                        <!-- Hover image -->
                                                        <img class="hover blur-up lazyload"
                                                            data-src="{{ asset('products/' . $item->product_image) }}"
                                                            src="{{ asset('products/' . $item->product_image) }}"
                                                            alt="image" title="product">
                                                        <!-- End hover image -->
                                                        <!-- product label -->
                                                        <div class="product-labels rectangular"><span
                                                                class="lbl on-sale">-16%</span>
                                                            <span class="lbl pr-label1">new</span>
                                                        </div>
                                                        <!-- End product label -->
                                                    </a>
                                                    <!-- end product image -->

                                                    <!-- countdown start -->
                                                    <div class="saleTime desktop" data-countdown="2022/03/01"></div>
                                                    <!-- countdown end -->

                                                    <!-- Start product button -->
                                                    <form class="variants add" action=""
                                                        onclick="window.location.href='cart-store/{{ $item->product_id }}'"
                                                        method="post" enctype="multipart/form-data">
                                                        <button class="btn btn-addto-cart" type="button">Add To
                                                            Cart</button>
                                                    </form>
                                                    <div class="button-set">
                                                        <a href="javascript:void(0)" title="Quick View"
                                                            class="quick-view-popup quick-view" data-toggle="modal"
                                                            data-target="#content_quickview">
                                                            <i class="icon anm anm-search-plus-r"></i>
                                                        </a>
                                                        <div class="wishlist-btn">
                                                            <a class="wishlist add-to-wishlist" href="#"
                                                                title="Add to Wishlist">
                                                                <i class="icon anm anm-heart-l"></i>
                                                            </a>
                                                        </div>
                                                        <div class="compare-btn">
                                                            <a class="compare add-to-compare" href="compare.html"
                                                                title="Add to Compare">
                                                                <i class="icon anm anm-random-r"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- end product button -->
                                                </div>
                                                <!-- end product image -->

                                                <!--start product details -->
                                                <div class="product-details text-center">
                                                    <!-- product name -->
                                                    <div class="product-name">
                                                        <a href="#">{{ $item->product_name }}</a>
                                                    </div>
                                                    <!-- End product name -->
                                                    <div class="product-price">
                                                        <span class="price">{{ $item->product_quantity }}</span>
                                                    </div>
                                                    <!-- product price -->
                                                    <div class="product-price">
                                                        <span class="old-price">৳ 500.00</span>
                                                        <span class="price">৳ {{ $item->product_price }}</span>
                                                    </div>
                                                    <!-- End product price -->

                                                    <div class="product-review">
                                                        <i class="font-13 fa fa-star"></i>
                                                        <i class="font-13 fa fa-star"></i>
                                                        <i class="font-13 fa fa-star"></i>
                                                        <i class="font-13 fa fa-star-o"></i>
                                                        <i class="font-13 fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="timermobile">
                                                    <div class="saleTime desktop" data-countdown="2022/03/01"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="infinitpaginOuter">
                        <div class="infinitpagin">
                            <a href="#" class="btn loadMore">Load More</a>
                        </div>
                    </div>
                </div>
            @endsection
        </div>
    </div>
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
</body>
@endsection
