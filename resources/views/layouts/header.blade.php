<header id="header" class="navbar navbar-expand-lg navbar-end navbar-absolute-top navbar-light navbar-show-hide" data-hs-header-options='{
            "fixMoment": 1000,
            "fixEffect": "slide"
          }'>

    <div class="container">
      <nav class="js-mega-menu navbar-nav-wrap">
        <!-- Default Logo -->
        <a class="navbar-brand" href="index.html" aria-label="Front">
          <img class="navbar-brand-logo" src="{{ asset('pt-sinergi-abadi-sentosa.png') }}" alt="Logo">
        </a>
        <!-- End Default Logo -->

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
          <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
        </button>
        <!-- End Toggler -->

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <div class="navbar-absolute-top-scroller">
            <ul class="navbar-nav">

              <!-- Company -->
              @foreach($content['header']['main-menu'] as $k => $v)
              <li class="hs-has-sub-menu nav-item">
                <a id="companyMegaMenu" class="hs-mega-menu-invoker nav-link" href="{{ $v['link'] }}">{{ ucfirst($v['name']) }}</a>
              </li>
              @endforeach
              <!-- End Company -->
            </ul>
          </div>
        </div>
        <!-- End Collapse -->
      </nav>
    </div>
  </header>