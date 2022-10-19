@extends('layout.layout')
@section('title')
    {{ GoogleTranslate::trans('Dashboard', app()->getLocale()) }}
@endsection
@section('pagetitle')
{{ GoogleTranslate::trans('Dashboard', app()->getLocale()) }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ GoogleTranslate::trans('Dashboard', app()->getLocale()) }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    {{ GoogleTranslate::trans('Name', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::trans('Email', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::trans('Phone', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::trans('Address', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::trans('City', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::trans('Country', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::trans('Zip code', app()->getLocale()) }}
                                </th>
                                <th>
                                    {{ GoogleTranslate::trans('Action', app()->getLocale()) }}
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
