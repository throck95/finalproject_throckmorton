@extends("master1")

@section("content")
    <section>
        <h1>{{$beverage->beverage_name }}</h1>
        <p>{{$beverage->beverage_descrip}}</p><br />
        <p>Ratings<br />
            {{$ratings}} / 5.0 from {{$ratingCount}} total users</p>
        <br /><p>Comments</p>
        @foreach($comments as $comment)
            <li>
                {{ $comment->rating . " -- \"" . $comment->comment_descrip . "\" - " . $comment->user_id . " -- " . $comment->timestamp }}
            </li>
        @endforeach
    </section>
@stop