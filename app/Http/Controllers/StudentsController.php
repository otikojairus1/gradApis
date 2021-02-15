<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return response()->json(['success' => true, 'response' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'admNo' => 'unique:Students|required',
            'admDate'    => 'required|date',
            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'DOB' => 'required|date',
            'bloodGroup' => 'required',
            'birthPlace' => 'required',
            'nationality' => 'required',
            'motherTongue' => 'required',
            'category' => 'required',
            'addressLine' => 'required',
            'homeTown' => 'required',
            'county' => 'required',
            'box' => 'required',
            'citizenship' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'class' => 'required',
            'batch' => 'required',
            'rollNo' => '',
            'biometricID' => '',
            'enableSMS' => '',
            'enableEmail' => '',
            'photo' => 'required',
            'sibling' => '',

        ];
    
        $input     = $request->only('admNo', 
        'admDate',
        'firstName',
        'middleName',
        'lastName',
        'DOB',
            'bloodGroup',
            'birthPlace',
            'nationality',
            'motherTongue',
            'category',
            'addressLine' ,
            'homeTown',
            'county',
            'box',
            'citizenship',
            'phone',
            'email',
            'class',
            'batch',
            'rollNo',
            'biometricID',
            'enableSMS',
            'enableEmail',
            'photo' ,
            'sibling',

    );
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $admNo = $request->admNo;
        $admDate    = $request->admDate;
        $firstName = $request->firstName;
        $middleName = $request->middleName;
        $lastName = $request->lastName;
        $DOB = $request->DOB;
        $bloodGroup    = $request->bloodGroup;
        $birthPlace = $request->birthPlace;
        $nationality = $request->nationality;
        $motherTongue = $request->motherTongue;
        $category = $request->category;
        $addressLine    = $request->addressLine;
        $homeTown = $request->homeTown;
        $county = $request->county;
        $box = $request->box;
        $citizenship = $request->citizenship;
        $phone = $request->phone;
        $email    = $request->email;
        $class = $request->class;
        $batch = $request->batch;
        $rollNo = $request->rollNo;
        $biometricID = $request->biometricID;
        $enableSMS = $request->enableSMS;
        $enableEmail = $request->enableEmail;
        $photo = $request->photo;
        $sibling = $request->sibling;

        $newStudent    = Student::create([
        'admNo' => $admNo, 
        'admDate' => $admDate,
        'firstName' => $firstName,
        'middleName' => $middleName,
        'lastName' => $lastName,
        'DOB' => $DOB, 
        'bloodGroup' => $bloodGroup,
        'birthPlace' => $birthPlace,
        'nationality' => $nationality,
        'motherTongue' => $motherTongue,
        'category' => $category, 
        'addressLine' => $addressLine,
        'homeTown' => $homeTown,
        'county' => $county,
        'box' => $box,
        'citizenship' => $citizenship,
        'phone' => $phone, 
        'email' => $email,
        'class' => $class,
        'batch' => $batch,
        'rollNo' => $rollNo,
        'biometricID' => $biometricID, 
        'enableSMS' => $enableSMS,
        'enableEmail' => $enableEmail,
        'photo' => $photo,
        'sibling' => $sibling,
        
        ]);
        return response()->json(['success' => true, 'response' => $newStudent]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Student = Student::find($id);

        if(!$Student){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified Student']);
        }
        return response()->json(['success' => true, 'response' => $Student]);
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
    public function update(Request $request, $id)
    {
        $rules = [
            'admNo' => 'required',
            'admDate'    => 'required|date',
            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'DOB' => 'required|date',
            'bloodGroup' => 'required|max:2',
            'birthPlace' => 'required',
            'nationality' => 'required',
            'motherTongue' => 'required',
            'category' => 'required',
            'addressLine' => 'required',
            'homeTown' => 'required',
            'county' => 'required',
            'box' => 'required|max:10',
            'citizenship' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'class' => 'required',
            'batch' => 'required',
            'rollNo' => '',
            'biometricID' => '',
            'enableSMS' => '',
            'enableEmail' => '',
            'photo' => 'required',
            'sibling' => '',

        ];
    
        $input     = $request->only('admNo', 
        'admDate',
        'firstName',
        'middleName',
        'lastName',
        'DOB',
            'bloodGroup',
            'birthPlace',
            'nationality',
            'motherTongue',
            'category',
            'addressLine' ,
            'homeTown',
            'county',
            'box',
            'citizenship',
            'phone',
            'email',
            'class',
            'batch',
            'rollNo',
            'biometricID',
            'enableSMS',
            'enableEmail',
            'photo' ,
            'sibling',

    );
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        
        $student = Student::find($id);
        if(!$student){
            return response()->json(['success' => false, 'response' => 'we could not find the school specified ']);

        }
        $student->admNo = $request->admNo;
        $student->admDate    = $request->admDate;
        $student->firstName = $request->firstName;
        $student->middleName = $request->middleName;
        $student->lastName = $request->lastName;
        $student->DOB = $request->DOB;
        $student->bloodGroup    = $request->bloodGroup;
        $student->birthPlace = $request->birthPlace;
        $student->nationality = $request->nationality;
        $student->motherTongue = $request->motherTongue;
        $student->category = $request->category;
        $student->addressLine    = $request->addressLine;
        $student->homeTown = $request->homeTown;
        $student->county = $request->county;
        $student->box = $request->box;
        $student->citizenship = $request->citizenship;
        $student->phone = $request->phone;
        $student->email    = $request->email;
        $student->class = $request->class;
        $student->batch = $request->batch;
        $student->rollNo = $request->rollNo;
        $student->biometricID = $request->biometricID;
        $student->enableSMS = $request->enableSMS;
        $student->enableEmail = $request->enableEmail;
        $student->photo = $request->photo;
        $student->sibling = $request->sibling;

        $student->save();

   
        return response()->json(['success' => true, 'response' => $student]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if(!$student){
            return response()->json(['success' => false, 'response' => 'we could not find the student specified ']);

        }else{
            if(!$student->delete()){
                return response()->json(['success' => false, 'response' => 'an error occured while performing the delete action']);
            }
            return response()->json(['success' => true, 'response' => $student]);
        }
    }
}
