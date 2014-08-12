<ul class="nav nav-sidebar">
    <li><a href="{{ URL::route('home') }}"><span class="glyphicon glyphicon-home"></span> Home</a></li>

    @if( Auth::check() )
        <li><a href=""><span class="glyphicon glyphicon-plus-sign"></span> Add Item</a></li>
        <li><a href="{{ URL::route('account-sign-out') }}"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
    @else
        <li><a href="{{ URL::route('account-sign-in') }}"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
        <li><a href="{{ URL::route('account-create') }}"><span class="glyphicon glyphicon-user"></span> Create Account</a></li>
    @endif
</ul>

@if( Auth::check() )

    <h4>Item Types</h4>
    <ul class="nav nav-sidebar">
        <li><a href="{{ URL::route('type-create') }}"><span class="glyphicon glyphicon-plus-sign"></span> Add Item Type</a>
        <li><a href="">Bands</a></li>
        <li><a href="">Books</a></li>
        <li><a href="">Video Games</a></li>
    </ul>
@endif

<p id="copyright">
    This is <a href="#">Item Manager</a> 1.0.0
</p>