@extends('layouts.default')

{{-- Page title --}}
@section('title')
Contact Massage @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Contact Massage</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model($contactMassage, ['route' => ['contactMassages.update', $contactMassage->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('contact_massages.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
