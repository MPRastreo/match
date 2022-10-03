@extends('layout.layout')
@section('title')
    Personal Data
@endsection
@section('pagetitle')
    Personal Data
@endsection
@section('content')
    <style>
        .borderF {
            border-bottom: 4px solid rgb(0, 106, 255);
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header">
                    <h4 class="card-title">Name & Last name </h4>
                </div>
                <div class="card-body pt-3">
                    <!-- Vertical Pills Tabs -->
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active" id="personal-data-tab" data-bs-toggle="pill"
                                data-bs-target="#personal-data" type="button" role="tab" aria-controls="personal-data"
                                aria-selected="true"><i class="fa-regular fa-user"></i></button>
                            <button class="nav-link " id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false"><i
                                    class="fa-regular fa-address-book"></i></button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-messages" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">Messages</button>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active  profile-overview" id="personal-data" role="tabpanel"
                                aria-labelledby="personal-data-tab">
                                <h5 class="card-title">Profile Details</h5>
                                <form class="row g-3">
                                    {{-- Nombre --}}
                                    <div class="col-md-11 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="txtName"
                                                        {{--  keivn  --}} value="Kevin" placeholder="Your Name">
                                                    <label for="txtName" class="text-danger">Your Name </label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Apellido --}}
                                    <div class="col-md-11 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="txtLastName"
                                                        placeholder="Phone" value="Andersson">
                                                    <label for="txtLastName" class="text-danger ">Your Last
                                                        Name</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- Edad --}}
                                    <div class="col-md-4 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control border-0" id="txtAge"
                                                        placeholder="Your Age" value="24">
                                                    <label for="txtAge" class="text-danger">Your Age</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- Año de nacimiento --}}
                                    <div class="col-md-3 m-4">
                                        <div class="row borderF">
                                            <div class="col-8">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control border-0" id="txtAgeBirth"
                                                        placeholder="Age of Birth">
                                                    <label for="txtAgeBirth" class="text-danger">Age of Birth</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-4 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Genero --}}
                                    <div class="col-md-3 m-4">
                                        <div class="row borderF">
                                            <div class="col-7 ">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="txtGender"
                                                        placeholder="Gender">
                                                    <label for="txtGender" class="text-danger">Gender</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- correo --}}
                                    <div class="col-md-4 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="txtEmail"
                                                        {{--  keivn  --}} value="Kevin" placeholder="Email">
                                                    <label for="txtEmail" class="text-danger">Email </label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Telefono --}}
                                    <div class="col-md-3 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="txtPhone"
                                                        placeholder="Phone" value="Andersson">
                                                    <label for="txtPhone" class="text-danger ">Phone</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- Estado civil --}}
                                    <div class="col-md-3 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0"
                                                        id="txtMaritalStatus" placeholder="Marital status">
                                                    <label for="txtMarital" class="text-danger">Marital status</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Nacionalidad --}}
                                    <div class="col-md-5 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0"
                                                        id="txtBirthplace" placeholder="Birthplace">
                                                    <label for="txtBirthplace" class="text-danger">Birthplace</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Direccion --}}
                                    <div class="col-md-5 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="txtAddress"
                                                        placeholder="Address">
                                                    <label for="txtAddress" class="text-danger">Address</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Escolaridad --}}
                                    <div class="col-md-3 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="txtSchooling"
                                                        placeholder="Schooling">
                                                    <label for="txtSchooling" class="text-danger">Schooling</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Ocupacion --}}
                                    <div class="col-md-3 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0"
                                                        id="txtOccupation" placeholder="Occupation">
                                                    <label for="txtOccupation" class="text-danger">Occupation</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Religion --}}
                                    <div class="col-md-3 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="txtReligion"
                                                        placeholder="Religion">
                                                    <label for="txtReligion" class="text-danger">Religion</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="tab-pane fade " id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <h5 class="card-title">Personal information</h5>
                                <form class="row g-3">

                                    {{-- Edad --}}
                                    <div class="col-md-4 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control border-0" id="txtAge"
                                                        placeholder="Your Age" value="24">
                                                    <label for="txtAge" class="text-danger">Your Age</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- Año de nacimiento --}}
                                    <div class="col-md-3 m-4">
                                        <div class="row borderF">
                                            <div class="col-8">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control border-0" id="txtAgeBirth"
                                                        placeholder="Age of Birth">
                                                    <label for="txtAgeBirth" class="text-danger">Age of Birth</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-4 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Genero --}}
                                    <div class="col-md-3 m-4">
                                        <div class="row borderF">
                                            <div class="col-7 ">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="txtGender"
                                                        placeholder="Gender">
                                                    <label for="txtGender" class="text-danger">Gender</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Estado civil --}}
                                    <div class="col-md-4 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0"
                                                        id="txtMaritalStatus" placeholder="Marital status">
                                                    <label for="txtMarital" class="text-danger">Marital status</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Nacionalidad --}}
                                    <div class="col-md-4 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0"
                                                        id="txtBirthplace" placeholder="Birthplace">
                                                    <label for="txtBirthplace" class="text-danger">Birthplace</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Direccion --}}
                                    <div class="col-md-11 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="txtAddress"
                                                        placeholder="Address">
                                                    <label for="txtAddress" class="text-danger">Address</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Escolaridad --}}
                                    <div class="col-md-3 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="txtSchooling"
                                                        placeholder="Schooling">
                                                    <label for="txtSchooling" class="text-danger">Schooling</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Ocupacion --}}
                                    <div class="col-md-3 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0"
                                                        id="txtOccupation" placeholder="Occupation">
                                                    <label for="txtOccupation" class="text-danger">Occupation</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Religion --}}
                                    <div class="col-md-3 m-4">
                                        <div class="row borderF">
                                            <div class="col-7">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="txtReligion"
                                                        placeholder="Religion">
                                                    <label for="txtReligion" class="text-danger">Religion</label>
                                                </div>
                                            </div>
                                            <div class="d-grid col-5 mx-auto">
                                                <button
                                                    class="btn btn-outline-primary float-end btn-inline border-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">
                                Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque.
                                Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit
                                molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                            </div>
                        </div>
                    </div>
                    <!-- End Vertical Pills Tabs -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dashboard').addClass('active');
        });
    </script>
@endsection
