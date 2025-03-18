<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {!! BaseHelper::googleFonts(sprintf('https://fonts.googleapis.com/css2?family=%s:wght@400;500;600', urlencode($primaryFont = theme_option('primary_font', 'Jost')))) !!}

        <style>
            :root {
                --primary-color: {{ $primaryColor = theme_option('primary_color', '#d51243') }};
                --primary-color-rgb: {{ implode(',', BaseHelper::hexToRgb($primaryColor)) }};
                --primary-font: '{{ $primaryFont }}', sans-serif;
            }
            @font-face {
                font-family: 'Cormorant-Light';
                src: url({{asset('storage/fonts/Cormorant-Light.ttf')}}) format('truetype');
                font-weight: normal;
                font-style: normal;
            }
            html, body, main, p, h1, h2, h3, h4, h5, h6, a, span, div, li, ul, ol, button, input, textarea {
                font-family: 'Cormorant-Light' !important;
            }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


        {!! Theme::header() !!}
    </head>
    <body @if (BaseHelper::siteLanguageDirection() === 'rtl') dir="rtl" @endif>
        {!! apply_filters(THEME_FRONT_BODY, null) !!}

        @if(theme_option('preloader_enabled', 'yes') === 'yes')
            {!! Theme::partial('preloader') !!}
        @endif

        {!! Theme::partial('scroll-top') !!}

        @yield('content')

        @if(is_plugin_active('ecommerce') && theme_option('bottom_mobile_menu_enabled', 'yes') === 'yes')
            @include(Theme::getThemeNamespace('partials.navigation-bar'))
        @endif

        <script>
            'use strict';

            window.trans = {};
            window.siteConfig = {};
            @if (is_plugin_active('ecommerce'))
                window.currencies = @json(get_currencies_json());
                @if(EcommerceHelper::isCartEnabled())
                    siteConfig.ajaxCart = '{{ route('public.ajax.cart') }}';
                    siteConfig.cartUrl = '{{ route('public.cart') }}';
                @endif
            @endif
        </script>

        {!! Theme::footer() !!}

        @if (
    session()->has('success_msg')
    || session()->has('error_msg')
    || (isset($errors) && $errors->count() > 0)
    || isset($error_msg)
)
            <script type="text/javascript">
                window.onload = function() {
                    @if (session()->has('success_msg'))
                        NinicoApp.showSuccess('{{ session('success_msg') }}');
                    @endif

                    @if (session()->has('error_msg'))
                        NinicoApp.showError('{{ session('error_msg') }}');
                    @endif

                    @if (isset($error_msg))
                        NinicoApp.showError('{{ $error_msg }}');
                    @endif

                    @if (isset($errors))
                        @foreach ($errors->all() as $error)
                            NinicoApp.showError('{!! BaseHelper::clean($error) !!}');
                        @endforeach
                    @endif
                };
            </script> 
        @endif
    <script type="text/javascript">
        let lastScrollTop = 0;
        const header = document.querySelector('header');
        const headerText = document.getElementById('header-logo');

        window.addEventListener('scroll', function () {
        let scrollTop = window.scrollY || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            header.classList.add('hidden');
            header.classList.remove('visible');
        } else {
            header.classList.remove('hidden');
            header.classList.add('visible');
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });

        window.addEventListener('load', function () {
        header.classList.add('visible');
        });

        document.getElementById('menuOverlay').addEventListener('click', function (event) {
        if (event.target === this) {
            toggleMenu();
        }
        });

        const sections = document.querySelectorAll('.collection-section');
        const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            }
        });
        }, { threshold: 0.3 });

        sections.forEach(section => {
            observer.observe(section);
        });

        const menuIconSearch = document.querySelector('.menu-icon-search i'); 
        function toggleMenu() {
            const menuOverlay = document.getElementById('menuOverlay');
            const menuIcon = document.querySelector('.menu-icon i');  // Icône de menu
            
            const navLeft = document.getElementById('nav-left');
            const navRight = document.getElementById('nav-right');

            if (menuOverlay.classList.contains('active')) {
                menuOverlay.classList.remove('active');
                menuIcon.classList.remove('bi-x-lg', 'text-dark');
                menuIcon.classList.add('bi-list');
                menuIconSearch.classList.add('bi-search')

                navLeft.classList.remove('show');  // Cache navLeft
                navRight.classList.remove('show');  // Cache navRight

                headerText.style.color = 'white';

                document.body.style.overflow = '';

                setTimeout(() => {
                    menuOverlay.style.display = 'none';
                }, 500);
            } else {
                menuOverlay.style.display = 'flex';

                setTimeout(() => {
                    menuOverlay.classList.add('active');
                    menuIcon.classList.remove('bi-list');
                    menuIconSearch.classList.remove('bi-search');
                    menuIcon.classList.add('bi-x-lg', 'text-dark');

                    navLeft.classList.add('show');  
                    navRight.classList.add('show'); 

                    headerText.style.color = 'black';
                    document.body.style.overflow = 'hidden';
                }, 10);
            }
        }
        function toggleSearch(){
            const searchOverlay = document.getElementById('searchOverlay');
            if (searchOverlay.classList.contains('active')) {
                searchOverlay.classList.remove('active');
                searchOverlay.style.color = 'white';
                headerText.style.color = 'white';
                menuIconSearch.classList.remove('bi-x-lg', 'text-dark');
                menuIconSearch.classList.add('bi-search');
                document.body.style.overflow = '';

                setTimeout(() => {
                    searchOverlay.style.display = 'none';
                }, 500);
                
            } else {
                searchOverlay.style.display = 'flex';
                menuIconSearch.classList.add('bi-x-lg', 'text-dark');
                menuIconSearch.classList.remove('bi-search');
                document.body.style.overflow = 'hidden';

                setTimeout(() => {
                    searchOverlay.classList.add('active');
                    headerText.style.color = 'black';
                }, 10);
                
            }
        }

    </script>
    </body>
</html>
