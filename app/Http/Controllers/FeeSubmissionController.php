<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\FeeSubmission;

class FeeSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FeeSubmission = FeeSubmission::all();
        return response()->json(['success' => true, 'response' => $FeeSubmission]);
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
            'batch' => 'required',
            'feeCollection'    => 'required',
            'studentName' => 'required',
            'admNo' => 'required',
            'paymentMode' => 'required',
            'referenceNo' => 'required',
            'paymentDate' => 'required|date',
            'paymentNotes' => 'required',
            'amount' => 'required',

        ];
    
        $input     = $request->only('referenceNo', 'feeCollection','studentName','admNo','paymentMode','batch','paymentDate','paymentNotes','amount');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $batch = $request->batch;
        $feeCollection    = $request->feeCollection;
        $studentName = $request->studentName;
        $admNo = $request->admNo;
        $paymentMode = $request->paymentMode;
        $referenceNo = $request->referenceNo;
        $paymentDate = $request->paymentDate;
        $paymentNotes = $request->paymentNotes;
        $amount = $request->amount;
        
       

        $newFeeSubmission    = FeeSubmission::create([
        'batch' => $batch, 
        'feeCollection' => $feeCollection,
        'studentName' => $studentName,
        'admNo' => $admNo,
        'paymentMode' => $paymentMode,
        'referenceNo' => $referenceNo,
        'paymentDate' => $paymentDate,
        'paymentNotes' => $paymentNotes,
        'amount' => $amount,

        ]);
        return response()->json(['success' => true, 'response' => $newFeeSubmission]);
    }

 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $FeeSubmission = FeeSubmission::find($id);

        if(!$FeeSubmission){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified Fee submission period']);
        }
        return response()->json(['success' => true, 'response' => $FeeSubmission]);
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
            'batch' => 'required',
            'feeCollection'    => 'required',
            'studentName' => 'required',
            'admNo' => 'required',
            'paymentMode' => 'required',
            'referenceNo' => 'required',
            'paymentDate' => 'required|date',
            'paymentNotes' => 'required',
            'amount' => 'required',

        ];
    
        $input     = $request->only('referenceNo', 'feeCollection','studentName','admNo','paymentMode','batch','paymentDate','paymentNotes','amount');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $FeeSubmission = FeeSubmission::find($id);
        if(!$FeeSubmission){
            return response()->json(['success' => false, 'response' => 'we cant find the requested Fee submission period']);
        }

        $FeeSubmission->batch = $request->batch;
        $FeeSubmission->feeCollection    = $request->feeCollection;
        $FeeSubmission->studentName = $request->studentName;
        $FeeSubmission->admNo = $request->admNo;
        $FeeSubmission->paymentMode = $request->paymentMode;
        $FeeSubmission->referenceNo = $request->referenceNo;
        $FeeSubmission->paymentDate = $request->paymentDate;
        $FeeSubmission->paymentNotes = $request->paymentNotes;
        $FeeSubmission->amount = $request->amount;

        $FeeSubmission->save();
       
        
        

    
        return response()->json(['success' => true, 'response' => $FeeSubmission]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $FeeSubmission = FeeSubmission::find($id);

        if(!$FeeSubmission){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified Fee Submission period']);
        }
        $FeeSubmission->delete();
        return response()->json(['success' => true, 'response' => $FeeSubmission]);
    }

    public function pay()
    {
        return response()->json(['success' => true, 'response' => 'coop bank posted']);
    }
}
