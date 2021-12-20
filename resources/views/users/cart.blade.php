@extends('components.frontend.footer')
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/cart-variant1.html   11 Nov 2019 12:44:31 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cart Page &ndash; Belle Multipurpose Bootstrap 4 Template</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}">
    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
</head>

<body class="page-template belle cart-variant1">
    <div class="pageWrapper">
        <!--Search Form Drawer-->
        <div class="search">
            <div class="search__form">
                <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..."
                    aria-label="Search" autocomplete="off">
                <button type="button" class="search-trigger close-btn"><i class="icon anm anm-times-l"></i></button>
            </div>
        </div>
        <!--End Search Form Drawer-->
        <!--Top Header-->
        <!--End Top Header-->
        <!--Header-->
        <!--End Header-->
        <!--Mobile Menu-->
        <!--End Mobile Menu-->
        <!--Body Content-->
        <div id="page-content">
            <!--Page Title-->
            <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                <a href="{{ URL::to('/shoping-bazzar/') }}">
                    <img src="{{ asset('frontend/assets/images/logo.svg') }}" alt="Belle Multipurpose Html Template"
                        title="Belle Multipurpose Html Template" />
                </a>
            </div>
            <div class="page section-header text-center">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width">Shopping Cart</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->

            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                        <div class="alert alert-success text-uppercase" role="alert">
                            <i class="icon anm anm-truck-l icon-large"></i> &nbsp;<strong>Congratulations!</strong>
                            You've got free shipping!
                        </div>
                        <table>
                            <thead class="cart__row cart__header">
                                <tr>
                                    <th colspan="2" class="text-center">Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Total</th>
                                    <th class="action">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @foreach ($cartItems as $item)
                                    @php
                                        $product = DB::table('products')
                                            ->select('product_code', 'product_quantity', 'product_image')
                                            ->where('product_id', '=', $item->id)
                                            ->get();

                                    @endphp
                                    @php $total += $item->price * $item->quantity @endphp

                                    <tr class="cart__row border-bottom line1 cart-flex border-top">
                                        @foreach ($product as $img)
                                            <td class="cart__image-wrapper cart-flex-item">
                                                <a href="#"><img class="cart__image"
                                                        src="{{ asset('products/' . $img->product_image) }}"
                                                        alt="Elastic Waist Dress - Navy / Small"></a>
                                            </td>
                                        @endforeach
                                        <td class="cart__meta small--text-left cart-flex-item">
                                            <div class="list-view-item__title">
                                                <a href="#">{{ $item->name }} </a>
                                            </div>
                                            @foreach ($product as $itemm)
                                                <div class="cart__meta-text">
                                                    Code: {{ $itemm->product_code }}
                                                    <br>Quantity: {{ $itemm->product_quantity }} <br>
                                                </div>
                                            @endforeach
                                        </td>
                                        <td class="cart__price-wrapper cart-flex-item">
                                            <span class="money">৳ {{ $item->price }}</span>
                                        </td>
                                        <td class="cart__update-wrapper cart-flex-item text-right">
                                            <div class="cart__qty text-center">
                                                <div class="qtyField">
                                                    <a class="qtyBtn minus"
                                                        href="{{ URL::to('/update-cart/' . $item->quantity . '/' . $item->id . '/' . '1') }}"><i
                                                            class="icon icon-minus"></i></a>
                                                    <input class="cart__qty-input qty update-cart" type="text"
                                                        name="quantity[]" id="qty" title="Qty"
                                                        value={{ $item->quantity }} pattern="[0-9]*">
                                                    <a class="qtyBtn plus"
                                                        href="{{ URL::to('/update-cart/' . $item->quantity . '/' . $item->id . '/' . '2') }}"><i
                                                            class="icon icon-plus"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right small--hide cart-price">
                                            <div><span class="money">৳
                                                    {{ $item->price * $item->quantity }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center small--hide"><a
                                                href="{{ URL::to('/remove/' . $item->id) }}"
                                                class="btn btn--secondary cart__remove" title="Remove tem"><i
                                                    class="icon icon anm anm-times-l"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-left"><a href="http://annimexweb.com/"
                                            class="btn btn-secondary btn--small cart-continue">Continue
                                            shopping</a></td>
                                    <td colspan="3" class="text-right">
                                        <a href="{{ URL::to('/clear') }}" <button type="submit" name="clear"
                                            class="btn btn-secondary btn--small  small--hide">Clear
                                            Cart</button></a>
                                        {{-- <button type="submit" name="update"
                                                class="btn btn-secondary btn--small cart-continue ml-2">Update
                                                Cart</button> --}}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>


                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
                                <h5>Discount Codes</h5>
                                <form action="{{ route('userCoupon') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if (Session::has('message'))
                                        <div class="alert alert-danger" role="danger">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="address_zip">Enter your coupon code if you have one.</label>
                                        <input type="text" name="coupon_code" required>

                                    </div>
                                    <div class="actionRow">
                                        <div><button type="submit" class="btn btn-secondary btn--small">Apply
                                                Coupon</button></div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
                                <h5>Estimate Shipping and Tax</h5>
                                <div class="form-group">
                                    <label for="address_country">Country</label>
                                    <select id="address_country" name="address[country]" data-default="United States">
                                        <option value="Belgium" data-provinces="[]">Belgium</option>
                                        <option value="---" data-provinces="[]">---</option>
                                        <option value="Afghanistan" data-provinces="[]">Afghanistan</option>
                                        <option value="Aland Islands" data-provinces="[]">Åland Islands</option>
                                        <option value="Albania" data-provinces="[]">Albania</option>
                                        <option value="Algeria" data-provinces="[]">Algeria</option>
                                        <option value="Andorra" data-provinces="[]">Andorra</option>
                                        <option value="Angola" data-provinces="[]">Angola</option>
                                        <option value="Anguilla" data-provinces="[]">Anguilla</option>
                                        <option value="Antigua And Barbuda" data-provinces="[]">Antigua &amp;
                                            Barbuda</option>
                                        <option value="Armenia" data-provinces="[]">Armenia</option>
                                        <option value="Aruba" data-provinces="[]">Aruba</option>
                                        <option value="Austria" data-provinces="[]">Austria</option>
                                        <option value="Azerbaijan" data-provinces="[]">Azerbaijan</option>
                                        <option value="Bahamas" data-provinces="[]">Bahamas</option>
                                        <option value="Bahrain" data-provinces="[]">Bahrain</option>
                                        <option value="Bangladesh" data-provinces="[]">Bangladesh</option>
                                        <option value="Barbados" data-provinces="[]">Barbados</option>
                                        <option value="Belarus" data-provinces="[]">Belarus</option>
                                        <option value="Belgium" data-provinces="[]">Belgium</option>
                                        <option value="Belize" data-provinces="[]">Belize</option>
                                        <option value="Benin" data-provinces="[]">Benin</option>
                                        <option value="Bermuda" data-provinces="[]">Bermuda</option>
                                        <option value="Bhutan" data-provinces="[]">Bhutan</option>
                                        <option value="Bolivia" data-provinces="[]">Bolivia</option>
                                        <option value="Bosnia And Herzegovina" data-provinces="[]">Bosnia &amp;
                                            Herzegovina</option>
                                        <option value="Botswana" data-provinces="[]">Botswana</option>
                                        <option value="Bouvet Island" data-provinces="[]">Bouvet Island</option>
                                        <option value="British Indian Ocean Territory" data-provinces="[]">British
                                            Indian Ocean Territory</option>
                                        <option value="Virgin Islands, British" data-provinces="[]">British Virgin
                                            Islands</option>
                                        <option value="Brunei" data-provinces="[]">Brunei</option>
                                        <option value="Bulgaria" data-provinces="[]">Bulgaria</option>
                                        <option value="Burkina Faso" data-provinces="[]">Burkina Faso</option>
                                        <option value="Burundi" data-provinces="[]">Burundi</option>
                                        <option value="Cambodia" data-provinces="[]">Cambodia</option>
                                        <option value="Republic of Cameroon" data-provinces="[]">Cameroon</option>
                                        <option value="Cape Verde" data-provinces="[]">Cape Verde</option>
                                        <option value="Bonaire, Sint Eustatius and Saba" data-provinces="[]">
                                            Caribbean Netherlands</option>
                                        <option value="Cayman Islands" data-provinces="[]">Cayman Islands</option>
                                        <option value="Central African Republic" data-provinces="[]">Central African
                                            Republic</option>
                                        <option value="Chad" data-provinces="[]">Chad</option>
                                        <option value="Chile" data-provinces="[]">Chile</option>
                                        <option value="Comoros" data-provinces="[]">Comoros</option>
                                        <option value="Congo" data-provinces="[]">Congo - Brazzaville</option>
                                        <option value="Congo, The Democratic Republic Of The" data-provinces="[]">
                                            Congo - Kinshasa</option>
                                        <option value="Cook Islands" data-provinces="[]">Cook Islands</option>
                                        <option value="Costa Rica" data-provinces="[]">Costa Rica</option>
                                        <option value="Croatia" data-provinces="[]">Croatia</option>
                                        <option value="Cuba" data-provinces="[]">Cuba</option>
                                        <option value="Curaçao" data-provinces="[]">Curaçao</option>
                                        <option value="Cyprus" data-provinces="[]">Cyprus</option>
                                        <option value="Czech Republic" data-provinces="[]">Czech Republic</option>
                                        <option value="Côte d'Ivoire" data-provinces="[]">Côte d'Ivoire</option>
                                        <option value="Denmark" data-provinces="[]">Denmark</option>
                                        <option value="Djibouti" data-provinces="[]">Djibouti</option>
                                        <option value="Dominica" data-provinces="[]">Dominica</option>
                                        <option value="Dominican Republic" data-provinces="[]">Dominican Republic
                                        </option>
                                        <option value="Finland" data-provinces="[]">Finland</option>
                                        <option value="France" data-provinces="[]">France</option>
                                        <option value="French Guiana" data-provinces="[]">French Guiana</option>
                                        <option value="French Polynesia" data-provinces="[]">French Polynesia
                                        </option>
                                        <option value="French Southern Territories" data-provinces="[]">French
                                            Southern Territories</option>
                                        <option value="Gabon" data-provinces="[]">Gabon</option>
                                        <option value="Gambia" data-provinces="[]">Gambia</option>
                                        <option value="Georgia" data-provinces="[]">Georgia</option>
                                        <option value="Germany" data-provinces="[]">Germany</option>
                                        <option value="Ghana" data-provinces="[]">Ghana</option>
                                        <option value="Gibraltar" data-provinces="[]">Gibraltar</option>
                                        <option value="Greece" data-provinces="[]">Greece</option>
                                        <option value="Greenland" data-provinces="[]">Greenland</option>
                                        <option value="Jersey" data-provinces="[]">Jersey</option>
                                        <option value="Jordan" data-provinces="[]">Jordan</option>
                                        <option value="Kazakhstan" data-provinces="[]">Kazakhstan</option>
                                        <option value="Kenya" data-provinces="[]">Kenya</option>
                                        <option value="Kiribati" data-provinces="[]">Kiribati</option>
                                        <option value="Kosovo" data-provinces="[]">Kosovo</option>
                                        <option value="Kuwait" data-provinces="[]">Kuwait</option>
                                        <option value="Kyrgyzstan" data-provinces="[]">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic" data-provinces="[]">Laos
                                        </option>
                                        <option value="Latvia" data-provinces="[]">Latvia</option>
                                        <option value="Lebanon" data-provinces="[]">Lebanon</option>
                                        <option value="Lesotho" data-provinces="[]">Lesotho</option>
                                        <option value="Liberia" data-provinces="[]">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya" data-provinces="[]">Libya</option>
                                        <option value="Liechtenstein" data-provinces="[]">Liechtenstein</option>
                                        <option value="Lithuania" data-provinces="[]">Lithuania</option>
                                        <option value="Luxembourg" data-provinces="[]">Luxembourg</option>
                                        <option value="Macao" data-provinces="[]">Macau SAR China</option>
                                        <option value="Macedonia, Republic Of" data-provinces="[]">Macedonia
                                        </option>
                                        <option value="Madagascar" data-provinces="[]">Madagascar</option>
                                        <option value="Malawi" data-provinces="[]">Malawi</option>
                                        <option value="Monaco" data-provinces="[]">Monaco</option>
                                        <option value="Mongolia" data-provinces="[]">Mongolia</option>
                                        <option value="Montenegro" data-provinces="[]">Montenegro</option>
                                        <option value="Montserrat" data-provinces="[]">Montserrat</option>
                                        <option value="Morocco" data-provinces="[]">Morocco</option>
                                        <option value="Mozambique" data-provinces="[]">Mozambique</option>
                                        <option value="Myanmar" data-provinces="[]">Myanmar (Burma)</option>
                                        <option value="Namibia" data-provinces="[]">Namibia</option>
                                        <option value="Nauru" data-provinces="[]">Nauru</option>
                                        <option value="Nepal" data-provinces="[]">Nepal</option>
                                        <option value="Netherlands" data-provinces="[]">Netherlands</option>
                                        <option value="Samoa" data-provinces="[]">Samoa</option>
                                        <option value="San Marino" data-provinces="[]">San Marino</option>
                                        <option value="Sao Tome And Principe" data-provinces="[]">São Tomé &amp;
                                            Príncipe</option>
                                        <option value="Saudi Arabia" data-provinces="[]">Saudi Arabia</option>
                                        <option value="Senegal" data-provinces="[]">Senegal</option>
                                        <option value="Serbia" data-provinces="[]">Serbia</option>
                                        <option value="Seychelles" data-provinces="[]">Seychelles</option>
                                        <option value="Sierra Leone" data-provinces="[]">Sierra Leone</option>
                                        <option value="Singapore" data-provinces="[]">Singapore</option>
                                        <option value="Sint Maarten" data-provinces="[]">Sint Marteen</option>
                                        <option value="Slovakia" data-provinces="[]">Slovakia</option>
                                        <option value="Slovenia" data-provinces="[]">Slovenia</option>
                                        <option value="Solomon Islands" data-provinces="[]">Solomon Islands</option>
                                        <option value="Sri Lanka" data-provinces="[]">Sri Lanka</option>
                                        <option value="Saint Barthélemy" data-provinces="[]">St. Barthélemy</option>
                                        <option value="Saint Helena" data-provinces="[]">St. Helena</option>
                                        <option value="Saint Kitts And Nevis" data-provinces="[]">St. Kitts &amp;
                                            Nevis</option>
                                        <option value="Saint Lucia" data-provinces="[]">St. Lucia</option>
                                        <option value="Saint Martin" data-provinces="[]">St. Martin</option>
                                        <option value="Saint Pierre And Miquelon" data-provinces="[]">St. Pierre
                                            &amp; Miquelon</option>
                                        <option value="St. Vincent" data-provinces="[]">St. Vincent &amp; Grenadines
                                        </option>
                                        <option value="Sudan" data-provinces="[]">Sudan</option>
                                        <option value="Suriname" data-provinces="[]">Suriname</option>
                                        <option value="Svalbard And Jan Mayen" data-provinces="[]">Svalbard &amp;
                                            Jan Mayen</option>
                                        <option value="Swaziland" data-provinces="[]">Swaziland</option>
                                        <option value="Sweden" data-provinces="[]">Sweden</option>
                                        <option value="Switzerland" data-provinces="[]">Switzerland</option>
                                        <option value="Syria" data-provinces="[]">Syria</option>
                                        <option value="Taiwan" data-provinces="[]">Taiwan</option>
                                        <option value="Tajikistan" data-provinces="[]">Tajikistan</option>
                                        <option value="Timor Leste" data-provinces="[]">Timor-Leste</option>
                                        <option value="Togo" data-provinces="[]">Togo</option>
                                        <option value="Tokelau" data-provinces="[]">Tokelau</option>
                                        <option value="Tonga" data-provinces="[]">Tonga</option>
                                        <option value="Trinidad and Tobago" data-provinces="[]">Trinidad &amp;
                                            Tobago</option>
                                        <option value="Tunisia" data-provinces="[]">Tunisia</option>
                                        <option value="Turkey" data-provinces="[]">Turkey</option>
                                        <option value="Turkmenistan" data-provinces="[]">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands" data-provinces="[]">Turks &amp;
                                            Caicos Islands</option>
                                        <option value="Tuvalu" data-provinces="[]">Tuvalu</option>
                                        <option value="United States Minor Outlying Islands" data-provinces="[]">
                                            U.S. Outlying Islands</option>
                                        <option value="Uganda" data-provinces="[]">Uganda</option>
                                        <option value="Ukraine" data-provinces="[]">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom" data-provinces="[]">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Uruguay" data-provinces="[]">Uruguay</option>
                                        <option value="Uzbekistan" data-provinces="[]">Uzbekistan</option>
                                        <option value="Vanuatu" data-provinces="[]">Vanuatu</option>
                                        <option value="Holy See (Vatican City State)" data-provinces="[]">Vatican
                                            City</option>
                                        <option value="Venezuela" data-provinces="[]">Venezuela</option>
                                        <option value="Vietnam" data-provinces="[]">Vietnam</option>
                                        <option value="Wallis And Futuna" data-provinces="[]">Wallis &amp; Futuna
                                        </option>
                                        <option value="Western Sahara" data-provinces="[]">Western Sahara</option>
                                        <option value="Yemen" data-provinces="[]">Yemen</option>
                                        <option value="Zambia" data-provinces="[]">Zambia</option>
                                        <option value="Zimbabwe" data-provinces="[]">Zimbabwe</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>State</label>
                                    <select id="address_province" name="address[province]" data-default="">
                                        <option value="Alabama">Alabama</option>
                                        <option value="Alaska">Alaska</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Arizona">Arizona</option>
                                        <option value="Arkansas">Arkansas</option>
                                        <option value="California">California</option>
                                        <option value="Colorado">Colorado</option>
                                        <option value="Connecticut">Connecticut</option>
                                        <option value="Delaware">Delaware</option>
                                        <option value="District of Columbia">District of Columbia</option>
                                        <option value="Federated States of Micronesia">Federated States of
                                            Micronesia</option>
                                        <option value="Florida">Florida</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Idaho">Idaho</option>
                                        <option value="Illinois">Illinois</option>
                                        <option value="Indiana">Indiana</option>
                                        <option value="Iowa">Iowa</option>
                                        <option value="Kansas">Kansas</option>
                                        <option value="Kentucky">Kentucky</option>
                                        <option value="Louisiana">Louisiana</option>
                                        <option value="Maine">Maine</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Maryland">Maryland</option>
                                        <option value="Massachusetts">Massachusetts</option>
                                        <option value="Michigan">Michigan</option>
                                        <option value="Minnesota">Minnesota</option>
                                        <option value="Mississippi">Mississippi</option>
                                        <option value="Missouri">Missouri</option>
                                        <option value="Montana">Montana</option>
                                        <option value="Nebraska">Nebraska</option>
                                        <option value="Nevada">Nevada</option>
                                        <option value="New Hampshire">New Hampshire</option>
                                        <option value="New Jersey">New Jersey</option>
                                        <option value="New Mexico">New Mexico</option>
                                        <option value="New York">New York</option>
                                        <option value="North Carolina">North Carolina</option>
                                        <option value="North Dakota">North Dakota</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Ohio">Ohio</option>
                                        <option value="Oklahoma">Oklahoma</option>
                                        <option value="Oregon">Oregon</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Pennsylvania">Pennsylvania</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Rhode Island">Rhode Island</option>
                                        <option value="South Carolina">South Carolina</option>
                                        <option value="South Dakota">South Dakota</option>
                                        <option value="Tennessee">Tennessee</option>
                                        <option value="Texas">Texas</option>
                                        <option value="Utah">Utah</option>
                                        <option value="Vermont">Vermont</option>
                                        <option value="Virgin Islands">Virgin Islands</option>
                                        <option value="Virginia">Virginia</option>
                                        <option value="Washington">Washington</option>
                                        <option value="West Virginia">West Virginia</option>
                                        <option value="Wisconsin">Wisconsin</option>
                                        <option value="Wyoming">Wyoming</option>
                                        <option value="Armed Forces Americas">Armed Forces Americas</option>
                                        <option value="Armed Forces Europe">Armed Forces Europe</option>
                                        <option value="Armed Forces Pacific">Armed Forces Pacific</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address_zip">Postal/Zip Code</label>
                                    <input type="text" id="address_zip" name="address[zip]">
                                </div>

                                <div class="actionRow">
                                    <div><input type="button" class="btn btn-secondary btn--small"
                                            value="Calculate shipping"></div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                                <div class="solid-border">
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                                        <span class="col-12 col-sm-6 text-right"><span class="money">৳
                                                {{ Cart::getTotal() }}</span></span>
                                    </div>
                                    <div class="row border-bottom pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Tax</span>
                                        <span class="col-12 col-sm-6 text-right">৳ {{ $tax }}</span>
                                    </div>
                                    <div class="row border-bottom pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Shipping</span>
                                        <span class="col-12 col-sm-6 text-right">৳ 00.00</span>
                                    </div>
                                    <div class="row border-bottom pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Discount</span>
                                        @if (Session::has('discount'))
                                            <span class="col-12 col-sm-6 text-right">৳ {{ $discount }}</span>
                                        @else
                                            <span class="col-12 col-sm-6 text-right">৳ 00.00</span>
                                        @endif
                                    </div>
                                    <div class="row border-bottom pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand
                                                Total</strong></span>
                                        <span
                                            class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span
                                                class="money">৳ {{ $grand_total }}</span></span>
                                    </div>
                                    <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                                    <p class="cart_tearm">
                                        <label>
                                            <input type="checkbox" name="tearm" class="checkbox" value="tearm"
                                                required="">
                                            I agree with the terms and conditions
                                        </label>
                                    </p>
                                    <input type="submit" name="checkout" id="cartCheckout"
                                        class="btn btn--small-wide checkout" value="Proceed To Checkout"
                                        disabled="disabled">
                                    <div class="paymnet-img"><img
                                            src="{{ asset('frontend/assets/images/payment-img.jpg') }}"
                                            alt="Payment">
                                    </div>
                                    <p><a href="#;">Checkout with Multiple Addresses</a></p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!--End Body Content-->
        <!--Scoll Top-->
        <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
        <!--End Scoll Top-->

        <!-- Including Jquery -->
        <script src="{{ asset('frontend/assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/vendor/jquery.cookie.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/vendor/wow.min.js') }}"></script>
        <!-- Including Javascript -->
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/lazysizes.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    </div>
</body>


<!-- belle/cart-variant1.html   11 Nov 2019 12:44:32 GMT -->
{{-- <script type="text/javascript">
    // $(".update-cart").change(function(e) {
    //     e.preventDefault();
    $(document).on('click', 'qty', function(e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('cart.update') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });
</script> --}}

</html>
