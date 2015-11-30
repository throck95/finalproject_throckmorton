@extends("master1")

@section("content")
    <section id="loginFormSection">
        {!! Form::open(["route"=>"beverage_store","method"=>"post","id"=>"beverage_createForm","enctype"=>"multipart/form-data"])!!}
        @include("beverages/_login_form")
        {!! Form::close() !!}
    </section>
@stop