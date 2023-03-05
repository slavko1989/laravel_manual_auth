@include('home.head')

<p>@if (session('user'))

Welcome {{ session('user')->name  }} <a href="{{url ('/logout') }}">logout</a>
<a href="/account">account</a>
@else

<p>you are not logged in</p>
<a href="{{ url('/create') }}">add users</a>

@endif
</p>


@include('home.footer')


