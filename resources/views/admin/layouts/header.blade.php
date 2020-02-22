<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
<div class="app-header header">
    <div class="sidebar-brand-text mx-xl-5">Bosen Ria</div>
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
    </div>    <div class="app-header__content">
        <div class="app-header-left">

        </div>
        <div class="app-header-right">
            <div id="hover">
                <img width="42" class="rounded-circle" src="{{ asset('image/mini.png') }}" >
                <div  class="mr-2 d-none d-lg-inline text-gray-600 small" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</div>
            </div>
                <a id="logout" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </a>
        </div>
    </div>
</div>
    <script>
        $('#logout').hide();

        $('#hover').on({
            mouseenter: function () {
                $('#logout').show();
                $('#hover').hide();
            },
            mouseleave: function () {
                $('#logout').hide();
                $('#hover').show();
            }
        })
    </script>