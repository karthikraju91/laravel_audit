<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

use Redirect;

use DB;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::where("user_id",\Auth::user()->id)->paginate("10");
        return view("students.list",compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("students/add");
    }


    public function view($id){
        $data = Student::find($id);
        return view("students.view",["data"=>$data]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo "<pre>"; print_r($request->all()); exit;
        $student = new Student;
        
        $student->name      =   $request->name;
        $student->email     =   $request->email;
        $student->mobile_no =   $request->mobile_no;
        $student->dob       =   date("Y-m-d",strtotime($request->dob));
        $student->gender    =   $request->gender;
        $student->user_id   =   \Auth::user()->id;

        $messages = [
          'name.required' => 'Please enter name',
          'email.required' => 'Please enter email address',
          'mobile_no.required' => 'Please enter valid mobile number',
          'gender.required' => 'Please select gender',
          'dob.required' => 'Please select date of birth',
        ];
        $validate = $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:students',
                'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'gender' => 'required',
                'dob' => 'required',
            ],$messages);

        //$student->save();
        $student->save();

        if(!empty($request->file("upload_file"))){
            $s_profile = $request->file("upload_file");
            $insert = $student->id;
            $folderPath = public_path('students');
            if(!file_exists ( $folderPath )){$folderPath = mkdir($folderPath);}
            $s_profile->move($folderPath,$insert.".".$s_profile->getClientOriginalExtension());
            Student::where("id",$insert)->update(["profile_pic"=>$insert.".".$s_profile->getClientOriginalExtension()]);
        }

        if($insert){
            return Redirect("students/list")->with(['message'=>"*Student added Sucessfully"]);
        }else{
            return Redirect("students/add")->with(['message'=>"*Unable to create student."]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view("students.edit",["students"=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //print_r($request->all()); exit;

        $student = Student::find($request->id);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->dob = date("Y-m-d",strtotime($request->dob));
        $student->mobile_no = $request->mobile_no;
        $student->gender = $request->gender;

        $messages = [
          'name.required' => 'Please enter name',
          'email.required' => 'Please enter email address',
          'mobile_no.required' => 'Please enter valid mobile number',
          'gender.required' => 'Please select gender',
          'dob.required' => 'Please select date of birth',
        ];
        $validate = $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'gender' => 'required',
                'dob' => 'required',
            ],$messages);

        $student->save();

        if(!empty($request->file("upload_file"))){
            $s_profile = $request->file("upload_file");
           
            $folderPath = public_path('students');
            if(!file_exists ( $folderPath )){$folderPath = mkdir($folderPath);}
            $s_profile->move($folderPath,$request->id.".".$s_profile->getClientOriginalExtension());
            Student::where("id",$request->id)->update(["profile_pic"=>$request->id.".".$s_profile->getClientOriginalExtension()]);
        }

        return Redirect("students/edit/".$request->id)->with(["message"=>"Data is updated"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $student = Student::where('id', $id)->first();
        $student->delete();
        return Redirect("students/list")->with(["message"=>"Student is deleted"]);
    }

    public function audit_logs(){

        $data = DB::table("audits as ad")
                ->leftjoin("students as s","s.id","ad.auditable_id")
                ->where("ad.user_id",\Auth::user()->id)
                ->select("ad.*","s.name as student_name")
                ->get();
        return view("students.student_audit_log",["data"=>$data]);
    }


    public function view_detailed_audit($id){
        $details = DB::table("audits as ad")->leftjoin("students as s","s.id","ad.auditable_id")->select("ad.*","s.name as student_name")->where("ad.id",$id)->first();

        //echo "<pre>"; print_r(json_decode($details->old_values)); exit;
        return view("students.audit_details",compact('details'));
    }


    public function mail(){
        return view("students.mail");
    }

    public function send_mail(Request $request){

//echo "<pre>"; print_r($request->all()); exit;

        $msg = $request->content;
        $email = $request->email;
        $sub = $request->subject;
      $result = \Mail::send(['text'=>'mail'], ['content' => $msg], function($message) use ($msg,$email,$sub) {
         $message->to($email, $email)->subject($sub);
         $message->from('pekt@travash.com','Admin');
      });

      /*if( count(\Mail::failures()) > 0 && empty($result) ) {
        return Redirect("students/mail")->with(["message"=>"Mail send failed"]);
      }else{*/
        return Redirect("students/mail")->with(["message"=>"Mail send Sucessfully"]);
      //}
      
    }


}
