@extends('layouts.default')
{{-- Page title --}}
@section('title')
Dashboard @parent
@stop
{{-- page level styles --}}
@section('header_styles')
<!-- page vendors -->
<link href="{{ asset('css/pages.css')}}" rel="stylesheet">


<!--end of page vendors -->
@stop
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header ">
    <div aria-label="breadcrumb" class="card-breadcrumb bg-success ">
        <h1 class="text-white mt-2" style="font-size: 25px;font-weight: bold">Dashboard</h1>

    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>
<!-- /.content -->
@if(if_can('show_all_data'))
<section class="content">
    <div class="row">
        <div class="col-12">
            <h3 style="font-size: 20px;font-weight: bold">Member Statistics </h3>
        </div>
    </div>
    <br>
    <div class="row">
        @php
            $active = DB::table('attendences')->where('date', date('Y-m-d'))->where('status', 'Present')->count();
            $total = DB::table('members')->count();
            $gender = DB::table('members')->selectRaw(
                    'SUM(CASE WHEN mem_gender = \'Male\' THEN 1 ELSE 0 END) as male, ' .
                    'SUM(CASE WHEN mem_gender = \'Female\' THEN 1 ELSE 0 END) as female'
                )->first();
        @endphp

        <div class="col-md-6 col-xl-3 col-12 mb-20">
            <div class="  bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Business-Mens im-icon-set float-right bg-primary"></i>
                <h3>{{ $total ? $total : 0 }}</h3>
                <p>Total Members</p>
                <!-- <div class="progress meter mr-15">
                    <div id="progress-primary"
                        class=" progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar"
                        style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                </div> -->
                <!-- {{-- <p class="mb-0 mt-3 "><span>Gained: 655</span> <span class="float-right pr-15">Lost: 56</span></p> --}} -->
            </div>
        </div>
        <div class="col-md-6 col-xl-3 col-12  mb-20">
            <div class="bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Checked-User im-icon-set float-right bg-success"></i>
                <h3>{{ $active ? $active : 0 }}</h3>
                <p class="text">Active Members</p>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 col-12  mb-20">
            <div class="bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Lock-User im-icon-set float-right bg-primary"></i>
                <h3>{{ $total - $active }}</h3>
                <p class="text">Inactive Members</p>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 col-12  mb-20">
            <div class="bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Male im-icon-set float-right bg-success"></i>
                <h3>{{ $gender->male }}</h3>
                <p class="text">Male Members</p>
            </div>
        </div>

        <div class="col-md-6 col-xl-3 col-12  mb-20">
            <div class="bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Female im-icon-set float-right bg-success"></i>
                <h3>{{ $gender->female }}</h3>
                <p class="text">Female Members</p>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <h3 style="font-size: 20px;font-weight: bold">Monthly Income And Expense Statistics </h3>
        </div>
    </div>
    <br>
    <div class="row">
        @php
            $income = DB::table('incomes')->selectRaw('SUM(amount) as amount')
                ->whereBetween('created_at', [date('Y-m-01'), date('Y-m-t')])->first();
            $expenses = DB::table('expensess')->selectRaw('SUM(amount) as amount')
                ->whereBetween('created_at', [date('Y-m-01'), date('Y-m-t')])->first();

            $daily_inc = DB::table('incomes')->selectRaw('SUM(amount) as amount')
                ->whereDate('created_at', date('Y-m-d'))->first();
            $daily_exp = DB::table('expensess')->selectRaw('SUM(amount) as amount')
                ->whereDate('created_at', date('Y-m-d'))->first();

            $due = DB::table('purchasepackages')->selectRaw('SUM(due_amount) as amount')
                ->whereBetween('created_at', [date('Y-m-01'), date('Y-m-t')])->where('status', 2)->first();

        @endphp

        <div class="col-md-6 col-xl-3 col-12 mb-20">
            <div class="  bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Money-Bag im-icon-set float-right bg-primary"></i>
                <h3>{{ $income->amount ? $income->amount : 0 }}</h3>
                <p>Total Incomes</p>
                <!-- <div class="progress meter mr-15">
                    <div id="progress-primary"
                        class=" progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar"
                        style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                </div> -->
                <!-- {{-- <p class="mb-0 mt-3 "><span>Gained: 655</span> <span class="float-right pr-15">Lost: 56</span></p> --}} -->
            </div>
        </div>
        <div class="col-md-6 col-xl-3 col-12  mb-20">
            <div class="bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Money-2 im-icon-set float-right bg-success"></i>
                <h3>{{ $expenses->amount ? $expenses->amount : 0 }}</h3>
                <p class="text">Total expenses</p>
            </div>
        </div>

        <div class="col-md-6 col-xl-3 col-12  mb-20">
            <div class="bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Receipt-3 im-icon-set float-right bg-success"></i>
                <h3>{{ $due->amount ? $due->amount : 0 }}</h3>
                <p class="text">Total Due</p>
            </div>
        </div>

        <div class="col-md-6 col-xl-3 col-12  mb-20">
            <div class="bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Coin im-icon-set float-right bg-primary"></i>
                <h3>{{ $daily_inc->amount ? $daily_inc->amount : 0 }}</h3>
                <p class="text">Daily Incomes</p>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 col-12  mb-20">
            <div class="bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Dollar-Sign2 im-icon-set float-right bg-success"></i>
                <h3>{{ $daily_exp->amount ? $daily_exp->amount : 0 }}</h3>
                <p class="text">Daily Expenses</p>
            </div>
        </div>

      
    </div>
</section>
@else
<section class="content">
    <div class="row">
        <div class="col-md-6 col-xl-3 col-12 mb-20">
            <div class="  bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Add-Cart im-icon-set float-right bg-primary"></i>
                <h3>3</h3>
                <p>Number of get pakages</p>
                <div class="progress meter mr-15">
                    <div id="progress-primary"
                        class=" progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar"
                        style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0 mt-3 "><span>Gained: 655</span> <span class="float-right pr-15">Lost: 56</span></p>
            </div>
        </div>

        <div class="col-md-6 col-xl-3 col-12  mb-20">
            <div class="bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Eye-Scan im-icon-set float-right bg-success"></i>
                <h3>10</h3>
                <p class="text">Number of schedule</p>
                <div class="progress mr-15">
                    <div id="progress-success"
                        class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar"
                        style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0 mt-3 "><span>Unique Pageviews: </span> <span class="float-right pr-15">4.7K</span>
                </p>
            </div>
        </div>
    </div>
</section>
@endif

@stop
@section('footer_scripts')
<!--   page level js ----------->
<script language="javascript" type="text/javascript" src="{{ asset('vendors/chartjs/js/Chart.js') }}"></script>
<script src="{{ asset('js/pages/dashboard.js') }}"></script>

<!-- end of page level js -->
@stop
