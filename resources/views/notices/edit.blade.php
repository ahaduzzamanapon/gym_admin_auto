@extends('layouts.default')

{{-- Page title --}}
@section('title')
Notice @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Notice</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model($notice, ['route' => ['notices.update', $notice->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('notices.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
