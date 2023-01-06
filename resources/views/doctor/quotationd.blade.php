<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ GoogleTranslate::justTranslate('Appointment - Doctor', $lang) }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicons -->
    <link href="{{ asset('/img/Imagologo-07.png') }}" rel="icon">

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template Main CSS File -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
    <script>
        let lang = @json($lang);
        const clinicalHDoctor = true;
    </script>
    <style>
        p {
            color: grey;
        }

        h2 {
            color: #1e68b1;
        }

        #heading {
            text-transform: uppercase;
            color: #114874;
            font-weight: normal;
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        .form-card {
            text-align: left;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        #msform textarea {
            padding: 8px 15px 8px 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            background-color: #ECEFF1;
            font-size: 16px;
            letter-spacing: 1px;
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #4154f1;
            outline-width: 0;
        }

        /*Next Buttons*/
        #msform .action-button {
            width: 100px;
            background: #4154f1;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px 10px 5px;
            float: right;
            border-radius: 10px;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            background-color: #2338f0;
        }

        /*Previous Buttons*/
        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right;
            border-radius: 10px;
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: #000000;
        }

        /*FieldSet headings*/
        .fs-title {
            font-size: 25px;
            color: #4154f1;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left;
        }

        .purple-text {
            color: #4154f1;
            font-weight: normal;
        }

        /*Step Count*/
        .steps {
            font-size: 25px;
            color: gray;
            margin-bottom: 10px;
            font-weight: normal;
            text-align: right;
        }

        /*Field names*/
        .fieldlabels {
            color: gray;
            text-align: left;
        }

        /*Icon progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
        }

        #progressbar .active {
            color: #4154f1;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 33%;
            float: left;
            position: relative;
            font-weight: 400;
        }

        /*Icons in the ProgressBar*/
        #progressbar #hereDise:before {
            font-family: FontAwesome;
            content: "\f007";
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\e53e";
        }

        #progressbar #nonpat:before {
            font-family: FontAwesome;
            content: "\f7f3";
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c";
        }

        /*Icon ProgressBar before any progress*/
        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px;
        }

        /*ProgressBar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1;
        }

        /*Color number of the step and the connector before it*/
        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #4154f1;
        }

        /*Animated Progress Bar*/
        .progress {
            height: 20px;
        }

        .progress-bar {
            background-color: #4154f1;
        }

        /*Fit image in bootstrap div*/
        .fit-image {
            width: 100%;
            object-fit: cover;
        }

        #progressbarCircle {
            margin: 6px;
            width: 90px;
            height: 90px;
            position: relative;
        }

        .btn-circle {
            width: 50px;
            height: 50px;
            text-align: center;
            padding: 6px 0;
            font-size: 22px;
            line-height: 1.428571429;
            border-radius: 25px;
        }

        .bootstrap-select>.dropdown-toggle {
            padding-top: 1.625rem;
            | padding-bottom: .625rem;
        }

        * {
            padding: 0;
            margin: 0;
        }

        .float {
            position: fixed;
            bottom: 40px;
            left: 40px;
            z-index: 3;
        }

        div[class*="item-container-obpd"],
        a[data-redirect*="paid.outbrain.com"],
        a[onmousedown*="paid.outbrain.com"] {
            display: none !important;
        }

        a div[class*="item-container-ad"] {
            height: 0px !important;
            overflow: hidden !important;
            position: absolute !important;
        }

        div[data-item-syndicated="true"] {
            display: none !important;
        }

        .grv_is_sponsored {
            display: none !important;
        }

        .zergnet-widget-related {
            display: none !important;
        }

        .bookshelf {
            width: 100%;
            height: 63px;
            z-index: -1;
            margin-top: -25px;
            background: transparent url('https://tympanus.net/Development/3DBookShowcase/images/shelf.png') no-repeat center center;
            position: relative;
        }

        ol,
        ul {
            padding-left: 0rem !important;
        }

        .book-2 .bk-front>div,
        .book-2 .bk-back,
        .book-2 .bk-left,
        .book-2 .bk-front:after {
            background-color: #2778c4 !important;
        }
    </style>
    <script>
        let idioma;
        const recuperarValor = () =>
        {
            idioma = $('#sltPDFLenaguaje21').val();
            window.location.href = "?idioma=" + idioma;
        }
    </script>
    <style>
		#img
		{
			position: fixed;
			display: none;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-image: url("https://cdn.dribbble.com/users/108183/screenshots/4543219/loader_backinout.gif");
            background-position: center;
            background-repeat: no-repeat;
			z-index: 1057;
			cursor: pointer;
		}

        #overlay
        {
            position: fixed;
			display: none;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
            background-color: rgb(255, 255, 255);
            z-index: 1056;
        }
	</style>
	<script>
		window.onload = () =>
		{
			$('#overlay').hide("slow");
            $('#img').hide("slow");
		}
	</script>
    @php
        if (isset($_GET['idioma']))
        {
            $phpVar1 = $_GET['idioma'];
        }
        else
        {
            $phpVar1 = 'en';
        }
    @endphp

<body>
    <div id="overlay">
        <div id="img"></div>
    </div>
    <div class="container-sm">
        <div class="row justify-content-center">
            <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                <div class="d-flex justify-content-center pt-5"> <a class="logo d-flex align-items-center w-auto"> <img
                            src="{{ asset('img/Logo-largo-08.png') }}" alt="" style="max-height: 80px;"></a>
                </div>
                <div class="card mb-3 col-12 shadow-none" style="border-radius: 20px; background-color: transparent">
                    <div class="card-body px-4">
                        <div class="d-block pb-2">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="text-start card-title pb-0 fs-4">
                                        {{ GoogleTranslate::justTranslate('Hello!', $lang) }}</h5>
                                    <p class="text-start fw-bolder" style="color: #1e68b1;">
                                        {{ $quotation->infoQuotation['name'] }}</p>
                                </div>
                                <div class="col-5 d-flex align-items-center justify-content-end pt-2">
                                    <a onclick="exitDoctor();" style="cursor: pointer;">
                                        <p class="text-end fw-bolder" style="color: #1e68b1;"><i
                                                class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;&nbsp;{{ ucwords(GoogleTranslate::justTranslate('Salir', $lang)) }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card" style="border-radius: 20px;">
                                    <div class="card-body">
                                        <div class="p-4">
                                            <img src="{{ asset('img/medical-history-dr.png') }}" class="img-fluid py-3"
                                                alt="...">
                                            <h2 class="fw-bold mb-0 pt-2 text-center">
                                                {{ GoogleTranslate::justTranslate('Clinical Historie', $lang) }}</h2>
                                            @if ($quotation->person->clinical_history->progress >= 21 && $quotation->person->clinical_history->progress <= 53)
                                                <button type="button"
                                                    class="btn btn-lg btn-primary mt-4 w-100 rounded-pill"
                                                    onclick="completeClinicalH('{{ $quotation->person->_id }}');">
                                                    {{ GoogleTranslate::justTranslate('Go', $lang) }}
                                                </button>
                                            @elseif ($quotation->person->clinical_history->progress == 100)
                                                <button type="button"
                                                    class="btn btn-lg btn-primary mt-4 w-100 rounded-pill"
                                                    onclick="openInfoClinicalH('{{ $quotation->person->_id }}');">
                                                    {{ GoogleTranslate::justTranslate('Go', $lang) }}
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="border-radius: 20px;">
                                    <div class="card-body">
                                        <div class="p-4">
                                            <img src="{{ asset('img/medical-history-dr-recipe.png') }}"
                                                class="img-fluid py-3" alt="...">
                                            <h2 class="fw-bold mb-0 pt-2 text-center">
                                                {{ GoogleTranslate::justTranslate('Medical Recipe', $lang) }}</h2>
                                            <button type="button"
                                                class="btn btn-lg btn-primary mt-4 w-100 rounded-pill"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalRecipe">{{ GoogleTranslate::justTranslate('Go', $lang) }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright pb-5">
                    &copy;&nbsp;Copyright&nbsp;<strong><span>DMM</span></strong>.
                    {{ ucwords(GoogleTranslate::justTranslate('Todos los derechos reservados', $lang)) }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalNew" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="modalNewLabel" aria-hidden="true">
        <button class="btn btn-primary btn-circle float" data-bs-toggle="tooltip" data-bs-toggle="tooltip"
            title="{{ ucwords(GoogleTranslate::justTranslate('Save your progress', $lang)) }}"
            onclick="validateSteps();"><i class="fa-regular fa-floppy-disk"></i></button>
        <div class="modal-dialog modal-xl" onmouseover="checkStepsValidity();">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalNewLabel">
                        {{ ucwords(GoogleTranslate::justTranslate('Add a new medical record', $lang)) }}
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center px-3">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2">
                            <div class="px-0 pb-0">
                                <div id="msform">
                                    <!-- progressbar -->
                                    <ul id="progressbar" class="d-flex justify-content-center">
                                        <li class="active" id="hereDise">
                                            <strong>{{ ucwords(GoogleTranslate::justTranslate('Hereditary Diseases', $lang)) }}</strong>
                                        </li>
                                        <li id="nonpat">
                                            <strong>{{ ucwords(GoogleTranslate::justTranslate('Non-pathological antecedents', $lang)) }}</strong>
                                        </li>
                                        <li id="personal">
                                            <strong>{{ ucwords(GoogleTranslate::justTranslate('Personal pathological history', $lang)) }}</strong>
                                        </li>
                                        {{-- <li id="confirm"><strong>Finish</strong></li> --}}
                                    </ul>
                                    <div class="d-flex justify-content-center pb-3">
                                        <div class="form-floating">
                                            <select class="form-select" id="selectFamilyM" required>
                                                <option selected disabled value="">
                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                </option>
                                                @php
                                                    $fMember = true;
                                                @endphp
                                                {{-- @if ($family != '[]')
                                                    @foreach ($family as $f)
                                                        @if ($f['clinical_history'] == null)
                                                            <option value="{{ $f['_id'] }}">
                                                                {{ $f['name'] . ' ' . $f['lastname'] }}
                                                            </option>
                                                        @else
                                                            @php
                                                                $fMember = false;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @if ($fMember == false)
                                                        <option disabled value="">
                                                            {{ ucwords(GoogleTranslate::justTranslate('There are no family members associated with your user', $lang)) }}
                                                        </option>
                                                    @endif
                                                @else
                                                    <option disabled value="">
                                                        {{ ucwords(GoogleTranslate::justTranslate('There are no family members associated with your user', $lang)) }}
                                                    </option>
                                                @endif --}}
                                            </select>
                                            <label
                                                for="selectFamilyM">{{ ucwords(GoogleTranslate::justTranslate('Family member', $lang)) }}</label>
                                        </div>
                                    </div>
                                    <!-- fieldsets -->
                                    <fieldset>
                                        <form class="validation" id="formHereditaryD" novalidate>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Hereditary Diseases', $lang)) }}
                                                        </h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Step 1 of 3', $lang)) }}
                                                        </h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 py-2">
                                                        <div class="row">
                                                            <div class="d-block">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchDiabetesRelative"
                                                                        onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchDiabetesRelative">{{ ucwords(GoogleTranslate::justTranslate('Diabetes', $lang)) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtDiabetesRelative"
                                                                title="{{ ucwords(GoogleTranslate::justTranslate('Diabetes Relatives', $lang)) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Mother', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Father', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Siblings', $lang)) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Grandparents', $lang)) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtDiabetesRelative" placeholder="Diabetes Relative"
                                                                disabled>
                                                            <label
                                                                for="txtDiabetesRelative">{{ ucwords(GoogleTranslate::justTranslate('Diabetes Relative', $lang)) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="row">
                                                            <div class="d-block">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchHypertensionRelative"
                                                                        onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchHypertensionRelative">{{ ucwords(GoogleTranslate::justTranslate('Hypertension', $lang)) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtHypertensionRelative"
                                                                title="{{ ucwords(GoogleTranslate::justTranslate('Hypertension Relatives', $lang)) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Mother', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Father', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Siblings', $lang)) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Grandparents', $lang)) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtHypertensionRelative"
                                                                placeholder="Hypertension Relative" disabled>
                                                            <label
                                                                for="txtHypertensionRelative">{{ ucwords(GoogleTranslate::justTranslate('Hypertension Relative', $lang)) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="row">
                                                            <div class="d-block">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchHIV"
                                                                        onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchHIV">{{ ucwords(GoogleTranslate::justTranslate('Human immunodeficiency virus', $lang)) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtHIV"
                                                                title="{{ ucwords(GoogleTranslate::justTranslate('Human immunodeficiency virus Relatives', $lang)) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Mother', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Father', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Siblings', $lang)) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Grandparents', $lang)) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtHIV"
                                                                placeholder="HIV" disabled>
                                                            <label
                                                                for="txtHIV">{{ ucwords(GoogleTranslate::justTranslate('HIV Relative', $lang)) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="row">
                                                            <div class="d-block">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchCancer"
                                                                        onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchCancer">{{ ucwords(GoogleTranslate::justTranslate('Cancer', $lang)) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtCancer"
                                                                title="{{ ucwords(GoogleTranslate::justTranslate('Cancer Relatives', $lang)) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Mother', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Father', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Siblings', $lang)) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Grandparents', $lang)) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtCancer"
                                                                placeholder="Cancer" disabled>
                                                            <label
                                                                for="txtCancer">{{ ucwords(GoogleTranslate::justTranslate('Cancer Relative', $lang)) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="row">
                                                            <div class="d-block">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchPsychiatric"
                                                                        onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchPsychiatric">{{ ucwords(GoogleTranslate::justTranslate('Psychiatric', $lang)) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtPsychiatric"
                                                                title="{{ ucwords(GoogleTranslate::justTranslate('Psychiatric Relatives', $lang)) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Mother', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Father', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Siblings', $lang)) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Grandparents', $lang)) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtPsychiatric" placeholder="Psychiatric" disabled>
                                                            <label
                                                                for="txtPsychiatric">{{ ucwords(GoogleTranslate::justTranslate('Psychiatric Relative', $lang)) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="row">
                                                            <div class="d-block">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchTuberculosis"
                                                                        onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchTuberculosis">{{ ucwords(GoogleTranslate::justTranslate('Tuberculosis', $lang)) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtTuberculosis"
                                                                title="{{ ucwords(GoogleTranslate::justTranslate('Tuberculosis Relatives', $lang)) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Mother', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Father', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Siblings', $lang)) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Grandparents', $lang)) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtTuberculosis" placeholder="Tuberculosis" disabled>
                                                            <label
                                                                for="txtTuberculosis">{{ ucwords(GoogleTranslate::justTranslate('Tuberculosis Relative', $lang)) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <input type="button" name="next" id="btnFirstStep"
                                            class="next action-button"
                                            value="{{ ucwords(GoogleTranslate::justTranslate('Next', $lang)) }}"
                                            style="display: none;" />
                                    </fieldset>
                                    <fieldset>
                                        <form class="validationNonPathAnt" id="formNonPathAnt" novalidate>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Non-pathological antecedents', $lang)) }}
                                                        </h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Step 2 of 3', $lang)) }}
                                                        </h2>
                                                    </div>
                                                    {{-- <div class="col-md-6 py-2">
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Dental Lavage', $lang)) }}
                                                    </h6>
                                                    <div class="form-floating">
                                                        <select class="form-select" id="txtDentalLavage" required>
                                                            <option selected disabled value="">
                                                                {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                            </option>
                                                            <option value="1">
                                                                {{ ucwords(GoogleTranslate::justTranslate('After each meal', $lang)) }}
                                                            </option>
                                                            <option value="2">
                                                                {{ ucwords(GoogleTranslate::justTranslate('3 times per day', $lang)) }}
                                                            </option>
                                                            <option value="3">
                                                                {{ ucwords(GoogleTranslate::justTranslate('2 times per day', $lang)) }}
                                                            </option>
                                                            <option value="4">
                                                                {{ ucwords(GoogleTranslate::justTranslate('1 times per day', $lang)) }}
                                                            </option>
                                                            <option value="5">
                                                                {{ ucwords(GoogleTranslate::justTranslate('Occasional per week', $lang)) }}
                                                            </option>
                                                            <option value="6">
                                                                {{ ucwords(GoogleTranslate::justTranslate('Not performed', $lang)) }}
                                                            </option>
                                                        </select>
                                                        <label
                                                            for="txtDentalLavage">{{ ucwords(GoogleTranslate::justTranslate('Dental Lavage', $lang)) }}</label>
                                                    </div>
                                                </div> --}}
                                                    {{-- <div class="col-md-6 py-2">
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Shower', $lang)) }}</h6>
                                                    <div class="form-floating">
                                                        <select class="form-select" id="txtShower" required>
                                                            <option selected disabled value="">
                                                                {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                            </option>
                                                            <option value="1">
                                                                {{ ucwords(GoogleTranslate::justTranslate('Daily', $lang)) }}
                                                            </option>
                                                            <option value="2">
                                                                {{ ucwords(GoogleTranslate::justTranslate('Every 2 or 3 days', $lang)) }}
                                                            </option>
                                                            <option value="3">
                                                                {{ ucwords(GoogleTranslate::justTranslate('1 time per week', $lang)) }}
                                                            </option>
                                                            <option value="4">
                                                                {{ ucwords(GoogleTranslate::justTranslate('Not performed', $lang)) }}
                                                            </option>
                                                        </select>
                                                        <label
                                                            for="txtShower">{{ ucwords(GoogleTranslate::justTranslate('Shower', $lang)) }}</label>
                                                    </div>
                                                </div> --}}
                                                    <div class="col-md-6 py-2">
                                                        <h6 class="fw-bolder py-2 pt-3">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Feeding', $lang)) }}
                                                        </h6>
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtFeeding" required>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Good in quality and quantity', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Fair in quality and quantity', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Poor in quality and quantity', $lang)) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtFeeding">{{ ucwords(GoogleTranslate::justTranslate('Feeding', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <h6 class="fw-bolder py-2 pt-3">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Water consumption', $lang)) }}
                                                        </h6>
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtWaterConsumption"
                                                                required>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('More than 3 liters per day', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('From 2 to 3 liters per day', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Less than 1 liter per day', $lang)) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtWaterConsumption">{{ ucwords(GoogleTranslate::justTranslate('Water consumption', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <h6 class="fw-bolder py-2 pt-3">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Sleeping time', $lang)) }}
                                                        </h6>
                                                        <div class="form-floating py-2">
                                                            <select class="form-select" id="txtSleepingT" required>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('8 or more hours of sleep', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('6 to 8 hours of sleep', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Less than 6 hours of sleep', $lang)) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtSleepingT">{{ ucwords(GoogleTranslate::justTranslate('Sleeping time', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        {{-- <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchPet"
                                                                        onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchPet">Pet</label>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                        <h6 class="fw-bolder py-2 pt-3">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Pet', $lang)) }}
                                                        </h6>
                                                        <select class="form-control selectpicker my-2" multiple
                                                            id="txtPet">
                                                            <option value="1">
                                                                {{ ucwords(GoogleTranslate::justTranslate('Dogs', $lang)) }}
                                                            </option>
                                                            <option value="2">
                                                                {{ ucwords(GoogleTranslate::justTranslate('Cats', $lang)) }}
                                                            </option>
                                                            <option value="3">
                                                                {{ ucwords(GoogleTranslate::justTranslate('Birds', $lang)) }}
                                                            </option>
                                                            <option value="4">
                                                                {{ ucwords(GoogleTranslate::justTranslate('Others', $lang)) }}
                                                            </option>
                                                        </select>
                                                        {{-- <label
                                                        for="txtPet">{{ ucwords(GoogleTranslate::justTranslate('Sleeping time', $lang)) }}</label> --}}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    {{-- <h6 class="fw-bolder py-2">
                                                    {{ ucwords(GoogleTranslate::justTranslate('Housing', $lang)) }}</h6>
                                                <div class="col-md-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="txtMaterial"
                                                            placeholder="{{ ucwords(GoogleTranslate::justTranslate('Material', $lang)) }}"
                                                            required>
                                                        <label
                                                            for="txtMaterial">{{ ucwords(GoogleTranslate::justTranslate('Material', $lang)) }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="txtRooms"
                                                            placeholder="{{ ucwords(GoogleTranslate::justTranslate('Rooms', $lang)) }}"
                                                            required>
                                                        <label
                                                            for="txtRooms">{{ ucwords(GoogleTranslate::justTranslate('Rooms', $lang)) }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="txtPeopleLivingIn"
                                                            placeholder="{{ ucwords(GoogleTranslate::justTranslate('PeopleLivingIn', $lang)) }}"
                                                            required>
                                                        <label
                                                            for="txtPeopleLivingIn">{{ ucwords(GoogleTranslate::justTranslate('People Living In', $lang)) }}</label>
                                                    </div>
                                                </div>
                                                <h6 class="fw-bolder py-2 pt-3">
                                                    {{ ucwords(GoogleTranslate::justTranslate('Services', $lang)) }}</h6>
                                                <div class="col-md-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="checkWater"
                                                            name="services" required>
                                                        <label class="form-check-label" for="checkWater">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Water', $lang)) }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="checkElectricity" name="services" required>
                                                        <label class="form-check-label" for="checkElectricity">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Electricity', $lang)) }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="checkDrainage" name="services" required>
                                                        <label class="form-check-label" for="checkDrainage">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Drainage', $lang)) }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="checkGas"
                                                            name="services" required>
                                                        <label class="form-check-label" for="checkGas">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Gas', $lang)) }}
                                                        </label>
                                                    </div>
                                                </div> --}}
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Alcholism', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkAlcoholism" name="radioAlc"
                                                                    onclick="enableFieldsAlch(this.id);">
                                                                <label class="form-check-label" for="checkAlcoholism">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkAlcoholismF" name="radioAlc" checked
                                                                    onclick="disableFieldsAlch(this.id);">
                                                                <label class="form-check-label"
                                                                    for="checkAlcoholismF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtAlcoholism" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('1 drink', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('2 drinks', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('More than 3 drinks', $lang)) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtAlcoholism">{{ ucwords(GoogleTranslate::justTranslate('Quantity', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectAlcoholism" required
                                                                disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Daily', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Weekly', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Biweekly', $lang)) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Occassional', $lang)) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="selectAlcoholism">{{ ucwords(GoogleTranslate::justTranslate('Frecuency', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Tabaquismo', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSmoking" name="radioSmk"
                                                                    onclick="enableFieldsSmok(this.id);">
                                                                <label class="form-check-label" for="checkSmoking">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSmokingF" name="radioSmk" checked
                                                                    onclick="disableFieldsSmok(this.id);">
                                                                <label class="form-check-label" for="checkSmokingF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtSmoking" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('1 cigarrette', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('2 to 4 cigarettes', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('More than 5 cigarrettes', $lang)) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtSmoking">{{ ucwords(GoogleTranslate::justTranslate('Quantity', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectSmoking" required
                                                                disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Daily', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Weekly', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Biweekly', $lang)) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Occassional', $lang)) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="selectAlcoholism">{{ ucwords(GoogleTranslate::justTranslate('Frecuency', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Drug adict', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkDrugAd" name="radioDrugAd"
                                                                    onclick="enableFieldsDrugAd(this.id);">
                                                                <label class="form-check-label" for="checkDrugAd">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkDrugAdF" name="radioDrugAd" checked
                                                                    onclick="disableFieldsDrugAd(this.id);">
                                                                <label class="form-check-label" for="checkDrugAdF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtDrugAd" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Marijuana', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Cocaine', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Methamphetamines', $lang)) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Opiates', $lang)) }}
                                                                </option>
                                                                <option value="5">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Other', $lang)) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtDrugAd">{{ ucwords(GoogleTranslate::justTranslate('Drug', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectDrugAd" required
                                                                disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Today', $lang)) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Less than 1 month', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Less than 6 months', $lang)) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Greater than 6 months', $lang)) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="selectDrugAd">{{ ucwords(GoogleTranslate::justTranslate('Last Consume', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Immunizations', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkImmunizations" name="radioImm"
                                                                    onclick="disableFieldImm();" checked>
                                                                <label class="form-check-label"
                                                                    for="checkImmunizations">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Complete', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkImmunizationsI" name="radioImm"
                                                                    onclick="enableFieldImm();">
                                                                <label class="form-check-label"
                                                                    for="checkImmunizationsI">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Incomplete', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtImmunizations"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Missing immunization', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtImmunizations">{{ ucwords(GoogleTranslate::justTranslate('Missing immunization', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Covid immunization', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkImmunizationsCV" name="radioImmCV"
                                                                    onclick="disableFieldImmCV();" checked>
                                                                <label class="form-check-label"
                                                                    for="checkImmunizationsCV">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Complete', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkImmunizationsICV" name="radioImmCV"
                                                                    onclick="enableFieldImmCV();">
                                                                <label class="form-check-label"
                                                                    for="checkImmunizationsICV">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Incomplete', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 py-2">
                                                        <div class="form-floating">
                                                            <input type="number" class="form-control"
                                                                id="txtImmunizationsCV" min="1" max="6"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Number of missing immunizations', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtImmunizationsCV">{{ ucwords(GoogleTranslate::justTranslate('Number of missing immunizations', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <input type="button" name="next" id="btnSecondStep"
                                            class="next action-button"
                                            value="{{ ucwords(GoogleTranslate::justTranslate('Next', $lang)) }}"
                                            id="btnSecondStep" />
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="{{ ucwords(GoogleTranslate::justTranslate('Previous', $lang)) }}" />
                                    </fieldset>
                                    <fieldset>
                                        <form class="validationPersonalPathHis" id="formPersonalPathHis" novalidate>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Personal pathological history', $lang)) }}
                                                        </h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">
                                                            {{ ucwords(GoogleTranslate::justTranslate('Step 3 of 3', $lang)) }}
                                                        </h2>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Allergy sufferers', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkAllergyPPH" name="radioAllergy">
                                                                <label class="form-check-label" for="checkAllergyPPH">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkAllergyPPHF" name="radioAllergy" checked>
                                                                <label class="form-check-label"
                                                                    for="checkAllergyPPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="repeater">
                                                        <div data-repeater-list="listAllergyPPH">
                                                            <div data-repeater-item class="divListAllergyPPH">
                                                                <div data-repeater-list="inner-list" class="row">
                                                                    <div class="col-md-11 py-2">
                                                                        <div class="form-floating">
                                                                            <input type="text"
                                                                                class="form-control allergyGroup"
                                                                                id="txtAllergyPPH"
                                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Allergy', $lang)) }}"
                                                                                disabled name="allergy">
                                                                            <label
                                                                                for="txtAllergyPPH">{{ ucwords(GoogleTranslate::justTranslate('Allergy', $lang)) }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1 py-2">
                                                                        <button name="dButton" data-repeater-delete
                                                                            type="button"
                                                                            class="btn btn-danger h-100 w-100 btn-circle"
                                                                            data-bs-toggle="tooltip"
                                                                            aria-label="{{ ucwords(GoogleTranslate::justTranslate('Remove allergy', $lang)) }}"><i
                                                                                class="fa-regular fa-trash-can"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button id="btnAllergyPPH" data-repeater-create type="button"
                                                            class="btn btn-primary rounded-pill">{{ ucwords(GoogleTranslate::justTranslate('Add allergy', $lang)) }}&nbsp;&nbsp;<i
                                                                class="fa-solid fa-plus"></i></button>
                                                    </div>
                                                    {{-- <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtAllergyPPH"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Medications', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtAllergy">{{ ucwords(GoogleTranslate::justTranslate('Medications', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txAllergyPPH"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Food', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txAllergy">{{ ucwords(GoogleTranslate::justTranslate('Food', $lang)) }}</label>
                                                        </div>
                                                    </div> --}}
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Diabetes', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkDiabetesPPH" name="radioDiab"
                                                                    onclick="enableFieldsDiabetes(this.id);">
                                                                <label class="form-check-label" for="checkDiabetes">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkDiabetesPPHF" name="radioDiab" checked
                                                                    onclick="disableFieldsDiabetes(this.id);">
                                                                <label class="form-check-label"
                                                                    for="checkDiabetesPPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectDiabetesPPH"
                                                                required
                                                                aria-label="{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectDiabetesPPH">{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtDiabetesPPH"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtDiabetesPPH">{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Hypertension', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkHyperPPH" name="radioHyp"
                                                                    onclick="enableFieldsHyper(this.id);">
                                                                <label class="form-check-label" for="checkHyperPPH">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkHyperPPHF" name="radioHyp" checked
                                                                    onclick="disableFieldsHyper(this.id);">
                                                                <label class="form-check-label" for="checkHyperPPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectHyperPPH" required
                                                                aria-label="{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectHyperPPH">{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtHyperPPH"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtHyperPPH">{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Surgeries', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSurgerPPH" name="radioSur">
                                                                <label class="form-check-label" for="checkSurgerPPH">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSurgerPPHF" name="radioSur" checked>
                                                                <label class="form-check-label" for="checkSurgerPPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="repeater">
                                                        <div data-repeater-list="listSurgerPPH">
                                                            <div data-repeater-item class="divListSurgerPPH">
                                                                <div data-repeater-list="inner-list" class="row">
                                                                    <div class="col-md-6 py-2">
                                                                        <div class="form-floating">
                                                                            <input type="text"
                                                                                class="form-control surgerGroup"
                                                                                id="txtSurgerPPH"
                                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Motive', $lang)) }}"
                                                                                disabled name="motive">
                                                                            <label
                                                                                for="txtSurgerPPH">{{ ucwords(GoogleTranslate::justTranslate('Motive', $lang)) }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-5 py-2">
                                                                        <div class="form-floating">
                                                                            <input type="text"
                                                                                class="form-control surgerGroup"
                                                                                id="txSurgerPPH"
                                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Antiquity', $lang)) }}"
                                                                                disabled name="antiquity">
                                                                            <label
                                                                                for="txSurgerPPH">{{ ucwords(GoogleTranslate::justTranslate('Antiquity', $lang)) }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1 py-2">
                                                                        <button name="dButton" data-repeater-delete
                                                                            type="button"
                                                                            class="btn btn-danger h-100 w-100 btn-circle"
                                                                            data-bs-toggle="tooltip"
                                                                            aria-label="{{ ucwords(GoogleTranslate::justTranslate('Remove surgery', $lang)) }}"><i
                                                                                class="fa-regular fa-trash-can"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button id="btnSurgerPPH" data-repeater-create type="button"
                                                            class="btn btn-primary rounded-pill">{{ ucwords(GoogleTranslate::justTranslate('Add surgery', $lang)) }}&nbsp;&nbsp;<i
                                                                class="fa-solid fa-plus"></i></button>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Fractures', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkFracturePPH" name="radioFractures">
                                                                <label class="form-check-label"
                                                                    for="checkFracturePPH">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkFracturePPHF" name="radioFractures"
                                                                    checked>
                                                                <label class="form-check-label"
                                                                    for="checkFracturePPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="repeater">
                                                        <div data-repeater-list="listFracturePPH">
                                                            <div data-repeater-item class="divListFracturePPH">
                                                                <div data-repeater-list="inner-list" class="row">
                                                                    <div class="col-md-6 py-2">
                                                                        <div class="form-floating">
                                                                            <input type="text"
                                                                                class="form-control fractureGroup"
                                                                                id="txtFracturePPH"
                                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Motive', $lang)) }}"
                                                                                disabled name="motive">
                                                                            <label
                                                                                for="txtFracturePPH">{{ ucwords(GoogleTranslate::justTranslate('Motive', $lang)) }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-5 py-2">
                                                                        <div class="form-floating">
                                                                            <input type="text"
                                                                                class="form-control fractureGroup"
                                                                                id="txFracturePPH"
                                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Antiquity', $lang)) }}"
                                                                                disabled name="antiquity">
                                                                            <label
                                                                                for="txFracturePPH">{{ ucwords(GoogleTranslate::justTranslate('Antiquity', $lang)) }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1 py-2">
                                                                        <button name="dButton" data-repeater-delete
                                                                            type="button"
                                                                            class="btn btn-danger h-100 w-100 btn-circle"
                                                                            data-bs-toggle="tooltip"
                                                                            aria-label="{{ ucwords(GoogleTranslate::justTranslate('Remove fracture', $lang)) }}"><i
                                                                                class="fa-regular fa-trash-can"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button id="btnFracturePPH" data-repeater-create
                                                            type="button"
                                                            class="btn btn-primary rounded-pill">{{ ucwords(GoogleTranslate::justTranslate('Add fracture', $lang)) }}&nbsp;&nbsp;<i
                                                                class="fa-solid fa-plus"></i></button>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Seizures', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSeizPPH" name="radioSeiz"
                                                                    onclick="enableFieldsSeizures(this.id);">
                                                                <label class="form-check-label" for="checkSeizPPH">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSeizPPHF" name="radioSeiz" checked
                                                                    onclick="disableFieldsSeizures(this.id);">
                                                                <label class="form-check-label" for="checkSeizPPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectSeizPPH" required
                                                                aria-label="{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectSeizPPH">{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtSeizPPH"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtSeizPPH">{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Pulmonary diseases', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkPulmonPPH" name="radioPulmon"
                                                                    onclick="enableFieldsPulmonary(this.id);">
                                                                <label class="form-check-label"
                                                                    for="checkPulmonaryPPH">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkPulmonPPHF" name="radioPulmon" checked
                                                                    onclick="disableFieldsPulmonary(this.id);">
                                                                <label class="form-check-label"
                                                                    for="checkPulmonaryPPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectPulmonPPH" required
                                                                aria-label="{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectPulmonPPH">{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtPulmonPPH"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtPulmonPPH">{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Cardiacal diseases', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkCardPPH" name="radioCardiacal"
                                                                    onclick="enableFieldsCardiacal(this.id);">
                                                                <label class="form-check-label" for="checkCardPPH">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkCardPPHF" name="radioCardiacal" checked
                                                                    onclick="disableFieldsCardiacal(this.id);">
                                                                <label class="form-check-label" for="checkCardPPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectCardPPH" required
                                                                aria-label="{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectCardPPH">{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtCardPPH"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtCardPPH">{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Kidney diseases', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkKidneyPPH" name="radioKidney"
                                                                    onclick="enableFieldsKidney(this.id);">
                                                                <label class="form-check-label" for="checkKidneyPPH">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkKidneyPPHF" name="radioKidney" checked
                                                                    onclick="disableFieldsKidney(this.id);">
                                                                <label class="form-check-label" for="checkKidneyPPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectKidneyPPH" required
                                                                aria-label="{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectKidneyPPH">{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtKidneyPPH"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtKidneyPPH">{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Psychiatric diseases', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkPsychPPH" name="radioPsych"
                                                                    onclick="enableFieldsPsych(this.id);">
                                                                <label class="form-check-label" for="checkPsychPPH">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkPsychPPHF" name="radioPsych" checked
                                                                    onclick="disableFieldsPsych(this.id);">
                                                                <label class="form-check-label" for="checkPsychPPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectPsychPPH" required
                                                                aria-label="{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectPsychPPH">{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtPsychPPH"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtPsychPPH">{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Transfusions', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkTransPPH" name="radioTrans"
                                                                    onclick="enableFieldsTrans(this.id);">
                                                                <label class="form-check-label" for="checkTransPPH">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkTransPPHF" name="radioTrans" checked
                                                                    onclick="disableFieldsTrans(this.id);">
                                                                <label class="form-check-label" for="checkTransPPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectTransPPH" required
                                                                aria-label="{{ ucwords(GoogleTranslate::justTranslate('Post-transfusion reactions', $lang)) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </option>
                                                                <option value="0">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="selectTransPPH">{{ ucwords(GoogleTranslate::justTranslate('Post-transfusion reactions', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtTransPPH"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Antiquity', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtTransPPH">{{ ucwords(GoogleTranslate::justTranslate('Antiquity', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Hematic diseases', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkHematPPH" name="radioHemat"
                                                                    onclick="enableFieldsHematic(this.id);">
                                                                <label class="form-check-label" for="checkHematPPH">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkHematPPHF" name="radioHemat" checked
                                                                    onclick="disableFieldsHematic(this.id);">
                                                                <label class="form-check-label" for="checkHematPPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectHematPPH" required
                                                                aria-label="{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectHematPPH">{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtHematPPH"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtHematPPH">{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Rheumatic diseases', $lang)) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="d-block">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkRheumPPH" name="radioRheum"
                                                                    onclick="enableFieldsRheum(this.id);">
                                                                <label class="form-check-label" for="checkRheumPPH">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Yes', $lang)) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkRheumPPHF" name="radioRheum" checked
                                                                    onclick="disableFieldsRheum(this.id);">
                                                                <label class="form-check-label" for="checkRheumPPHF">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('No', $lang)) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectRheumPPH" required
                                                                aria-label="{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', $lang)) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectRheumPPH">{{ ucwords(GoogleTranslate::justTranslate('Diagnosis year', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtRheumPPH"
                                                                placeholder="{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}"
                                                                disabled>
                                                            <label
                                                                for="txtRheumPPH">{{ ucwords(GoogleTranslate::justTranslate('Current treatment', $lang)) }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Previous" />
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill"
                        data-bs-dismiss="modal">{{ ucwords(GoogleTranslate::justTranslate('Close window', $lang)) }}</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalRecipe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        {{ GoogleTranslate::justTranslate('Recipe', $lang) }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="w-100">
                                <div class="row mb-4">
                                </div>
                                <label id="txtEach"
                                    style="display: none;">{{ GoogleTranslate::justTranslate('each', $phpVar1) }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"
                                        {{-- style="margin: 15px 0px 0px 0px;width: 15rem; height: 2.5rem;" --}}>{{ GoogleTranslate::justTranslate('Recipe language', $lang) }}</span>
                                    <select class="form-select" aria-label="Default select example"
                                        id="sltPDFLenaguaje21" {{-- style="margin: 15px 0px 0px 0px;float:left; width: 4rem; height: 2.5rem;" --}} onchange="recuperarValor();">
                                        <option value="0" disabled selected>
                                            {{ GoogleTranslate::justTranslate('Select the language', $lang) }}
                                        </option>
                                        <option value="en">
                                            {{ GoogleTranslate::justTranslate('English', $lang) }}
                                        </option>
                                        <option value="es">
                                            {{ GoogleTranslate::justTranslate('Spanish', $lang) }}
                                        </option>
                                        <option value="pt">
                                            {{ GoogleTranslate::justTranslate('Portugués', $lang) }}
                                        </option>
                                        <option value="zh">
                                            {{ GoogleTranslate::justTranslate('Chinese', $lang) }}
                                        </option>
                                        <option value="ja">
                                            {{ GoogleTranslate::justTranslate('Japanese', $lang) }}
                                        </option>
                                        <option value="it">
                                            {{ GoogleTranslate::justTranslate('Italian', $lang) }}
                                        </option>
                                    </select>
                                </div><br>
                                <form class="validation-add-info-recipe g-3" id="formInfoRecipe">
                                    <h1 class="card-title fs-3 py-2">
                                        {{ GoogleTranslate::justTranslate('Recipe Information', $lang) }}
                                    </h1>
                                    <div class="row">
                                        <div class="col-md-12 pb-2">
                                            <label for="txtObservations" class="form-label">
                                                {{ GoogleTranslate::justTranslate('Observations', $lang) }}</label>
                                            <textarea type="text" class="form-control" id="txtObservations" rows="3" required=""></textarea>
                                        </div>
                                        <div class="col-md-4 pb-2">
                                            <label for="txtHeartR" class="form-label">
                                                {{ GoogleTranslate::justTranslate('Heart Rate', $lang) }}</label>
                                            <input type="text" class="form-control" id="txtHeartR"
                                                required="">
                                        </div>
                                        <div class="col-md-4 pb-2">
                                            <label for="txtRheumF" class="form-label">
                                                {{ ucwords(GoogleTranslate::justTranslate('Rheumatoid Factor', $lang)) }}</label>
                                            <input type="text" class="form-control" id="txtRheumF"
                                                required="">
                                        </div>
                                        <div class="col-md-4 pb-2">
                                            <label for="txtPulse" class="form-label">
                                                {{ GoogleTranslate::justTranslate('Pulso', $lang) }}</label>
                                            <input type="text" class="form-control" id="txtPulse"
                                                required="">
                                        </div>
                                        <div class="col-md-4 pb-2">
                                            <label for="txtTemp" class="form-label">
                                                {{ GoogleTranslate::justTranslate('Temperature', $lang) }}</label>
                                            <input type="text" class="form-control" id="txtTemp"
                                                required="">
                                        </div>
                                        <div class="col-md-4 pb-2">
                                            <label for="txtBloodPress" class="form-label">
                                                {{ GoogleTranslate::justTranslate('Blood pressure', $lang) }}</label>
                                            <input type="text" class="form-control" id="txtBloodPress"
                                                required="">
                                        </div>
                                        <div class="col-md-4 pb-2">
                                            <label for="txtWeight" class="form-label">
                                                {{ GoogleTranslate::justTranslate('Weight', $lang) }}</label>
                                            <input type="text" class="form-control" id="txtWeight"
                                                required="">
                                        </div>
                                        <div class="col-md-4 pb-2">
                                            <label for="txtSize" class="form-label">
                                                {{ GoogleTranslate::justTranslate('Size', $lang) }}</label>
                                            <input type="text" class="form-control" id="txtSize"
                                                required="">
                                        </div>
                                        <div class="col-md-4 pb-2">
                                            <label for="txtIMC" class="form-label">
                                                {{ GoogleTranslate::justTranslate('Body mass index', $lang) }}</label>
                                            <input type="text" class="form-control" id="txtIMC"
                                                required="">
                                        </div>
                                        <div class="col-md-4 pb-2">
                                            <label for="txtOxBlood" class="form-label">
                                                {{ GoogleTranslate::justTranslate('Oxygen in the blood', $lang) }}</label>
                                            <input type="text" class="form-control" id="txtOxBlood"
                                                required="">
                                        </div>
                                        <div class="col-md-6 pb-2">
                                            <label for="txtAllergies" class="form-label">
                                                {{ ucwords(GoogleTranslate::justTranslate('Alergias ', $lang)) }}</label>
                                            <textarea type="text" class="form-control" id="txtAllergies" rows="4" required=""></textarea>
                                        </div>
                                        <div class="col-md-6 pb-2">
                                            <label for="txtPregnancy" class="form-label">
                                                {{ GoogleTranslate::justTranslate('Embarazo ', $lang) }}</label>
                                            <textarea type="text" class="form-control" id="txtPregnancy" rows="4" required=""></textarea>
                                        </div>
                                        <div class="col-md-6 pb-2">
                                            <label for="txtSymptomatology" class="form-label">
                                                {{ ucwords(GoogleTranslate::justTranslate('Sintomatología ', $lang)) }}</label>
                                            <textarea type="text" class="form-control" id="txtSymptomatology" rows="4" required=""></textarea>
                                        </div>
                                        <div class="col-md-6 pb-2">
                                            <label for="txtDiagnosis" class="form-label">
                                                {{ GoogleTranslate::justTranslate('Diagnosis ', $lang) }}</label>
                                            <textarea type="text" class="form-control" id="txtDiagnosis" rows="4" required=""></textarea>
                                        </div>
                                        <div class="d-block pt-2 pb-2">
                                            <button type="submit" class="btn btn-primary float-end rounded-pill"
                                                onclick="submitAddMedications(1)">
                                                {{ GoogleTranslate::justTranslate('Save Recipe Info', $lang) }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <h1 class="card-title fs-3 py-2">
                                    {{ GoogleTranslate::justTranslate('Add Medications', $lang) }}</h1>
                                <form class="validation-add-recipes row g-3" id="formReipes">
                                    <div class="col-md-6">
                                        <label for="txtNameMedicine"
                                            class="form-label">{{ GoogleTranslate::justTranslate('Name of the medicine', $lang) }}</label>
                                        <input type="text" class="form-control" id="txtNameMedicine" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="txtQuantity"
                                            class="form-label">{{ GoogleTranslate::justTranslate('Quantity', $lang) }}</label>
                                        <input type="number" class="form-control" id="txtQuantity" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="txtPresentation"
                                            class="form-label">{{ GoogleTranslate::justTranslate('Presentation', $lang) }}</label>
                                        <select name="" id="sltPresent" class="form-select" required>
                                            <option value="" disabled selected>
                                                {{ GoogleTranslate::justTranslate('Select the presentation', $lang) }}
                                            </option>
                                            <option
                                                value="{{ GoogleTranslate::justTranslate('Tablet', $phpVar1) }}">
                                                {{ GoogleTranslate::justTranslate('Tablet', $lang) }}
                                            </option>
                                            <option
                                                value="{{ GoogleTranslate::justTranslate('Gragea', $phpVar1) }}">
                                                {{ GoogleTranslate::justTranslate('Gragea', $lang) }}
                                            </option>
                                            <option value="{{ GoogleTranslate::justTranslate('Pill', $phpVar1) }}">
                                                {{ GoogleTranslate::justTranslate('Pill', $lang) }}
                                            </option>
                                            <option value="{{ GoogleTranslate::justTranslate('Drops', $phpVar1) }}">
                                                {{ GoogleTranslate::justTranslate('Drops', $lang) }}
                                            </option>
                                            <option value="{{ GoogleTranslate::justTranslate('Syrup', $phpVar1) }}">
                                                {{ GoogleTranslate::justTranslate('Syrup', $lang) }}
                                            </option>
                                            <option
                                                value="{{ GoogleTranslate::justTranslate('Solution', $phpVar1) }}">
                                                {{ GoogleTranslate::justTranslate('Solution', $lang) }}
                                            </option>
                                            <option
                                                value="{{ GoogleTranslate::justTranslate('Injectable', $phpVar1) }}">
                                                {{ GoogleTranslate::justTranslate('Injectable', $lang) }}
                                            </option>
                                            <option
                                                value="{{ GoogleTranslate::justTranslate('Vaginal Tablet', $phpVar1) }}">
                                                {{ GoogleTranslate::justTranslate('Vaginal Tablet', $lang) }}
                                            </option>
                                            <option
                                                value="{{ GoogleTranslate::justTranslate('Vaginal Ovum', $phpVar1) }}">
                                                {{ GoogleTranslate::justTranslate('Vaginal Ovum', $lang) }}
                                            </option>
                                            <option
                                                value="{{ GoogleTranslate::justTranslate('Capsules', $phpVar1) }}">
                                                {{ GoogleTranslate::justTranslate('Capsules', $lang) }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="txtDose"
                                            class="form-label">{{ GoogleTranslate::justTranslate('Dose', $lang) }}</label>
                                        <input type="number" class="form-control" id="txtDose" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="txtMeasure"
                                            class="form-label">{{ GoogleTranslate::justTranslate('Measure', $lang) }}</label>
                                        <select id="sltMeasure" class="form-select" required>
                                            <option value="" disabled selected>
                                                {{ GoogleTranslate::justTranslate('Select the measure', $lang) }}
                                            </option>
                                            <option value="mg">mg</option>
                                            <option value="ml">ml</option>
                                            <option value="gr">gr</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span
                                                class="input-group-text">{{ GoogleTranslate::justTranslate('Frequency', $lang) }}</span>
                                            <input type="text" class="form-control" id="txtFrequency"
                                                placeholder="{{ GoogleTranslate::justTranslate('Quantity', $lang) }}"
                                                required>
                                            <select id="sltFrequency" class="form-select" required>
                                                <option value="" disabled selected>
                                                    {{ GoogleTranslate::justTranslate('Select the frequency', $lang) }}
                                                </option>
                                                <option
                                                    value="{{ GoogleTranslate::justTranslate('Hour', $phpVar1) }}">
                                                    {{ GoogleTranslate::justTranslate('Hour', $lang) }}
                                                </option>
                                                <option
                                                    value="{{ GoogleTranslate::justTranslate('Day', $phpVar1) }}">
                                                    {{ GoogleTranslate::justTranslate('Day', $lang) }}
                                                </option>
                                                <option
                                                    value="{{ GoogleTranslate::justTranslate('Month', $phpVar1) }}">
                                                    {{ GoogleTranslate::justTranslate('Month', $lang) }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span
                                                class="input-group-text">{{ GoogleTranslate::justTranslate('Duration', $lang) }}</span>
                                            <input type="number" class="form-control" id="txtDuration" required>
                                            <select id="sltLenguaje" class="form-select" required>
                                                <option value="" disabled selected>
                                                    {{ GoogleTranslate::justTranslate('Select the duration', $lang) }}
                                                </option>
                                                <option
                                                    value="{{ GoogleTranslate::justTranslate('Hour', $phpVar1) }}">
                                                    {{ GoogleTranslate::justTranslate('Hour', $lang) }}
                                                </option>
                                                <option
                                                    value="{{ GoogleTranslate::justTranslate('Day', $phpVar1) }}">
                                                    {{ GoogleTranslate::justTranslate('Day', $lang) }}
                                                </option>
                                                <option
                                                    value="{{ GoogleTranslate::justTranslate('Week', $phpVar1) }}">
                                                    {{ GoogleTranslate::justTranslate('Week', $lang) }}
                                                </option>
                                                <option
                                                    value="{{ GoogleTranslate::justTranslate('Month', $phpVar1) }}">
                                                    {{ GoogleTranslate::justTranslate('Month', $lang) }}
                                                </option>
                                                <option
                                                    value="{{ GoogleTranslate::justTranslate('Treatment', $phpVar1) }}">
                                                    {{ GoogleTranslate::justTranslate('Treatment', $lang) }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <button id="btnForm" type="submit" style="display: none;"></button>
                                        <button type="button" class="btn btn-primary rounded-pill"
                                            style="float:right;" onclick="submitAddMedications(2);">
                                            {{ GoogleTranslate::justTranslate('Add medication', $lang) }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12 pt-3">
                                <div class="d-flex w-100 h-100">
                                    <div class="row g-3 w-100">
                                        <h1 class="card-title fs-3 ps-2">
                                            {{ ucwords(GoogleTranslate::justTranslate('Medications', $lang)) }}
                                        </h1>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr align="center">
                                                        <th scope="col" style="width: 33.33%">
                                                            {{ GoogleTranslate::justTranslate('Name of the medicine', $lang) }}
                                                        </th>
                                                        <th scope="col" style="width: 33.33%">
                                                            {{ GoogleTranslate::justTranslate('Dose', $lang) }}
                                                        </th>
                                                        <th scope="col" style="width: 33.33%">
                                                            {{ GoogleTranslate::justTranslate('Frequency', $lang) }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbTableRecipes" align="center">
                                                    <tr class="align-middle">
                                                        <td colspan="3">
                                                            {{ ucwords(GoogleTranslate::justTranslate('There are no records', $lang)) }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block pt-3">
                                <button type="button" class="btn btn-primary float-end rounded-pill"
                                    style="float:right;" {{-- data-bs-toggle="modal" data-bs-target="#modalRecetaPDF" --}}
                                    onclick="printRecipe();">{{ GoogleTranslate::justTranslate('Generate Recipe', $lang) }}</button>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Aqui se genera el pdf --}}
                <div class="row" style="display: none;">
                    <div class="col-10 mt-5 m-5" id="divExportPDF">
                        <div class="row d-flex align-items-center">
                            <div class="d-block py-3">
                                <img src="{{ asset('img/MedicaAlfil.png') }}" alt="Medica Alfil"
                                    style="width: 22rem;">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-6">
                                <h5 style="font-size: 1.1rem;">
                                    <b>{{ GoogleTranslate::justTranslate('Type of Attention', $phpVar1) }}:</b>
                                    Consulta General
                                </h5><br><br>

                                <h5 style="margin-top: -3.4rem; font-size: 1rem;"><b>Type of Attention</b></h5>
                                <br><br>

                                <h5 style="margin-top: -1.5rem; font-size: 1.1rem;">
                                    <b>{{ GoogleTranslate::justTranslate('Name', $phpVar1) }}:</b>
                                    {{ $quotation['person']['name'] }}
                                </h5> <br><br>

                                <h5 style="margin-top: -3.4rem; font-size: 1rem;"><b>Name</b></h5><br><br>

                                <h5 style="margin-top: -1.5rem; font-size: 1.1rem;">
                                    <b>{{ GoogleTranslate::justTranslate("Physician's name", $phpVar1) }}:</b>
                                    {{ $quotation->infoQuotation['name'] }}
                                </h5><br><br>

                                <h5 style="margin-top: -3.4rem; font-size: 1rem;"><b>Physician's name</b></h5>
                                <br><br>
                            </div>
                            <div class="col-6">
                                <b>{{ GoogleTranslate::justTranslate('Date', $phpVar1) }}:</b>
                                {{ $quotation->date }} <br><br>

                                <h5 style="margin-top: -1rem; font-size: 1rem;"><b>Date</b></h5><br><br>

                                <h5 style="margin-top: -1.5rem; font-size: 1.1rem;">
                                    <b>{{ GoogleTranslate::justTranslate('Last name', $phpVar1) }}:</b>
                                    {{ $quotation->person->lastname }}
                                </h5><br><br>

                                <h5 style="margin-top: -3.4rem; font-size: 1rem;"><b>Last name</b></h5><br><br>
                            </div>
                        </div><br><br>
                        <div class="row" style="background-color: #3AA6F0;" align="center">
                            <div class="col-12" style="color: #FFFFFF">
                                <b>{{ GoogleTranslate::justTranslate('Observations', $phpVar1) }}</b>
                                <b> - Observations</b>
                            </div>
                        </div>
                        <div class="row" style="border: 0.1rem solid #000;" align="center">
                            <div class="col-12" id="txtObservacionesPDF">
                                <p id="lblObservations">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Numquam, facilis maiores
                                    repellat
                                    libero, rerum voluptates reiciendis sint sequi ut eligendi quisquam, possimus
                                    dolorem ipsa nihil
                                    vero saepe ullam minus odio.</p>
                            </div>
                        </div><br>
                        <div class="row" style="background-color: #3AA6F0;" align="center">
                            <div class="col-12" style="color: #FFFFFF">
                                <b>{{ GoogleTranslate::justTranslate('Vital Signs', $phpVar1) }}</b>
                                <b> - Vital Signs</b>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-2">
                                <b>F.C.:</b>
                                <p id="lblHeartRate">11</p>
                                <b>Peso:</b>
                                <p id="lblWeight">11 kg</p>
                            </div>
                            <div class="col-2">
                                <b>F.R.:</b>
                                <p id="lblRheumatoidF">111</p>
                                <b>Talla:</b>
                                <p id="lblSize">111</p>
                            </div>
                            <div class="col-2">
                                <b>Pulso:</b>
                                <p id="lblPulse">1111</p>
                                <b>IMC:</b>
                                <p id="lblBodyMassI">Aaaa</p>
                            </div>
                            <div class="col-3">
                                <b>Temperatura:</b>
                                <p id="lblTemp">35 °C</p>
                            </div>
                            <div class="col-2">
                                <b>T/A:</b>
                                <p id="lblBloodPress">117/70</p>
                                <b>Sat. Ox.:</b>
                                <p id="lblOxygen">Ox</p>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-12">
                                <b>{{ GoogleTranslate::justTranslate('Allergies', $phpVar1) }} - Allergies:</b>
                                <p id="lblAllergies">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque quaerat mollitia
                                    tenetur nam. Suscipit quis amet dignissimos! Facere placeat voluptatem in illum id.
                                    Blanditiis vero
                                    perspiciatis sequi! Commodi, unde dicta.
                                <p>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-12">
                                <b>{{ GoogleTranslate::justTranslate('Pregnancy', $phpVar1) }} - Pregnancy:</b>
                                <p id="lblPregnancy">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque quaerat mollitia
                                    tenetur nam. Suscipit quis amet dignissimos! Facere placeat voluptatem in illum id.
                                    Blanditiis vero
                                    perspiciatis sequi! Commodi, unde dicta.
                                <p>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-12">
                                <b>{{ GoogleTranslate::justTranslate('Symptomatology', $phpVar1) }} -
                                    Symptomatology:</b> Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                <p id="lblSymptomatology">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque quaerat mollitia
                                    tenetur nam. Suscipit quis amet dignissimos! Facere placeat voluptatem in illum id.
                                    Blanditiis vero
                                    perspiciatis sequi! Commodi, unde dicta.
                                <p>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-12">
                                <b>{{ GoogleTranslate::justTranslate('Diagnosis', $phpVar1) }} - Diagnosis:</b>
                                <p id="lblDiagnosis">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque quaerat mollitia
                                    tenetur nam. Suscipit quis amet dignissimos! Facere placeat voluptatem in illum id.
                                    Blanditiis vero
                                    perspiciatis sequi! Commodi, unde dicta.
                                <p>
                            </div>
                        </div><br><br>

                        <div align="center">
                            <h1>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                                - - -</h1><br>
                        </div>

                        <div class="row" align="center">
                            <div class="col-12">
                                <b
                                    style="font-size: 2.8rem;">{{ GoogleTranslate::justTranslate('Recipe', $phpVar1) }}</b><b
                                    style="font-size: 1.4rem;"> - Recipe</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div style="height: auto; margin-top: 2.5rem;">
                                    <table class="table table-hover spacing8" style="font-size: large;">
                                        <thead
                                            style="position: sticky; top: -1px; background-color:white; border-top:1px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 33.33%">
                                                        {{ GoogleTranslate::justTranslate('Name of the medicine', $phpVar1) }}

                                                        <br>

                                                        <b style="font-size: 0.8rem;">Name of the medicine</b>
                                                    </th>
                                                    <th scope="col" style="width: 33.33%">
                                                        {{ GoogleTranslate::justTranslate('Dose', $phpVar1) }}

                                                        <br>

                                                        <b style="font-size: 0.8rem;">Dose</b>
                                                    </th>
                                                    <th scope="col" style="width: 33.33%">
                                                        {{ GoogleTranslate::justTranslate('Frequency', $phpVar1) }}

                                                        <br>

                                                        <b style="font-size: 0.8rem;">Frequency</b>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </thead>
                                        <tbody id="tbRecetaPDF">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><br><br><br><br><br>

                        <div align="center">
                            <p>____________________________________________________________________</p>
                        </div>
                        <div class="row" style="text-align:center;">
                            <div class="col-12">
                                <b
                                    class="d-block">{{ GoogleTranslate::justTranslate('Nombre y cédula del médico', $phpVar1) }}</b>
                                <b class="d-block">Physician's name and ID number</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">
                        {{ GoogleTranslate::justTranslate('Close Window', $lang) }}</button>
                </div>
            </div>
        </div>
    </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"
        integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <script>
        (() =>
        {
            $('.repeater').repeater({
                isFirstItemUndeletable: true,
            });
        })();
    </script>
    <script src="{{ asset('js/clinicalobfus.js') }}"></script>
    <script src="{{ asset('js/recipesobfus.js') }}"></script>
    <script>
		window.onbeforeunload = e =>
		{
			$('#overlay').show("slow");
            $('#img').show("slow");
			return undefined;
		};
	</script>
    <script>
        const exitDoctor = () =>
        {
            Swal.fire({
                icon: "warning",
                title: "{{ GoogleTranslate::justTranslate('Are you sure?', $lang) }}",
                text: "{{ GoogleTranslate::justTranslate('This action cannot be undone', $lang) }}",
                showCancelButton: true,
                confirmButtonText: '{{ GoogleTranslate::justTranslate('Yes', $lang) }}',
                cancelButtonText: '{{ GoogleTranslate::justTranslate('Cancel', $lang) }}'
            }).then(result =>
            {
                if (result.isConfirmed)
                {
                    window.location.href = '{{ url('/doctor/exit') }}'
                }
            });
        }
    </script>
</body>

</html>
