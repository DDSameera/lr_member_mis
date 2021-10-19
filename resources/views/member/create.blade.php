@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">

                        @include('member.forms.memberForm',["type"=>"create"])

                    </div>
                    <div class="card-footer">
                        <a class="btn btn-outline-dark float-left" href="{{route('member.index')}}">< Back To Main </a>
                        <button id="save" type="button" class="btn btn-primary float-right"   data-url="{{route('member.store')}}"   onclick="saveUser(event.target)">Save Member</button>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection


@section('ajaxScript')
    @include('ajax.member');
@endsection
