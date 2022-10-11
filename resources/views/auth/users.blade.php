@extends('layout.layout')
@section('title')
    Users
@endsection
@section('pagetitle')
    Users
@endsection
@section('content')
    {{-- <style>
        .borderF {
            border-bottom: 4px solid rgb(0, 106, 255);
        }
    </style> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card w-100">
                {{-- <div class="card-header">
                    <h4 class="card-title">Name & Last name </h4>
                </div> --}}
                <div class="card-body pt-3">
                    <!-- Vertical Pills Tabs -->
                    <div class="d-flex w-100 h-100">
                        <div class="nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active btn-lg" id="personal-data-tab" data-bs-toggle="pill"
                                data-bs-target="#personal-data" type="button" role="tab" aria-controls="personal-data"
                                aria-selected="true"><i class="fas fa-table"></i></button>
                            <button class="nav-link btn-lg" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="tab-content w-100 h-100" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="personal-data" role="tabpanel"
                                aria-labelledby="personal-data-tab" tabindex="0">
                                <div class="row g-3">
                                    <h5 class="card-title">User records</h5>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $row)
                                                    <tr>
                                                        <td>{{ $row->{'name'} }}</td>
                                                        <td>{{ $row->{'username'} }}</td>
                                                        <td>{{ $row->{'role'} }}</td>
                                                        <td>
                                                            <button class="btn btn-outline-primary btn-sm"
                                                                onclick="getInfoByID('{{ $row->_id }}');"><span
                                                                    class="sr-only">Edit</span><i class="fa fa-edit"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-danger btn-sm"
                                                                onclick="deleteUser('{{ $row->_id }}');"><span
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
                            <div class="tab-pane fade " id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab" tabindex="0">
                                <h5 class="card-title">Add a new user</h5>
                                <form class="validation-add-user row g-3" novalidate>
                                    <div class="col-md-8">
                                        <label for="inputName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="inputName" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="selectRole" class="form-label">Role</label>
                                        <select id="selectRole" class="form-select" required>
                                            <option selected disabled value="">Select an option</option>
                                            <option>Admin</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="inputUsername" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="inputPassword" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit user</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="validation-edit-user row g-3" novalidate id="formEditar">
                        <div class="col-md-8">
                            <label for="inputNameEdit" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputNameEdit" required>
                        </div>
                        <div class="col-md-4">
                            <label for="selectRoleEdit" class="form-label">Role</label>
                            <select id="selectRoleEdit" class="form-select" required>
                                <option selected disabled value="">Select an option</option>
                                <option>Admin</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputUsernameEdit" class="form-label">Username</label>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="$('#btnForm').click();">Save changes</button>
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
