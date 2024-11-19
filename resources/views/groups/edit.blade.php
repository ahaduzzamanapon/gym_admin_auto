@extends('layouts.default')

{{-- Page title --}}
@section('title')
Group @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Group</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model($group, ['route' => ['groups.update', $group->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('groups.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
