@extends("master1")

@section("header")
    {!!HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js')!!}
    {!!HTML::script('http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js')!!}
    {!!HTML::script('js/beverages_filter.js')!!}
@stop
@section("nav")
    @include("beverages/_auth_header")
@stop
@section("content")
    <section ng-app="beveragesApp" ng-controller="beveragesController">
        <h1>Beverages</h1>
        <p>Sort By:
            <input type="button" ng-click="filterVar='beverage_name'" value="Name" />
            <input type="button" ng-click="filterVar='beverage_type'" value="Type" />
            <input type="button" ng-click="filterVar='average_rating'" value="Rating" />
            <label>Search: </label><input type="text" ng-model="beverageFilter" />
            <br />
            Quick Filters:
            <input type="button" ng-click="beverageFilter='beer'" value="Beer" />
            <input type="button" ng-click="beverageFilter='wine'" value="Wine" />
            <input type="button" ng-click="beverageFilter='mixed drink'" value="Mixed Drink" />
        </p>
        <table id="theList">
            <tr><th class="tableID">ID</th><th class="tableName">Name</th><th class="tableType">Type</th><th class="tableRating">Rating</th></tr>
                <tr ng-repeat="beverage in beverages | filter:beverageFilter | orderBy:filterVar track by $index">
                    <td class="tableID">@{{ beverage.beverage_id }}</td>
                    <td class="tableName"><a href="http://localhost:8000/beverages/@{{ beverage.beverage_id }}">@{{ beverage.beverage_name }}</a></td>
                    <td class="tableType">@{{beverage.beverage_type}}</td>
                    <td class="tableRating">@{{beverage.average_rating}}</td>
                </tr>
        </table>
        <br />
        @if(isset(\Illuminate\Support\Facades\Auth::user()->id))
            <input type="button" onclick="location.href='{{URL::route('beverage_create')}}';" value="Add New Drink" />
        @else
            <input type="button" onclick="location.href='{{URL::to('/login')}}';" value="Login Before Adding Drinks" />
        @endif
    </section>
@stop

