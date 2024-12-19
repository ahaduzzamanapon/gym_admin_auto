@extends('layouts.default')

{{-- Page title --}}
@section('title')
Member @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Member</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
            @include('flash::message')

                {!! Form::model($member, ['route' => ['members.update', $member->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('members.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
