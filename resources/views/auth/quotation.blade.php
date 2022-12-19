@extends('layout.layout')
@section('title')
    {{ GoogleTranslate::justTranslate('Quotation', app()->getLocale()) }}
@endsection
@section('pagetitle')
    {{ GoogleTranslate::justTranslate('Quotation', app()->getLocale()) }}
@endsection
@section('content')
    <div class="row">

        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card w-100">
                    <div class="card-header">
                        @if (Auth::user()->role == 2)
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                style="margin: 15px; float:right;">
                                {{ GoogleTranslate::justTranslate('Schedule Appointment', app()->getLocale()) }}
                            </button>
                        @else
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="col md 12">
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="row p-xl-5 p-xs-cu-3">
                                    @foreach ($quotation as $quota)
                                        @if ($quota->status == "Assign" && (Auth::user()->role == 2 || Auth::user()->role == 1))
                                            <div class="col-xl-3 col-xs-cu-12">
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
                                                        {{ $quota->familyMembers }}<br><br>
                                                        <i class="bi bi-clipboard2-pulse-fill"></i> {{ $quota->specialy }}
                                                        </p>

                                                        <i class="bi bi-calendar-event"></i> {{ $quota->date }}
                                                        </p>
                                                    </div>
                                                    <div class="card-footer d-grid">
                                                        {{-- @if (Auth::user()->role == 2) --}}
                                                            <button type="button" class="btn btn-warning"
                                                                onclick="seeDetails('{{ $quota->_id }}');">
                                                                {{ GoogleTranslate::justTranslate('See details', app()->getLocale()) }}
                                                            </button>
                                                        {{-- @endif --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($quota->status == "Requested")
                                            <div class="col-xl-3 col-xs-cu-12">
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
                                                        {{ $quota->familyMembers }}<br><br>
                                                        <i class="bi bi-clipboard2-pulse-fill"></i> {{ $quota->specialy }}
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <label for="validationCustom01"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Specialty', app()->getLocale()) }}</b></label>
                            <input type="text" class="form-control" id="txtSpecialty" required>
                        </div>
                        <div class="col-md-12">
                            <label
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Date', app()->getLocale()) }}</b></label>
                            <input type="date" class="form-control" id="txtDate" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustomUsername"
                                class="form-label"><b>{{ GoogleTranslate::justTranslate('Family members', app()->getLocale()) }}</b></label>
                            <div class="input-group has-validation">
                                <select class="form-select" name="" id="txtFamilyMembers" required>
                                    <option value="" selected disabled>
                                        {{ GoogleTranslate::justTranslate('Select a family member', app()->getLocale()) }}</option>
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
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ GoogleTranslate::justTranslate('Cancel', app()->getLocale()) }}</button>
                            <button type="button" onclick="$('#btnSaveQuotation').click();"
                                class="btn btn-primary">{{ GoogleTranslate::justTranslate('Save change', app()->getLocale()) }}</button>
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
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ GoogleTranslate::justTranslate('Cancel', app()->getLocale()) }}</button>
                            <button type="button" onclick="$('#btnAssignQuotation').click();"
                                class="btn btn-primary">{{ GoogleTranslate::justTranslate('Save change', app()->getLocale()) }}</button>
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
                            <button type="button" class="btn btn-primary"
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
