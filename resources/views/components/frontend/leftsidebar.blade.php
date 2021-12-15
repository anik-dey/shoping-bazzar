<div class="collection-header">
    <div class="collection-hero">
        <div class="collection-hero__image"><img class="blur-up lazyload"
                data-src="{{ asset('frontend/assets/images/cat-women.jpg') }}"
                src="{{ asset('frontend/assets/images/cat-women.jpg') }}" alt="Women" title="Women" />
        </div>
        <div class="collection-hero__title-wrapper">
            <h1 class="collection-hero__title page-width">Shop Left Sidebar</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
            <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i>
            </div>
            <div class="sidebar_tags">
                <!--Categories-->
                <div class="sidebar_widget categories filter-widget">
                    <div class="widget-title">
                        <h2>Categories</h2>
                    </div>
                    <?php
                    $categories = DB::table('categories')
                        ->select('*')
                        ->orderBy('name', 'asc')
                        ->get();
                    ?>
                    <div class="widget-content">
                        <ul class="sidebar_categories">
                            @if ($categories != null)
                                @foreach ($categories as $item)
                                    <?php $sub = DB::table('categories')
                                        ->select('*')
                                        ->where('parent_id', '=', $item->id)
                                        ->orderBy('name', 'asc')
                                        ->get();
                                    ?>

                                    @if ($item->parent_id == null)
                                        <li class="level1 sub-level">
                                            @if ($sub->isEmpty())
                                                <a href="{{ URL::to('/product-lists/' . $item->id) }}"
                                                    class="site-nav">{{ $item->name }}</a>
                                            @else
                                                <a href="#;" class="site-nav">{{ $item->name }}</a>
                                            @endif
                                            @if ($sub != null)
                                                <ul class="sublinks">
                                                    @foreach ($sub as $item)

                                                        <li class="level2"><a
                                                                href="{{ URL::to('/product-lists/' . $item->id) }}"
                                                                class="site-nav">{{ $item->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            @endif

                        </ul>
                    </div>
                </div>
                <!--Categories-->
                <!--Price Filter-->
                <div class="sidebar_widget filterBox filter-widget">
                    <div class="widget-title">
                        <h2>Price</h2>
                    </div>
                    <form action="#" method="post" class="price-filter">
                        <div id="slider-range"
                            class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="no-margin"><input id="amount" type="text"></p>
                            </div>
                            <div class="col-6 text-right margin-25px-top">
                                <button class="btn btn-secondary btn--small">filter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="sidebar_widget">
                    <div class="widget-title">
                        <h2>Popular Products</h2>
                    </div>
                    <div class="widget-content">
                        <div class="list list-sidebar-products">
                            <div class="grid">
                                <div class="grid__item">
                                    <div class="mini-list-item">
                                        <div class="mini-view_image">
                                            <a class="grid-view-item__link" href="#">
                                                <img class="grid-view-item__image"
                                                    src="{{ asset('frontend/assets/images/product-images/mini-product-img.jpg') }}"
                                                    alt="" />
                                            </a>
                                        </div>
                                        <div class="details"> <a class="grid-view-item__title" href="#">Cena
                                                Skirt</a>
                                            <div class="grid-view-item__meta"><span class="product-price__price"><span
                                                        class="money">$173.60</span></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid__item">
                                    <div class="mini-list-item">
                                        <div class="mini-view_image"> <a class="grid-view-item__link" href="#"><img
                                                    class="grid-view-item__image"
                                                    src="{{ asset('frontend/assets/images/product-images/mini-product-img1.jpg') }}"
                                                    alt="" /></a> </div>
                                        <div class="details"> <a class="grid-view-item__title" href="#">Block
                                                Button
                                                Up</a>
                                            <div class="grid-view-item__meta"><span class="product-price__price"><span
                                                        class="money">$378.00</span></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid__item">
                                    <div class="mini-list-item">
                                        <div class="mini-view_image"> <a class="grid-view-item__link" href="#"><img
                                                    class="grid-view-item__image"
                                                    src="{{ asset('frontend/assets/images/product-images/mini-product-img2.jpg') }}"
                                                    alt="" /></a> </div>
                                        <div class="details"> <a class="grid-view-item__title" href="#">Balda
                                                Button
                                                Pant</a>
                                            <div class="grid-view-item__meta"><span class="product-price__price"><span
                                                        class="money">$278.60</span></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid__item">
                                    <div class="mini-list-item">
                                        <div class="mini-view_image"> <a class="grid-view-item__link" href="#"><img
                                                    class="grid-view-item__image"
                                                    src="{{ asset('frontend/assets/images/product-images/mini-product-img3.jpg') }}"
                                                    alt="" /></a> </div>
                                        <div class="details"> <a class="grid-view-item__title" href="#">Border
                                                Dress in
                                                Black/Silver</a>
                                            <div class="grid-view-item__meta"><span class="product-price__price"><span
                                                        class="money">$228.00</span></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('landing-content')
    </div>
</div>
