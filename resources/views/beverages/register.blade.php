@extends("master1")
@section("nav")
    @include("beverages/_auth_header")
@stop
@section("content")
    <section id="registerFormSection">
        {!! Form::open(["url"=>"auth/register","method"=>"post","id"=>"beverage_createForm","enctype"=>"multipart/form-data"])!!}
        @include("beverages/_register_form")
        {!! Form::close() !!}
    </section>
@stop