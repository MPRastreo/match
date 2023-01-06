<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', session()->get('locale')) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Logo Match --}}
    <link href="{{ asset('/img/Imagologo-07.png') }}" rel="icon">
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    {{-- Bootstrap --}}
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- Datatables --}}
    <link href="{{ asset('/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- JQuery JS --}}
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    {{-- Bootstrap Select --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    {{-- Template Custom Styles --}}
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Progresbar --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.0/progressbar.js"
        integrity="sha512-5IpLUbqlmXPB1IBI0TN9iNnokMYTLpNrA51lbvI3B7+qeHORt8OJnYaSST8ymGTE8kcdm9oVEIh06mj/E0c9yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="https://tympanus.net/Development/3DBookShowcase/css/component2.css">
    {{-- Book Modernizr --}}
    <script src="https://tympanus.net/Development/3DBookShowcase/js/modernizr.custom.js"></script>
    {{-- Page Scripts --}}
	<script>
		window.onload = () =>
		{
			$('#overlay').hide("slow");
            $('#img').hide("slow");
		}
	</script>
    <style>
        .changeLang
        {
            border: 1px solid rgba(7, 49, 135, 0.15);
            border-radius: 0.375rem;
            width: 100% !important;
        }
    </style>
    @yield('links')
</head>

<body>
    @php
        App::setLocale(auth()->user()->lang);
        session()->put('locale', auth()->user()->lang);
    @endphp
    <div id="overlay">
        <div id="img"></div>
    </div>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <div id="divLogoLargo" class="d-none d-md-block align-items-center">
                <img src="{{ asset('img/Logo-largo-08.png') }}" height="50px" alt="">
            </div>
            <div id="divLogoCorto" class="d-md-none align-items-center">
                <img src="{{ asset('img\Match_PNG-01.png') }}" height="50px" alt="">
            </div>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <div class="px-1 pe-2" style="width: 70%;">
                    <select class="changeLang selectpicker">
                        <option data-content="<img style='width: 18px; border-radius: 2px;' src='{{ asset('images/icons/english.svg') }}' aria-hidden='true'>&nbsp;&nbsp;
                            <span class='badge rounded-pill bg-primary'>
                                {{ ucwords(GoogleTranslate::justTranslate('English', app()->getLocale())) }}
                            </span>" value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>
                        </option>
                        <option data-content="<img style='width: 18px; border-radius: 2px;' src='{{ asset('images/icons/spanish.svg') }}' aria-hidden='true'>&nbsp;&nbsp;
                            <span class='badge rounded-pill bg-primary'>
                                {{ ucwords(GoogleTranslate::justTranslate('Spanish', app()->getLocale())) }}
                            </span>" value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>
                        </option>
                        <option data-content="<img style='width: 18px; border-radius: 2px;' src='{{ asset('images/icons/portuguese.svg') }}' aria-hidden='true'>&nbsp;&nbsp;
                            <span class='badge rounded-pill bg-primary'>
                                {{ ucwords(GoogleTranslate::justTranslate('Portugués', app()->getLocale())) }}
                            </span>" value="pt" {{ session()->get('locale') == 'pt' ? 'selected' : '' }}>
                        </option>
                        <option data-content="<img style='width: 18px; border-radius: 2px;' src='{{ asset('images/icons/chinese.svg') }}' aria-hidden='true'>&nbsp;&nbsp;
                            <span class='badge rounded-pill bg-primary'>
                                {{ ucwords(GoogleTranslate::justTranslate('Chinese', app()->getLocale())) }}
                            </span>" value="zh" {{ session()->get('locale') == 'zh' ? 'selected' : '' }}>
                        </option>
                        <option data-content="<img style='width: 18px; border-radius: 2px; border: 1px solid rgba(0, 17, 51, 0.15);' src='{{ asset('images/icons/japanese.svg') }}' aria-hidden='true'>&nbsp;&nbsp;
                            <span class='badge rounded-pill bg-primary'>
                                {{ ucwords(GoogleTranslate::justTranslate('Japanese', app()->getLocale())) }}
                            </span>" value="ja" {{ session()->get('locale') == 'ja' ? 'selected' : '' }}>
                        </option>
                        <option data-content="<img style='width: 18px; border-radius: 2px;' src='{{ asset('images/icons/italian.svg') }}' aria-hidden='true'>&nbsp;&nbsp;
                            <span class='badge rounded-pill bg-primary'>
                                {{ ucwords(GoogleTranslate::justTranslate('Italian', app()->getLocale())) }}
                            </span>" value="it" {{ session()->get('locale') == 'it' ? 'selected' : '' }}>
                        </option>
                    </select>
                </div>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0 dropdown-toggle" href="#"
                        data-bs-toggle="dropdown">
                        <span class="d-none d-md-block">{{ Auth::user()->username }}</span>
                        <span class="fa-stack fa-4x px-4">
                            <i class="fa fa-circle fa-stack-2x icon-background"></i>
                            <i class="fa-solid fa-user fa-stack-1x text-light"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li style="cursor: pointer;">
                            <a class="dropdown-item d-flex align-items-center"
                                onclick="window.location.href='{{ url('logout') }}'">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>{{ ucwords(GoogleTranslate::justTranslate('Sign Out', app()->getLocale())) }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            @if (auth()->user()->role == 1 || auth()->user()->role == 2)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('personal') ? '' : 'collapsed' }}"
                        href="{{ url('/personal') }}">
                        <i class="fa-regular fa-address-card"></i>
                        <span>{{ ucwords(GoogleTranslate::justTranslate('Personal data', app()->getLocale())) }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 3)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('family') ? '' : 'collapsed' }}" href="{{ url('family') }}">
                        <i class="fa-solid fa-people-roof"></i>
                        <span>{{ ucwords(GoogleTranslate::justTranslate('Family', app()->getLocale())) }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 4)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('users') ? '' : 'collapsed' }}" href="{{ url('/users') }}">
                        <i class="fa-solid fa-user"></i>
                        <span>{{ ucwords(GoogleTranslate::justTranslate('Users', app()->getLocale())) }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 3)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('clinicalHistorie') ? '' : 'collapsed' }}"
                        href="{{ url('/clinicalHistorie') }}">
                        <i class="fa-solid fa-book-medical"></i>
                        <span>{{ ucwords(GoogleTranslate::justTranslate('Clinical History', app()->getLocale())) }}</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 4)
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('quotation') ? '' : 'collapsed' }}"
                        href="{{ url('/quotation') }}">
                        <i class="fa-regular fa-calendar-check"></i>
                        <span>{{ ucwords(GoogleTranslate::justTranslate('Appointment', app()->getLocale())) }}</span>
                    </a>
                </li>
            @endif
            {{-- @if (auth()->user()->role == 1 || auth()->user()->role == 2)
                <li class="nav-item">
                    <a class="nav-link  {{ Request::is('recipes') ? '' : 'collapsed' }}"
                        href="{{ url('/recipes') }}">
                        <i class="fa-regular fa-rectangle-list"></i>
                        <span>{{ ucwords(GoogleTranslate::justTranslate('Recipes', app()->getLocale())) }}</span>
                    </a>
                </li>
            @endif --}}
        </ul>

    </aside>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>@yield('pagetitle')</h1>
        </div>
        <div class="container-fluid">
            @yield('content')
        </div>

    </main>
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>DMM</span></strong>.
            {{ ucwords(GoogleTranslate::justTranslate('All Rights Reserved', app()->getLocale())) }}
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- Datatables JS --}}
    <script src="{{ asset('/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    {{-- Main JS --}}
    <script src="{{ asset('/js/main.js') }}"></script>
    @yield('scripts')
    <script>
        let notificaciones;

        const url = "{{ url('/lang/change') }}";
        $('.changeLang').change(function(event)
        {
            window.location.href = url + "?lang=" + $(this).val();
        })

		window.onbeforeunload = e =>
		{
			$('#overlay').show("slow");
            $('#img').show("slow");
			return undefined;
		};
	</script>
    {{-- Notifications JS --}}
    <script src="{{ asset('js/notifications.js') }}"></script>
</body>

</html>
