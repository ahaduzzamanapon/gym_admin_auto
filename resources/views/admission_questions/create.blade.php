@extends('layouts.default')

{{-- Page title --}}
@section('title')
Admission Questions @parent
@stop

@section('content')
    <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Create New') }} Admission Questions</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'admissionQuestions.store','class' => 'form-horizontal']) !!}

                    @include('admission_questions.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
