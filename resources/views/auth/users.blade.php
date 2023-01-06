@extends('layout.layout')
@section('title')
    {{ ucwords(GoogleTranslate::justTranslate('Users', app()->getLocale())) }}
@endsection
@section('pagetitle')
    {{ ucwords(GoogleTranslate::justTranslate('Users', app()->getLocale())) }}
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body pt-3">
            <!-- Vertical Pills Tabs -->
            @if (auth()->user()->role == 2)
                <div class="row g-3">
                    <h5 class="card-title">
                        {{ ucwords(GoogleTranslate::justTranslate('User records', app()->getLocale())) }}
                    </h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        {{ ucwords(GoogleTranslate::justTranslate('Username', app()->getLocale())) }}
                                    </th>
                                    <th scope="col">
                                        {{ ucwords(GoogleTranslate::justTranslate('Role', app()->getLocale())) }}</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $row)
                                    <tr>
                                        <td>{{ $row->{'username'} }}</td>
                                        @if ($row->{'role'} == 1)
                                            <td>{{ ucwords(GoogleTranslate::justTranslate('Administrator', app()->getLocale())) }}
                                            </td>
                                        @elseif ($row->{'role'} == 2)
                                            <td>{{ ucwords(GoogleTranslate::justTranslate('User', app()->getLocale())) }}
                                            </td>
                                        @elseif ($row->{'role'} == 3)
                                            <td>{{ ucwords(GoogleTranslate::justTranslate('Family member', app()->getLocale())) }}
                                            </td>
                                        @elseif ($row->{'role'} == 4)
                                            <td>{{ ucwords(GoogleTranslate::justTranslate('Booth', app()->getLocale())) }}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="container-fluid d-md-none" id="divTabCorto">
                    <div class="w-100 h-100">
                        <div class="nav nav-pills" id="v-pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active btn-lg" id="personal-data-tab" data-bs-toggle="pill"
                                    data-bs-target="#personal-data" type="button" role="tab"
                                    aria-controls="personal-data" aria-selected="true"><i class="fas fa-table"></i></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn-lg" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false"><i
                                        class="fas fa-plus"></i></button>
                            </li>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="personal-data" role="tabpanel"
                                aria-labelledby="personal-data-tab" tabindex="0">
                                <div class="row g-3">
                                    <h5 class="card-title">
                                        {{ ucwords(GoogleTranslate::justTranslate('User records', app()->getLocale())) }}
                                    </h5>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Username', app()->getLocale())) }}
                                                    </th>
                                                    <th scope="col">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Role', app()->getLocale())) }}
                                                    </th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $row)
                                                    <tr>
                                                        <td>{{ $row->{'username'} }}</td>
                                                        @if ($row->{'role'} == 1)
                                                            <td>{{ ucwords(GoogleTranslate::justTranslate('Administrator', app()->getLocale())) }}
                                                            </td>
                                                        @elseif ($row->{'role'} == 2)
                                                            <td>{{ ucwords(GoogleTranslate::justTranslate('User', app()->getLocale())) }}
                                                            </td>
                                                        @elseif ($row->{'role'} == 3)
                                                            <td>{{ ucwords(GoogleTranslate::justTranslate('Family member', app()->getLocale())) }}
                                                            </td>
                                                        @elseif ($row->{'role'} == 4)
                                                            <td>{{ ucwords(GoogleTranslate::justTranslate('Booth', app()->getLocale())) }}
                                                            </td>
                                                        @endif
                                                        <td>
                                                            <button class="btn btn-outline-primary btn-sm"
                                                                onclick="getInfoByID('{{ $row->_id }}');"><span
                                                                    class="sr-only">Edit</span><i class="fa fa-edit"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-danger btn-sm"
                                                                onclick="translateAlert('{{ $row->_id }}', deleteUser);"><span
                                                                    class="sr-only">Delete</span><i class="fa fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab" tabindex="0">
                                <h5 class="card-title">
                                    {{ ucwords(GoogleTranslate::justTranslate('Add a new user', app()->getLocale())) }}
                                </h5>
                                <form class="validation-add-user row g-3" novalidate>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select id="selectRole" class="form-select"
                                                aria-label="Floating label select role" required>
                                                <option selected disabled value="">
                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', app()->getLocale())) }}
                                                </option>
                                                <option value="1">
                                                    {{ ucwords(GoogleTranslate::justTranslate('Administrator', app()->getLocale())) }}
                                                </option>
                                                <option value="2">
                                                    {{ ucwords(GoogleTranslate::justTranslate('User', app()->getLocale())) }}
                                                </option>
                                                <option value="3">
                                                    {{ ucwords(GoogleTranslate::justTranslate('Family member', app()->getLocale())) }}
                                                </option>
                                                <option value="4">
                                                    {{ ucwords(GoogleTranslate::justTranslate('Booth', app()->getLocale())) }}
                                                </option>
                                            </select>
                                            <label for="selectRole"
                                                class="text-primary">{{ ucwords(GoogleTranslate::justTranslate('Role', app()->getLocale())) }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="inputUsername"
                                                placeholder="Username" required>
                                            <label for="inputUsername"
                                                class="text-primary">{{ ucwords(GoogleTranslate::justTranslate('Username', app()->getLocale())) }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="inputPassword"
                                                placeholder="Password" required>
                                            <label for="inputPassword"
                                                class="text-primary">{{ ucwords(GoogleTranslate::justTranslate('Password', app()->getLocale())) }}</label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-primary rounded-pill m-1">{{ ucwords(GoogleTranslate::justTranslate('Save user', app()->getLocale())) }}</button>
                                        <button type="reset"
                                            class="btn btn-secondary rounded-pill m-1">{{ ucwords(GoogleTranslate::justTranslate('Reset form', app()->getLocale())) }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid d-none d-md-block" id="divTabLargo">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills" style="margin-right: 22px !important;" id="v-pills-tab"
                            role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="personal-data-tab" data-bs-toggle="pill"
                                data-bs-target="#personal-data-b" type="button" role="tab"
                                aria-controls="personal-data-b" aria-selected="true"><i class="fas fa-table"></i></button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile-b" type="button" role="tab"
                                aria-controls="v-pills-profile-b" aria-selected="false"><i
                                    class="fas fa-plus"></i></button>
                        </div>
                        <div class="tab-content w-100 h-100" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="personal-data-b" role="tabpanel"
                                aria-labelledby="personal-data-tab" tabindex="0">
                                <div class="row g-3">
                                    <h5 class="card-title">
                                        {{ ucwords(GoogleTranslate::justTranslate('User records', app()->getLocale())) }}
                                    </h5>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Username', app()->getLocale())) }}
                                                    </th>
                                                    <th scope="col">
                                                        {{ ucwords(GoogleTranslate::justTranslate('Role', app()->getLocale())) }}
                                                    </th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $row)
                                                    <tr>
                                                        <td>{{ $row->{'username'} }}</td>
                                                        @if ($row->{'role'} == 1)
                                                            <td>{{ ucwords(GoogleTranslate::justTranslate('Administrator', app()->getLocale())) }}
                                                            </td>
                                                        @elseif ($row->{'role'} == 2)
                                                            <td>{{ ucwords(GoogleTranslate::justTranslate('User', app()->getLocale())) }}
                                                            </td>
                                                        @elseif ($row->{'role'} == 3)
                                                            <td>{{ ucwords(GoogleTranslate::justTranslate('Family member', app()->getLocale())) }}
                                                            </td>
                                                        @elseif ($row->{'role'} == 4)
                                                            <td>{{ ucwords(GoogleTranslate::justTranslate('Booth', app()->getLocale())) }}
                                                            </td>
                                                        @endif
                                                        <td>
                                                            <button class="btn btn-outline-primary btn-sm"
                                                                onclick="getInfoByID('{{ $row->_id }}');"><span
                                                                    class="sr-only">Edit</span><i class="fa fa-edit"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-danger btn-sm"
                                                                onclick="translateAlert('{{ $row->_id }}', deleteUser);"><span
                                                                    class="sr-only">Delete</span><i
                                                                    class="fa fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="v-pills-profile-b" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab" tabindex="0">
                                <h5 class="card-title">
                                    {{ ucwords(GoogleTranslate::justTranslate('Add a new user', app()->getLocale())) }}
                                </h5>
                                <form class="validation-add-user row g-3" novalidate>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select id="selectRoleB" class="form-select"
                                                aria-label="Floating label select role" required>
                                                <option selected disabled value="">
                                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', app()->getLocale())) }}
                                                </option>
                                                <option value="1">
                                                    {{ ucwords(GoogleTranslate::justTranslate('Administrator', app()->getLocale())) }}
                                                </option>
                                                <option value="2">
                                                    {{ ucwords(GoogleTranslate::justTranslate('User', app()->getLocale())) }}
                                                </option>
                                                <option value="3">
                                                    {{ ucwords(GoogleTranslate::justTranslate('Family member', app()->getLocale())) }}
                                                </option>
                                                <option value="4">
                                                    {{ ucwords(GoogleTranslate::justTranslate('Booth', app()->getLocale())) }}
                                                </option>
                                            </select>
                                            <label for="selectRoleB"
                                                class="text-primary">{{ ucwords(GoogleTranslate::justTranslate('Role', app()->getLocale())) }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="inputUsernameB"
                                                placeholder="Username" required>
                                            <label for="inputUsernameB"
                                                class="text-primary">{{ ucwords(GoogleTranslate::justTranslate('Username', app()->getLocale())) }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="inputPasswordB"
                                                placeholder="Password" required>
                                            <label for="inputPasswordB"
                                                class="text-primary">{{ ucwords(GoogleTranslate::justTranslate('Password', app()->getLocale())) }}</label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-primary rounded-pill m-1">{{ ucwords(GoogleTranslate::justTranslate('Save user', app()->getLocale())) }}</button>
                                        <button type="reset"
                                            class="btn btn-secondary rounded-pill m-1">{{ ucwords(GoogleTranslate::justTranslate('Reset form', app()->getLocale())) }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        {{ ucwords(GoogleTranslate::justTranslate('Edit user', app()->getLocale())) }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="validation-edit-user row g-3" novalidate id="formEditar">
                        <div class="col-md-12">
                            <label for="selectRoleEdit"
                                class="form-label">{{ ucwords(GoogleTranslate::justTranslate('Role', app()->getLocale())) }}</label>
                            <select id="selectRoleEdit" class="form-select" required>
                                <option selected disabled value="">
                                    {{ ucwords(GoogleTranslate::justTranslate('Select an option', app()->getLocale())) }}
                                </option>
                                <option value="1">
                                    {{ ucwords(GoogleTranslate::justTranslate('Administrator', app()->getLocale())) }}
                                </option>
                                <option value="2">
                                    {{ ucwords(GoogleTranslate::justTranslate('User', app()->getLocale())) }}
                                </option>
                                <option value="3">
                                    {{ ucwords(GoogleTranslate::justTranslate('Family member', app()->getLocale())) }}
                                </option>
                                <option value="4">
                                    {{ ucwords(GoogleTranslate::justTranslate('Booth', app()->getLocale())) }}</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputUsernameEdit"
                                class="form-label">{{ ucwords(GoogleTranslate::justTranslate('Username', app()->getLocale())) }}</label>
                            <input type="text" class="form-control" id="inputUsernameEdit" required>
                        </div>
                        <div class="col-md-12">
                            <input type="password" class="form-control" id="inputPasswordEdit">
                            <input type="text" class="form-control" id="inputID">
                            <button id="btnForm" type="submit" style="display: none;"></button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill"
                        data-bs-dismiss="modal">{{ ucwords(GoogleTranslate::justTranslate('Close window', app()->getLocale())) }}</button>
                    <button type="button" class="btn btn-primary rounded-pill"
                        onclick="$('#btnForm').click();">{{ ucwords(GoogleTranslate::justTranslate('Save changes', app()->getLocale())) }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/user.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dashboard').addClass('active');
        });
    </script>
@endsection
