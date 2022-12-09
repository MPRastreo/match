@extends('layout.layout')
@section('title')
    {{ GoogleTranslate::trans('Clinical History', app()->getLocale()) }}
@endsection
@section('pagetitle')
    {{ GoogleTranslate::trans('Clinical History', app()->getLocale()) }}
    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
        data-bs-target="#modalNew">{{ GoogleTranslate::trans('New Clinical Historie', app()->getLocale()) }}</button>
@endsection
@section('content')
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
    <div class="row">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-pend" data-bs-toggle="tab" data-bs-target="#tab-pend-pane"
                    type="button" role="tab" aria-controls="tab-pend-pane"
                    aria-selected="true">{{ GoogleTranslate::trans('Pending histories', app()->getLocale()) }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-historie" data-bs-toggle="tab" data-bs-target="#tab-historie-pane"
                    type="button" role="tab" aria-controls="tab-historie-pane"
                    aria-selected="false">{{ GoogleTranslate::trans('Clinical Histories', app()->getLocale()) }}</button>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane"
                    aria-selected="false">{{ GoogleTranslate::trans('Contact', app()->getLocale()) }}</button>
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
                                    {{ GoogleTranslate::trans('Name', app()->getLocale()) }}</th>
                                <th scope="col">
                                    {{ GoogleTranslate::trans('Progress', app()->getLocale()) }}
                                </th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($family as $f)
                                @if ($f->clinical_history != null && $f->clinical_history['progress'] < 100)
                                    @if ($loop->index == 0)
                                        <script>
                                            generateProgressBars(family);
                                        </script>
                                    @endif
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
                                                    title="{{ GoogleTranslate::trans('Complete medical history', app()->getLocale()) }}"><i
                                                        class="fas fa-spinner"></i></button>
                                            </td>
                                        @else
                                            <td class="align-middle">
                                                <button class="btn btn-success btn-circle" data-bs-toggle="tooltip"
                                                    data-bs-toggle="tooltip"
                                                    title="{{ GoogleTranslate::trans('Medical history completed', app()->getLocale()) }}"><i
                                                        class="fa-solid fa-check"></i></button>
                                            </td>
                                        @endif
                                    </tr>
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
                        <h5 class="d-block py-3">{{ GoogleTranslate::trans('Histories', app()->getLocale()) }}</h5>
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
                                                                    {{ GoogleTranslate::trans('No medical records', app()->getLocale()) }}
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
            title="{{ GoogleTranslate::trans('Save your progress', app()->getLocale()) }}" onclick="validateSteps();"><i
                class="fa-regular fa-floppy-disk"></i></button>
        <div class="modal-dialog modal-xl" onmouseover="checkStepsValidity();">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalNewLabel">
                        {{ GoogleTranslate::trans('Add a new medical record', app()->getLocale()) }}</h1>
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
                                            <strong>{{ GoogleTranslate::trans('Hereditary Diseases', app()->getLocale()) }}</strong>
                                        </li>
                                        <li id="nonpat">
                                            <strong>{{ GoogleTranslate::trans('Non-pathological antecedents', app()->getLocale()) }}</strong>
                                        </li>
                                        <li id="personal">
                                            <strong>{{ GoogleTranslate::trans('Personal pathological history', app()->getLocale()) }}</strong>
                                        </li>
                                        {{-- <li id="confirm"><strong>Finish</strong></li> --}}
                                    </ul>
                                    <div class="d-flex justify-content-center pb-3">
                                        <div class="form-floating">
                                            <select class="form-select" id="selectFamilyM" required>
                                                <option selected disabled value="">
                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
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
                                                        {{ GoogleTranslate::trans('There are no family members associated with your user', app()->getLocale()) }}
                                                    </option>
                                                @endif
                                            </select>
                                            <label
                                                for="selectFamilyM">{{ GoogleTranslate::trans('Family member', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                    <!-- fieldsets -->
                                    <fieldset>
                                        <form class="validation" id="formHereditaryD" novalidate>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">
                                                            {{ GoogleTranslate::trans('Hereditary Diseases', app()->getLocale()) }}
                                                        </h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">
                                                            {{ GoogleTranslate::trans('Step 1 of 3', app()->getLocale()) }}
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
                                                                        for="switchDiabetesRelative">{{ GoogleTranslate::trans('Diabetes', app()->getLocale()) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtDiabetesRelative"
                                                                title="{{ GoogleTranslate::trans('Diabetes Relatives', app()->getLocale()) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('Mother', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('Father', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Siblings', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::trans('Grandparents', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtDiabetesRelative" placeholder="Diabetes Relative"
                                                                disabled>
                                                            <label
                                                                for="txtDiabetesRelative">{{ GoogleTranslate::trans('Diabetes Relative', app()->getLocale()) }}</label>
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
                                                                        for="switchHypertensionRelative">{{ GoogleTranslate::trans('Hypertension', app()->getLocale()) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtHypertensionRelative"
                                                                title="{{ GoogleTranslate::trans('Hypertension Relatives', app()->getLocale()) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('Mother', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('Father', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Siblings', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::trans('Grandparents', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtHypertensionRelative"
                                                                placeholder="Hypertension Relative" disabled>
                                                            <label
                                                                for="txtHypertensionRelative">{{ GoogleTranslate::trans('Hypertension Relative', app()->getLocale()) }}</label>
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
                                                                        for="switchHIV">{{ GoogleTranslate::trans('HIV', app()->getLocale()) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtHIV"
                                                                title="{{ GoogleTranslate::trans('HIV Relatives', app()->getLocale()) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('Mother', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('Father', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Siblings', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::trans('Grandparents', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtHIV"
                                                                placeholder="HIV" disabled>
                                                            <label
                                                                for="txtHIV">{{ GoogleTranslate::trans('HIV Relative', app()->getLocale()) }}</label>
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
                                                                        for="switchCancer">{{ GoogleTranslate::trans('Cancer', app()->getLocale()) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtCancer"
                                                                title="{{ GoogleTranslate::trans('Diabetes Relatives', app()->getLocale()) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('Mother', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('Father', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Siblings', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::trans('Grandparents', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtCancer"
                                                                placeholder="Cancer" disabled>
                                                            <label
                                                                for="txtCancer">{{ GoogleTranslate::trans('Cancer Relative', app()->getLocale()) }}</label>
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
                                                                        for="switchPsychiatric">{{ GoogleTranslate::trans('Psychiatric', app()->getLocale()) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtPsychiatric"
                                                                title="{{ GoogleTranslate::trans('Psychiatric Relatives', app()->getLocale()) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('Mother', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('Father', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Siblings', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::trans('Grandparents', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtPsychiatric" placeholder="Psychiatric" disabled>
                                                            <label
                                                                for="txtPsychiatric">{{ GoogleTranslate::trans('Psychiatric Relative', app()->getLocale()) }}</label>
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
                                                                        for="switchTuberculosis">{{ GoogleTranslate::trans('Tuberculosis', app()->getLocale()) }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control selectpicker my-2" multiple
                                                                id="txtTuberculosis"
                                                                title="{{ GoogleTranslate::trans('Tuberculosis Relatives', app()->getLocale()) }}"
                                                                disabled>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('Mother', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('Father', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Siblings', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::trans('Grandparents', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            {{-- <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtTuberculosis" placeholder="Tuberculosis" disabled>
                                                            <label
                                                                for="txtTuberculosis">{{ GoogleTranslate::trans('Tuberculosis Relative', app()->getLocale()) }}</label>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <input type="button" name="next" id="btnFirstStep"
                                            class="next action-button"
                                            value="{{ GoogleTranslate::trans('Next', app()->getLocale()) }}"
                                            style="display: none;" />
                                    </fieldset>
                                    <fieldset>
                                        <form class="validationNonPathAnt" id="formNonPathAnt" novalidate>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">
                                                            {{ GoogleTranslate::trans('Non-pathological antecedents', app()->getLocale()) }}
                                                        </h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">
                                                            {{ GoogleTranslate::trans('Step 2 of 3', app()->getLocale()) }}
                                                        </h2>
                                                    </div>
                                                    {{-- <div class="col-md-6 py-2">
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Dental Lavage', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="form-floating">
                                                        <select class="form-select" id="txtDentalLavage" required>
                                                            <option selected disabled value="">
                                                                {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                            </option>
                                                            <option value="1">
                                                                {{ GoogleTranslate::trans('After each meal', app()->getLocale()) }}
                                                            </option>
                                                            <option value="2">
                                                                {{ GoogleTranslate::trans('3 times per day', app()->getLocale()) }}
                                                            </option>
                                                            <option value="3">
                                                                {{ GoogleTranslate::trans('2 times per day', app()->getLocale()) }}
                                                            </option>
                                                            <option value="4">
                                                                {{ GoogleTranslate::trans('1 times per day', app()->getLocale()) }}
                                                            </option>
                                                            <option value="5">
                                                                {{ GoogleTranslate::trans('Occasional per week', app()->getLocale()) }}
                                                            </option>
                                                            <option value="6">
                                                                {{ GoogleTranslate::trans('Not performed', app()->getLocale()) }}
                                                            </option>
                                                        </select>
                                                        <label
                                                            for="txtDentalLavage">{{ GoogleTranslate::trans('Dental Lavage', app()->getLocale()) }}</label>
                                                    </div>
                                                </div> --}}
                                                    {{-- <div class="col-md-6 py-2">
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Shower', app()->getLocale()) }}</h6>
                                                    <div class="form-floating">
                                                        <select class="form-select" id="txtShower" required>
                                                            <option selected disabled value="">
                                                                {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                            </option>
                                                            <option value="1">
                                                                {{ GoogleTranslate::trans('Daily', app()->getLocale()) }}
                                                            </option>
                                                            <option value="2">
                                                                {{ GoogleTranslate::trans('Every 2 or 3 days', app()->getLocale()) }}
                                                            </option>
                                                            <option value="3">
                                                                {{ GoogleTranslate::trans('1 time per week', app()->getLocale()) }}
                                                            </option>
                                                            <option value="4">
                                                                {{ GoogleTranslate::trans('Not performed', app()->getLocale()) }}
                                                            </option>
                                                        </select>
                                                        <label
                                                            for="txtShower">{{ GoogleTranslate::trans('Shower', app()->getLocale()) }}</label>
                                                    </div>
                                                </div> --}}
                                                    <div class="col-md-6 py-2">
                                                        <h6 class="fw-bolder py-2 pt-3">
                                                            {{ GoogleTranslate::trans('Feeding', app()->getLocale()) }}
                                                        </h6>
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtFeeding" required>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('Good in quality and quantity', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('Fair in quality and quantity', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Poor in quality and quantity', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtFeeding">{{ GoogleTranslate::trans('Feeding', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <h6 class="fw-bolder py-2 pt-3">
                                                            {{ GoogleTranslate::trans('Water consumption', app()->getLocale()) }}
                                                        </h6>
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtWaterConsumption" required>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('More than 3 liters per day', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('From 2 to 3 liters per day', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Less than 1 liter per day', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtWaterConsumption">{{ GoogleTranslate::trans('Water consumption', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <h6 class="fw-bolder py-2 pt-3">
                                                            {{ GoogleTranslate::trans('Sleeping time', app()->getLocale()) }}
                                                        </h6>
                                                        <div class="form-floating py-2">
                                                            <select class="form-select" id="txtSleepingT" required>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('8 or more hours of sleep', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('6 to 8 hours of sleep', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Less than 6 hours of sleep', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtSleepingT">{{ GoogleTranslate::trans('Sleeping time', app()->getLocale()) }}</label>
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
                                                            {{ GoogleTranslate::trans('Pet', app()->getLocale()) }}</h6>
                                                        <select class="form-control selectpicker my-2" multiple
                                                            id="txtPet">
                                                            <option value="1">
                                                                {{ GoogleTranslate::trans('Dogs', app()->getLocale()) }}
                                                            </option>
                                                            <option value="2">
                                                                {{ GoogleTranslate::trans('Cats', app()->getLocale()) }}
                                                            </option>
                                                            <option value="3">
                                                                {{ GoogleTranslate::trans('Birds', app()->getLocale()) }}
                                                            </option>
                                                            <option value="4">
                                                                {{ GoogleTranslate::trans('Others', app()->getLocale()) }}
                                                            </option>
                                                        </select>
                                                        {{-- <label
                                                        for="txtPet">{{ GoogleTranslate::trans('Sleeping time', app()->getLocale()) }}</label> --}}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    {{-- <h6 class="fw-bolder py-2">
                                                    {{ GoogleTranslate::trans('Housing', app()->getLocale()) }}</h6>
                                                <div class="col-md-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="txtMaterial"
                                                            placeholder="{{ GoogleTranslate::trans('Material', app()->getLocale()) }}"
                                                            required>
                                                        <label
                                                            for="txtMaterial">{{ GoogleTranslate::trans('Material', app()->getLocale()) }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="txtRooms"
                                                            placeholder="{{ GoogleTranslate::trans('Rooms', app()->getLocale()) }}"
                                                            required>
                                                        <label
                                                            for="txtRooms">{{ GoogleTranslate::trans('Rooms', app()->getLocale()) }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pb-2">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="txtPeopleLivingIn"
                                                            placeholder="{{ GoogleTranslate::trans('PeopleLivingIn', app()->getLocale()) }}"
                                                            required>
                                                        <label
                                                            for="txtPeopleLivingIn">{{ GoogleTranslate::trans('People Living In', app()->getLocale()) }}</label>
                                                    </div>
                                                </div>
                                                <h6 class="fw-bolder py-2 pt-3">
                                                    {{ GoogleTranslate::trans('Services', app()->getLocale()) }}</h6>
                                                <div class="col-md-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="checkWater"
                                                            name="services" required>
                                                        <label class="form-check-label" for="checkWater">
                                                            {{ GoogleTranslate::trans('Water', app()->getLocale()) }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="checkElectricity" name="services" required>
                                                        <label class="form-check-label" for="checkElectricity">
                                                            {{ GoogleTranslate::trans('Electricity', app()->getLocale()) }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="checkDrainage" name="services" required>
                                                        <label class="form-check-label" for="checkDrainage">
                                                            {{ GoogleTranslate::trans('Drainage', app()->getLocale()) }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="checkGas"
                                                            name="services" required>
                                                        <label class="form-check-label" for="checkGas">
                                                            {{ GoogleTranslate::trans('Gas', app()->getLocale()) }}
                                                        </label>
                                                    </div>
                                                </div> --}}
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Alcholism', app()->getLocale()) }}</h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkAlcoholism" name="radioAlc"
                                                                    onclick="enableFieldsAlch(this.id);">
                                                                <label class="form-check-label" for="checkAlcoholism">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkAlcoholismF" name="radioAlc" checked
                                                                    onclick="disableFieldsAlch(this.id);">
                                                                <label class="form-check-label" for="checkAlcoholismF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtAlcoholism" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('1 drink', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('2 drinks', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('More than 3 drinks', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtAlcoholism">{{ GoogleTranslate::trans('Quantity', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectAlcoholism" required
                                                                disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('Daily', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('Weekly', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Biweekly', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::trans('Occassional', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="selectAlcoholism">{{ GoogleTranslate::trans('Frecuency', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Smoking', app()->getLocale()) }}</h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSmoking" name="radioSmk"
                                                                    onclick="enableFieldsSmok(this.id);">
                                                                <label class="form-check-label" for="checkSmoking">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSmokingF" name="radioSmk" checked
                                                                    onclick="disableFieldsSmok(this.id);">
                                                                <label class="form-check-label" for="checkSmokingF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtSmoking" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('1 cigarrette', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('2 to 4 cigarettes', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('More than 5 cigarrettes', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtSmoking">{{ GoogleTranslate::trans('Quantity', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectSmoking" required
                                                                disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('8 or more hours of sleep', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('6 to 8 hours of sleep', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Less than 6 hours of sleep', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="selectAlcoholism">{{ GoogleTranslate::trans('Frecuency', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Drug adict', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkDrugAd" name="radioDrugAd"
                                                                    onclick="enableFieldsDrugAd(this.id);">
                                                                <label class="form-check-label" for="checkDrugAd">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkDrugAdF" name="radioDrugAd" checked
                                                                    onclick="disableFieldsDrugAd(this.id);">
                                                                <label class="form-check-label" for="checkDrugAdF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="txtDrugAd" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('Marijuana', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('Cocaine', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Methamphetamines', app()->getLocale()) }}
                                                                </option>
                                                                <option value="4">
                                                                    {{ GoogleTranslate::trans('Opiates', app()->getLocale()) }}
                                                                </option>
                                                                <option value="5">
                                                                    {{ GoogleTranslate::trans('Other', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="txtDrugAd">{{ GoogleTranslate::trans('Drug', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectDrugAd" required
                                                                disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('Today', app()->getLocale()) }}
                                                                </option>
                                                                <option value="2">
                                                                    {{ GoogleTranslate::trans('Less than 1 month', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Less than 6 months', app()->getLocale()) }}
                                                                </option>
                                                                <option value="3">
                                                                    {{ GoogleTranslate::trans('Greater than 6 months', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="selectDrugAd">{{ GoogleTranslate::trans('Last Consume', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Immunizations', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkImmunizations" name="radioImm"
                                                                    onclick="disableFieldImm();" checked>
                                                                <label class="form-check-label" for="checkImmunizations">
                                                                    {{ GoogleTranslate::trans('Complete', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkImmunizationsI" name="radioImm"
                                                                    onclick="enableFieldImm();">
                                                                <label class="form-check-label" for="checkImmunizationsI">
                                                                    {{ GoogleTranslate::trans('Incomplete', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtImmunizations"
                                                                placeholder="{{ GoogleTranslate::trans('Missing immunization', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtImmunizations">{{ GoogleTranslate::trans('Missing immunization', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Covid immunization', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkImmunizationsCV" name="radioImmCV"
                                                                    onclick="disableFieldImmCV();" checked>
                                                                <label class="form-check-label"
                                                                    for="checkImmunizationsCV">
                                                                    {{ GoogleTranslate::trans('Complete', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkImmunizationsICV" name="radioImmCV"
                                                                    onclick="enableFieldImmCV();">
                                                                <label class="form-check-label"
                                                                    for="checkImmunizationsICV">
                                                                    {{ GoogleTranslate::trans('Incomplete', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 py-2">
                                                        <div class="form-floating">
                                                            <input type="number" class="form-control"
                                                                id="txtImmunizationsCV" min="1" max="6"
                                                                placeholder="{{ GoogleTranslate::trans('Number of missing immunizations', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtImmunizationsCV">{{ GoogleTranslate::trans('Number of missing immunizations', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <input type="button" name="next" id="btnSecondStep"
                                            class="next action-button"
                                            value="{{ GoogleTranslate::trans('Next', app()->getLocale()) }}"
                                            id="btnSecondStep" />
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="{{ GoogleTranslate::trans('Previous', app()->getLocale()) }}" />
                                    </fieldset>
                                    <fieldset>
                                        <form class="validationPersonalPathHis" id="formPersonalPathHis" novalidate>
                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="fs-title">
                                                            {{ GoogleTranslate::trans('Personal pathological history', app()->getLocale()) }}
                                                        </h2>
                                                    </div>
                                                    <div class="col-5">
                                                        <h2 class="steps">
                                                            {{ GoogleTranslate::trans('Step 3 of 3', app()->getLocale()) }}
                                                        </h2>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Allergy sufferers', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkAllergyPPH" name="radioAllergy"
                                                                    onclick="enableFieldsAllergySF(this.id);">
                                                                <label class="form-check-label" for="checkAllergyPPH">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkAllergyPPHF" name="radioAllergy" checked
                                                                    onclick="disableFieldsAllergySF(this.id);">
                                                                <label class="form-check-label" for="checkAllergyPPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtAllergyPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Medications', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtAllergy">{{ GoogleTranslate::trans('Medications', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txAllergyPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Food', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txAllergy">{{ GoogleTranslate::trans('Food', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Diabetes', app()->getLocale()) }}</h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkDiabetesPPH" name="radioDiab"
                                                                    onclick="enableFieldsDiabetes(this.id);">
                                                                <label class="form-check-label" for="checkDiabetes">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkDiabetesPPHF" name="radioDiab" checked
                                                                    onclick="disableFieldsDiabetes(this.id);">
                                                                <label class="form-check-label" for="checkDiabetesPPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectDiabetesPPH" required
                                                                aria-label="{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectDiabetesPPH">{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtDiabetesPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtDiabetesPPH">{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Hypertension', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkHyperPPH" name="radioHyp"
                                                                    onclick="enableFieldsHyper(this.id);">
                                                                <label class="form-check-label" for="checkHyperPPH">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkHyperPPHF" name="radioHyp" checked
                                                                    onclick="disableFieldsHyper(this.id);">
                                                                <label class="form-check-label" for="checkHyperPPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectHyperPPH" required
                                                                aria-label="{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectHyperPPH">{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtHyperPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtHyperPPH">{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Surgeries', app()->getLocale()) }}</h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSurgerPPH" name="radioSur"
                                                                    onclick="enableFieldsSurg(this.id);">
                                                                <label class="form-check-label" for="checkSurgerPPH">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSurgerPPHF" name="radioSur" checked
                                                                    onclick="disableFieldsSurg(this.id);">
                                                                <label class="form-check-label" for="checkSurgerPPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtSurgerPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Motive', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtSurgerPPH">{{ GoogleTranslate::trans('Motive', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txSurgerPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Antiquity', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txSurgerPPH">{{ GoogleTranslate::trans('Antiquity', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Fractures', app()->getLocale()) }}</h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkFracturePPH" name="radioFractures"
                                                                    onclick="enableFieldsFractures(this.id);">
                                                                <label class="form-check-label" for="checkFracturePPH">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkFracturePPHF" name="radioFractures" checked
                                                                    onclick="disableFieldsFractures(this.id);">
                                                                <label class="form-check-label" for="checkFracturePPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtFracturePPH"
                                                                placeholder="{{ GoogleTranslate::trans('Motive', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtFracturePPH">{{ GoogleTranslate::trans('Motive', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txFracturePPH"
                                                                placeholder="{{ GoogleTranslate::trans('Antiquity', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txFracturePPH">{{ GoogleTranslate::trans('Antiquity', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Seizures', app()->getLocale()) }}</h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSeizPPH" name="radioSeiz"
                                                                    onclick="enableFieldsSeizures(this.id);">
                                                                <label class="form-check-label" for="checkSeizPPH">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkSeizPPHF" name="radioSeiz" checked
                                                                    onclick="disableFieldsSeizures(this.id);">
                                                                <label class="form-check-label" for="checkSeizPPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectSeizPPH" required
                                                                aria-label="{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectSeizPPH">{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtSeizPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtSeizPPH">{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Pulmonary diseases', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkPulmonPPH" name="radioPulmon"
                                                                    onclick="enableFieldsPulmonary(this.id);">
                                                                <label class="form-check-label" for="checkPulmonaryPPH">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkPulmonPPHF" name="radioPulmon" checked
                                                                    onclick="disableFieldsPulmonary(this.id);">
                                                                <label class="form-check-label" for="checkPulmonaryPPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectPulmonPPH" required
                                                                aria-label="{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectPulmonPPH">{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtPulmonPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtPulmonPPH">{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Cardiacal diseases', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkCardPPH" name="radioCardiacal"
                                                                    onclick="enableFieldsCardiacal(this.id);">
                                                                <label class="form-check-label" for="checkCardPPH">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkCardPPHF" name="radioCardiacal" checked
                                                                    onclick="disableFieldsCardiacal(this.id);">
                                                                <label class="form-check-label" for="checkCardPPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectCardPPH" required
                                                                aria-label="{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectCardPPH">{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtCardPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtCardPPH">{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Kidney diseases', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkKidneyPPH" name="radioKidney"
                                                                    onclick="enableFieldsKidney(this.id);">
                                                                <label class="form-check-label" for="checkKidneyPPH">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkKidneyPPHF" name="radioKidney" checked
                                                                    onclick="disableFieldsKidney(this.id);">
                                                                <label class="form-check-label" for="checkKidneyPPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectKidneyPPH" required
                                                                aria-label="{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectKidneyPPH">{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtKidneyPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtKidneyPPH">{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Psychiatric diseases', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkPsychPPH" name="radioPsych"
                                                                    onclick="enableFieldsPsych(this.id);">
                                                                <label class="form-check-label" for="checkPsychPPH">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkPsychPPHF" name="radioPsych" checked
                                                                    onclick="disableFieldsPsych(this.id);">
                                                                <label class="form-check-label" for="checkPsychPPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectPsychPPH" required
                                                                aria-label="{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectPsychPPH">{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtPsychPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtPsychPPH">{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Transfusions', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkTransPPH" name="radioTrans"
                                                                    onclick="enableFieldsTrans(this.id);">
                                                                <label class="form-check-label" for="checkTransPPH">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkTransPPHF" name="radioTrans" checked
                                                                    onclick="disableFieldsTrans(this.id);">
                                                                <label class="form-check-label" for="checkTransPPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectTransPPH" required
                                                                aria-label="{{ GoogleTranslate::trans('Post-transfusion reactions', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                <option value="1">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </option>
                                                                <option value="0">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </option>
                                                            </select>
                                                            <label
                                                                for="selectTransPPH">{{ GoogleTranslate::trans('Post-transfusion reactions', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtTransPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Antiquity', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtTransPPH">{{ GoogleTranslate::trans('Antiquity', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Hematic diseases', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkHematPPH" name="radioHemat"
                                                                    onclick="enableFieldsHematic(this.id);">
                                                                <label class="form-check-label" for="checkHematPPH">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkHematPPHF" name="radioHemat" checked
                                                                    onclick="disableFieldsHematic(this.id);">
                                                                <label class="form-check-label" for="checkHematPPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectHematPPH" required
                                                                aria-label="{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectHematPPH">{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtHematPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtHematPPH">{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="fw-bolder py-2 pt-3">
                                                        {{ GoogleTranslate::trans('Rheumatic diseases', app()->getLocale()) }}
                                                    </h6>
                                                    <div class="row d-block">
                                                        <div class="col-md-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkRheumPPH" name="radioRheum"
                                                                    onclick="enableFieldsRheum(this.id);">
                                                                <label class="form-check-label" for="checkRheumPPH">
                                                                    {{ GoogleTranslate::trans('Yes', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="checkRheumPPHF" name="radioRheum" checked
                                                                    onclick="disableFieldsRheum(this.id);">
                                                                <label class="form-check-label" for="checkRheumPPHF">
                                                                    {{ GoogleTranslate::trans('No', app()->getLocale()) }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 py-2">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="selectRheumPPH" required
                                                                aria-label="{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}"
                                                                data-live-search="true" disabled>
                                                                <option selected disabled value="">
                                                                    {{ GoogleTranslate::trans('Select an option', app()->getLocale()) }}
                                                                </option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                for="selectRheumPPH">{{ GoogleTranslate::trans('Diagnosis year', app()->getLocale()) }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 py-2">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtRheumPPH"
                                                                placeholder="{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}"
                                                                disabled>
                                                            <label
                                                                for="txtRheumPPH">{{ GoogleTranslate::trans('Current treatment', app()->getLocale()) }}</label>
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
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ GoogleTranslate::trans('Close window', app()->getLocale()) }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/clinical.js') }}"></script>
    <script type="text/javascript">
        let family = [];
        family = @json($family);
    </script>
@endsection
