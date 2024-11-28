@extends('layouts.default')

{{-- Page title --}}
@section('title')
Members Upload Excel  @parent
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Upload Excel for Members Add</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>

<!-- Main content -->
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="card" style="width: 88vw;">
        <section class="card-header">
            <h5 class="card-title d-inline">Upload Excel</h5>
        </section>
        <div class="card-body">
            <div style="width: fit-content;border: 1px solid;padding: 5px;margin-bottom: 30px;">
                <ul>
                    <li>Upload file in Excel format (xlsx,xls,csv)</li>
                    <li>File must be in the format of the template <a class="btn btn-primary" download  href="{{ Storage::url('member_template.csv') }}"> File </a></li>
                    <li> 
                        Group id 
                        @php
                            $groups = App\Models\Group::all();
                        @endphp
                        <ul>
                            @foreach ($groups as $group)
                                <li>{{ $group->id }} = {{ $group->name }}</li>
                            @endforeach
                          
                        </ul>
                    </li>
                    <li>
                        mem_type must be staff or member
                    </li>
                    <li>
                        Please upload only one file
                    </li>
                    <li>
                        Punch id must be unique
                    </li>
                    <li>
                       Email must be unique
                    </li>
                </ul>
            </div>
            <div>
                <form action="{{ route('upload.upload_excel_member') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="file" accept=".xlsx,.xls,.csv" name="file" required><br><br>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>

        </div>
    </div>
    <div class="text-center">
        
    </div>
</div>
@endsection
