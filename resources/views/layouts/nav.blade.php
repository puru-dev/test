<div class="row justify-content-center">
<div class="col-md-8">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ (request()->segment(1) == 'home') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('home')}}">All States</span></a>
            </li>
            <li class="nav-item {{ (request()->segment(1) == 'county') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('county.index')}}">All Counties</span></a>
            </li>
            <li class="nav-item {{ (request()->segment(1) == 'mls') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('mls.index')}}">All Mls</a>
            </li>
          </ul>
        </div>
      </nav>
      </div>
</div>