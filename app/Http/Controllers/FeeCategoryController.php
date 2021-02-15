<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feecategories = FeeCategory::all();
        return response()->json(['success' => true, 'response' => $feecategories]);
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
            'name' => 'required|unique:fee_categories',
            'description'    => 'required',
            'batch' => 'required',
        

        ];
    
        $input     = $request->only('name', 'description','batch');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $name = $request->name;
        $description    = $request->description;
        $batch = $request->batch;
       

        $newFeeCategory    = FeeCategory::create([
        'name' => $name, 
        'description' => $description,
        'batch' => $batch,
        ]);
        return response()->json(['success' => true, 'response' => $newFeeCategory]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feeCategory = FeeCategory::find($id);

        if(!$feeCategory){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified Fee Category']);
        }
        return response()->json(['success' => true, 'response' => $feeCategory]);
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
            'description'    => 'required',
            'batch' => 'required',
        

        ];
    
        $input     = $request->only('name', 'description','batch');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $FeeCategory = FeeCategory::find($id);
        if(!$FeeCategory){
            return response()->json(['success' => false, 'response' => 'we cant find the requested Fee Category']);
        }

        $FeeCategory->name = $request->name;
        $FeeCategory->description   = $request->description;
        $FeeCategory->batch= $request->batch;
        $FeeCategory->save();
       

       
        return response()->json(['success' => true, 'response' => $FeeCategory]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feeCategory = FeeCategory::find($id);

        if(!$feeCategory){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified Fee Category']);
        }
        $feeCategory->delete();
        return response()->json(['success' => true, 'response' => $feeCategory]);
    }
}
