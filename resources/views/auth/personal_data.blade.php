@extends('layout.layout')
@section('title')
    {{ GoogleTranslate::justTranslate('Personal data', app()->getLocale()) }}
@endsection
@section('pagetitle')
    {{ GoogleTranslate::justTranslate('Personal data', app()->getLocale()) }}
@endsection
@section('content')
    <style>
        /* input {
                                            display: block !important;
                                            outline: none !important;
                                            border: none !important;
                                            border-bottom: 1px solid #000 !important;
                                            font-size: 80% !important;
                                        }

                                        input:focus {
                                            border-bottom: 1px solid #0572ce !important;
                                            box-shadow: 0 1px 0 0 #0572ce !important;
                                        }

                                        .form-control {
                                            border-radius: 0;
                                        } */
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header">
                    <h4 class="card-title">{{ GoogleTranslate::justTranslate('Profile details', app()->getLocale()) }}</h4>
                </div>
                <div class="card-body pt-3">
                    <!-- Vertical Pills Tabs -->
                    <div class="d-flex align-items-start">
                        {{-- <h5 class="card-title">
                            {{ GoogleTranslate::justTranslate('Profile details', app()->getLocale()) }}</h5> --}}
                        <form class="row g-3">
                            {{-- Nombre --}}
                            <div class="col-md-6 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="txtName" name="name"
                                                placeholder="Your Name">
                                            <label for="txtName"
                                                class="text-primary">{{ GoogleTranslate::justTranslate('Your name', app()->getLocale()) }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Apellido --}}
                            <div class="col-md-6 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="txtLastName" placeholder="Phone"
                                                name="last_name">
                                            <label for="txtLastName"
                                                class="text-primary ">{{ GoogleTranslate::justTranslate('Your last name', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Edad --}}
                            <div class="col-md-4 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control " id="txtAge"
                                                placeholder="Your Age" name="age">
                                            <label for="txtAge"
                                                class="text-primary">{{ GoogleTranslate::justTranslate('Your age', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Año de nacimiento --}}
                            <div class="col-md-8 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control " id="txtAgeBirth"
                                                placeholder="Age of Birth" name="age_birth">
                                            <label for="txtAgeBirth"
                                                class="text-primary">{{ GoogleTranslate::justTranslate('Age of birth', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Genero --}}
                            <div class="col-md-4 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="txtGender"
                                                aria-label="Floating label select gender">
                                                <option selected disabled value="">
                                                    {{ GoogleTranslate::justTranslate('Select a gender', app()->getLocale()) }}
                                                </option>
                                                <option value="M">
                                                    {{ GoogleTranslate::justTranslate('Male', app()->getLocale()) }}</option>
                                                <option value="F">
                                                    {{ GoogleTranslate::justTranslate('Female', app()->getLocale()) }}</option>
                                            </select>
                                            <label for="txtGender"
                                                class="text-primary">{{ GoogleTranslate::justTranslate('Gender', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- correo --}}
                            <div class="col-md-8 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="txtEmail" placeholder="Email"
                                                name="email">
                                            <label for="txtEmail"
                                                class="text-primary">{{ GoogleTranslate::justTranslate('E-mail address', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Telefono --}}
                            <div class="col-md-4 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="txtPhone" placeholder="Phone"
                                                name="phone">
                                            <label for="txtPhone"
                                                class="text-primary ">{{ GoogleTranslate::justTranslate('Phone', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Estado civil --}}
                            <div class="col-md-4 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="txtMaritalStatus"
                                                aria-label="Floating label select gender">
                                                <option selected disabled value="">
                                                    {{ GoogleTranslate::justTranslate('Select the marital status', app()->getLocale()) }}
                                                </option>
                                                <option value="1">
                                                    {{ GoogleTranslate::justTranslate('Unmarried', app()->getLocale()) }}</option>
                                                <option value="2">
                                                    {{ GoogleTranslate::justTranslate('Married', app()->getLocale()) }}</option>
                                                <option value="3">
                                                    {{ GoogleTranslate::justTranslate('Divorced', app()->getLocale()) }}</option>
                                                <option value="4">
                                                    {{ GoogleTranslate::justTranslate('Widowed', app()->getLocale()) }}</option>
                                            </select>
                                            <label for="txtMarital"
                                                class="text-primary">{{ GoogleTranslate::justTranslate('Marital status', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Nacionalidad --}}
                            <div class="col-md-4 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="txtBirthplace"
                                                placeholder="Birthplace" name="birth_place">
                                            <label for="txtBirthplace"
                                                class="text-primary">{{ GoogleTranslate::justTranslate('Birthplace', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Direccion --}}
                            <div class="col-md-8 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="txtAddress"
                                                placeholder="Address" name="address">
                                            <label for="txtAddress"
                                                class="text-primary">{{ GoogleTranslate::justTranslate('Address', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Escolaridad --}}
                            <div class="col-md-4 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select id="txtSchooling" class="form-select"
                                                aria-label="Floating label select schooling" required>
                                                <option selected disabled value="">
                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                </option>
                                                <option value="1">
                                                    {{ GoogleTranslate::justTranslate('Primary', app()->getLocale()) }}
                                                </option>
                                                <option value="2">
                                                    {{ GoogleTranslate::justTranslate('Secondary', app()->getLocale()) }}
                                                </option>
                                                <option value="3">
                                                    {{ GoogleTranslate::justTranslate('High School', app()->getLocale()) }}
                                                </option>
                                                <option value="4">
                                                    {{ GoogleTranslate::justTranslate('University', app()->getLocale()) }}</option>
                                                <option value="5">
                                                    {{ GoogleTranslate::justTranslate("Master's Degree", app()->getLocale()) }}
                                                </option>
                                                <option value="6">
                                                    {{ GoogleTranslate::justTranslate('Doctorate', app()->getLocale()) }}
                                                </option>
                                            </select>
                                            <label for="txtSchooling"
                                                class="text-primary">{{ GoogleTranslate::justTranslate('Schooling', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Ocupacion --}}
                            <div class="col-md-6 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="txtOccupation"
                                                placeholder="Occupation" name="occupation">
                                            <label for="txtOccupation"
                                                class="text-primary">{{ GoogleTranslate::justTranslate('Occupation', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Religion --}}
                            <div class="col-md-6 p-2">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select id="txtReligion" class="form-select"
                                                aria-label="Floating label select religion" required>
                                                <option selected disabled value="">
                                                    {{ GoogleTranslate::justTranslate('Select an option', app()->getLocale()) }}
                                                </option>
                                                <option value="1">
                                                    {{ GoogleTranslate::justTranslate('Catholic', app()->getLocale()) }}
                                                </option>
                                                <option value="2">
                                                    {{ GoogleTranslate::justTranslate('Protestant', app()->getLocale()) }}
                                                </option>
                                                <option value="3">
                                                    {{ GoogleTranslate::justTranslate('Jewish', app()->getLocale()) }}
                                                </option>
                                                <option value="4">
                                                    {{ GoogleTranslate::justTranslate('Muslim', app()->getLocale()) }}</option>
                                                <option value="5">
                                                    {{ GoogleTranslate::justTranslate('Atheist', app()->getLocale()) }}
                                                </option>
                                                <option value="6">
                                                    {{ GoogleTranslate::justTranslate('Other', app()->getLocale()) }}
                                                </option>
                                            </select>
                                            <label for="txtReligion"
                                                class="text-primary">{{ GoogleTranslate::justTranslate('Religion', app()->getLocale()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-2">
                                <div class="row ">
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-primary rounded-pill"
                                            onclick="updateField();">{{ GoogleTranslate::justTranslate('Save changes', app()->getLocale()) }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/personal_data.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dashboard').addClass('active');
        });

        getInfoByID('{{ auth()->user()->_id }}');
    </script>
@endsection
