@extends("master1")

@section("header")
    {!!HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js')!!}
    {!!HTML::script('js/prefixfree.min.js')!!}
    {!!HTML::script('js/beverage_create_script.js')!!}
@stop
@section("content")
    <section id="formSection">
        {!! Form::open(["route"=>"beverage_store","method"=>"post","id"=>"beverage_createForm","enctype"=>"multipart/form-data"])!!}
        @include("beverages/_edit_create_form")
        {!! Form::close() !!}
    </section>
@stop