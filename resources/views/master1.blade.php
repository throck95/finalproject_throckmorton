<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title></title>
    @yield("header")
    {!!HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')!!}
    {!!HTML::style('css/beverages_base.css')!!}
</head>
<body>
<nav>
    <a href="/beverages">Home</a> |
    <a href="/login">Login</a> |
    <a href="/register">Register</a>
    @yield("nav")
</nav>
<div id="content">
    <br />
    @yield("content")
</div>
<footer id="footer">
    @yield("footer")
    <br />
    WebAdmin: Tyler Throckmorton<br />
    &copy;2015 Alchohol Friend & Co.
</footer>
</body>
</html>