<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;

use Illuminate\Support\Facades\Validator;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::all();
        return response()->json(['success' => true, 'response' => $batches]);
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
            'name' => 'min:3|required',
            'startDate' => 'date|required',
            'endDate'    => 'date|required',
            'importPreviousBatchSubject' => 'required',
            'importPreviousBatchMasterclass' => 'required',
            

        ];
    
        $input     = $request->only('name','startDate', 'endDate','importPreviousBatchSubject','importPreviousBatchMasterclass');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $name = $request->name;
        $startDate = $request->startDate;
        $endDate    = $request->endDate;
        $importPreviousBatchSubject = $request->importPreviousBatchSubject;
        $importPreviousBatchMasterclass = $request->importPreviousBatchMasterclass;
        
        $newBatch    = Batch::create([
            'name' => $name, 
        'startDate' => $startDate, 
        'endDate' => $endDate,
        'importPreviousBatchSubject' => $importPreviousBatchSubject,
        'importPreviousBatchMasterclass' => $importPreviousBatchMasterclass,
        ]);
        return response()->json(['success' => true, 'response' => $newBatch]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Batch = Batch::find($id);

        if(!$Batch){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified Batch']);
        }
        return response()->json(['success' => true, 'response' => $Batch]);
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
            'name' => 'min:3|required',
            'startDate' => 'date|required',
            'endDate'    => 'date|required',
            'importPreviousBatchSubject' => 'required',
            'importPreviousBatchMasterclass' => 'required',
            

        ];
    
        $input     = $request->only('name','startDate', 'endDate','importPreviousBatchSubject','importPreviousBatchMasterclass');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        
        $Batch = Batch::find($id);
        if(!$Batch){
            return response()->json(['success' => false, 'response' => 'we cant find the requested Batch']);
            }
            $Batch->name = $request->name;
        $Batch->startDate = $request->startDate;
        $Batch->endDate    = $request->endDate;
        $Batch->importPreviousBatchSubject = $request->importPreviousBatchSubject;
        $Batch->importPreviousBatchMasterclass = $request->importPreviousBatchMasterclass;
        
      $Batch->save();
        return response()->json(['success' => true, 'response' => $Batch]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Batch = Batch::find($id);

        if(!$Batch){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified Batch']);
        }
        $Batch->delete();
        return response()->json(['success' => true, 'response' => $Batch]);
    }
}
