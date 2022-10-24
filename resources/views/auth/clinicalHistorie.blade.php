@extends('layout.layout')
@section('title')
    Clinical History
@endsection
@section('pagetitle')
    Clinical History
    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalNew">New Clinical
        Historie</button>
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
            border: 1px solid #673AB7;
            outline-width: 0;
        }

        /*Next Buttons*/
        #msform .action-button {
            width: 100px;
            background: #673AB7;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px 10px 5px;
            float: right;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            background-color: #311B92;
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
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: #000000;
        }

        /*FieldSet headings*/
        .fs-title {
            font-size: 25px;
            color: #673AB7;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left;
        }

        .purple-text {
            color: #673AB7;
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
            color: #673AB7;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 25%;
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
            content: "\f007";
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f030";
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
            background: #673AB7;
        }

        /*Animated Progress Bar*/
        .progress {
            height: 20px;
        }

        .progress-bar {
            background-color: #673AB7;
        }

        /*Fit image in bootstrap div*/
        .fit-image {
            width: 100%;
            object-fit: cover;
        }
    </style>
    <div class="row">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-pend" data-bs-toggle="tab" data-bs-target="#tab-pend-pane"
                    type="button" role="tab" aria-controls="tab-pend-pane" aria-selected="true">Historys
                    pending</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-historie" data-bs-toggle="tab" data-bs-target="#tab-historie-pane"
                    type="button" role="tab" aria-controls="tab-historie-pane" aria-selected="false">Historys</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane"
                    type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false"
                    disabled>Disabled</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-pend-pane" role="tabpanel" aria-labelledby="tab-pend"
                tabindex="0">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <form id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="hereDise"><strong>Hereditary Diseases</strong></li>
                                    <li id="personal"><strong>Non-pathological antecedents</strong></li>
                                    <li id="payment"><strong>Image</strong></li>
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Hereditary Diseases</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 1 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="switchDiabetes">
                                                            <label class="form-check-label"
                                                                for="switchDiabetes">Diabetes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtHypertensionRelative"
                                                                placeholder="Hypertension Relative">
                                                            <label for="txtHypertensionRelative">Hypertension
                                                                Relative</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="switchHype">
                                                            <label class="form-check-label"
                                                                for="switchHype">Hypertension</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="txtDiabetesRelative" placeholder="Diabetes Relative">
                                                            <label for="txtDiabetesRelative">Diabetes Relative</label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button"
                                            value="Next" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Non-pathological antecedents</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 2 - 4</h2>
                                            </div>
                                        </div>
                                        <label class="fieldlabels">First Name: *</label>
                                        <input type="text" name="fname" placeholder="First Name" />
                                        <label class="fieldlabels">Last Name: *</label>
                                        <input type="text" name="lname" placeholder="Last Name" />
                                        <label class="fieldlabels">Contact No.: *</label>
                                        <input type="text" name="phno" placeholder="Contact No." />
                                        <label class="fieldlabels">Alternate Contact No.: *</label>
                                        <input type="text" name="phno_2" placeholder="Alternate Contact No." />
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Image Upload:</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 3 - 4</h2>
                                            </div>
                                        </div>
                                        <label class="fieldlabels">Upload Your Photo:</label>
                                        <input type="file" name="pic" accept="image/*">
                                        <label class="fieldlabels">Upload Signature Photo:</label>
                                        <input type="file" name="pic" accept="image/*">
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Submit" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="fs-title">Finish:</h2>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 4 - 4</h2>
                                            </div>
                                        </div>
                                        <br><br>
                                        <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                                        <br>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <img src="https://i.imgur.com/GwStPmg.png" class="fit-image">
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5 class="purple-text text-center">You Have Successfully Signed Up
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-historie-pane" role="tabpanel" aria-labelledby="tab-historie"
                tabindex="0">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Historys</h5>
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
    <div class="modal fade" id="modalNew" tabindex="-1" aria-labelledby="modalNewLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalNewLabel">Add a new medical record</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/clinical.js') }}"></script>
@endsection
