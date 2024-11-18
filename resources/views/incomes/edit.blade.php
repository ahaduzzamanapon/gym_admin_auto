@extends('layouts.default')

{{-- Page title --}}
@section('title')
Income @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Income</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model($income, ['route' => ['incomes.update', $income->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('incomes.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
