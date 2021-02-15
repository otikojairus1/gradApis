<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Validator;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::all();
        return response()->json(['success' => true, 'response' => $subject]);
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
            'className' => 'required',
            'batchName'    => 'required',
            'subjectName' => 'required',
            'code' => 'required',
            'maxWeeklyClasses' => 'required',
            'noExams' => 'required',

        ];
    
        $input     = $request->only('className', 'batchName','subjectName','code','maxWeeklyClasses','noExams');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $className = $request->className;
        $batchName    = $request->batchName;
        $subjectName = $request->subjectName;
        $code = $request->code;
        $maxWeeklyClasses = $request->maxWeeklyClasses;
        $noExams = $request->noExams;

        $newSubject    = Subject::create([
        'className' => $className, 
        'batchName' => $batchName,
        'subjectName' => $subjectName,
        'code' => $code,
        'maxWeeklyClasses' => $maxWeeklyClasses, 
        'noExams' => $noExams,]);
        return response()->json(['success' => true, 'response' => $newSubject]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $Subject = Subject::find($id);

        if(!$Subject){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified Subject']);
        }
        return response()->json(['success' => true, 'response' => $Subject]);
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
            'className' => 'required',
            'batchName'    => 'required',
            'subjectName' => 'required',
            'code' => 'required',
            'maxWeeklyClasses' => 'required',
            'noExams' => 'required',

        ];
    
        $input     = $request->only('className', 'batchName','subjectName','code','maxWeeklyClasses','noExams');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $Subject = Subject::find($id);
        if(!$Subject){
            return response()->json(['success' => false, 'response' => 'we cant find the requested Subject']);
        }

        $Subject->className = $request->className;
        $Subject->batchName    = $request->batchName;
        $Subject->subjectName = $request->subjectName;
        $Subject->code = $request->code;
        $Subject->maxWeeklyClasses = $request->maxWeeklyClasses;
        $Subject->noExams = $request->noExams;

        $Subject->save();
        return response()->json(['success' => true, 'response' => $Subject]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);

        if(!$subject){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified subject']);
        }
        $subject->delete();
        return response()->json(['success' => true, 'response' => $subject]);
    }
}
