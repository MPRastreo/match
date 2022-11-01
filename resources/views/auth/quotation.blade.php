@extends('layout.layout')
@section('title')
    {{ GoogleTranslate::trans('Quotation', app()->getLocale()) }}
@endsection
@section('pagetitle')
    {{ GoogleTranslate::trans('Quotation', app()->getLocale()) }}
@endsection
@section('content')
    <div class="row">

        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                style="margin: 15px;">
                {{ GoogleTranslate::trans('Schedule Appointment', app()->getLocale()) }}
            </button>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    {{ GoogleTranslate::trans('Person', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::trans('Specialty', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::trans('Date and Time', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::trans('Action', app()->getLocale()) }}
                                </th>
                            </thead>
                            <tbody>
                                {{-- @foreach ($transacciones as $tr)
                                    @if ($tr->estado == 'aprobado')
                                        <tr>
                                            <td scope="row">{{ $tr->tipo }}</td>
                                            <td>{{ $tr->descripcion }}</td>
                                            <td>{{ $tr->monto }}</td>
                                            <td>{{ $tr->id_refencia_clip }}</td>
                                            <td>{{ $tr->created_at }}</td>
                                        </tr>
                                    @endif
                                @endforeach --}}
                            </tbody>
                        </table>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Specialty</label>
                            <input type="text" class="form-control" id="txtSpecialty" value="Mark" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Date and Time</label>
                            <input type="text" class="form-control" id="txtDateTime" value="Otto" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Family members</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="txtFamilyMembers" value="Otto" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
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

<script src="{{ asset('js/quotation.js') }}"></script>

@endsection
