<div class="navbar">
   <div class="navbar-content">
    <div class="navbar-brand">
      <a href="{{ Auth::guard('web')->check() ? route('mainPageUser') : route('mainPage') }}">evelyze</a>
  </div>
  

      <ul>
        @auth('web')
        <li>
          @auth('web')
              <a href="{{ route('myGruopPage') }}">my groups</a>
          @else
              <a href="#">my groups</a> <!-- или оставить пустым -->
          @endauth
      </li>
        @endauth
        <li><a href="#">reiting</a></li>
      </ul>

      <div class="navbar-btn-groups">
        <div class="">
            {{Auth::user()->name}}
        </div>
        <div class="">
            <a class="btn-logout"  href="{{ Auth::guard('web')->check() ? route('logout') : route('logoutTeachere') }}" type="button">logout</a>
        </div>
      </div>
   </div>
</div>