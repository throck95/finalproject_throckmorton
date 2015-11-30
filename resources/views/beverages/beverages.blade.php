@extends("master1")

@section("header")
    {!!HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js')!!}
@stop

@section("content")
    <section>
        <h1>Beverages</h1>
        <p>
            <input type="text" id="filterText" placeholder="Search" onkeyup="filter(this)" /><br />
            <select id="beverage_type" onchange="selectFilter()">
                <option value="1">Wine</option>
                <option value="2">Beer</option>
                <option value="3">Mixed Drink</option>
            </select>
        </p>
        <table id="theList">
            <row><th>Beverage Name</th><th>Beverage Type</th><th>Beverage Rating</th></row>
            @foreach($beverages as $beverage)
                <row>
                    <td><a href="{{URL::route('beverage_path',[$beverage->beverage_id])}}">{{$beverage->beverage_name}}</a></td>
                    <td>{{$beverage->beverage_type}}</td>
                    <td>{{$ratings}}</td>
                </row>
                <li><a href="{{URL::route('beverage_path',[$beverage->beverage_id])}}">{{$beverage->beverage_name}}</a></li>
            @endforeach
        </table>
        <input type="button" onclick="location.href='{{URL::route('beverage_create')}}';" value="Add New Drink" />
    </section>
    <script>
        function filter(element) {
            var value = $(element).val().toLowerCase();

            $("#theList > li").each(function() {
                if ($(this).text().toLowerCase().search(value) > -1) {
                    $(this).removeClass("hidden");
                }
                else {
                    $(this).addClass("hidden");
                    var hiddenItem = $(this);
                    hiddenItem.detach();
                    $("#theList").append(hiddenItem);
                }
            });
        }
        function selectFilter() {
            var sel_value = $('option:selected').val();
            if(sel_value == "1") {
                $("#theList > li").each(function() {

                })
            }
            else if(sel_value == "2") {

            }
            else if(sel_value == "3") {

            }
        }
    </script>
@stop

