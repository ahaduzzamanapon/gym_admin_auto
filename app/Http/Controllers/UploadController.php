<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\YourDataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Member;
use App\Models\Punch_model;
use App\Models\User;
use Hash;
use Flash;



class UploadController extends Controller
{
    public function excel_upload_member_page()
    {
        return view('upload.upload_excel_page_member');
    }
    public function upload_excel_member(Request $request)
    {
        $import = new YourDataImport();
        Excel::import($import, $request->file('file'));
        $data = $import->getData();
        if (count($data) === 0) {
            Flash::error('Excel file is empty');
            return redirect()->back();
        }
        $duplicateEmails = [];
        foreach ($data as $key => $row) {


            // if (!isset($row['mem_email']) || !isset($row['mem_name']) || isset($row['punch_id'])) {
            //     continue;
            // }




            $duplicate = Member::where('mem_email', $row['mem_email'])->first();
            if ($duplicate) {
                $duplicateEmails[] = $row['mem_email'];
                continue;
            }
            $member = new Member();
            $member->member_unique_id = 'MEM' . time() . $row['punch_id'];
            $member->mem_name = $row['mem_name'];
            $member->mem_father = $row['mem_father'];
            $member->mem_address = $row['mem_address'];
            $member->mem_admission_date = date('Y-m-d', strtotime($row['mem_admission_date']));
            $member->mem_cell = $row['mem_cell'];
            $member->mem_email = $row['mem_email'];
            $member->mem_img_url = '';
            $member->mem_type = $row['mem_type'];
            $member->punch_id = $row['punch_id'];
            //$member->group_id = $row['group_id'];
            $member->save();
            User::create([
                'name' => $row['mem_name'],
                'email' => $row['mem_email'],
                'group_id' => $row['group_id'],
                'member_id' => $member->id,
                'password' => Hash::make($row['password']),
            ]);
        }
        if (count($duplicateEmails) > 0) {
            $html = '';
            foreach ($duplicateEmails as $email) {
                $html .= '<li>' . $email . '</li>';
            }
            Flash::error('Duplicate email found in excel file.<ul>' . $html . '</ul>');
        } else {
            Flash::success('Excel file uploaded successfully.');
        }

        return redirect()->route('members.index');
    }


    public function upload_excel_page_attendance()
    {
        return view('upload.upload_excel_page_attendance');
    }
    public function upload_excel_attendance(Request $request)
    {
        $import = new YourDataImport();
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/excel', $filename);
        Excel::import($import, storage_path('app/public/excel/' . $filename));
        $data = $import->getData();
        if (count($data) === 0) {
            Flash::error('Excel file is empty');
            return redirect()->back();
        }
        $duplicateEmails = [];
        foreach ($data as $key => $row) {
            //dd($row);
            $punch = new Punch_model();
            $punch->punch_id = $row['No.'];
            $punch->punch_time =date('Y-m-d H:i:s', strtotime($row['Date/Time'])) ;
            $punch->process_status = '0';
            $punch->save();
        }
        Flash::success('Excel file uploaded successfully.');
        return redirect()->route('attendences.index');
    }








}
