@extends("master1")
@section("nav")
    @include("beverages/_auth_header")
@stop
@section("content")
    <section>
        <h1>Beverage Not Found</h1>
        <p>This Id is not in our database of beverages. Sorry.</p>
    </section>
@stop