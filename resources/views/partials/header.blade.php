<style type="text/css">
  .main-header {
      background-color: #3c8dbc !important;
  }
  .login {
    color:#fff;
    margin-right:50px;
  }
  .show li a {
    color:#000;
  }
  .wrapper, body, html {
      min-height: 0% !important;
  }
  .login_profile li{
    margin-bottom: 10px;
  }
</style>
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <div class="nav navbar-nav">
        @if(Auth::check())
          <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle login" href="#">{{ Auth::user()->name }}<b class="caret"></b></a>
          <ul class="dropdown-menu login_profile">
            <li><a href="{{ route('login.profile') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;{{ __('Profile') }}</a></li>
          <li><form method="POST" action="{{ route('logout') }}">
          @csrf 
          <x-jet-dropdown-link href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                          this.closest('form').submit();">
              <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;{{ __('Log Out') }}
          </x-jet-dropdown-link>
          </form></li>
          </ul>
          </li>
        @endif
        </div>
      </li>
    </ul>
  </nav>
