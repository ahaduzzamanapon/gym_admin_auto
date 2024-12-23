@extends('layouts.default')

{{-- Page title --}}
@section('title')
Daily Workouts @parent
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Daily Workouts</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>

<!-- Main content -->
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="card" width="88vw;">
        <section class="card-header">
            <h5 class="card-title d-inline">Daily Workouts</h5>
            <span class="float-right">
                @if (if_can('show_all_data'))
                <a class="btn btn-primary pull-right" href="{{ route('dailyWorkouts.create') }}">Add New</a>
                @endif
            </span>
        </section>
        <div class="card-body">
            <div class="col-md-12">
                <a onclick="print_all()" class="btn btn-primary">Print</a></a>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr class='text-center'>
                                <td>Select for print</td>
                                <td>sl no.</td>
                                <td>Member name</td>
                                <td>Day</td>
                                <td>Duration</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        @php
                           
                            $i =1;
                            $infos = DB::table('daily_work_out_details')
                                        ->join('members','members.id','=','daily_work_out_details.member_id')
                                        ->select('members.mem_name', 'daily_work_out_details.*','daily_work_out_details.id as daily_work_out_id')
                                        ->get()->all();
                             if(count($infos) == 0){
                                echo "<tr><td colspan='5' class='text-center'><b>No data found</b></td></tr>";
                            }            
                        @endphp
                        <tbody>
                            @foreach($infos as $row)

                            <tr class='text-center'>
                                <td><input type="checkbox" name="ids[]" class="ids" value="{{ $row->daily_work_out_id}}"></td>
                                <td>{{ $i++}}</td>
                                <td>{{ $row->mem_name}}</td>
                                <td>{{ $row->day}}</td>
                                <td>{{ $row->duration}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('dailyWorkouts.details',[$row->daily_work_out_id])}}" class="btn btn-outline-primary btn-xs">
                                            <i class="im im-icon-Eye" data-placement="top" title="View"></i>
                                        </a>
                                        <a href="{{route('dailyWorkouts.print',[$row->daily_work_out_id])}}" class="btn btn-outline-primary btn-xs" target="_blank">
                                            <i class="im im-icon-Printer" data-placement="top" title="Print"></i>
                                        </a>
                                        <a  href="{{route('dailyWorkouts.update_info',[$row->daily_work_out_id])}}"
                                            class="btn btn-outline-primary btn-xs">
                                            <i class="im im-icon-Pen" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                        </a>
                                        <a  href="{{route('dailyWorkouts.delete_info',[$row->daily_work_out_id])}}"
                                            class="btn btn-outline-danger btn-xs">
                                        <i class="im im-icon-Remove" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>






                    <!-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="member" class="control-label">Member</label>
                             <select name="member_id" id="member_id" class="form-control">
                                <option value="">Select Member</option>
                                @foreach($members as $member)
                                <option value="{{ $member->id }}">{{ $member->mem_name }}->{{ $member->branch_name }}</option>
                                @endforeach
                            </select> -->
                        <!-- </div> -->
                    <!-- </div> -->
                   
                    <!-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="member" class="control-label">.</label><br>
                            <a  class="btn btn-primary" onclick="getDailyWorkouts()" >Get</a>
                        </div>
                    </div> -->
                  
                </div>
            </div>
            <div class="col-md-12"  style="border: 1px solid black;display: none" id="tableArea">
                <a onclick="print_w()" class="btn btn-primary">Print</a>
                <div id="daily_workouts_table">
                </div>
            </div>
           
        </div>
    </div>
</div>
<script>








    function getDailyWorkouts() {
        $('#daily_workouts_table').html('');
        var member_id = document.getElementById('member_id').value;
        if (member_id == '') {
            alert('Select Member');
            return;
        }
       
        $('#tableArea').show();
        $.ajax({
            type: "GET",
            url: "{{ route('dailyWorkouts.getDailyWorkouts') }}",
            data: {
                member_id: member_id,
            },
            success: function(data) {
                const dailyWorkouts = data.dailyWorkouts;
                const memberDetails = data.member_details;
                const createdBy = data.create_by;

                const html = Object.keys(dailyWorkouts).map(day => {
                    const totalReputation = dailyWorkouts[day].reduce((sum, val) => sum + val.reputation, 0);
                    const totalSets = dailyWorkouts[day].reduce((sum, val) => sum + val.sets, 0);

                    return `
                        <div class="container">
                            <div class="col-md-12">
                                <h1 style="text-align: center;">Gym-master</h1>
                            </div>
                            <div style="width: 100%;text-align: center;display: flex;flex-direction: row;">
                                <div class="col-md-6" style="display: flex;flex-direction: column;">
                                    <span><b>Name:</b> ${memberDetails.mem_name}</span>
                                </div>
                                <div class="col-md-6" style="display: flex;flex-direction: column;">
                                    <span><b>Gender:</b> ${memberDetails.mem_gender}</span>
                                    <span><b>Date:</b> ${day}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Exercise name</th>
                                            <th>Reputation</th>
                                            <th>Sets</th>
                                            <th>Duration Minutes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${dailyWorkouts[day].map(workout => `
                                            <tr>
                                                <td>${workout.exercise_name}</td>
                                                <td>${workout.reputation}</td>
                                                <td>${workout.sets}</td>
                                                <td>${workout.duration_minutes}</td>
                                            </tr>
                                        `).join('')}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="page-break-after: always;"></div>
                    `;
                }).join('');

                $('#daily_workouts_table').html(html);
            },
            error: function() {
                $('#daily_workouts_table').html('Not Found');

            }
        })
    }
</script>

<script>

    function print_w() {
            let divContents = document.getElementById("daily_workouts_table").innerHTML;
            let printWindow = window.open('', '', 'height=500, width=500');
            printWindow.document.open();
            printWindow.document.write(`
                <html>
                <head>
                    <title>Print Div Content</title>
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                    <style>

                        body { font-family: Arial, sans-serif; }
                        h1 { color: #333; }
                    </style>
                </head>
                <body>
                    ${divContents}
                       
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
</script>

<script>
    function print_all() {
        var ids = [];
        $('.ids').each(function() {
            if ($(this).is(":checked")) {
                var id = $(this).val();
                ids.push(id);
            }
        })
        if (ids.length == 0) {
            alert('Select at least one');
            return;
        }
        var urlss="{{ route('dailyWorkouts.print', ['id' => ':id']) }}";
        urlss = urlss.replace(':id', ids.join(","));
        window.open(urlss, '_blank');
    }
</script>
@endsection





