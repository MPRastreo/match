@extends('layout.layout')
@section('title')
    {{ GoogleTranslate::justTranslate('Appointment', app()->getLocale()) }}
@endsection
@section('pagetitle')
    {{ GoogleTranslate::justTranslate('Appointment', app()->getLocale()) }}
@endsection
@section('content')
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header">
                    @if (Auth::user()->role == 2)
                        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            style="margin: 15px; float:right;">
                            {{ GoogleTranslate::justTranslate('Schedule Appointment', app()->getLocale()) }}
                        </button>
                    @endif
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <div class="justify-content-center align-items-center">
                            <div class="row p-2 p-xs-cu-3">
                                @foreach ($quotation as $quota)
                                    @if ($quota->status == 'Assign' && (Auth::user()->role == 2 || Auth::user()->role == 1))
                                        <div class="col-md-4 p-2 px-3">
                                            <div class="card shadow-sm h-100">
                                                @if ($quota->gender == 'Male')
                                                    <div class="card-body text-center">
                                                        <img src="{{ asset('img/man.png') }}"
                                                            class="img-fluid rounded-top my-2" style="max-width: 162px;" alt="">
                                                    </div>
                                                @else
                                                    <div class="card-body text-center">
                                                        <img src="{{ asset('img/mujer.png') }}"
                                                            class="img-fluid rounded-top my-2" style="max-width: 162px;" alt="">
                                                    </div>
                                                @endif
                                                <div class="text-center">
                                                    {{ $quota->familyMembers }}<br><br>
                                                    <i class="bi bi-clipboard2-pulse-fill"></i> {{ $quota->specialy }}
                                                    </p>
                                                    <i class="bi bi-calendar-event"></i> {{ $quota->date }}
                                                    </p>
                                                </div>
                                                <div class="card-footer d-grid">

                                                    <div class="d-block py-2">
                                                        <button type="button" class="btn btn-warning w-100 rounded-pill"
                                                            onclick="seeDetails('{{ $quota->_id }}');">
                                                            {{ GoogleTranslate::justTranslate('See details', app()->getLocale()) }}
                                                        </button>
                                                    </div>
                                                    @if (Auth::user()->role == 1 || Auth::user()->role == 4)
                                                        <div class="d-block py-2">
                                                            <button type="button" class="btn btn-primary w-100 rounded-pill"
                                                                onclick="generateToken('{{ $quota->_id }}');">
                                                                {{ GoogleTranslate::justTranslate('Generate token', app()->getLocale()) }}
                                                            </button>
                                                        </div>
                                                    @endif
                                                </div>
                                            @elseif ($quota->status == 'Requested')
                                                <div class="col-xl-3 col-xs-cu-12 unidad">
                                                    <div class="card shadow mb-xs-cu-3 p-xl-4 p-xs-cu-2">
                                                        @if ($quota->gender == 'Male')
                                                            <div class="card-body text-center">
                                                                <img src="{{ asset('img/man.png') }}"
                                                                    class="img-fluid rounded-top my-2" alt="">
                                                            </div>
                                                        @else
                                                            <div class="card-body text-center">
                                                                <img src="{{ asset('img/mujer.png') }}"
                                                                    class="img-fluid rounded-top my-2 " alt="">
                                                            </div>
                                                        @endif
                                                        <div class="text-center">
                                                            {{ $quota->familyMembers }}<p></p>
                                                            <i class="bi bi-clipboard2-pulse-fill"></i>
                                                            {{ $quota->specialy }}
                                                            </p>

                                                            <i class="bi bi-calendar-event"></i> {{ $quota->date }}
                                                            </p>
                                                        </div>
                                                        <div class="card-footer d-grid">
                                                            @if (Auth::user()->role == 2 || Auth::user()->role == 1)
                                                                <button type="button" class="btn btn-danger"
                                                                    onclick="deleteAppointment('{{ $quota->_id }}');">
                                                                    {{ GoogleTranslate::justTranslate('Cancel', app()->getLocale()) }}
                                                                </button>
                                                            @else
                                                                <button type="button" class="btn btn-warning"
                                                                    {{-- data-bs-toggle="modal" data-bs-target="#assignQuotation" --}}
                                                                    onclick="openModalAssign('{{ $quota->_id }}');">
                                                                    {{ GoogleTranslate::justTranslate('Assign', app()->getLocale()) }}
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="col-md-8">
                                                <img src="https://gestaodeclinicas.ajmed.com.br/wp-content/uploads/2020/01/Contabilidade-para-cl%C3%ADnicas-m%C3%A9dicas-e-consult%C3%B3rios-m%C3%A9dicos.gif"
                                                    class="img-fluid col-12">
                                                <br>
                                                <h2 class="h2 text-center pb-5 px-5 text-title-cu text-bold-cu">
                                                    {{ GoogleTranslate::justTranslate('At the moment you have no appointments', app()->getLocale()) }}
                                                </h2>
                                            </div>
                                        </div>
                                    @elseif ($quota->status == 'Requested')
                                        <div class="col-md-4 p-2 px-3">
                                            <div class="card shadow h-100">
                                                @if ($quota->gender == 'Male')
                                                    <div class="card-body text-center">
                                                        <img src="{{ asset('img/man.png') }}"
                                                            class="img-fluid rounded-top my-2" style="max-width: 162px;" alt="">
                                                    </div>
                                                @else
                                                    <div class="card-body text-center">
                                                        <img src="{{ asset('img/mujer.png') }}"
                                                            class="img-fluid rounded-top my-2" style="max-width: 162px;" alt="">
                                                    </div>
                                                @endif
                                                <div class="text-center">
                                                    <p class="fw-bolder d-block">{{ $quota->familyMembers }}</p>
                                                    <p class="d-block">
                                                        <i class="bi bi-clipboard2-pulse-fill"></i>&nbsp;&nbsp;{{ $quota->specialy }}
                                                    </p>
                                                    <p class="d-block">
                                                        <i class="bi bi-calendar-event"></i>&nbsp;&nbsp;{{ $quota->date }}
                                                    </p>
                                                </div>
                                                <div class="card-footer d-grid">
                                                    @if (Auth::user()->role == 2 || Auth::user()->role == 1)
                                                        <button type="button" class="btn btn-danger rounded-pill"
                                                            onclick="deleteAppointment('{{ $quota->_id }}');">
                                                            {{ GoogleTranslate::justTranslate('Cancel', app()->getLocale()) }}
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-warning rounded-pill" {{-- data-bs-toggle="modal" data-bs-target="#assignQuotation" --}}
                                                            onclick="openModalAssign('{{ $quota->_id }}');">
                                                            {{ GoogleTranslate::justTranslate('Assign', app()->getLocale()) }}
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#txtBuscador").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#divContent .unidad").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        function validar() {
            if (validator) ñ

        }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ GoogleTranslate::justTranslate('Schedule Appointment', app()->getLocale()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation row g-3" novalidate>
                        <div class="col-md-12">
                            <input type="text" value="{{ Auth::user()->_id }}" id="txtFamilyFrom"
                                style="display: none;">
                            <label for="validationCustom01"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Specialty', app()->getLocale()) }}</b></label>
                            <select class="form-select" name="" id="txtSpecialty" required>
                                <option value="0" selected disabled>
                                    {{ GoogleTranslate::justTranslate('Reason for consultation', app()->getLocale()) }}
                                </option>
                                <option
                                    value="{{ GoogleTranslate::justTranslate('General inquiryn', app()->getLocale()) }}">
                                    {{ GoogleTranslate::justTranslate('General inquiry', app()->getLocale()) }}
                                </option>
                                <option value="{{ GoogleTranslate::justTranslate('Discomfort', app()->getLocale()) }}">
                                    {{ GoogleTranslate::justTranslate('Discomfort', app()->getLocale()) }}
                                </option>
                                <option
                                    value="{{ GoogleTranslate::justTranslate('Medical checkup', app()->getLocale()) }}">
                                    {{ GoogleTranslate::justTranslate('Medical checkup', app()->getLocale()) }}
                                </option>
                                <option
                                    value="{{ GoogleTranslate::justTranslate('Follow-up consultation', app()->getLocale()) }}">
                                    {{ GoogleTranslate::justTranslate('Follow-up consultation', app()->getLocale()) }}
                                </option>
                                <option value="Another">
                                    {{ GoogleTranslate::justTranslate('Another', app()->getLocale()) }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" id="txtSpecifyLabel"
                                style="display: none;"><b>{{ GoogleTranslate::justTranslate('Specify', app()->getLocale()) }}</b></label>
                            <input type="text" class="form-control" id="txtSpecify" style="display: none;">
                        </div>
                        <div class="col-md-12">
                            <label
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Date', app()->getLocale()) }}</b></label>
                            <input type="date" class="form-control" id="txtDate" required min=<?php $hoy = date('Y-m-d');
                            echo $hoy; ?>>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustomUsername"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Family members', app()->getLocale()) }}</b></label>
                            <div class="input-group has-validation">
                                <select class="form-select" name="" id="txtFamilyMembers" required>
                                    <option value="" selected disabled>
                                        {{ GoogleTranslate::justTranslate('Select a family member', app()->getLocale()) }}
                                    </option>
                                    <option value="{{ Auth::user()->_id }}">
                                        {{ Auth::user()->name . ' ' . Auth::user()->lastname }}</option>
                                    @foreach ($familys as $fam)
                                        <option value="{{ $fam->_id }}">
                                            {{ $fam->name . ' ' . $fam->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustomUsername"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Reason for inquiry', app()->getLocale()) }}</b></label>
                            <div class="input-group has-validation">
                                <div class="form-floating">
                                    <textarea class="form-control" id="floatingTextarea" required></textarea>
                                    <button id="btnSaveQuotation" type="submit" style="display: none;"></button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill"
                                data-bs-dismiss="modal">{{ GoogleTranslate::justTranslate('Cancel', app()->getLocale()) }}</button>
                            <button type="button" onclick="$('#btnSaveQuotation').click();"
                                class="btn btn-primary rounded-pill">{{ GoogleTranslate::justTranslate('Save changes', app()->getLocale()) }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="assignQuotation" tabindex="-1" aria-labelledby="assignQuotationLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignQuotationLabel">
                        {{ GoogleTranslate::justTranslate('Schedule Appointment', app()->getLocale()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation-assign row g-3" novalidate>

                        <h5>{{ GoogleTranslate::justTranslate('Physician data', app()->getLocale()) }}</h5>

                        <div class="col-md-12">
                            <input type="text" class="form-control" id="txtId" disabled style="display: none;">
                            <label for="validationCustom01"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Name', app()->getLocale()) }}</b></label>
                            <input type="text" class="form-control" id="txtName" required>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="validationCustom01"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Mail', app()->getLocale()) }}</b></label>
                            <input type="text" class="form-control" id="txtMail" required>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="validationCustom01"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Phone', app()->getLocale()) }}</b></label>
                            <input type="text" class="form-control" id="txtPhone" required>
                        </div>

                        <hr>

                        <h5>{{ GoogleTranslate::justTranslate('Clinic data', app()->getLocale()) }}</h5>

                        <div class="col-md-12">
                            <label for="validationCustom01"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Clinic name', app()->getLocale()) }}</b></label>
                            <input type="text" class="form-control" id="txtClinicName" required>
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom01"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Address', app()->getLocale()) }}</b></label>
                            <input type="text" class="form-control" id="txtAddress" required>

                            <button id="btnAssignQuotation" type="submit" style="display: none;"></button>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill"
                                data-bs-dismiss="modal">{{ GoogleTranslate::justTranslate('Cancel', app()->getLocale()) }}</button>
                            <button type="button" onclick="$('#btnAssignQuotation').click();"
                                class="btn btn-primary rounded-pill">{{ GoogleTranslate::justTranslate('Save changes', app()->getLocale()) }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="seeQuotation" tabindex="-1" aria-labelledby="seeQuotationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="seeQuotationLabel">
                        {{ GoogleTranslate::justTranslate('Appointment details', app()->getLocale()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <h5>{{ GoogleTranslate::justTranslate('Physician data', app()->getLocale()) }}</h5>

                        <div class="col-md-12">
                            <label for="validationCustom01"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Doctor', app()->getLocale()) }}</b></label>
                            <input type="text" class="form-control" id="txtDoctorSee" readonly>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="validationCustom01"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Mail', app()->getLocale()) }}</b></label>
                            <input type="text" class="form-control" id="txtMailSee" readonly>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="validationCustom01"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Phone', app()->getLocale()) }}</b></label>
                            <input type="text" class="form-control" id="txtPhoneSee" readonly>
                        </div>

                        <hr>

                        <h5>{{ GoogleTranslate::justTranslate('Clinic data', app()->getLocale()) }}</h5>

                        <div class="col-md-12">
                            <label for="validationCustom01"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Clinic name', app()->getLocale()) }}</b></label>
                            <input type="text" class="form-control" id="txtClinicNameSee" readonly>
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom01"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Address', app()->getLocale()) }}</b></label>
                            <input type="text" class="form-control" id="txtAddressSee" readonly>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary rounded-pill"
                                data-bs-dismiss="modal">{{ GoogleTranslate::justTranslate('Close Details', app()->getLocale()) }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/quotation.js') }}"></script>
    <script>
        var arrayQuotations = @json($quotation);
    </script>
@endsection
