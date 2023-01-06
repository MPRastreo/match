@extends('layout.layout')
@section('title')
    {{ ucwords(GoogleTranslate::justTranslate('Family', app()->getLocale())) }}
@endsection
@section('pagetitle')
    {{ ucwords(GoogleTranslate::justTranslate('Family', app()->getLocale())) }}
@endsection
@section('content')
    <style>
        input.invalid {
            border-color: #ff0d0d
        }

        input.valid {
            border-color: #198754
        }

        select.invalid {
            border-color: #ff0d0d
        }

        select.valid {
            border-color: #198754
        }

        .tab {
            display: none
        }

        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #9b9f9f;
            border: none;
            border-radius: 50%;
            display: inline-block;
        }

        .step.finish {
            background-color: #1e68b1;
        }

        .all-steps {
            text-align: center;
            margin-bottom: 30px
        }

        .thanks-message {
            display: none
        }
    </style>
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header">
                    <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">
                        <i class="fa-solid fa-plus"></i> Add</button>
                </div>
                <div class="card-body pt-3 d-none d-md-block">
                    <div class="d-flex">
                        <div class="row justify-content-center align-items-center">
                            @foreach ($familys as $family)
                                <div class="col-md-6 mb-4">
                                    <div class="card mb-3" style="border-radius: 20px;">
                                        <div class="row g-0">
                                            <div class="col-md-5 text-center text-white"
                                                style="background-color: rgba(35,161,220); border-bottom-left-radius: 20px; border-top-left-radius: 20px;">
                                                @if ($family->gender == 'Male')
                                                    <img src="{{ asset('img/man.png') }}"
                                                        class="img-fluid rounded-top my-5" style="max-width: 162px;" alt="">
                                                @else
                                                    <img src="{{ asset('img/mujer.png') }}"
                                                        class="img-fluid rounded-top my-5" style="max-width: 162px;" alt="">
                                                @endif
                                                {{-- alt="Avatar" class="img-fluid " style="width: 80px;" /> --}}
                                                <h5 class="fw-bolder">{{ $family->name }} {{ $family->lastname }} </h5>
                                                @if (isset($family->occupation))
                                                    <p>{{ ucwords($family->occupation) }}</p>
                                                @endif
                                                <p>{{ $family->schooling }}</p>
                                                <button type="button" class="btn btn-sm"
                                                    onclick="editMember('{{ $family->_id }}')"> <i
                                                        class="far fa-edit text-light"></i></button>
                                                <button type="button" class="btn btn-sm"
                                                    onclick="deleteMember('{{ $family->_id }}')">
                                                    <i class="fa-solid fa-trash-can text-danger"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-7" style="border: 3px solid rgba(35,161,220); border-bottom-right-radius: 20px; border-top-right-radius: 20px;">
                                                <div class="card-body p-4">
                                                    <h4>Information</h6>
                                                        <hr class="mt-0 mb-4">
                                                        <div class="row pt-1">
                                                            <div class="col-md-12 mb-2">
                                                                <h6>Email</h6>
                                                                <p class="text-muted">{{ $family->email }}</p>
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <h6>Phone</h6>
                                                                <p class="text-muted ">{{ $family->phone['phone'] }}</p>
                                                                <h6>Mobile</h6>
                                                                <p class="text-muted ">{{ $family->phone['mobile'] }}</p>
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <h6>Address</h6>
                                                                <p class="text-muted mb-0">{{ $family->address['street'] }}
                                                                    #{{ $family->address['num_ext'] }}
                                                                    @if ($family->address['num_int'] != 'N/A')
                                                                        - {{ $family->address['num_int'] }}
                                                                    @endif
                                                                    {{ $family->address['colony'] }}
                                                                    {{ $family->address['state'] }}
                                                                    {{ $family->address['country'] }}
                                                                    {{ $family->address['zip_code'] }}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <h6>Age</h6>
                                                                <p class="text-muted">{{ $family->age }}</p>
                                                            </div>
                                                            <div class="col-md-8 mb-2">
                                                                <h6>Relationship</h6>
                                                                <p class="text-muted mb-0">{{ $family->relationship }}</p>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3 d-md-none">
                    <div class="d-flex">
                        <div class="row justify-content-center align-items-center">
                            @foreach ($familys as $family)
                                <div class="col-md-6 mb-4">
                                    <div class="card mb-3" style="border-radius: 20px;">
                                        <div class="row g-0">
                                            <div class="col-md-5 text-center text-white"
                                                style="background-color: rgba(35,161,220); border-top-left-radius: 20px; border-top-right-radius: 20px;">
                                                @if ($family->gender == 'Male')
                                                    <img src="{{ asset('img/man.png') }}"
                                                        class="img-fluid rounded-top my-4" style="max-width: 162px;" alt="">
                                                @else
                                                    <img src="{{ asset('img/mujer.png') }}"
                                                        class="img-fluid rounded-top my-4" style="max-width: 162px;" alt="">
                                                @endif
                                                {{-- alt="Avatar" class="img-fluid " style="width: 80px;" /> --}}
                                                <h5 class="fw-bolder">{{ $family->name }} {{ $family->lastname }} </h5>
                                                @if (isset($family->occupation))
                                                    <p>{{ ucwords($family->occupation) }}</p>
                                                @endif
                                                <p>{{ $family->schooling }}</p>
                                                <button type="button" class="btn btn-sm pb-3"
                                                    onclick="editMember('{{ $family->_id }}')"> <i
                                                        class="far fa-edit text-light"></i></button>
                                                <button type="button" class="btn btn-sm pb-3"
                                                    onclick="deleteMember('{{ $family->_id }}')">
                                                    <i class="fa-solid fa-trash-can text-danger"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-7" style="border: 3px solid rgba(35,161,220); border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                                                <div class="card-body p-4">
                                                    <h4>Information</h6>
                                                        <hr class="mt-0 mb-4">
                                                        <div class="row pt-1">
                                                            <div class="col-md-12 mb-2">
                                                                <h6>Email</h6>
                                                                <p class="text-muted">{{ $family->email }}</p>
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <h6>Phone</h6>
                                                                <p class="text-muted ">{{ $family->phone['phone'] }}</p>
                                                                <h6>Mobile</h6>
                                                                <p class="text-muted ">{{ $family->phone['mobile'] }}</p>
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <h6>Address</h6>
                                                                <p class="text-muted mb-0">{{ $family->address['street'] }}
                                                                    #{{ $family->address['num_ext'] }}
                                                                    @if ($family->address['num_int'] != 'N/A')
                                                                        - {{ $family->address['num_int'] }}
                                                                    @endif
                                                                    {{ $family->address['colony'] }}
                                                                    {{ $family->address['state'] }}
                                                                    {{ $family->address['country'] }}
                                                                    {{ $family->address['zip_code'] }}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <h6>Age</h6>
                                                                <p class="text-muted">{{ $family->age }}</p>
                                                            </div>
                                                            <div class="col-md-8 mb-2">
                                                                <h6>Relationship</h6>
                                                                <p class="text-muted mb-0">{{ $family->relationship }}</p>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Family Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-2 d-flex justify-content-center align-items-center">
                            <div class="col-md-12">
                                <form id="regForm">
                                    <div class="all-steps" id="all-steps"> <span class="step"></span> <span
                                            class="step"></span> <span class="step"></span>
                                    </div>
                                    <div class="tab">
                                        <div class="row mb-2">
                                            {{-- Nombre --}}
                                            <div class="col-md-5">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtName" name="Name"
                                                        placeholder="Name" required>
                                                    <label for="txtName">Name</label>
                                                </div>
                                            </div>
                                            {{-- Apellido --}}
                                            <div class="col-md-5">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtlastname"
                                                        name="lastname" placeholder="Lastname" required>
                                                    <label for="lastname">Lastname</label>
                                                </div>
                                            </div>
                                            {{-- Relacion --}}
                                            <div class="col-md-2">
                                                <div class="form-floating">
                                                    <select class="form-select" id="txtRelation" name="Relation"
                                                        aria-label="Floating label select example" required>
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="Sister">Sister</option>
                                                        <option value="Son">Son</option>
                                                        <option value="Daughter">Daughter</option>
                                                        <option value="Grandfather">Grandfather</option>
                                                        <option value="Grandmother">Grandmother</option>
                                                    </select>
                                                    <label for="txtRelation">Relation</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            {{-- Fecha de nacimiento --}}
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" id="txtdate_of_birth"
                                                        name="Date of birth" placeholder="Date of birth" required>
                                                    <label for="txtdate_of_birth">Date of birth</label>
                                                </div>
                                            </div>

                                            {{-- Sexo --}}
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <select class="form-select" id="sltGender" aria-label="Gender">
                                                        <option selected value="" disabled>Please select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        {{-- <option value="Other">Other</option> --}}
                                                    </select>
                                                    <label for="sltGender">Gender</label>
                                                </div>
                                            </div>

                                            {{-- Estado civil --}}
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <select class="form-select" id="sltCivilStatus"
                                                        aria-label="Civil status">
                                                        <option selected value="" disabled>Please select</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Widowed">Widowed</option>
                                                    </select>
                                                    <label for="sltCivilStatus">Civil status</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            {{-- Lugar de nacimiento --}}
                                            {{-- Ciudad de nacimineto --}}
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtCityOfBirth"
                                                        name="City of birth" placeholder="City of birth" required>
                                                    <label for="txtCityOfBirth">City of birth</label>
                                                </div>
                                            </div>
                                            {{-- Estado de nacimiento --}}
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtStateOfBirth"
                                                        name="State of birth" placeholder="State of birth" required>
                                                    <label for="txtStateOfBirth">State of birth</label>
                                                </div>
                                            </div>
                                            {{-- Pais de nacimiento --}}
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtCountryOfBirth"
                                                        name="Country of birth" placeholder="Country of birth" required>
                                                    <label for="txtCountryOfBirth">Country of birth</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab">
                                        <div class="row mb-2">
                                            {{-- Addres --}}
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtStreet"
                                                        name="Street" placeholder="Street" required>
                                                    <label for="txtStreet">Street</label>
                                                </div>
                                            </div>
                                            {{-- Num_exterior --}}
                                            <div class="col-md-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtNumExt"
                                                        name="Num_exterior" placeholder="Num_exterior" required>
                                                    <label for="txtNumExt">Num_exterior</label>
                                                </div>
                                            </div>
                                            {{-- Num_interior --}}
                                            <div class="col-md-3">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtNumInt"
                                                        name="Num Ins " value="N/A" placeholder="Num Ins" required>
                                                    <label for="txtNumInt">Num Ins</label>
                                                </div>
                                            </div>
                                            {{-- Codigo postal --}}
                                            <div class="col-md-2">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtPostalCode"
                                                        name="Postal code" placeholder="Postal code" required>
                                                    <label for="txtPostalCode">Postal code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            {{-- Colonia --}}
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtColony"
                                                        name="Colony" placeholder="Colony" required>
                                                    <label for="txtColony">Colony</label>
                                                </div>
                                            </div>
                                            {{-- Ciudad --}}
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtCity"
                                                        name="City" placeholder="City" required>
                                                    <label for="txtCity">City</label>
                                                </div>
                                            </div>
                                            {{-- Estado --}}
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtState"
                                                        name="State" placeholder="State" required>
                                                    <label for="txtState">State</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            {{-- Pais --}}
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtCountry"
                                                        name="Country" placeholder="Country" required>
                                                    <label for="txtCountry">Country</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab">
                                        <div class="row mb-2">
                                            {{-- Correo --}}
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" id="txtEmail"
                                                        name="Email" placeholder="Email" {{-- required --}}>
                                                    <label for="txtEmail">Email</label>
                                                </div>
                                            </div>
                                            {{-- Telefono --}}
                                            <div class="col-md-6">
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtPhone"
                                                                name="Phone" placeholder="Phone" {{-- required --}}>
                                                            <label for="txtPhone">Phone</label>
                                                        </div>
                                                    </div>
                                                    {{-- movil --}}
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="txtMobile"
                                                                name="Mobile" placeholder="Mobile"
                                                                {{-- required --}}>
                                                            <label for="txtMobile">Mobile</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            {{-- Escolaridad --}}
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-select" id="txtSchooling" name="Schooling"
                                                        required>
                                                        <option value="" selected disabled>Choose...</option>
                                                        <option value="Primary">Primary</option>
                                                        <option value="Secondary">Secondary</option>
                                                        <option value="High School">High School</option>
                                                        <option value="University">University</option>
                                                        <option value="Master's Degree">Master's Degree</option>
                                                        <option value="Doctorate">Doctorate</option>

                                                    </select>
                                                    <label for="txtSchooling">Schooling</label>
                                                </div>
                                            </div>
                                            {{-- Ocupacion --}}
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtOccupation"
                                                        name="Occupation" placeholder="Occupation" {{-- required --}}>
                                                    <label for="txtOccupation">Occupation</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            {{-- Religion --}}
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <select class="form-select" id="txtReligion" name="Religion"
                                                        {{-- required --}}>
                                                        <option value="" selected disabled>Choose...</option>
                                                        <option value="Catholic">Catholic</option>
                                                        <option value="Protestant">Protestant</option>
                                                        <option value="Jewish">Jewish</option>
                                                        <option value="Muslim">Muslim</option>
                                                        <option value="Atheist">Atheist</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <label for="txtReligion">Religion</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thanks-message text-center" id="text-message"><i
                                            class="fas fa-check fa-5x text-success"></i>
                                        <h3>Thank you</h3> <span>We will check the data in a moment</span>
                                        <span>We appreciate your time</span>
                                    </div>
                                    <div style="overflow:auto;" id="nextprevious" class="row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" id="prevBtn"
                                                    class="btn btn-outline-secondary w-50 float-start"
                                                    onclick="nextPrev(-1)"><i class="fas fa-arrow-left"></i>
                                                    &nbsp;Previous</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" id="nextBtn"
                                                    class="btn btn-outline-info w-50 float-end" onclick="nextPrev(1)"><i
                                                        class="fas fa-arrow-to-right"></i>Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- Modal Edit --}}
    <div class="modal fade" id="modalEditMember" tabindex="-1" aria-labelledby="modalEditMemberLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row mb-3 mt-2">
                            <input type="hidden" name="txtIdEdit" id="txtIdEdit">
                            <h4>Personal Data</h4>
                            <hr>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="txtNameEdit" name="txtNameEdit"
                                        placeholder="Name">
                                    <label for="txtNameEdit">Name</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="txtLastNameEdit"
                                        name="txtLastNameEdit" placeholder="Last Name">
                                    <label for="txtLastNameEdit">Last Name</label>
                                </div>
                            </div>
                            {{-- Civil status --}}
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" id="txtCivilStatusEdit" name="txtCivilStatusEdit">
                                        <option value="" selected disabled>Choose...</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                    <label for="txtCivilStatusEdit">Civil Status</label>
                                </div>
                            </div>
                            {{-- Age --}}
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="txtAgeEdit" name="txtAgeEdit"
                                        placeholder="Age" disabled>
                                    <label for="txtAgeEdit">Age</label>
                                </div>
                            </div>
                            {{-- RelationShip --}}
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" id="txtRelationshipEdit" name="txtRelationshipEdit">
                                        <option value="" selected disabled>Choose...</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Son">Son</option>
                                        <option value="Daughter">Daughter</option>
                                        <option value="Grandfather">Grandfather</option>
                                        <option value="Grandmother">Grandmother</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <label for="txtRelationshipEdit">RelationShip</label>
                                </div>
                            </div>
                            <div class="row mb-3 mt-2">
                                <h4>Address</h4>
                                <hr>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtStreetEdit"
                                            name="txtStreetEdit" placeholder="Street">
                                        <label for="txtStreetEdit">Street</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtNumberEdit"
                                            name="txtNumberEdit" placeholder="Number">
                                        <label for="txtNumberEdit">Number</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtColonyEdit"
                                            name="txtColonyEdit" placeholder="Colony">
                                        <label for="txtColonyEdit">Colony</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtZipCodeEdit"
                                            name="txtZipCodeEdit" placeholder="Zip Code">
                                        <label for="txtZipCodeEdit">Zip Code</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtCityEdit" name="txtCityEdit"
                                            placeholder="City">
                                        <label for="txtCityEdit">City</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtStateEdit" name="txtStateEdit"
                                            placeholder="State">
                                        <label for="txtStateEdit">State</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtCountryEdit"
                                            name="txtCountryEdit" placeholder="Country">
                                        <label for="txtCountryEdit">Country</label>
                                    </div>
                                </div>


                            </div>
                            <div class="row mb-3 mt-2">
                                <h4>
                                    Contact
                                </h4>
                                <hr>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtPhoneEdit" name="txtPhoneEdit"
                                            placeholder="Phone">
                                        <label for="txtPhoneEdit">Phone</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtMobileEdit"
                                            name="txtMobileEdit" placeholder="Phone Mobile">
                                        <label for="txtMobileEdit">Phone Mobile</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtEmailEdit" name="txtEmailEdit"
                                            placeholder="Email">
                                        <label for="txtEmailEdit">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtSchoolingEdit"
                                            name="txtSchoolingEdit" placeholder="Schooling">
                                        <label for="txtSchoolingEdit">Schooling</label>
                                    </div>
                                </div>
                                {{-- Occupation --}}
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtOccupationEdit"
                                            name="txtOccupationEdit" placeholder="Occupation">
                                        <label for="txtOccupationEdit">Occupation</label>
                                    </div>
                                </div>
                                {{-- Religion --}}
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtReligionEdit"
                                            name="txtReligionEdit" placeholder="Religion">
                                        <label for="txtReligionEdit">Religion</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="updateMember()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });
            var arrayMembers = @json($familys);
            var usuario = @json(Auth::user());
        </script>
        <script src="{{ asset('js/jquery.steps.js') }}"></script>
        <script src="{{ asset('js/family.js') }}"></script>
    @endsection
