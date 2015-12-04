@extends("master1")
@section("nav")
    @include("beverages/_auth_header")
@stop
@section("content")
    <section id="loginFormSection">
        {!! Form::open(["url"=>"/login","method"=>"post","id"=>"beverage_createForm","enctype"=>"multipart/form-data"])!!}
        @include("beverages/_login_form")
        {!! Form::close() !!}
    </section>
@stop