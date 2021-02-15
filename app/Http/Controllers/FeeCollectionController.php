<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeCollection;
use Illuminate\Support\Facades\Validator;

class FeeCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $feecollection = FeeCollection::all();
        return response()->json(['success' => true, 'response' => $feecollection]);
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
            'category' => 'required',
            'name'    => 'required',
            'fine' => 'required',
            'startDate' => 'required|date',
            'dueDate' => 'required|date',
            'batch' => 'required',
        

        ];
    
        $input     = $request->only('category', 'name','fine','startDate','dueDate','batch');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $category = $request->category;
        $name    = $request->name;
        $fine = $request->fine;
        $startDate = $request->startDate;
        $dueDate = $request->dueDate;
        $batch = $request->batch;
        
       

        $newFeeCollection    = FeeCollection::create([
        'category' => $category, 
        'name' => $name,
        'fine' => $fine,
        'startDate' => $startDate,
        'dueDate' => $dueDate,
        'batch' => $batch,
        ]);
        return response()->json(['success' => true, 'response' => $newFeeCollection]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $FeeCollection = FeeCollection::find($id);

        if(!$FeeCollection){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified Fee Collection']);
        }
        return response()->json(['success' => true, 'response' => $FeeCollection]);
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
            'category' => 'required',
            'name'    => 'required',
            'fine' => 'required',
            'startDate' => 'required|date',
            'dueDate' => 'required|date',
            'batch' => 'required',
        

        ];
    
        $input     = $request->only('category', 'name','fine','startDate','dueDate','batch');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $FeeCollection = FeeCollection::find($id);
        if(!$FeeCollection){
            return response()->json(['success' => false, 'response' => 'we cant find the requested Fee Collection']);
        }

        $FeeCollection->category = $request->category;
        $FeeCollection->name   = $request->name;
        $FeeCollection->fine= $request->fine;
        $FeeCollection->startDate= $request->startDate;
        $FeeCollection->dueDate= $request->dueDate;
        $FeeCollection->batch= $request->batch;
        $FeeCollection->save();
       

       
        return response()->json(['success' => true, 'response' => $FeeCollection]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $FeeCollection = FeeCollection::find($id);

        if(!$FeeCollection){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified Fee Collection']);
        }
        $FeeCollection->delete();
        return response()->json(['success' => true, 'response' => $FeeCollection]);
    }
}
