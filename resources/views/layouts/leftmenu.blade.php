<div id="menu" role="navigation">
    <div style="text-align: -webkit-center;border-bottom: 2px solid #686868;margin-bottom: 13px;">
        <a href="{{ URL::to('index') }}" class="logo navbar-brand mr-0">
            <h1 class="text-center" style="height: 51px;width: 62px;place-self: center;"><img src="https://gymmaster.mysoftheaven.com/frontend/assets/images/logo.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></h1>
        </a>
    </div>
    <ul class="navigation list-unstyled" id="demo" >
        <li><span class="close-icon d-xl-none d-lg-block"><img src="{{asset('img/images/input-disabled.png')}}"
                    alt="image missing"></span></li>
        <li {!! (Request::is('') ? 'class="active"' : '' ) !!}>
            <a href="{{ URL::to('') }}">
                <span class="mm-text ">Dashboard</span>
                <span class="menu-icon"><i class="im im-icon-Home"></i></span>
            </a>
        </li>
        @include("layouts/menu")
    </ul>
    <!-- / .navigation -->
</div>
