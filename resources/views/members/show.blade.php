@extends('layouts.default')

{{-- Page title --}}
@section('title')
Members @parent
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Member</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>

<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="card">
        <div class="table-responsive">
        <table class="table table-default">
            @include('members.show_fields')

            </table>
        </div>
    </div>
    @if(if_can('member_manage'))
    <a href="{{ route('members.index') }}" class="btn btn-primary">Back</a>
    @endif
</div>
@endsection
