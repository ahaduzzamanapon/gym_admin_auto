@extends('layouts.default')

{{-- Page title --}}
@section('title')
Permission @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Permission</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('permissions.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
