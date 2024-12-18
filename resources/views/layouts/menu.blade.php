<style>
    .sub-menu {
        margin-left: 22px;
    }
</style>

@if(if_can('member_manage'))
<li {!! (Request::is('members*') || Request::is('healthmetrics*') || Request::is('diet_charts*') || Request::is('meal_plans*') ? 'class="menu-dropdown mm-active active"': "class='menu-dropdown'" ) !!}>
    <a href="#">
        <span class="mm-text ">Member Manage</span>
        <span class="menu-icon "><i class="align-self-center fa-1x fas fa-diagnoses"></i></span>
        <span class="im im-icon-Arrow-Right imicon"></span>
    </a>
    <ul class="sub-menu list-unstyled">
        <li {!! (Request::is('members*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('members.index') }}">
                <span class="mm-text">Members List</span>
            </a>
        </li>
        <li {!! (Request::is('healthmetrics*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('healthmetrics.index') }}">
                <span class="mm-text ">Health Metrics</span>
            </a>
        </li>
        <li {!! (Request::is('meal_plans*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('meal_plans.index') }}">
                <span class="mm-text ">Meal Plans</span>
            </a>
        </li>
        <li {!! (Request::is('diet_charts*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('diet_charts.index') }}">
                <span class="mm-text ">Diet Charts</span>
            </a>
        </li>

    </ul>
</li>
@endif

@if (if_can('manage_package'))
    <li class="{!! Request::is('packages*') ? 'active' : '' !!}">
        <a href="{{ route('packages.index') }}">
            <span class="mm-text ">Packages</span>
            <span class="menu-icon"><i class="im im-icon-Structure"></i></span>
        </a>
    </li>
@endif

@if (if_can('purchase_packages'))
    <li class="{!! Request::is('purchasePackages*') ? 'active' : '' !!}">
        <a href="{{ route('purchasePackages.index') }}">
            <span class="mm-text ">Purchase Packages</span>
            <span class="menu-icon"><i class="align-self-center fa-1x fas fa-money-check-alt"></i></span>
        </a>
    </li>
@endif



@if(if_can('store_management'))
<li {!! (Request::is('products*') || Request::is('requisitions*') || Request::is('sales*') ? 'class="menu-dropdown mm-active active"': "class='menu-dropdown'" ) !!}>
    <a href="#">
        <span class="mm-text ">Store Manage</span>
        <span class="menu-icon "> <i class="im im-icon-Shop"></i></span>
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
        <li {!! (Request::is('requisitions*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('requisitions.index') }}">
                <span class="mm-text ">Requisitions</span>
            </a>
        </li>
        @endif

        @if(if_can('manage_product'))
        <li {!! (Request::is('sales*') ? 'class="active"' : '' ) !!}>
            <a href="{{ route('sales.index') }}">
                <span class="mm-text ">Sales Product</span>
            </a>
        </li>
        @endif

    </ul>
</li>
@endif

@if(if_can('manage_inventory'))
<li {!! (Request::is('assetsManagements*') || Request::is('assetsCategories*') ? 'class="menu-dropdown mm-active active"': "class='menu-dropdown'" ) !!}>
    <a href="#">
        <span class="mm-text ">Inventory</span>
        <span class="menu-icon "><i class="align-self-center fa-1x fas fa-dolly-flatbed"></i></span>
        <span class="im im-icon-Arrow-Right imicon"></span>
    </a>
    <ul class="sub-menu list-unstyled">
        @if(if_can('assetsCategory'))
            <li {!! (Request::is('assetsCategories*') ? 'class="active"' : '' ) !!}>
                <a href="{{ route('assetsCategories.index') }}">
                    <span class="mm-text ">Assets Categories</span>
                </a>
            </li>
        @endif
        @if(if_can('assets_managements'))
            <li {!! (Request::is('assetsManagements*') ? 'class="active"' : '' ) !!}>
                <a href="{{ route('assetsManagements.index') }}">
                    <span class="mm-text ">Assets Managements</span>
                </a>
            </li>
        @endif
    </ul>
</li>
@endif



@if (if_can('account'))
    <li {!! Request::is('expenses*') || Request::is('incomes*') || Request::is('account_report*')
        ? 'class="menu-dropdown mm-active active"'
        : "class='menu-dropdown'" !!}>
        <a href="#">
            <span class="mm-text ">Account</span>
            <span class="menu-icon "> <i class="im im-icon-Dollar"></i></span>
            <span class="im im-icon-Arrow-Right imicon"></span>
        </a>
        <ul class="sub-menu list-unstyled">
            @if (if_can('expenses'))
                <li {!! Request::is('expenses*') ? 'class="active"' : '' !!}>
                    <a href="{{ route('expenses.index') }}">
                        <span class="mm-text ">Expenses</span>
                    </a>
                </li>
            @endif
            @if (if_can('income'))
                <li {!! Request::is('incomes*') ? 'class="active"' : '' !!}>
                    <a href="{{ route('incomes.index') }}">
                        <span class="mm-text ">Incomes</span>
                    </a>
                </li>
            @endif
            @if (if_can('income'))
                <li {!! Request::is('account_report*') ? 'class="active"' : '' !!}>
                    <a href="{{ route('account_report.index') }}">
                        <span class="mm-text ">Account Reports</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

@if (if_can('frontend'))
    <li {!! Request::is('siteFeatures*') || Request::is('siteProfiles*') || Request::is('aboutuses*') || Request::is('contactMassages*') || Request::is('siteTrainers*')
        ? 'class="menu-dropdown mm-active active"'
        : "class='menu-dropdown'" !!}>
        <a href="#">
            <span class="mm-text ">Frontend</span>
            <span class="menu-icon "><i class="align-self-center fa-1x fab fa-edge"></i></span>
            <span class="im im-icon-Arrow-Right imicon"></span>
        </a>
        <ul class="sub-menu list-unstyled">
            <li {!! Request::is('siteProfiles*') ? 'class="active"' : '' !!}>
                <a href="{{ route('siteProfiles.index') }}">
                    <span class="mm-text ">Site Profile</span>
                </a>
            </li>
            <li {!! Request::is('siteFeatures*') ? 'class="active"' : '' !!}>
                <a href="{{ route('siteFeatures.index') }}">
                    <span class="mm-text ">Features</span>
                </a>
            </li>
            <li {!! Request::is('aboutuses*') ? 'class="active"' : '' !!}>
                <a href="{{ route('aboutuses.index') }}">
                    <span class="mm-text ">About Us</span>
                </a>
            </li>
            <li {!! Request::is('siteTrainers*') ? 'class="active"' : '' !!}>
                <a href="{{ route('siteTrainers.index') }}">
                    <span class="mm-text ">Trainers</span>
                </a>
            </li>
            <li {!! Request::is('contactMassages*') ? 'class="active"' : '' !!}>
                <a href="{{ route('contactMassages.index') }}">
                    <span class="mm-text ">Contact Massages</span>
                </a>
            </li>
        </ul>
    </li>
@endif

@if (if_can('schedule_booking'))
    <li class="{!! Request::is('schedulebookings*') ? 'active' : '' !!}">
        <a href="{{ route('schedulebookings.index') }}">
            <span class="mm-text ">Schedule Bookings</span>
            <span class="menu-icon"><i class="align-self-center fa-1x fas fa-calendar-alt"></i></span>
        </a>
    </li>
@endif

@if (if_can('manage_coupon'))
    <li class="{!! Request::is('coupons*') ? 'active' : '' !!}">
        <a href="{{ route('coupons.index') }}">
            <span class="mm-text ">Coupons</span>
            <span class="menu-icon"><i class="align-self-center fa-1x fas fa-money-check"></i></span>
        </a>
    </li>
@endif




@if (if_can('role_management'))
    <li class="{!! Request::is('groups*') ? 'active' : '' !!}">
        <a href="{{ route('groups.index') }}">
            <span class="mm-text ">Role Permissions</span>
            <span class="menu-icon"><i class="align-self-center fa-1x fab fa-expeditedssl"></i></span>
        </a>
    </li>
@endif

@if(!empty(Auth::user()) &&Auth::user()->member_id != null)
    <li class="">
        <a href="{{ route('members.details', ['id' => Auth::user()->member_id]) }}">
            <span class="mm-text ">Profile</span>
            <span class="menu-icon"><i class="align-self-center fa-1x fas fa-portrait"></i></span>
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
        <span class="menu-icon"><i class="align-self-center fa-1x fas fa-baby"></i></span>
    </a>
</li>
@endif

@if (if_can('attendence'))

<li class="{!! (Request::is('attendance*') ? 'active' : '' ) !!}">
    <a href="{{ route('attendences.index') }}">
        <span class="mm-text ">Attendences</span>
        <span class="menu-icon"><i class="align-self-center fa-1x far fa-calendar-check"></i></span>
    </a>
</li>
@endif




<li class="{!! (Request::is('notices*') ? 'active' : '' ) !!}">
    <a href="{{ route('notices.index') }}">
        <span class="mm-text ">Notices</span>
        <span class="menu-icon"><i class="align-self-center fa-1x fas fa-bullhorn"></i></span>
    </a>
</li>


@if (if_can('site_settings'))
<li class="{!! (Request::is('termAndConditions*') ? 'active' : '' ) !!}">
    <a href="{{ route('termAndConditions.index') }}">
        <span class="mm-text ">Terms And Conditions</span>
        <span class="menu-icon"><i class="align-self-center fa-1x fas fa-user-shield"></i></span>
    </a>
</li>

@endif

@if (if_can('site_settings'))
<li class="{!! (Request::is('admissionQuestions*') ? 'active' : '' ) !!}">
    <a href="{{ route('admissionQuestions.index') }}">
        <span class="mm-text ">Admission Questions</span>
        <span class="menu-icon"><i class="align-self-center fa-1x fas fa-question"></i></span>
    </a>
</li>
@endif

@if (if_can('site_settings'))
<li class="{!! (Request::is('siteSettings*') ? 'active' : '' ) !!}">
    <a href="{{ route('siteSettings.index') }}">
        <span class="mm-text ">Site Settings</span>
        <span class="menu-icon"><i class="align-self-center fa-1x fas fa-sliders-h"></i></span>
    </a>
</li>
@endif
@if (if_can('site_settings'))
<li class="{!! (Request::is('multiBranches*') ? 'active' : '' ) !!}">
    <a href="{{ route('multiBranches.index') }}">
        <span class="mm-text ">Multi Branches</span>
        <span class="menu-icon"><i class="align-self-center fa-1x fas fa-hospital"></i></span>
    </a>
</li>
@endif



<li {!! (Request::is('workoutCategories*') || Request::is('dailyWorkouts*') ? 'class="menu-dropdown mm-active active"': "class='menu-dropdown'" ) !!}>
    <a href="#">
        <span class="mm-text ">Exercise</span>
        <span class="menu-icon "><i class="align-self-center fa-1x fas fa-diagnoses"></i></span>
        <span class="im im-icon-Arrow-Right imicon"></span>
    </a>
    <ul class="sub-menu list-unstyled">    
        @if (if_can('site_settings'))
        <li class="{!! (Request::is('workoutCategories*') ? 'active' : '' ) !!}">
            <a href="{{ route('workoutCategories.index') }}">
                <span class="mm-text ">Workout Categories</span>
            </a>
        </li>
        @endif

        <li class="{!! (Request::is('dailyWorkouts*') ? 'active' : '' ) !!}">
            <a href="{{ route('dailyWorkouts.index') }}">
                <span class="mm-text ">Daily Workouts</span>
            </a>
        </li>
    </ul>
</li>

