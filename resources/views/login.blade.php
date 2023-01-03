<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.2.0-web/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.2.0-web/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.2.0-web/css/solid.css') }}">
    <!-- Template Main CSS File -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @laravelPWA
<body>
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4"> <a href="#"
                                    class="logo d-flex align-items-center w-auto"> <img
                                        src="{{ asset('img/Logo-largo-08.png') }}" alt=""></a></div>
                            <div class="card mb-3" style="border-radius: 20px;">
                                <div class="card-body p-5">
                                    <div class="pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username &amp; password to login</p>
                                    </div>
                                    <form class="row g-3 needs-validation" novalidate method="POST" action="/login">
                                        @csrf
                                        <div class="col-12">
                                            <label for="inputUsername" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control"
                                                id="inputUsername" required="">
                                            <div class="invalid-feedback">Please enter your username!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="inputPassword" required="">
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        @error('error')
                                            <div class="fv-row">
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            </div>
                                        @enderror
                                        {{-- <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href="pages-register.html">Create an account</a></p>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                            <div class="copyright">
                                &copy; Copyright <strong><span>DMM</span></strong>. All Rights Reserved
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        </div>
    </main>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/js/main.js') }}"></script>

</body>

</html>
