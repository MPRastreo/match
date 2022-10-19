@extends('layout.layout')
@section('title')
    Family
@endsection
@section('pagetitle')
    Family
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
            margin-top: 30px;
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
                <div class="card-body">
                    <table class="table table-striped table-inverse table-responsive" id="table_id">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Relationship</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($familys as $family)
                                <tr>
                                    <td scope="row">{{ $family->name }} {{ $family->lastname }}</td>
                                    <td>{{ $family->age }}</td>
                                    <td>{{ $family->relationship }}</td>
                                    @if ($family->address['num_int'] == null || $family->address['num_int'] == 'N/A')
                                        <td>{{ $family->address['street'] }} #{{ $family->address['num_ext'] }}
                                            {{ $family->address['colony'] }} {{ $family->address['city'] }}
                                            {{ $family->address['state'] }} {{ $family->address['country'] }}
                                            {{ $family->address['postal_code'] }}</td>
                                    @else
                                        <td>{{ $family->address['street'] }} #{{ $family->address['num_ext'] }}
                                            Int. {{ $family->address['num_int'] }} {{ $family->address['colony'] }}
                                            {{ $family->address['city'] }} {{ $family->address['state'] }}
                                            {{ $family->address['country'] }} {{ $family->address['postal_code'] }}</td>
                                    @endif
                                    <td>{{ $family->email }}</td>
                                    <td>
                                        <div class="row ">
                                            <div class="col-md-12 d-flex flex-column bd-highlight mb-3">
                                                <a href="tel:{{ $family->phone['phone'] }}">
                                                    <i class="fa-solid fa-phone fa-xs"></i> {{ $family->phone['phone'] }}
                                                </a>
                                                <br>
                                                <a href="https://wa.me/{{ $family->phone['phone'] }}">
                                                    <i class="fa-brands fa-whatsapp fa-xs"></i>
                                                    {{ $family->phone['phone'] }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-12 d-flex flex-column bd-highlight mb-3">
                                                <button type="button" class="btn btn-outline-info btn-sm"
                                                    onclick="showMember({{ $family->id }})">
                                                    <i class="fa-regular fa-eye"></i> Details</button>
                                                <button type="button" class="btn btn-outline-primary btn-sm"
                                                    onclick="updateMember({{ $family->id }})">
                                                    <i class="fa-solid fa-edit"></i> Edit</button>
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    onclick="deleteMember({{ $family->id }})">
                                                    <i class="fa-solid fa-trash"></i> Delete</button>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Family</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-5">
                        <div class="row mb-2 d-flex justify-content-center align-items-center">
                            <div class="col-md-12">
                                <form id="regForm">
                                    <h1 id="register" class="text-center text-uppercase">Add family member</h1>
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
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-5">
                        <div class="row mb-2 d-flex justify-content-center align-items-center">
                            <div class="col-md-12">
                                <form id="regForm">
                                    <h1 id="register" class="text-center text-uppercase">Add family member</h1>
                                    <div class="all-steps" id="all-steps"> <span class="step"></span> <span
                                            class="step"></span> <span class="step"></span>
                                    </div>
                                    <div class="tab">
                                        <div class="row mb-2">
                                            {{-- Nombre --}}
                                            <div class="col-md-5">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="txtName"
                                                        name="Name" placeholder="Name" required>
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
    <div class="modal fade" id="modalDetails" tabindex="-1" aria-labelledby="modalDetailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailsLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4" id="img-profile">

                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
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
    </script>
    <script src="{{ asset('js/jquery.steps.js') }}"></script>
    <script src="{{ asset('js/family.js') }}"></script>
@endsection
