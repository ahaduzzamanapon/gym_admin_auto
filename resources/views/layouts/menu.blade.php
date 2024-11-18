

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

<li class="{!! (Request::is('packages*') ? 'active' : '' ) !!}">
    <a href="{{ route('packages.index') }}">
        <span class="mm-text ">Packages</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li>



<li {!! (Request::is('products') || Request::is('requisitions*')  ? 'class="menu-dropdown active"': "class='menu-dropdown'" ) !!}>
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
        <li {!! (Request::is('requisition_list') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('requisitions.index') }}">
                <span class="mm-text ">Requsition List</span>
            </a>
        </li>
    </ul>
</li>



<li {!! (Request::is('expenses*') || Request::is('incomes*')? 'class="menu-dropdown active"': "class='menu-dropdown'" ) !!}>
    <a href="#">
        <span class="mm-text ">Account</span>
        <span class="menu-icon "> <i class="im im-icon-Window-2"></i></span>
        <span class="im im-icon-Arrow-Right imicon"></span>
    </a>
    <ul class="sub-menu list-unstyled">
        <li {!! (Request::is('expenses*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('expenses.index') }}">
                <span class="mm-text ">Expenses</span>
            </a>
        </li>
        <li {!! (Request::is('incomes*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('incomes.index') }}">
                <span class="mm-text ">Incomes</span>
            </a>
        </li>
    </ul>
</li>

<li class="{!! (Request::is('schedulebookings*') ? 'active' : '' ) !!}">
    <a href="{{ route('schedulebookings.index') }}">
        <span class="mm-text ">Schedule bookings</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li>

