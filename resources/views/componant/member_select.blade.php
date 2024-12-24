@php
    if(if_can('show_all_data')){

        if(if_can('see_all_branch')){
            $members = DB::table('members')
                ->leftJoin('multi_branchs', 'members.branch_id', '=', 'multi_branchs.id')
                ->select('members.*', 'multi_branchs.branch_name')
                ->where('members.mem_type', 'member')
                ->get()
                ->map(function ($member) {
                return [
                    'id' => $member->id,
                    'mem_name' => $member->mem_name . '->' . $member->branch_name.'->'. $member->mem_cell,
                ];
            })
            ->pluck('mem_name', 'id');
        }else{
            $members = DB::table('members')
                ->leftJoin('multi_branchs', 'members.branch_id', '=', 'multi_branchs.id')
                ->select('members.*', 'multi_branchs.branch_name')
                ->where('members.branch_id', get_branch() )
                ->where('members.mem_type', 'member')
                ->get()
                ->map(function ($member) {
                return [
                    'id' => $member->id,
                    'mem_name' => $member->mem_name . '->' . $member->branch_name.'->'. $member->mem_cell,
                ];
            })
            ->pluck('mem_name', 'id');
        }
        $members->prepend('Select Member', '');
    }else {
        $members = DB::table('members')
            ->leftJoin('multi_branchs', 'members.branch_id', '=', 'multi_branchs.id')
            ->select('members.*', 'multi_branchs.branch_name')
            ->where('members.id', Auth::user()->member_id)
            ->where('members.mem_type', 'member')
            ->get()
            ->map(function ($member) {
            return [
                'id' => $member->id,
                'mem_name' => $member->mem_name . '->' . $member->branch_name.'->'. $member->mem_cell,
            ];
        })
        ->pluck('mem_name', 'id');
    }
@endphp

<div class="form-group col-md-4" style="display: @if(if_can('show_all_data')) block @else none @endif;">
    {!! Form::label('member_id', 'Member Name:',['class'=>'control-label']) !!}
    {!! Form::select('member_id', $members, null, ['class' => 'form-control','required'=>'required']) !!}
</div>


<script>
    var $jq = jQuery.noConflict();
    $jq(document).ready(function() {
        $jq('#member_id').chosen();
    });
</script>