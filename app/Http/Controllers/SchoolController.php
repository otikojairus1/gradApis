<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); 
        if ($user->tokenCan('admin')) {
            $schoolList = School::all();
        return response()->json(['success' => true, 'response' => $schoolList]);
        }else{
            return response()->json(['success' => false, 'response' => 'unauthosized']);
        }
        

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
            'name' => 'unique:schools|required',
            'address'    => 'required',
            'phone' => 'required|min:10',
            'email' => 'required|email',
            'website' => '',
            'type' => 'required',
            'attendanceType' => 'required',
            'startingWeekday' => 'required',
            'dateFormat' => '',
            'dateSeparator' => '',
            'financialyearStartdate' => 'required|date',
            'financialyearEnddate' => 'required|date',
            'startingReceiptno' => '',
            'language' => 'required',
            'timezone' => '',
            'county' => 'required',
            'logo' => 'required',
            'gradingSystem' => 'required',
            'enableAutoIncrementOfStudentId' => '',
            'enableNewsCommentModeration' => '',
            'enableSibling' => '',
            'enablePasswordChangeAtFirstLogin' => '',
            'enableRollnumber' => '',
            'enableAutoLogout' => '',
        ];
    
        $input     = $request->only('name', 'address','phone', 'email', 'website','type','attendanceType',
        'startingWeekday',  'dateFormat','dateSeparator','financialyearStartdate', 'financialyearEnddate', 'startingReceiptno'
    ,'language','timezone', 'county','logo', 'gradingSystem','enableAutoIncrementOfStudentId' ,'enableNewsCommentModeration',
    'enableSibling','enablePasswordChangeAtFirstLogin','enableRollnumber','enableAutoLogout');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $name = $request->name;
        $address    = $request->address;
        $phone = $request->phone;
        $email = $request->email;
        $website = $request->website;
        $type = $request->type;
        $attendanceType = $request->attendanceType;
        $startingWeekday = $request->startingWeekday;
        $dateFormat = $request->dateFormat;
        $dateSeparator = $request->dateSeparator;
        $financialyearStartdate = $request->financialyearStartdate;
        $financialyearEnddate = $request->financialyearEnddate;
        $startingReceiptno = $request->startingReceiptno;
        $language = $request->language;
        $timezone = $request->timezone;
        $county = $request->county;
        $logo = $request->logo;
        $gradingSystem = $request->gradingSystem;
        $enableAutoIncrementOfStudentId = $request->enableAutoIncrementOfStudentId;
        $enableNewsCommentModeration = $request->enableNewsCommentModeration;
        $enableSibling = $request->enableSibling;
        $enablePasswordChangeAtFirstLogin = $request->enablePasswordChangeAtFirstLogin;
        $enableRollnumber = $request->enableRollnumber;
        $enableAutoLogout = $request->enableAutoLogout;


        $schoolDetail  = School::create(['name' => $name, 
        'address' => $address, 
        'phone' => $phone, 
        'email' => $email, 
        'website' => $website, 
        'type' => $type, 
        'attendanceType' => $attendanceType, 
        'startingWeekday' => $startingWeekday, 
        'dateFormat' => $dateFormat, 
        'dateSeparator' => $dateSeparator, 
        'financialyearStartdate' => $financialyearStartdate, 
        'financialyearEnddate' => $financialyearEnddate, 
        'startingReceiptno' => $startingReceiptno, 
        'language' => $language, 
        'timezone' => $timezone, 
        'county' => $county, 
        'logo' => $logo, 
        'gradingSystem' => $gradingSystem, 
        'enableAutoIncrementOfStudentId' => $enableAutoIncrementOfStudentId, 
        'enableNewsCommentModeration' => $enableNewsCommentModeration, 
        'enableSibling' => $enableSibling, 
        'enablePasswordChangeAtFirstLogin' => $enablePasswordChangeAtFirstLogin, 
        'enableRollnumber' => $enableRollnumber, 
        'enableAutoLogout' => $enableAutoLogout, 
        
        ]);
        return response()->json(['success' => true, 'response' => $schoolDetail]);
        //return response()->json(['success' => true, 'response' => 'working']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schoolDetail = School::find($id);
        if(!$schoolDetail){
            return response()->json(['success' => false, 'response' => 'we could not find the school specified ']);

        }else{
            return response()->json(['success' => true, 'response' => $schoolDetail]);
        }
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
            'name' => 'required',
            'address'    => 'required',
            'phone' => 'required|min:10',
            'email' => 'required|email',
            'website' => '',
            'type' => 'required',
            'attendanceType' => 'required',
            'startingWeekday' => 'required',
            'dateFormat' => '',
            'dateSeparator' => '',
            'financialyearStartdate' => 'required|date',
            'financialyearEnddate' => 'required|date',
            'startingReceiptno' => '',
            'language' => 'required',
            'timezone' => '',
            'county' => 'required',
            'logo' => 'required',
            'gradingSystem' => 'required',
            'enableAutoIncrementOfStudentId' => '',
            'enableNewsCommentModeration' => '',
            'enableSibling' => '',
            'enablePasswordChangeAtFirstLogin' => '',
            'enableRollnumber' => '',
            'enableAutoLogout' => '',
        ];
    
        $input     = $request->only('name', 'address','phone', 'email', 'website','type','attendanceType',
        'startingWeekday',  'dateFormat','dateSeparator','financialyearStartdate', 'financialyearEnddate', 'startingReceiptno'
    ,'language','timezone', 'county','logo', 'gradingSystem','enableAutoIncrementOfStudentId' ,'enableNewsCommentModeration',
    'enableSibling','enablePasswordChangeAtFirstLogin','enableRollnumber','enableAutoLogout');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $schoolDetail = School::find($id);
        if(!$schoolDetail){
            return response()->json(['success' => false, 'response' => 'we could not find the school specified ']);

        }

        $schoolDetail->name = $request->name;
        $schoolDetail->address    = $request->address;
        $schoolDetail->phone = $request->phone;
        $schoolDetail->email = $request->email;
        $schoolDetail->website = $request->website;
        $schoolDetail->type = $request->type;
        $schoolDetail->attendanceType = $request->attendanceType;
        $schoolDetail->startingWeekday = $request->startingWeekday;
        $schoolDetail->dateFormat = $request->dateFormat;
        $schoolDetail->dateSeparator = $request->dateSeparator;
        $schoolDetail->financialyearStartdate = $request->financialyearStartdate;
        $schoolDetail->financialyearEnddate = $request->financialyearEnddate;
        $schoolDetail->startingReceiptno = $request->startingReceiptno;
        $schoolDetail->language = $request->language;
        $schoolDetail->timezone = $request->timezone;
        $schoolDetail->county = $request->county;
        $schoolDetail->logo = $request->logo;
        $schoolDetail->gradingSystem = $request->gradingSystem;
        $schoolDetail->enableAutoIncrementOfStudentId = $request->enableAutoIncrementOfStudentId;
        $schoolDetail->enableNewsCommentModeration = $request->enableNewsCommentModeration;
        $schoolDetail->enableSibling = $request->enableSibling;
        $schoolDetail->enablePasswordChangeAtFirstLogin = $request->enablePasswordChangeAtFirstLogin;
        $schoolDetail->enableRollnumber = $request->enableRollnumber;
        $schoolDetail->enableAutoLogout = $request->enableAutoLogout;
        $schoolDetail->save();

        return response()->json(['success' => true, 'response' => $schoolDetail]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schoolDetail = School::find($id);
        if(!$schoolDetail){
            return response()->json(['success' => false, 'response' => 'we could not find the school specified ']);

        }else{
            if(!$schoolDetail->delete()){
                return response()->json(['success' => false, 'response' => 'an error occured while performing the delete action']);
            }
            return response()->json(['success' => true, 'response' => $schoolDetail]);
        }
    }

   
}
