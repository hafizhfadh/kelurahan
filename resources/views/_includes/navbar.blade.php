<header>
  <div class="hero-head">
    <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">

        <a class="navbar-item is--brand">
          {{ config('app.name', 'Laravel') }}
        </a>

        <button class="button navbar-burger" data-target="navMenu">
          <span></span>
          <span></span>
          <span></span>
        </button>

      </div>


      <div class="navbar-menu navbar-end" id="navMenu">
        @if (Auth::guest())
          <a class="navbar-item nav-tag" href="{{ route('login') }}">
            <span class="icon is-small">
              <i class="fas fa-lock"></i>
            </span>
            Login
          </a>
        @else
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              <figure class="image is-32x32" style="margin-right:.5em;">
                <span class="icon is-medium"><i class="far fa-user-circle"></i></span>
              </figure>
              {{ Auth::user()->name }}
            </a>

            <div class="navbar-dropdown is-right">
                <a class="navbar-item"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
          </div>
        @endif
      </div>
    </nav>
  </div>
</header>
