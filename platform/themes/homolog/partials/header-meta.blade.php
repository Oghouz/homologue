@if (is_plugin_active('ecommerce'))
{{--    <div @class(['header-meta', $class ?? null])>--}}
{{--        <div class="header-meta__social ml-25" style="text-align: end;margin-right: 65px;">--}}
{{--            <ul>--}}
{{--                <li class="header-menu-li">--}}
{{--                    <button class="header-search p-relative" title="search" id="openSearch">--}}
{{--                        <i class="fal fa-search"></i>--}}
{{--                        {{ __('Search') }}--}}
{{--                    </button>--}}
{{--                </li>--}}
{{--                <li class="header-menu-li">--}}
{{--                    <a href="{{ route('public.wishlist') }}" class="header-cart">--}}
{{--                        <i class="fal fa-heart"></i>--}}
{{--                        {{ __('Wishlist') }}--}}
{{--                        <span class="tp-product-wishlist-count">{{ Cart::instance('wishlist')->count() }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="header-menu-li">--}}
{{--                    @auth('customer')--}}
{{--                        <a href="{{ route('customer.overview') }}" title="{{ auth('customer')->user()->name }}" class="text-white"><i class="fal fa-user"></i></a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('customer.login') }}" title="{{ __('Login') }}">--}}
{{--                            <i class="fal fa-user"></i>--}}
{{--                            {{ __('My Account') }}--}}
{{--                        </a>--}}
{{--                    @endauth--}}
{{--                </li>--}}
{{--                <li class="header-menu-li">--}}
{{--                    <button class="header-cart p-relative tp-cart-toggle" title="cart">--}}
{{--                        <i class="fal fa-shopping-cart"></i>--}}
{{--                        {{ __('Cart') }}--}}
{{--                        @if(Cart::instance('cart')->count())--}}
{{--                            <span class="tp-product-count">{{ Cart::instance('cart')->count() }}</span>--}}
{{--                        @endif--}}
{{--                    </button>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
    {{--    Recherche SIDEBAR   --}}
    <div id="searchSidebar" class="search-sidebar">
        <div class="search-content">
            <div>
                <div class="text-center">
                    <a href="{{ route('public.index') }}">
                        <sapn style="font-size: 5.5em;font-family: emoji;">HOMOLOG</sapn>
                        <hr style="color: transparent;margin: 5px 0;">
                        <span style="font-size: 3em;font-family: emoji;">PARIS</span>
                    </a>
                </div>
            </div>
            <div class="text-end">
                <button id="closeSearch" class="btn btn-link text-dark"><i class="fas fa-2x fa-times"></i></button>
            </div>
            <div class="text-center">
                <form class="m-5" action="{{ route('public.products') }}" data-url="{{ route('public.ajax.search-products') }}" method="GET">
                    <input type="text" name="q" class="form-control" placeholder="{{ __('Search') }}..." style="border: none;border-bottom: 1px solid;text-align: center;" value="{{ BaseHelper::stringify(request()->query('q')) }}" autocomplete="off">
                    <button type="submit" class="btn btn-link" style="text-decoration: unset;color:#2d2d2d">
                        <i class="fas fa-search"></i>
                        {{ __('Search') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endif
