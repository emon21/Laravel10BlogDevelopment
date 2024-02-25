<div class="col-sm-2">
    <div class="card">
         <div class="card-body">
             <div class="text-center">
             <img src="{{ asset(Auth::user()->image) }}" alt="" class="img-fluid img-rounded rounded-circle" width="120" height="150">
             <h4 class="card-title text-success text-bold">Hi,{{ Auth::user()->name }}</h4>
         </div>
         </div>
   </div>
 <div class="list-group mt-2">
     <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ (request()->routeIs('home')) ? 'active' : '' }} ">Dashboard</a>
     <a href="{{ route('website') }}" class="list-group-item list-group-item-action">Website</a>
     <a href="{{ route('password.change') }}" class="list-group-item list-group-item-action {{ (request()->routeIs('password.change')) ? 'active' : '' }}">Change Password</a>
     <a href="{{ route('user.post') }}" class="list-group-item list-group-item-action {{ (request()->routeIs('user.post')) ? 'active' : '' }}">Post</a>
     <a href="{{ route('user.UserProfile') }}" class="list-group-item list-group-item-action {{ (request()->routeIs('user.UserProfile')) ? 'active' : '' }}">User Profile</a>
     <div class="dropdown-divider"></div>
     <a href="{{ route('logout') }}" onclick="event.preventDefault();
     document.getElementById('logout-form').submit();" class="list-group-item ">Logout</a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>

   </div>
</div>
