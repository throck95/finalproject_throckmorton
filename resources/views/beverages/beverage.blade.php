@extends("master1")

@section("header")
    {!!HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js')!!}
    {!!HTML::script('http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js')!!}
    {!!HTML::script('js/beverage_filter.js')!!}
@stop
@section("nav")
    @include("beverages/_auth_header")
@stop
@section("content")
    {{--<section ng-app="beverageApp" ng-controller="beverageController">
        <p ng-repeat="comment in comments">
            @{{ comment.comment_id }}<br />
            @{{ comment.beverage_id }}<br />
            @{{ comment.beverage_name }}<br />
            @{{ comment.user_fname }}<br />
            @{{ comment.comment_descrip }}<br />
            @{{ comment.rating }}<br />
            <strong>New Comment<br /></strong>
        </p>
    </section>
    --}}<section>
        <h1>{{$beverage->beverage_name }}</h1>
        <p>{{$beverage->beverage_descrip}}</p><br />
        <p>Ratings<br />
            {{$ratings}} / 5.0 from {{count($comments)}} total users</p>
        <br /><p>Comments</p>
        @for($i=0;$i<count($comments);$i++)
            <li>
                {{$comments[$i]->rating . " -- \""}}
                {{$comments[$i]->comment_descrip . "\" - "}}
                {{$comments[$i]->timestamp}}
                {{$userName[$i]->fname}}
            </li>
        @endfor
        {{--@foreach($comments as $comment)
            <li>
                {{$comment->rating}}
                {{$comment->comment_descrip}}
                {{$comment->timestamp}}

                {{ $comment->rating . " -- \"" . $comment->comment_descrip . "\" - " . $comment->user_id . " -- " . $comment->timestamp }}
            </li>
        @endforeach--}}
    </section>
    @if(isset(\Illuminate\Support\Facades\Auth::user()->id))
        <input type="button" onclick="location.href='{{URL::to('/beverages/addRating/' . $beverage->beverage_id)}}';" value="Add Rating/Comment" />
    @else
        <input type="button" onclick="location.href='{{URL::to('/login')}}';" value="Login Before Adding Ratings" />
    @endif
@stop