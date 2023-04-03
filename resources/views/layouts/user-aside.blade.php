<div class="profile-left-wrap">
    <h2>Profile</h2>
    <p>Welcome {{ Auth::user()->name }}</p>
    <div class="profile-left-ul">
        <ul>
            <li><a class="{{ request()->is('myaccount/profile') ? 'active' : '' }}"
                href="{{ url('myaccount/profile') }}">profile details</a></li>
            <li><a class="{{ request()->is('myaccount/address') ? 'active' : '' }}" href="{{ url('myaccount/address') }}">My Address</a></li>
            <li><a class="{{ request()->is('myaccount/myorders') ? 'active' : '' }}" href="{{ url('myaccount/myorders') }}">My Orders</a></li>
            {{-- <li><a href="">My Gift Cards</a></li> --}}
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                 <img src="{{ url('images/front-end/logout.svg')}}"  onclick="event.preventDefault();
                    this.closest('form').submit();">Logout
                </form>
            </li>
        </ul>
    </div>
</div>