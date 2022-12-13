@extends('layout.layout')
@section('title')
    {{ GoogleTranslate::justTranslate('Clinical History', app()->getLocale()) }}
@endsection
@section('pagetitle')
    {{ GoogleTranslate::justTranslate('Clinical History', app()->getLocale()) }}
    <button type="button" class="btn btn-primary float-end rounded-pill rounded-pill" data-bs-toggle="modal"
        data-bs-target="#modalNew">{{ GoogleTranslate::justTranslate('New Clinical Historie', app()->getLocale()) }}</button>
@endsection
@section('links')
    <style>
        p {
            color: grey;
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
    <script src="{{ asset('js/clinical.js') }}"></script>
    <script type="text/javascript">
        const castArrayToJSON = callback =>
        {
            let family = [];
            family = @json($family);
            callback(family);
        }
    </script>
@endsection
@section('content')
    <div class="row">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-pend" data-bs-toggle="tab" data-bs-target="#tab-pend-pane"
                    type="button" role="tab" aria-controls="tab-pend-pane"
                    aria-selected="true">{{ GoogleTranslate::justTranslate('Pending histories', app()->getLocale()) }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-historie" data-bs-toggle="tab" data-bs-target="#tab-historie-pane"
                    type="button" role="tab" aria-controls="tab-historie-pane"
                    aria-selected="false">{{ GoogleTranslate::justTranslate('Clinical Histories', app()->getLocale()) }}</button>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane"
                    aria-selected="false">{{ GoogleTranslate::justTranslate('Contact', app()->getLocale()) }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane"
                    type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false"
                    disabled>Disabled</button>
            </li> --}}
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-pend-pane" role="tabpanel" aria-labelledby="tab-pend"
                tabindex="0">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">
                                    {{ GoogleTranslate::justTranslate('Name', app()->getLocale()) }}</th>
                                <th scope="col">
                                    {{ GoogleTranslate::justTranslate('Progress', app()->getLocale()) }}
                                </th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($family as $f)
                                @if ($f->clinical_history != null && $f->clinical_history['progress'] < 100)
                                    <tr>
                                        <td class="align-middle">{{ $f->name . ' ' . $f->lastname }}</td>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div style="max-width: 80px;" id="progressBarCircle-{{ $f->_id }}">
                                                </div>
                                            </div>
                                        </td>
                                        @if ($f->clinical_history['progress'] < 100)
                                            <td class="align-middle">
                                                <button class="btn btn-primary btn-circle" data-bs-toggle="tooltip"
                                                    data-bs-toggle="tooltip"
                                                    onclick="completeClinicalH('{{ $f->_id }}');"
                                                    title="{{ GoogleTranslate::justTranslate('Complete medical history', app()->getLocale()) }}"><i
                                                        class="fas fa-spinner"></i></button>
                                            </td>
                                        @else
                                            <td class="align-middle">
                                                <button class="btn btn-success btn-circle" data-bs-toggle="tooltip"
                                                    data-bs-toggle="tooltip"
                                                    title="{{ GoogleTranslate::justTranslate('Medical history completed', app()->getLocale()) }}"><i
                                                        class="fa-solid fa-check"></i></button>
                                            </td>
                                        @endif
                                    </tr>
                                    @if ($loop->index == sizeof($family) - 1)
                                        <script>
                                            castArrayToJSON(generateProgressBars);
                                        </script>
                                    @endif
                                @else
                                    @if ($loop->index == 0)
                                        <tr>
                                            <td class="align-middle" colspan="3">No hay registros</td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-historie-pane" role="tabpanel" aria-labelledby="tab-historie" tabindex="0">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="d-block py-3">{{ GoogleTranslate::justTranslate('Histories', app()->getLocale()) }}</h5>
                        <div class="container-fluid">
                            <!-- Codrops top bar -->
                            <!--/ Codrops top bar -->
                            <div class="table-responsive">
                                <div class="main">
                                    <ul id="bk-list" class="bk-list clearfix">
                                        @foreach ($history as $h)
                                            @if ($h->clinical_history != null && $h->clinical_history['progress'] == 100)
                                                <li style="z-index: {{ $loop->index }};"
                                                    onclick="openInfoClinicalH('{{ $f->_id }}');">
                                                    <div class="bk-book book-2">
                                                        <div class="bk-front">
                                                            <div class="bk-cover-back"></div>
                                                            <div class="bk-cover">

                                                            </div>
                                                        </div>
                                                        <div class="bk-page">
                                                            <div class="bk-content bk-content-current">
                                                            </div>
                                                            <div class="bk-content">
                                                            </div>
                                                            <div class="bk-content">
                                                            </div>
                                                            <nav><span class="bk-page-prev">&lt;</span><span
                                                                    class="bk-page-next">&gt;</span></nav>
                                                            <nav><span class="bk-page-prev">&lt;</span><span
                                                                    class="bk-page-next">&gt;</span></nav>
                                                        </div>
                                                        <div class="bk-back">
                                                        </div>
                                                        <div class="bk-right"></div>
                                                        <div class="bk-left">
                                                            <h2>
                                                                <span>{{ $h->name . ' ' . $h->lastname }}</span>
                                                            </h2>
                                                        </div>
                                                        <div class="bk-top"></div>
                                                        <div class="bk-bottom"></div>
                                                    </div>
                                                </li>
                                                @php
                                                    $bookshelf = 1;
                                                @endphp
                                            @else
                                                <div class="container-fluid p-2">
                                                    <div class="row">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <div class="col-md-8">
                                                                <img src="{{ asset('img/medical-history.png') }}"
                                                                    class="img-fluid col-12" />
                                                                <h1
                                                                    class="h1 text-center pb-5 px-3 text-title-cu text-bold-cu text-uppercase">
                                                                    {{ GoogleTranslate::justTranslate('No medical records', app()->getLocale()) }}
                                                                </h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $bookshelf = 0;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </ul>
                                    @if ($bookshelf == 1)
                                        <div class="bookshelf"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                tabindex="0">
                ...</div>
            <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab"
                tabindex="0">
                ...</div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalNew" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="modalNewLabel" aria-hidden="true">
        <button class="btn btn-primary btn-circle float" data-bs-toggle="tooltip" data-bs-toggle="tooltip"
            title="{{ GoogleTranslate::justTranslate('Save your progress', app()->getLocale()) }}"
            onclick="validateSteps();"><i class="fa-regular fa-floppy-disk"></i></button>
        <div class="modal-dialog modal-xl" onmouseover="checkStepsValidity();">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalNewLabel">
                        {{ GoogleTranslate::justTranslate('Add a new medical record', app()->getLocale()) }}</h1>
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
                                            <strong>{{ GoogleTranslate::justTranslate('Hereditary Diseases', app()->getLocale()) }}</strong>
                                        </li>
                                        <li id="nonpat">
                                            <strong>{{ GoogleTranslate::justTranslate('Non-pathological antecedents', app()->getLocale()) }}</strong>
                                        </li>
                                        <li id="personal">
                                            <strong>{{ GoogleTranslate::justTranslate('Personal pathological history', app()->getLocale()) }}</strong>
                                        </li>
                                        {{-- <li id="confirm"><strong>Finish</strong></li> --}}
                                    </ul>
                                    <div class="d-flex justify-content-center pb-3">
                                        <div class="form-floating">
                                            <select class="form-select" id="selectFamilyM" required>
                                                <option selected disabled value="">
                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                </option>
                                                @if ($family != '[]')
                                                    @foreach ($family as $f)
                                                        @if ($f->clinical_history == null)
                                                            <option value="{{ $f->_id }}">
                                                                {{ $f->name . ' ' . $f->lastname }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option disabled value="">
                                                        {{ GoogleTranslate::justTranslate('There are no family members associated with your user', app()->getLocale()) }}
                                                    </option>
                                                @endif
                                            </select>
                                            <label
                                                for="selectFamilyM">{{ GoogleTranslate::justTranslate('Family member', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                    <!-- fieldsets -->
                                    <fieldset>
                                        <form class="validation" id="formHereditaryD" novalidate>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">
                                                            {{ GoogleTranslate::justTranslate('Hereditary Diseases', app()->getLocale()) }}
                                                        </h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">
                                                            {{ GoogleTranslate::justTranslate('Step 1 of 3', app()->getLocale()) }}
                                                        </h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 py-2">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchDiabetesRelative"
                                                                        onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchDiabetesRelative">{{ GoogleTranslate::justTranslate('Diabetes', app()->getLocale()) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtDiabetesRelative"
                                                                title="{{ GoogleTranslate::justTranslate('Diabetes Relatives', app()->getLocale()) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('Mother', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('Father', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Siblings', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::justTranslate('Grandparents', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtDiabetesRelative" placeholder="Diabetes Relative"
                                                                disabled>
                                                            <label
                                                                for="txtDiabetesRelative">{{ GoogleTranslate::justTranslate('Diabetes Relative', app()->getLocale()) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchHypertensionRelative"
                                                                        onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchHypertensionRelative">{{ GoogleTranslate::justTranslate('Hypertension', app()->getLocale()) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtHypertensionRelative"
                                                                title="{{ GoogleTranslate::justTranslate('Hypertension Relatives', app()->getLocale()) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('Mother', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('Father', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Siblings', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::justTranslate('Grandparents', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtHypertensionRelative"
                                                                placeholder="Hypertension Relative" disabled>
                                                            <label
                                                                for="txtHypertensionRelative">{{ GoogleTranslate::justTranslate('Hypertension Relative', app()->getLocale()) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchHIV" onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchHIV">{{ GoogleTranslate::justTranslate('HIV', app()->getLocale()) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtHIV"
                                                                title="{{ GoogleTranslate::justTranslate('HIV Relatives', app()->getLocale()) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('Mother', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('Father', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Siblings', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::justTranslate('Grandparents', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtHIV"
                                                                placeholder="HIV" disabled>
                                                            <label
                                                                for="txtHIV">{{ GoogleTranslate::justTranslate('HIV Relative', app()->getLocale()) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchCancer"
                                                                        onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchCancer">{{ GoogleTranslate::justTranslate('Cancer', app()->getLocale()) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtCancer"
                                                                title="{{ GoogleTranslate::justTranslate('Diabetes Relatives', app()->getLocale()) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('Mother', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('Father', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Siblings', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::justTranslate('Grandparents', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtCancer"
                                                                placeholder="Cancer" disabled>
                                                            <label
                                                                for="txtCancer">{{ GoogleTranslate::justTranslate('Cancer Relative', app()->getLocale()) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchPsychiatric"
                                                                        onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchPsychiatric">{{ GoogleTranslate::justTranslate('Psychiatric', app()->getLocale()) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtPsychiatric"
                                                                title="{{ GoogleTranslate::justTranslate('Psychiatric Relatives', app()->getLocale()) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('Mother', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('Father', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Siblings', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::justTranslate('Grandparents', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtPsychiatric" placeholder="Psychiatric" disabled>
                                                            <label
                                                                for="txtPsychiatric">{{ GoogleTranslate::justTranslate('Psychiatric Relative', app()->getLocale()) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="switchTuberculosis"
                                                                        onchange="disableField(this.id);">
                                                                    <label class="form-check-label"
                                                                        for="switchTuberculosis">{{ GoogleTranslate::justTranslate('Tuberculosis', app()->getLocale()) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtTuberculosis"
                                                                title="{{ GoogleTranslate::justTranslate('Tuberculosis Relatives', app()->getLocale()) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('Mother', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('Father', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Siblings', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::justTranslate('Grandparents', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtTuberculosis" placeholder="Tuberculosis" disabled>
                                                            <label
                                                                for="txtTuberculosis">{{ GoogleTranslate::justTranslate('Tuberculosis Relative', app()->getLocale()) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <input type="button" name="next" id="btnFirstStep"
                                            class="next action-button"
                                            value="{{ GoogleTranslate::justTranslate('Next', app()->getLocale()) }}"
                                            style="display: none;" />
                                    </fieldset>
                                    <fieldset>
                                        <form class="validationNonPathAnt" id="formNonPathAnt" novalidate>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">
                                                            {{ GoogleTranslate::justTranslate('Non-pathological antecedents', app()->getLocale()) }}
                                                        </h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">
                                                            {{ GoogleTranslate::justTranslate('Step 2 of 3', app()->getLocale()) }}
                                                        </h2>
                                                    </div>
                                                    {{-- <div class="col-md-6 py-2">
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Dental Lavage', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="form-floating">
                                                        <select class="form-select" id="txtDentalLavage" required>
                                                            <option selected disabled value="">
                                                                {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                            </option>
                                                            <option value="1">
                                                                {{ GoogleTranslate::justTranslate('After each meal', app()->getLocale()) }}
                                                            </option>
                                                            <option value="2">
                                                                {{ GoogleTranslate::justTranslate('3 times per day', app()->getLocale()) }}
                                                            </option>
                                                            <option value="3">
                                                                {{ GoogleTranslate::justTranslate('2 times per day', app()->getLocale()) }}
                                                            </option>
                                                            <option value="4">
                                                                {{ GoogleTranslate::justTranslate('1 times per day', app()->getLocale()) }}
                                                            </option>
                                                            <option value="5">
                                                                {{ GoogleTranslate::justTranslate('Occasional per week', app()->getLocale()) }}
                                                            </option>
                                                            <option value="6">
                                                                {{ GoogleTranslate::justTranslate('Not performed', app()->getLocale()) }}
                                                            </option>
                                                        </select>
                                                        <label
                                                            for="txtDentalLavage">{{ GoogleTranslate::justTranslate('Dental Lavage', app()->getLocale()) }}</label>
                                                    </div>
                                                </div> --}}
                                                    {{-- <div class="col-md-6 py-2">
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Shower', app()->getLocale()) }}</h6>
                                                    <div class="form-floating">
                                                        <select class="form-select" id="txtShower" required>
                                                            <option selected disabled value="">
                                                                {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                            </option>
                                                            <option value="1">
                                                                {{ GoogleTranslate::justTranslate('Daily', app()->getLocale()) }}
                                                            </option>
                                                            <option value="2">
                                                                {{ GoogleTranslate::justTranslate('Every 2 or 3 days', app()->getLocale()) }}
                                                            </option>
                                                            <option value="3">
                                                                {{ GoogleTranslate::justTranslate('1 time per week', app()->getLocale()) }}
                                                            </option>
                                                            <option value="4">
                                                                {{ GoogleTranslate::justTranslate('Not performed', app()->getLocale()) }}
                                                            </option>
                                                        </select>
                                                        <label
                                                            for="txtShower">{{ GoogleTranslate::justTranslate('Shower', app()->getLocale()) }}</label>
                                                    </div>
                                                </div> --}}
                                                    <div class="col-md-6 py-2">
                                                        <h6 class="fw-bolder py-2 pt-3">
                                                            {{ GoogleTranslate::justTranslate('Feeding', app()->getLocale()) }}
                                                        </h6>
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtFeeding" required>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('Good in quality and quantity', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('Fair in quality and quantity', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Poor in quality and quantity', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtFeeding">{{ GoogleTranslate::justTranslate('Feeding', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <h6 class="fw-bolder py-2 pt-3">
                                                            {{ GoogleTranslate::justTranslate('Water consumption', app()->getLocale()) }}
                                                        </h6>
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtWaterConsumption" required>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('More than 3 liters per day', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('From 2 to 3 liters per day', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Less than 1 liter per day', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtWaterConsumption">{{ GoogleTranslate::justTranslate('Water consumption', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <h6 class="fw-bolder py-2 pt-3">
                                                            {{ GoogleTranslate::justTranslate('Sleeping time', app()->getLocale()) }}
                                                        </h6>
                                                        <div class="form-floating py-2">
                                                            <select class="form-select" id="txtSleepingT" required>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('8 or more hours of sleep', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('6 to 8 hours of sleep', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Less than 6 hours of sleep', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtSleepingT">{{ GoogleTranslate::justTranslate('Sleeping time', app()->getLocale()) }}</label>
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
                                                            {{ GoogleTranslate::justTranslate('Pet', app()->getLocale()) }}
                                                        </h6>
                                                        <select class="form-control selectpicker my-2" multiple
                                                            id="txtPet">
                                                            <option value="1">
                                                                {{ GoogleTranslate::justTranslate('Dogs', app()->getLocale()) }}
                                                            </option>
                                                            <option value="2">
                                                                {{ GoogleTranslate::justTranslate('Cats', app()->getLocale()) }}
                                                            </option>
                                                            <option value="3">
                                                                {{ GoogleTranslate::justTranslate('Birds', app()->getLocale()) }}
                                                            </option>
                                                            <option value="4">
                                                                {{ GoogleTranslate::justTranslate('Others', app()->getLocale()) }}
                                                            </option>
                                                        </select>
                                                        {{-- <label
                                                        for="txtPet">{{ GoogleTranslate::justTranslate('Sleeping time', app()->getLocale()) }}</label> --}}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    {{-- <h6 class="fw-bolder py-2">
                                                    {{ GoogleTranslate::justTranslate('Housing', app()->getLocale()) }}</h6>
                                                <div class="col-md-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="txtMaterial"
                                                            placeholder="{{ GoogleTranslate::justTranslate('Material', app()->getLocale()) }}"
                                                            required>
                                                        <label
                                                            for="txtMaterial">{{ GoogleTranslate::justTranslate('Material', app()->getLocale()) }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="txtRooms"
                                                            placeholder="{{ GoogleTranslate::justTranslate('Rooms', app()->getLocale()) }}"
                                                            required>
                                                        <label
                                                            for="txtRooms">{{ GoogleTranslate::justTranslate('Rooms', app()->getLocale()) }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="txtPeopleLivingIn"
                                                            placeholder="{{ GoogleTranslate::justTranslate('PeopleLivingIn', app()->getLocale()) }}"
                                                            required>
                                                        <label
                                                            for="txtPeopleLivingIn">{{ GoogleTranslate::justTranslate('People Living In', app()->getLocale()) }}</label>
                                                    </div>
                                                </div>
                                                <h6 class="fw-bolder py-2 pt-3">
                                                    {{ GoogleTranslate::justTranslate('Services', app()->getLocale()) }}</h6>
                                                <div class="col-md-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="checkWater"
                                                            name="services" required>
                                                        <label class="form-check-label" for="checkWater">
                                                            {{ GoogleTranslate::justTranslate('Water', app()->getLocale()) }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="checkElectricity" name="services" required>
                                                        <label class="form-check-label" for="checkElectricity">
                                                            {{ GoogleTranslate::justTranslate('Electricity', app()->getLocale()) }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="checkDrainage" name="services" required>
                                                        <label class="form-check-label" for="checkDrainage">
                                                            {{ GoogleTranslate::justTranslate('Drainage', app()->getLocale()) }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="checkGas"
                                                            name="services" required>
                                                        <label class="form-check-label" for="checkGas">
                                                            {{ GoogleTranslate::justTranslate('Gas', app()->getLocale()) }}
                                                        </label>
                                                    </div>
                                                </div> --}}
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Alcholism', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkAlcoholism" name="radioAlc"
                                                                    onclick="enableFieldsAlch(this.id);">
                                                                <label class="form-check-label" for="checkAlcoholism">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkAlcoholismF" name="radioAlc" checked
                                                                    onclick="disableFieldsAlch(this.id);">
                                                                <label class="form-check-label" for="checkAlcoholismF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtAlcoholism" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('1 drink', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('2 drinks', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('More than 3 drinks', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtAlcoholism">{{ GoogleTranslate::justTranslate('Quantity', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectAlcoholism" required
                                                                disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('Daily', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('Weekly', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Biweekly', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::justTranslate('Occassional', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="selectAlcoholism">{{ GoogleTranslate::justTranslate('Frecuency', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Smoking', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSmoking" name="radioSmk"
                                                                    onclick="enableFieldsSmok(this.id);">
                                                                <label class="form-check-label" for="checkSmoking">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSmokingF" name="radioSmk" checked
                                                                    onclick="disableFieldsSmok(this.id);">
                                                                <label class="form-check-label" for="checkSmokingF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtSmoking" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('1 cigarrette', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('2 to 4 cigarettes', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('More than 5 cigarrettes', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtSmoking">{{ GoogleTranslate::justTranslate('Quantity', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectSmoking" required
                                                                disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('8 or more hours of sleep', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('6 to 8 hours of sleep', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Less than 6 hours of sleep', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="selectAlcoholism">{{ GoogleTranslate::justTranslate('Frecuency', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Drug adict', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkDrugAd" name="radioDrugAd"
                                                                    onclick="enableFieldsDrugAd(this.id);">
                                                                <label class="form-check-label" for="checkDrugAd">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkDrugAdF" name="radioDrugAd" checked
                                                                    onclick="disableFieldsDrugAd(this.id);">
                                                                <label class="form-check-label" for="checkDrugAdF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtDrugAd" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('Marijuana', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('Cocaine', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Methamphetamines', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::justTranslate('Opiates', app()->getLocale()) }}
                                                                </option>
                                                                <option value="5">
                                                                    {{ GoogleTranslate::justTranslate('Other', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtDrugAd">{{ GoogleTranslate::justTranslate('Drug', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectDrugAd" required
                                                                disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('Today', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::justTranslate('Less than 1 month', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Less than 6 months', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::justTranslate('Greater than 6 months', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="selectDrugAd">{{ GoogleTranslate::justTranslate('Last Consume', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Immunizations', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkImmunizations" name="radioImm"
                                                                    onclick="disableFieldImm();" checked>
                                                                <label class="form-check-label" for="checkImmunizations">
                                                                    {{ GoogleTranslate::justTranslate('Complete', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkImmunizationsI" name="radioImm"
                                                                    onclick="enableFieldImm();">
                                                                <label class="form-check-label" for="checkImmunizationsI">
                                                                    {{ GoogleTranslate::justTranslate('Incomplete', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtImmunizations"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Missing immunization', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtImmunizations">{{ GoogleTranslate::justTranslate('Missing immunization', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Covid immunization', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkImmunizationsCV" name="radioImmCV"
                                                                    onclick="disableFieldImmCV();" checked>
                                                                <label class="form-check-label"
                                                                    for="checkImmunizationsCV">
                                                                    {{ GoogleTranslate::justTranslate('Complete', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkImmunizationsICV" name="radioImmCV"
                                                                    onclick="enableFieldImmCV();">
                                                                <label class="form-check-label"
                                                                    for="checkImmunizationsICV">
                                                                    {{ GoogleTranslate::justTranslate('Incomplete', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 py-2">
                                                        <div class="form-floating">
                                                            <input type="number" class="form-control"
                                                                id="txtImmunizationsCV" min="1" max="6"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Number of missing immunizations', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtImmunizationsCV">{{ GoogleTranslate::justTranslate('Number of missing immunizations', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <input type="button" name="next" id="btnSecondStep"
                                            class="next action-button"
                                            value="{{ GoogleTranslate::justTranslate('Next', app()->getLocale()) }}"
                                            id="btnSecondStep" />
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="{{ GoogleTranslate::justTranslate('Previous', app()->getLocale()) }}" />
                                    </fieldset>
                                    <fieldset>
                                        <form class="validationPersonalPathHis" id="formPersonalPathHis" novalidate>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">
                                                            {{ GoogleTranslate::justTranslate('Personal pathological history', app()->getLocale()) }}
                                                        </h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">
                                                            {{ GoogleTranslate::justTranslate('Step 3 of 3', app()->getLocale()) }}
                                                        </h2>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Allergy sufferers', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkAllergyPPH" name="radioAllergy"
                                                                    onclick="enableFieldsAllergySF(this.id);">
                                                                <label class="form-check-label" for="checkAllergyPPH">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkAllergyPPHF" name="radioAllergy" checked
                                                                    onclick="disableFieldsAllergySF(this.id);">
                                                                <label class="form-check-label" for="checkAllergyPPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtAllergyPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Medications', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtAllergy">{{ GoogleTranslate::justTranslate('Medications', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txAllergyPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Food', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txAllergy">{{ GoogleTranslate::justTranslate('Food', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Diabetes', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkDiabetesPPH" name="radioDiab"
                                                                    onclick="enableFieldsDiabetes(this.id);">
                                                                <label class="form-check-label" for="checkDiabetes">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkDiabetesPPHF" name="radioDiab" checked
                                                                    onclick="disableFieldsDiabetes(this.id);">
                                                                <label class="form-check-label" for="checkDiabetesPPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectDiabetesPPH" required
                                                                aria-label="{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectDiabetesPPH">{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtDiabetesPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtDiabetesPPH">{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Hypertension', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkHyperPPH" name="radioHyp"
                                                                    onclick="enableFieldsHyper(this.id);">
                                                                <label class="form-check-label" for="checkHyperPPH">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkHyperPPHF" name="radioHyp" checked
                                                                    onclick="disableFieldsHyper(this.id);">
                                                                <label class="form-check-label" for="checkHyperPPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectHyperPPH" required
                                                                aria-label="{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectHyperPPH">{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtHyperPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtHyperPPH">{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Surgeries', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSurgerPPH" name="radioSur"
                                                                    onclick="enableFieldsSurg(this.id);">
                                                                <label class="form-check-label" for="checkSurgerPPH">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSurgerPPHF" name="radioSur" checked
                                                                    onclick="disableFieldsSurg(this.id);">
                                                                <label class="form-check-label" for="checkSurgerPPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtSurgerPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Motive', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtSurgerPPH">{{ GoogleTranslate::justTranslate('Motive', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txSurgerPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Antiquity', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txSurgerPPH">{{ GoogleTranslate::justTranslate('Antiquity', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Fractures', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkFracturePPH" name="radioFractures"
                                                                    onclick="enableFieldsFractures(this.id);">
                                                                <label class="form-check-label" for="checkFracturePPH">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkFracturePPHF" name="radioFractures" checked
                                                                    onclick="disableFieldsFractures(this.id);">
                                                                <label class="form-check-label" for="checkFracturePPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtFracturePPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Motive', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtFracturePPH">{{ GoogleTranslate::justTranslate('Motive', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txFracturePPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Antiquity', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txFracturePPH">{{ GoogleTranslate::justTranslate('Antiquity', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Seizures', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSeizPPH" name="radioSeiz"
                                                                    onclick="enableFieldsSeizures(this.id);">
                                                                <label class="form-check-label" for="checkSeizPPH">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSeizPPHF" name="radioSeiz" checked
                                                                    onclick="disableFieldsSeizures(this.id);">
                                                                <label class="form-check-label" for="checkSeizPPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectSeizPPH" required
                                                                aria-label="{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectSeizPPH">{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtSeizPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtSeizPPH">{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Pulmonary diseases', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkPulmonPPH" name="radioPulmon"
                                                                    onclick="enableFieldsPulmonary(this.id);">
                                                                <label class="form-check-label" for="checkPulmonaryPPH">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkPulmonPPHF" name="radioPulmon" checked
                                                                    onclick="disableFieldsPulmonary(this.id);">
                                                                <label class="form-check-label" for="checkPulmonaryPPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectPulmonPPH" required
                                                                aria-label="{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectPulmonPPH">{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtPulmonPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtPulmonPPH">{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Cardiacal diseases', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkCardPPH" name="radioCardiacal"
                                                                    onclick="enableFieldsCardiacal(this.id);">
                                                                <label class="form-check-label" for="checkCardPPH">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkCardPPHF" name="radioCardiacal" checked
                                                                    onclick="disableFieldsCardiacal(this.id);">
                                                                <label class="form-check-label" for="checkCardPPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectCardPPH" required
                                                                aria-label="{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectCardPPH">{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtCardPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtCardPPH">{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Kidney diseases', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkKidneyPPH" name="radioKidney"
                                                                    onclick="enableFieldsKidney(this.id);">
                                                                <label class="form-check-label" for="checkKidneyPPH">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkKidneyPPHF" name="radioKidney" checked
                                                                    onclick="disableFieldsKidney(this.id);">
                                                                <label class="form-check-label" for="checkKidneyPPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectKidneyPPH" required
                                                                aria-label="{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectKidneyPPH">{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtKidneyPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtKidneyPPH">{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Psychiatric diseases', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkPsychPPH" name="radioPsych"
                                                                    onclick="enableFieldsPsych(this.id);">
                                                                <label class="form-check-label" for="checkPsychPPH">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkPsychPPHF" name="radioPsych" checked
                                                                    onclick="disableFieldsPsych(this.id);">
                                                                <label class="form-check-label" for="checkPsychPPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectPsychPPH" required
                                                                aria-label="{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectPsychPPH">{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtPsychPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtPsychPPH">{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Transfusions', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkTransPPH" name="radioTrans"
                                                                    onclick="enableFieldsTrans(this.id);">
                                                                <label class="form-check-label" for="checkTransPPH">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkTransPPHF" name="radioTrans" checked
                                                                    onclick="disableFieldsTrans(this.id);">
                                                                <label class="form-check-label" for="checkTransPPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectTransPPH" required
                                                                aria-label="{{ GoogleTranslate::justTranslate('Post-transfusion reactions', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </option>
                                                                <option value="0">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="selectTransPPH">{{ GoogleTranslate::justTranslate('Post-transfusion reactions', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtTransPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Antiquity', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtTransPPH">{{ GoogleTranslate::justTranslate('Antiquity', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Hematic diseases', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkHematPPH" name="radioHemat"
                                                                    onclick="enableFieldsHematic(this.id);">
                                                                <label class="form-check-label" for="checkHematPPH">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkHematPPHF" name="radioHemat" checked
                                                                    onclick="disableFieldsHematic(this.id);">
                                                                <label class="form-check-label" for="checkHematPPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectHematPPH" required
                                                                aria-label="{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectHematPPH">{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtHematPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtHematPPH">{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::justTranslate('Rheumatic diseases', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkRheumPPH" name="radioRheum"
                                                                    onclick="enableFieldsRheum(this.id);">
                                                                <label class="form-check-label" for="checkRheumPPH">
                                                                    {{ GoogleTranslate::justTranslate('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkRheumPPHF" name="radioRheum" checked
                                                                    onclick="disableFieldsRheum(this.id);">
                                                                <label class="form-check-label" for="checkRheumPPHF">
                                                                    {{ GoogleTranslate::justTranslate('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectRheumPPH" required
                                                                aria-label="{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectRheumPPH">{{ GoogleTranslate::justTranslate('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtRheumPPH"
                                                                placeholder="{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtRheumPPH">{{ GoogleTranslate::justTranslate('Current treatment', app()->getLocale()) }}</label>
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
                        data-bs-dismiss="modal">{{ GoogleTranslate::justTranslate('Close window', app()->getLocale()) }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
