<?php

namespace App\Http\Controllers;

use App\DataTables\MemberDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use App\Models\AdmissionQuestions;
use App\Models\SiteSetting;
use App\Models\TermAndCondition;
use App\Models\MultiBranch;
use App\Models\Healthmetrics;
use App\Models\PurchasePackage;


use App\Models\User;
use App\Models\Income;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use File;
use Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\YourDataImport;
use Carbon\Carbon;
use Auth;
use Request;

class MemberController extends AppBaseController
{
    /**
     * Display a listing of the Member.
     *
     * @param MemberDataTable $memberDataTable
     * @return Response
     */
    public function index(MemberDataTable $memberDataTable)
    {
        // echo '<pre>';
        // print_r($memberDataTable);
        // echo '</pre>';
        // exit;


        // dd($memberDataTable);
        return $memberDataTable->render('members.index');
    }

    /**
     * Show the form for creating a new Member.
     *
     * @return Response
     */
    public function create()
    {

        return view('members.create');
    }

    /**
     * Store a newly created Member in storage.
     *
     * @param CreateMemberRequest $request
     *
     * @return Response
     */
    public function store(CreateMemberRequest $request)
    {

        $input = $request->all();

        // dd($input);
        $package_id = $input['package_id'];
        $amount = $input['amount'];
        $tax = $input['tax'];
        $coupons_id = $input['coupons_id'];
        $coupon_amount = $input['coupon_amount'];
        $gross_amount = $input['gross_amount'];
        $pay_amount = $input['pay_amount'];
        $due_amount = $input['due_amount'];
        $status = $input['status'];
        $expired_date = $input['expired_date'];
        unset($input['package_id']);
        unset($input['amount']);
        unset($input['tax']);
        unset($input['coupons_id']);
        unset($input['coupon_amount']);
        unset($input['gross_amount']);
        unset($input['pay_amount']);
        unset($input['due_amount']);
        unset($input['status']);
        unset($input['expired_date']);
        if (isset($input['package_switch'])) {
            $package_switch=true;
        }else{
            $package_switch=false;
        }
        unset($input['package_switch']);
        

        // package_id
        // amount
        // tax
        // coupons_id
        // coupon_amount
        // gross_amount
        // pay_amount
        // due_amount
        // status
        // expired_date




        // dd($input);
        if ($request->hasFile('mem_img_url')) {
            $path = storage_path('app/public/images/members');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('mem_img_url');
            $input['mem_img_url'] = $file->store('images/members', 'public');
        }
        $member_unique_id='MEM'.time();
        // $input['member_unique_id']=$member_unique_id;

        $member_unique_id=$input['member_unique_id'];

        $member = Member::where('member_unique_id', $member_unique_id)->first();
        if ($member) {
            Flash::error('Member id already exists');
            return redirect(route('members.create'));
        }

        $member = Member::where('mem_email', $input['mem_email'])->first();
        if ($member) {
            Flash::error('Member email already exists');
            return redirect(route('members.create'));
        }













        /** @var Member $member */
        $member = Member::create($input);
        $input['user_id'] = $member->id;
        User::create(
            [
                'name' =>                    $input['mem_name'],
                'email' =>                   $input['mem_email'],
                'group_id' =>                    $input['group_id'],
                'member_id' =>                   $input['user_id'],
                'password' =>                    Hash::make('12345678'),
            ]
        );

        $member_details=Member::where('id',$member->id)->first();
        $title=$member_details->mem_name.' Admission Fee';
        $description='Member Admission Fee';
        $income=new Income();
        $income->title=$title;
        $income->branch_id=$member_details->branch_id;
        $income->member_id=$member_details->id;
        $income->amount=$member_details->mem_admission_fees;
        $income->description=$description;
        $income->save();
        Flash::success('Member saved successfully.');
        $data_helth=[
            'member_id'=> $input['user_id'],
            'measurement_date'=> date('Y-m-d'),
            'weight'=> isset($request->weight) ? $request->weight : 0,
            'height'=> isset($request->height) ? $request->height : 0,
            'bmi'=> isset($request->bmi) ? $request->bmi : 0,
            'body_fat_percentage'=> '',
            'muscle_mass'=> '',
            'hydration_level'=> '',
            'chest'=> '',
            'waist'=> isset($request->waist) ? $request->waist : 0,
            'hips'=> '',
            'thighs'=> '',
            'arms'=> '',
            'forearms'=> '',
            'neck'=> '',
            'shoulders'=> '',
            'calves'=> '',
            'resting_heart_rate'=> isset($request->pulse_rate) ? $request->pulse_rate :0,
        ];
        Healthmetrics::create($data_helth);




        if (isset($package_switch) && $package_switch==true) {
            $pack_data=[
                'member_id'=>$input['user_id'],
                'package_id'=>$package_id,
                'amount'=>$amount,
                'tax'=>$tax,
                'coupons_id'=>$coupons_id,
                'coupon_amount'=>$coupon_amount,
                'gross_amount'=>$gross_amount,
                'pay_amount'=>$pay_amount,
                'due_amount'=>$due_amount,
                'status'=>$status,
                'expired_date'=>$expired_date
            ];
            $purchasePackage = PurchasePackage::create($pack_data);
            $purchasePackages_data = PurchasePackage::select('purchasepackages.*', 'packages.pack_name as pack_name','packages.pack_duration', 'members.mem_name as member_name', 'members.member_unique_id as member_unique_id')
            ->join('packages', 'packages.id', '=', 'purchasepackages.package_id')
            ->join('members', 'members.id', '=', 'purchasepackages.member_id')
            ->where('purchasepackages.id',$purchasePackage->id)
            ->first();
            $title=$purchasePackages_data->member_name.' Purchased a Package '.$purchasePackages_data->pack_name;"";
            $member_details=Member::where('id',$purchasePackages_data->member_id)->first();
            $branch_details=MultiBranch::where('id',$member_details->branch_id)->first();
            $branch_name=$branch_details->branch_name;
            $description=$member_details->mem_name.' ( '.$member_details->member_unique_id.' ) '.' Purchased a Package '.$purchasePackages_data->pack_name.' in '.$branch_name;
            $income=new Income();
            $income->title=$title;
            $income->branch_id=$member_details->branch_id;
            $income->member_id=$member_details->id;
            $income->amount=$purchasePackages_data->pay_amount;
            $income->description=$description;
            $income->save();
        }

        return redirect(route('members.index'));
    }

    /**
     * Display the specified Member.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Member $member */
        $member = Member::leftJoin('users', 'members.id', '=', 'users.member_id')
                        ->leftJoin('groups', 'users.group_id', '=', 'groups.id')
                        ->select('members.*','users.group_id', 'groups.name as group_name, groups.id as groups_id')
                        ->where('members.id', $id)
                        ->first();
        //dd($member->groups_id);

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }
        $questions=AdmissionQuestions::all();

        return view('members.show')->with('member', $member)->with('questions', $questions);
    }
    public function details($id)
    {
        /** @var Member $member */
        $member = Member::find($id);

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }
        $questions = AdmissionQuestions::all();



        return view('members.show')->with('member', $member)->with('questions', $questions);
    }

    /**
     * Show the form for editing the specified Member.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Member $member */
        $member = Member::leftJoin('users', 'members.id', '=', 'users.member_id')
                        ->leftJoin('groups', 'users.group_id', '=', 'groups.id')
                        ->select('members.*','users.group_id', 'groups.name as group_name, groups.id as groups_id')
                        ->where('members.id', $id)
                        ->first();
                        //dd($member);
        if (empty($member)) {
            Flash::error('Member not found');
            return redirect(route('members.index'));
        }
        return view('members.edit')->with('member', $member);
    }

    /**
     * Update the specified Member in storage.
     *
     * @param  int              $id
     * @param UpdateMemberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMemberRequest $request)
    {
        /** @var Member $member */
        $member = Member::find($id);

        $input = $request->all();

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }
        if ($request->hasFile('mem_img_url')) {
            $path = storage_path('app/public/images/members');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('mem_img_url');
            $input['mem_img_url'] = $file->store('images/members', 'public');
        }else{
            unset($input['mem_img_url']);
        }

        $member->fill($input);
        $member->save();

        User::where('member_id', $id)->update([
            'name' =>                    $input['mem_name'],
            'email' =>                   $input['mem_email'],
            'group_id' =>                    $input['group_id'],
        ]);



        $data_helth=[
            'measurement_date'=> date('Y-m-d'),
            'weight'=> isset($request->weight) ? $request->weight : 0,
            'height'=> isset($request->height) ? $request->height : 0,
            'bmi'=> isset($request->bmi) ? $request->bmi : 0,
            'body_fat_percentage'=> '',
            'muscle_mass'=> '',
            'hydration_level'=> '',
            'chest'=> '',
            'waist'=> isset($request->waist) ? $request->waist : 0,
            'hips'=> '',
            'thighs'=> '',
            'arms'=> '',
            'forearms'=> '',
            'neck'=> '',
            'shoulders'=> '',
            'calves'=> '',
            'resting_heart_rate'=> isset($request->pulse_rate) ? $request->pulse_rate :0,
        ];
        Healthmetrics::where('member_id', $id)->update($data_helth);
        
       
        Flash::success('Member updated successfully.');
        return redirect(route('members.index'));
    }

    /**
     * Remove the specified Member from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Member $member */
        $member = Member::find($id);
        

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }
        $member_email=$member->mem_email;


        $member->delete();

        User::where('email', $member_email)->delete();

        Flash::success('Member deleted successfully.');

        return redirect(route('members.index'));
    }
    public function upload_excel_page()
    {
        // dd('upload_excel_page');
        return view('members.upload_excel_page');
    }
    public function admission_form(){
        
        $members = Member::find(Auth::user()->member_id);
       // dd($members);
        if(empty($members)){
            Flash::error('Member not found');
            return redirect(url('/'));
        }
        $siteSettings = SiteSetting::first();
        $AdmissionQuestions = AdmissionQuestions::all();
        $TermAndCondition = TermAndCondition::all();
        return view('members.admission_form', compact('members', 'siteSettings', 'AdmissionQuestions', 'TermAndCondition'));
    }
    public function member_admission_store(\Illuminate\Http\Request $request) {
        //dd($request->all());
        $AdmissionQuestions = AdmissionQuestions::all();

        $question=[];
        foreach ($AdmissionQuestions as $admissionQuestion) {
            $d=explode(',', $request->input('question_' . $admissionQuestion->id));
            $questions[$admissionQuestion->id] = $d[0];
        }

        $data = [
            'member_unique_id' => $request->member_no,
            'mem_name' => $request->name,
            'mem_father' => $request->father_name,
            'mem_mother' => $request->mother_name,
            'mem_gender' => $request->gender,
            'mem_address' => $request->current_address,
            'date_of_birth' => $request->date_of_birth,
            'mem_cell' => $request->mem_cell,
            'mem_email' => $request->mem_email,
            'mem_img_url' => '',
            'mem_type' => '',
            'punch_id' => '',
            'height' => $request->height,
            'weight' => $request->weight,
            'bmi' => $request->bmi,
            'waist' => $request->waist,
            'blood_group' => $request->blood_group,
            'blood_pressure' => $request->blood_pressure,
            'pulse_rate' => $request->pulse_rate,
            'profession' => $request->profession,
            'office_address' => $request->office_address,
            'exercise_goal' => $request->exercise_goal,
            'current_diet_routine' => $request->current_diet_routine,
            'sassoon_exercise_time' => $request->sassoon_exercise_time,
            'sleep_time' => $request->sleep_time,
            'wake_up_time' => $request->wake_up_time,
            'work_time' => $request->work_time,
            'exercise_history' => $request->exercise_history,
            'medicine_history' => $request->medicine_history,
            'injury_or_health_issue' => $request->injury_or_health_issue,
            'like_or_dislike_exercise' => $request->like_or_dislike_exercise,
            'like_or_dislike_food' => $request->like_or_dislike_food,
            'push_up_count' => $request->push_up_count,
            'pull_up_count' => $request->pull_up_count,
            'lift_count_kg' => $request->lift_count_kg,
            'question' => json_encode($questions),
            'mem_type' => 'member',
            'term_con' => 'yes',

        ];

        $member = Member::where('member_unique_id', $data['member_unique_id'])->first();
        if ($member) {
            if ($member->update($data)) {
                $massage='update successfully';
                $status = true;
            } else {
                $massage=$member->getErrors();
                $status = false;
            }
        } else {
            $member = Member::create($data);
            if ($member) {
                $massage='created successfully';
                $status = true;
            } else {
                $massage=$member->getErrors();
                $status = false;
            }
        }
        if ($status == true) {
            $data_helth=[
                'member_id'=> $member->id,
                'measurement_date'=> date('Y-m-d'),
                'weight'=> isset($request->weight) ? $request->weight : 0,
                'height'=> isset($request->height) ? $request->height : 0,
                'bmi'=> isset($request->bmi) ? $request->bmi : 0,
                'body_fat_percentage'=> '',
                'muscle_mass'=> '',
                'hydration_level'=> '',
                'chest'=> '',
                'waist'=> isset($request->waist) ? $request->waist : 0,
                'hips'=> '',
                'thighs'=> '',
                'arms'=> '',
                'forearms'=> '',
                'neck'=> '',
                'shoulders'=> '',
                'calves'=> '',
                'resting_heart_rate'=> isset($request->pulse_rate) ? $request->pulse_rate :0,
            ];
            Healthmetrics::create($data_helth);
        }
        return response()->json(['status' =>$status, 'massage' =>$massage]);
    }
    public function getBranches()
    {
        $branches = MultiBranch::pluck('branch_name'); // Adjust table/model if necessary
        return response()->json($branches);
    }
    
}
