@extends('layouts.default')

{{-- Page title --}}
@section('title')
Attendences @parent
@stop

@section('content')

<style>
    .box_m {
        box-shadow: 0px 0px 6px 2px #bfbfbf;
        padding: 0px;
        height: 61vh;
        overflow-y: scroll;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Attendences</h1>
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
            <h5 class="card-title d-inline">Attendences</h5>
            <div class="float-right">
                <span id="loader">

                </span>
                <a class="btn btn-primary pull-right" href="{{ route('upload.upload_excel_page_attendance') }}">Upload Attendance</a>
            </div>
        </section>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="">From Date/First Date</label>
                            <input type="date" name="from_date" id="from_date" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">To Date</label>
                            <input type="date" name="to_date" id="to_date" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Type</label>
                            <select name="member_type" id="member_type" class="form-control" onchange="get_member()">
                                <option value="">Please Select Member Type</option>
                                <option value="member">Member</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Branch</label>
                            <select name="branch_id" id="branch_id" class="form-control" onchange="get_member()">
                                <option value="">Please Select Branch Type</option>
                                @php
                                $multi_branchs = DB::table('multi_branchs')->get();
                                @endphp
                                @foreach ($multi_branchs as $multi_branch)
                                <option value="{{ $multi_branch->id }}">{{ $multi_branch->branch_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <br>
                            <a href="#" id="process_attendence" class="btn btn-primary" onclick="process_attendence()">Process</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container mt-5">
                            <!-- Tab navigation -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Daily</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Continue</button>
                                </li>
                            </ul>
                            <!-- Tab content -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row p-2" style="display: flex;flex-wrap: wrap;gap: 8px;">
                                        <a href="#" onclick="getDailyAttendence('All')" class="btn btn-primary">Daily Attendance</a>
                                        <a href="#" onclick="getDailyAttendence('Present')" class="btn btn-primary">Daily Present</a>
                                        <a href="#" onclick="getDailyAttendence('Absent')" class="btn btn-primary">Daily Absent</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row p-2" style="display: flex;flex-wrap: wrap;gap: 8px;">
                                        {{-- <a href="#" class="btn btn-primary">Continue Attendance</a>
                                        <a href="#" class="btn btn-primary">Continue Present</a>
                                        <a href="#" class="btn btn-primary">Continue Absent</a> --}}
                                        <h1>Coming Soon</h1>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="box_m">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th width="7%" style="white-space: nowrap"><input type="checkbox" name="" id="select_all">Select</th>

                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2">Please Select Member Type</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function get_checked_member_id() {
        var member_id = [];
        $('.member_id_c').each(function() {
            if ($(this).is(':checked')) {
                member_id.push($(this).val());
            }
        });

        return member_id;
    }

    $(document).ready(function() {
        $('#select_all').on('change', function() {
            if ($(this).is(':checked')) {
                $('.member_id_c').prop('checked', true);
            } else {
                $('.member_id_c').prop('checked', false);
            }
        });
    });

    function process_attendence() {
        var date=$('#from_date').val()
        if (date=='') {
            alert('Please first select first date')
            return false;
        }
        $.ajax({
            url: "{{ route('attendences.process_attendence') }}",
            type: "GET",
            data: {
                '_token': "{{ csrf_token() }}",
                'date':date
            },
            dataType: 'json',
            beforeSend: function() {
                $('#loader').html('<div class="alert alert-info">Processing...</div>');
                $('#process_attendence').attr('disabled', 'disabled');
            },
            success: function(response) {
                $('#loader').html('<div class="alert alert-success">Attendence Processed Successfully </div>');
                $('#process_attendence').removeAttr('disabled');

            },
            error: function() {
                $('#loader').html('<div class="alert alert-danger">Something went wrong. Please try again.</div>');
            }
        });
    }

    function get_member() {
        var member_type = $('#member_type').val();
        var branch_id = $('#branch_id').val();
        $.ajax({
            url: "{{ route('attendences.get_member') }}",
            type: "GET",
            data: {
                '_token': "{{ csrf_token() }}",
                'member_type': member_type,
                'branch_id': branch_id
            },
            dataType: 'json',
            success: function(response) {
               var member = response.member;
               var html = '';
               if(member.length == 0) {
                   html+= '<tr><td colspan="2">No Member Found</td></tr>';
               }
               for (var i = 0; i < member.length; i++) {
                   html += '<tr><td><input type="checkbox" class="member_id_c" value="'+member[i].id+'"></td><td>'+member[i].mem_name+' ('+member[i].member_unique_id+')</td></tr>';
               }
               $('.table tbody').html(html);

            },
            error: function() {
                $('#loader').html('<div class="alert alert-danger">Something went wrong. Please try again.</div>');
            }
        });
    }
    function getDailyAttendence(status) {
        const fromDateValue = $('#from_date').val();
        const memberTypeValue = $('#member_type').val();
        const memberIds = get_checked_member_id();

        if (memberIds.length === 0) {
            alert('Please select member');
            return;
        }

        if (!fromDateValue) {
            alert('Please select first date');
            return;
        }

        $.ajax({
            url: "{{ route('attendences.get_daily_attendence') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                from_date: fromDateValue,
                member_type: memberTypeValue,
                member_id: memberIds,
                status,
            },
            dataType: 'json',
        }).done(function(response) {
            const newWindow = window.open();
            newWindow.document.write(response.view);
        }).fail(function(response) {
            $('#loader').html('');
            const newWindow = window.open();
            newWindow.document.write(response);
        });
    }
</script>
@endsection
