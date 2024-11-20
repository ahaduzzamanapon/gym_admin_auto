

<style>
    .sub-menu {
        margin-left: 22px;
    }
</style>

@if(if_can('member_manage'))


<li {!! (Request::is('members') || Request::is('healthmetrics') || Request::is('diet_charts') ? 'class="menu-dropdown active"': "class='menu-dropdown'" ) !!}>
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
        <li {!! (Request::is('diet_charts*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('diet_charts.index') }}">
                <span class="mm-text ">Diet Charts <i class="im im-icon-Structure"></i></span>
            </a>
        </li>
        
    </ul>
</li>
@endif

@if(if_can('manage_package'))
<li class="{!! (Request::is('packages*') ? 'active' : '' ) !!}">
    <a href="{{ route('packages.index') }}">
        <span class="mm-text ">Packages</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li>
@endif

@if(if_can('purchase_packages'))
<li class="{!! (Request::is('purchasePackages*') ? 'active' : '' ) !!}">
    <a href="{{ route('purchasePackages.index') }}">
        <span class="mm-text ">Purchase Packages</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li>
@endif



@if(if_can('store_management'))

<li {!! (Request::is('products') || Request::is('requisitions*')  ? 'class="menu-dropdown active"': "class='menu-dropdown'" ) !!}>
    <a href="#">
        <span class="mm-text ">Store Manage</span>
        <span class="menu-icon "> <i class="im im-icon-Window-2"></i></span>
        <span class="im im-icon-Arrow-Right imicon"></span>
    </a>
    <ul class="sub-menu list-unstyled">
        @if(if_can('manage_product'))
        <li {!! (Request::is('products') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('products.index') }}">
                <span class="mm-text ">Products</span>
            </a>
        </li>
        @endif
        @if(if_can('requisition_list'))
        <li {!! (Request::is('requisition_list') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('requisitions.index') }}">
                <span class="mm-text ">Requsition List</span>
            </a>
        </li>
        @endif
    </ul>
</li>
@endif


@if(if_can('account'))
<li {!! (Request::is('expenses*') || Request::is('incomes*')? 'class="menu-dropdown active"': "class='menu-dropdown'" ) !!}>
    <a href="#">
        <span class="mm-text ">Account</span>
        <span class="menu-icon "> <i class="im im-icon-Window-2"></i></span>
        <span class="im im-icon-Arrow-Right imicon"></span>
    </a>
    <ul class="sub-menu list-unstyled">
        @if(if_can('expenses'))
        <li {!! (Request::is('expenses*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('expenses.index') }}">
                <span class="mm-text ">Expenses</span>
            </a>
        </li>
        @endif
        @if(if_can('income'))
        <li {!! (Request::is('incomes*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('incomes.index') }}">
                <span class="mm-text ">Incomes</span>
            </a>
        </li>
        @endif
    </ul>
</li>
@endif

@if(if_can('schedule_booking'))
<li class="{!! (Request::is('schedulebookings*') ? 'active' : '' ) !!}">
    <a href="{{ route('schedulebookings.index') }}">
        <span class="mm-text ">Schedule bookings</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li>
@endif

@if(if_can('manage_coupon'))
<li class="{!! (Request::is('coupons*') ? 'active' : '' ) !!}">
    <a href="{{ route('coupons.index') }}">
        <span class="mm-text ">Coupons</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li>
@endif

@if(if_can('assets_managements'))
<li class="{!! (Request::is('assetsManagements*') ? 'active' : '' ) !!}">
    <a href="{{ route('assetsManagements.index') }}">
        <span class="mm-text ">Assets Managements</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li>
@endif


@if(if_can('role_management'))
<li class="{!! (Request::is('groups*') ? 'active' : '' ) !!}">
    <a href="{{ route('groups.index') }}">
        <span class="mm-text ">Role Permissions</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li>
@endif

@if(Auth::user()->member_id != null)
    <li class="">
        <a href="{{ route('members.details', ['id' => Auth::user()->member_id]) }}">
            <span class="mm-text ">Profile</span>
            <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
        </a>
    </li>
@endif




{{-- <li class="{!! (Request::is('permissions*') ? 'active' : '' ) !!}">
    <a href="{{ route('permissions.index') }}">
        <span class="mm-text ">Permissions</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li> --}}

{{-- <li class="{!! (Request::is('groupPermitions*') ? 'active' : '' ) !!}">
    <a href="{{ route('groupPermitions.index') }}">
        <span class="mm-text ">Group Permitions</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li> --}}



@if(if_can('own_diet_charts'))
<li class="{!! (Request::is('diet_charts*') ? 'active' : '' ) !!}">
    <a href="{{ route('diet_charts.index') }}">
        <span class="mm-text ">Diet Charts</span>
        <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
    </a>
</li>
@endif

