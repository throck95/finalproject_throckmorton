@if(isset(\Illuminate\Support\Facades\Auth::user()->id))
    Hello {{\Illuminate\Support\Facades\Auth::user()->fname}}! |
    <a href="/auth/logout">Logout</a>
@else
    <a href="/login">Login</a> |
    <a href="/register">Register</a>
@endif