@extends('layouts.default')

{{-- Page title --}}
@section('title')
Account Report @parent
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
        <h1>Account</h1>
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
            <h5 class="card-title d-inline">Account</h5>
        </section>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="">From date/First Date</label>
                            <input type="date" name="from_date" id="from_date" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">To date</label>
                            <input type="date" name="to_date" id="to_date" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Type</label>
                            <select name="member_type" id="member_type" class="form-control" onchange="get_member()">
                                <option value="">Please Select Member Type</option>
                                <option selected value="member">Member</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Branch</label>
                            <select name="branch_id" id="branch_id" class="form-control" onchange="get_member()">
                                @php
                                if(if_can('see_all_branch')){
                                    $multi_branchs = DB::table('multi_branchs')->get();
                                echo '<option value="">Please Select Branch Type</option>';
                                }else{
                                    $multi_branchs = DB::table('multi_branchs')->where('id', get_branch() )->get();
                                }
                                @endphp
                                @foreach ($multi_branchs as $multi_branch)
                                <option value="{{ $multi_branch->id }}">{{ $multi_branch->branch_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="container mt-5">
                            <!-- Tab navigation -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Income</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Expenses</button>
                                </li>
                            </ul>
                            <!-- Tab content -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row p-2" style="display: flex;flex-wrap: wrap;gap: 8px;">
                                        <a href="#" onclick="fetchAccountReportIncome('daily')" class="btn btn-primary">Daily Income</a>
                                        <a href="#" onclick="fetchAccountReportIncome('con')" class="btn btn-primary">Date Between Income</a>
                                        <a href="#" onclick="fetchAccountReportIncome('daily','member')" class="btn btn-primary">Daily Income Member Wise</a>
                                        <a href="#" onclick="fetchAccountReportIncome('con','member')" class="btn btn-primary">Date Between Income Member Wise</a>
                                        <a href="#" onclick="fetchAccountReportDeu()" class="btn btn-primary">Due Report</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row p-2" style="display: flex;flex-wrap: wrap;gap: 8px;">
                                        <a href="#" onclick="fetchAccountReportExpense('daily')" class="btn btn-primary">Daily Expenses</a>
                                        <a href="#" onclick="fetchAccountReportExpense('con')" class="btn btn-primary">Date Between Expenses</a>
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
        get_member()
        $('#select_all').on('change', function() {
            if ($(this).is(':checked')) {
                $('.member_id_c').prop('checked', true);
            } else {
                $('.member_id_c').prop('checked', false);
            }
        });
    });



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
            }
        });
    }

    function fetchAccountReportIncome(status,type=null) {
        const fromDate = $('#from_date').val();
        let toDate = $('#to_date').val();

        if (status === 'con') {
            if (!fromDate) {
                alert('Please select a Start date');
                return;
            }
            if (!toDate) {
                alert('Please select an To date');
                return;
            }
        } else {
            if (!fromDate) {
                alert('Please select Start date');
                return;
            }
            toDate = fromDate;
        }

        const branchId = $('#branch_id').val();
        // if (!branchId) {
        //     alert('Please select a branch');
        //     return;
        // }

        memberIds='';
        if (type == 'member') {
             memberIds = get_checked_member_id();
            if (memberIds.length === 0) {
                alert('Please select member');
                return;
            }
        }else{
             memberIds = [];
        }

        $.ajax({
            url: "{{ route('account_report.getAccountReportIncome') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                from_date: fromDate,
                to_date: toDate,
                branch_id: branchId,
                status: status,
                selectedMemberIds: memberIds,
            },
            dataType: 'json',
        }).done(function(response) {
            const reportWindow = window.open();
            reportWindow.document.write(response.view);
        }).fail(function(response) {
            const errorWindow = window.open();
            errorWindow.document.write(response);
        });
    }
    function fetchAccountReportDeu() {
        const fromDate = $('#from_date').val();
        let toDate = $('#to_date').val();
        /* if (!fromDate) {
            alert('Please select Start date');
            return;
        }
        if (!toDate) {
            toDate= fromDate;
        } */



        const branchId = $('#branch_id').val();
        // if (!branchId) {
        //     alert('Please select a branch');
        //     return;
        // }

        memberIds = get_checked_member_id();
        if (memberIds.length === 0) {
            alert('Please select member');
            return;
        }


        $.ajax({
            url: "{{ route('account_report.fetchAccountReportDeu') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                from_date: fromDate,
                to_date: toDate,
                branch_id: branchId,
                selectedMemberIds: memberIds,
            },
            dataType: 'json',
        }).done(function(response) {
            const reportWindow = window.open();
            reportWindow.document.write(response.view);
        }).fail(function(response) {
            const errorWindow = window.open();
            errorWindow.document.write(response);
        });
    }
    function fetchAccountReportExpense(status) {
        const fromDate = $('#from_date').val();
        let toDate = $('#to_date').val();

        if (status === 'con') {
            if (!fromDate) {
                alert('Please select a Start date');
                return;
            }
            if (!toDate) {
                alert('Please select an To date');
                return;
            }
        } else {
            if (!fromDate) {
                alert('Please select Start date');
                return;
            }
            toDate = fromDate;
        }

        const branchId = $('#branch_id').val();
        // if (!branchId) {
        //     alert('Please select a branch');
        //     return;
        // }

        // const selectedMemberIds = get_checked_member_id();

        $.ajax({
            url: "{{ route('account_report.getAccountReportExpense') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                from_date: fromDate,
                to_date: toDate,
                branch_id: branchId,
                status: status,
            },
            dataType: 'json',
        }).done(function(response) {
            const reportWindow = window.open();
            reportWindow.document.write(response.view);
        }).fail(function(response) {
            const errorWindow = window.open();
            errorWindow.document.write(response);
        });
    }
</script>
@endsection
