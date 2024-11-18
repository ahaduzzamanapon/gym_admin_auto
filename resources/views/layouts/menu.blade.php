

<style>
    .sub-menu {
        margin-left: 22px;
    }
</style>


<li {!! (Request::is('members') || Request::is('healthmetrics') ? 'class="menu-dropdown active"': "class='menu-dropdown'" ) !!}>
    <a href="#">
        <span class="mm-text ">Member Manage</span>
        <span class="menu-icon "> <i class="im im-icon-Window-2"></i></span>
        <span class="im im-icon-Arrow-Right imicon"></span>
    </a>
    <ul class="sub-menu list-unstyled">
        <li {!! (Request::is('members*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('members.index') }}">
                <span class="mm-text ">Members List <i class="im im-icon-Structure"></i></span>
            </a>
        </li>
        <li {!! (Request::is('healthmetrics*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('healthmetrics.index') }}">
                <span class="mm-text ">Health Metrics <i class="im im-icon-Structure"></i></span>
            </a>
        </li>
    </ul>
</li>
{{-- <li class="{!! (Request::is('healthmetrics*') ? 'active' : '' ) !!}">
    <a href="{{ route('healthmetrics.index') }}">
        <span class="mm-text ">Healthmetrics</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li> --}}






{{-- <li class="{!! (Request::is('members*') ? 'active' : '' ) !!}">
    <a href="{{ route('members.index') }}">
        <span class="mm-text ">Members</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li> --}}
<li class="{!! (Request::is('packages*') ? 'active' : '' ) !!}">
    <a href="{{ route('packages.index') }}">
        <span class="mm-text ">Packages</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li>

{{-- <li class="{!! (Request::is('products*') ? 'active' : '' ) !!}">
    <a href="{{ route('products.index') }}">
        <span class="mm-text ">Products</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li> --}}


<li {!! (Request::is('products') || Request::is('data_table') ? 'class="menu-dropdown active"': "class='menu-dropdown'" ) !!}>
    <a href="#">
        <span class="mm-text ">Inventory</span>
        <span class="menu-icon "> <i class="im im-icon-Window-2"></i></span>
        <span class="im im-icon-Arrow-Right imicon"></span>
    </a>
    <ul class="sub-menu list-unstyled">
        <li {!! (Request::is('products') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('products.index') }}">
                <span class="mm-text ">Products</span>
            </a>
        </li>
    </ul>
</li>


