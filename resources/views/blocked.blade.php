@extends('layout.layout')
@section('title')
    {{ GoogleTranslate::justTranslate('Unauthorized page', app()->getLocale()) }}
@endsection
@section('pagetitle')
    {{ GoogleTranslate::justTranslate('Unauthorized page', app()->getLocale()) }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-body pt-3">
                    <div class="d-flex w-100 h-100">
                        <div class="container-fluid p-2">
                            <div class="row">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="col-md-8">
                                        <img src="{{ asset('img/blockGIF.gif') }}" class="img-fluid col-md-12" />
                                        <h1 class="h4 text-center pb-5 px-3" style="color: #1e68b1">
                                            {{ GoogleTranslate::justTranslate('You do not have access to this module', app()->getLocale()) }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
