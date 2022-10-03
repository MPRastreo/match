@extends('layout.layout')
@section('title')
    Family
@endsection
@section('pagetitle')
    Family
@endsection
@section('content')
    <style>
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header">
                    <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">
                        <i class="fa-solid fa-plus"></i> Add</button>

                </div>
                <div class="card-body">
                  
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
                    <form action="">
                        <div class="row">
                            {{-- Nombre --}}
                            <div class="col-md-6 p-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="txtName" placeholder="Name">
                                    <label for="txtName" class="text-danger">Name </label>
                                </div>
                            </div>
                            {{-- Last name --}}
                            <div class="col-md-6 p-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="txtLastName" placeholder="Last name">
                                    <label for="txtLastName" class="text-danger">Last name </label>
                                </div>
                            </div>
                            {{-- Fecha de nacimiento  --}}
                            <div class="col-md-4 p-2">
                                <div class="form-floating">
                                    <input type="date" class="form-control " id="txtBirthDate"
                                        placeholder="Date of birth">
                                    <label for="txtBirthDate" class="text-danger">Date of birth </label>
                                </div>
                            </div>
                            {{-- Relationship --}}
                            <div class="col-md-4 p-2">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="relationshipSelect" aria-label="State">
                                        <option selected disabled>Select one</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Father">Father</option>
                                        <option value="Son">Son</option>
                                        <option value="Daughter">Daughter</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Spouse">Spouse</option>
                                    </select>
                                    <label for="relationshipSelect">Relationship</label>
                                </div>
                            </div>
                            {{-- Phone --}}
                            <div class="col-md-4 p-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="txtPhone" placeholder="Phone">
                                    <label for="txtPhone" class="text-danger">Phone </label>
                                </div>
                            </div>
                            {{-- Address --}}
                            <div class="col-md-4 p-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="txtAddress" placeholder="Address">
                                    <label for="txtAddress" class="text-danger">Address </label>
                                </div>
                            </div>
                            {{-- number --}}
                            <div class="col-md-4 p-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="txtNumber" placeholder="Number">
                                    <label for="txtNumber" class="text-danger">Number </label>
                                </div>
                            </div>
                            {{-- City --}}
                            <div class="col-md-4 p-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="txtCity" placeholder="City">
                                    <label for="txtCity" class="text-danger">City </label>
                                </div>
                            </div>
                            {{-- Lugar de nacimiento --}}
                            <div class="col-md-6 p-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="txtBirthPlace"
                                        placeholder="Birth place">
                                    <label for="txtBirthPlace" class="text-danger">Birth place </label>
                                </div>
                            </div>
                            {{-- Correo --}}
                            <div class="col-md-6 p-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="txtEmail" placeholder="Email">
                                    <label for="txtEmail" class="text-danger">Email </label>
                                </div>
                            </div>
                            {{-- Telefono --}}
                            <div class="col-md-6 p-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="txtPhone" placeholder="Phone">
                                    <label for="txtPhone" class="text-danger">Phone </label>
                                </div>
                            </div>
                            {{-- Estado civil --}}
                            <div class="col-md-6 p-2">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="maritalStatusSelect" aria-label="State">
                                        <option selected disabled>Select one</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widower">Widower</option>
                                    </select>
                                    <label for="maritalStatusSelect">Marital status</label>
                                </div>
                            </div>
                            {{-- Ocupacion --}}
                            <div class="col-md-6 p-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="txtOccupation"
                                        placeholder="Occupation">
                                    <label for="txtOccupation" class="text-danger">Occupation </label>
                                </div>
                            </div>
                            {{-- Religion --}}
                            <div class="col-md-6 p-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="txtReligion" placeholder="Religion">
                                    <label for="txtReligion" class="text-danger">Religion </label>
                                </div>
                            </div>
                            {{-- Nacionalidad --}}
                            <div class="col-md-6 p-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="txtNationality"
                                        placeholder="Nationality">
                                    <label for="txtNacionality">Nacionality</label>
                                </div>
                            </div>
                            {{-- Escolaridad --}}
                            <div class="col-md-6 p-2">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="scholarshipSelect" aria-label="State">
                                        <option selected disabled>Select one</option>
                                        <option value="Primary">Primary</option>
                                        <option value="Secondary">Secondary</option>
                                        <option value="High school">High school</option>
                                        <option value="University">University</option>
                                        <option value="Postgraduate">Postgraduate</option>
                                    </select>
                                    <label for="scholarshipSelect">Scholarship</label>
                                </div>
                            </div>
                    </form>
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
    <script>
        $(document).ready(function() {
            $('#dashboard').addClass('active');
        });
    </script>
@endsection
