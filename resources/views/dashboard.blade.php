@extends('layout.layout')
@section('title')
    {{ ucwords(GoogleTranslate::justTranslate('Dashboard', app()->getLocale())) }}
@endsection
@section('pagetitle')
    {{ ucwords(GoogleTranslate::justTranslate('Dashboard', app()->getLocale())) }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ ucwords(GoogleTranslate::justTranslate('Dashboard', app()->getLocale())) }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    {{ ucwords(GoogleTranslate::justTranslate('Name', app()->getLocale())) }}
                                </th>
                                <th>
                                    {{ ucwords(GoogleTranslate::justTranslate('Email', app()->getLocale())) }}
                                </th>
                                <th>
                                    {{ ucwords(GoogleTranslate::justTranslate('Phone', app()->getLocale())) }}
                                </th>
                                <th>
                                    {{ ucwords(GoogleTranslate::justTranslate('Address', app()->getLocale())) }}
                                </th>
                                <th>
                                    {{ ucwords(GoogleTranslate::justTranslate('City', app()->getLocale())) }}
                                </th>
                                <th>
                                    {{ ucwords(GoogleTranslate::justTranslate('Country', app()->getLocale())) }}
                                </th>
                                <th>
                                    {{ ucwords(GoogleTranslate::justTranslate('Zip code', app()->getLocale())) }}
                                </th>
                                <th>
                                    {{ ucwords(GoogleTranslate::justTranslate('Action', app()->getLocale())) }}
                                </th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
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
