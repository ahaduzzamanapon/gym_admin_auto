@extends('layouts.default')

{{-- Page title --}}
@section('title')
Member @parent
@stop

@section('content')
    <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Create New') }} Member</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
    <div class="content">
        {{-- @include('adminlte-templates::common.errors') --}}
        <div class="card">
            <div class="card-body">
                @include('flash::message')

                {!! Form::open(['route' => 'members.store','class' => 'form-horizontal', 'files' => true]) !!}
                    @include('members.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
