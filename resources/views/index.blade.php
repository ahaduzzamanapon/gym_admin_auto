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
        <h1 class="text-white mt-2">Dashboard</h1>

    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>
<!-- /.content -->
@if(if_can('show_all_data'))
<section class="content">
    <div class="row">
        <div class="col-md-6 col-xl-3 col-12 mb-20">
            <div class="  bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Add-Cart im-icon-set float-right bg-primary"></i>
                <h3>{{ \DB::table('members')->count() }}</h3>
                <p>Total Members</p>
                <div class="progress meter mr-15">
                    <div id="progress-primary"
                        class=" progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar"
                        style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="mb-0 mt-3 "><span>Gained: 655</span> <span class="float-right pr-15">Lost: 56</span></p> --}}
            </div>
        </div>

        <div class="col-md-6 col-xl-3 col-12  mb-20">
            <div class="bg-white dashboard-col pl-15 pb-15 pt-15">
                <i class="im im-icon-Eye-Scan im-icon-set float-right bg-success"></i>
                <h3>{{ \DB::table('attendences')->where('date', date('Y-m-d'))->where('status', 'Present')->count() }}</h3>
                <p class="text">Active Members</p>
                <div class="progress mr-15">
                    <div id="progress-success"
                        class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar"
                        style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                {{-- <p class="mb-0 mt-3 "><span>Unique Pageviews: </span> <span class="float-right pr-15">4.7K</span>
                </p> --}}
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
