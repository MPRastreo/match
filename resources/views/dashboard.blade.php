@extends('layout.layout')
@section('title')
    {{ GoogleTranslate::justTranslate('Dashboard', app()->getLocale()) }}
@endsection
@section('pagetitle')
    {{ GoogleTranslate::justTranslate('Dashboard', app()->getLocale()) }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ GoogleTranslate::justTranslate('Dashboard', app()->getLocale()) }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    {{ GoogleTranslate::justTranslate('Name', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::justTranslate('Email', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::justTranslate('Phone', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::justTranslate('Address', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::justTranslate('City', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::justTranslate('Country', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::justTranslate('Zip code', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::justTranslate('Action', app()->getLocale()) }}
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
