@extends("master1")
@section("header")
    {!!HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js')!!}
    {!!HTML::script('js/prefixfree.min.js')!!}
    {!!HTML::script('js/beverage_add_script.js')!!}
@stop
@section("nav")
    @include("beverages/_auth_header")
@stop
@section("content")
    <section id="formSection">
        <h1>{{$beverage->beverage_name }}</h1>
        <p>{{$beverage->beverage_descrip}}</p><br />
        {!! Form::open(["route"=>"beverage_store","method"=>"post","id"=>"beverage_createForm","enctype"=>"multipart/form-data"])!!}
        @include("beverages._edit_add_form")
        {!! Form::close() !!}
    </section>
@stop