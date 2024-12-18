<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expenses;
use App\Models\Member;
use App\Models\PurchasePackage;
use Artisan;

class AccountReport extends Controller
{
    public function index()
    {
        return view('account_report.index');
    }
    public function getAccountReportIncome(Request $request)
    {
        $from_date=$request->input('from_date');
        $to_date=$request->input('to_date');
        $branch_id=$request->input('branch_id');
        $status=$request->input('status');
        $selectedMemberIds=$request->input('selectedMemberIds');
        if (!empty($selectedMemberIds)) {
            $selectedMembers = Member::whereIn('id', $selectedMemberIds)->pluck('id')->toArray();
        }
        // dd($selectedMembers);

        if ($status == 'con') {
            $title='Income report from '.$from_date.' to '.$to_date;
        }else{
            $title='Income report for '.$from_date;
        }
        $incomeData = Income::join('multi_branchs', 'incomes.branch_id', '=', 'multi_branchs.id')
            ->whereDate('incomes.created_at', '>=', $from_date)
            ->whereDate('incomes.created_at', '<=', $to_date);
            if ($selectedMemberIds) {
                $incomeData->whereIn('incomes.member_id', $selectedMembers);
            }

        if ($branch_id) {
            $incomeData->where('multi_branchs.id', $branch_id);
        }

        $incomeData = $incomeData->get();



        $data=[
            'title'=>$title,
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'status'=>true,
            'view'=>view('account_report.account_report_income',compact('incomeData','title','from_date','to_date','branch_id','status'))->render()
        ];


        return response()->json($data, 200);
    }
    public function getAccountReportExpense(Request $request)
    {
        $from_date=$request->input('from_date');
        $to_date=$request->input('to_date');
        $branch_id=$request->input('branch_id');
        $status=$request->input('status');
        if ($status=='con') {
            $title='Expense report from '.$from_date.' to '.$to_date;
        }else{
            $title='Expense report for '.$from_date;
        }

        $incomeData = Expenses::join('multi_branchs', 'expensess.branch_id', '=', 'multi_branchs.id')
            ->whereDate('expensess.created_at', '>=', $from_date)
            ->whereDate('expensess.created_at', '<=', $to_date);

        if ($branch_id) {
            $incomeData->where('multi_branchs.id', $branch_id);
        }

        $incomeData = $incomeData->get();
        $data=[
            'title'=>$title,
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'status'=>true,
            'view'=>view('account_report.account_report_expense',compact('incomeData','title','from_date','to_date','branch_id','status'))->render()
        ];


        return response()->json($data, 200);
    }


    public function manual_command(){
        $status = Artisan::call('storage:link');
        echo "done ".$status;

    }

    public function fetchAccountReportDeu(Request $request)
    {
        $from_date=$request->input('from_date');
        $to_date=$request->input('to_date');
        $selectedMemberIds=$request->input('selectedMemberIds');
        if (!empty($selectedMemberIds)) {
            $selectedMembers = Member::whereIn('id', $selectedMemberIds)->pluck('id')->toArray();
        }
        $title='Due report from '.$from_date.' to '.$to_date;

        $purchasePackages = PurchasePackage::select('purchasepackages.*', 'packages.pack_name as pack_name', 'members.mem_name as member_name','multi_branchs.branch_name')
            ->join('packages', 'packages.id', '=', 'purchasepackages.package_id')
            ->join('members', 'members.id', '=', 'purchasepackages.member_id')
            ->join('multi_branchs', 'members.branch_id', '=', 'multi_branchs.id')
            ->whereIn('members.id', $selectedMembers)
            ->where('purchasepackages.due_amount', '>', 0);
            if (!empty($from_date) && !empty($to_date)) {
                $purchasePackages->whereDate('purchasepackages.created_at', '>=', $from_date);
                $purchasePackages->whereDate('purchasepackages.created_at', '<=', $to_date);
            }
            if (!empty($from_date) && empty($to_date)) {
                $purchasePackages->whereDate('purchasepackages.created_at', '>=', $from_date);
                $purchasePackages->whereDate('purchasepackages.created_at', '<=', $from_date);
            }

        $purchasePackages = $purchasePackages->get();
        // dd($purchasePackages);





        $data=[
            'title'=>$title,
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'status'=>true,
            'view'=>view('account_report.account_report_deu',compact('purchasePackages','title','from_date','to_date'))->render()
        ];
        return response()->json($data, 200);
    }
}
