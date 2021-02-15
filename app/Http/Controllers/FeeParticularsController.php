<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\FeeParticular;

class FeeParticularsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeparticulars = FeeParticular::all();
        return response()->json(['success' => true, 'response' => $feeparticulars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name' => 'required|unique:fee_particulars',
            'description'    => 'required',
            'studentApplicable' => 'required',
            'amount' => 'required',
            'category' => 'required',
        

        ];
    
        $input     = $request->only('name', 'description','studentApplicable','amount','category');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $name = $request->name;
        $description    = $request->description;
        $studentApplicable = $request->studentApplicable;
        $amount = $request->amount;
        $category = $request->category;
       

        $newFeeParticulars = FeeParticular::create([
        'name' => $name, 
        'description' => $description,
        'studentApplicable' => $studentApplicable,
        'amount' => $amount,
        'category' => $category,
        ]);
        return response()->json(['success' => true, 'response' => $newFeeParticulars]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $FeesParticular = FeeParticular::find($id);

        if(!$FeesParticular){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified Fee Category']);
        }
        return response()->json(['success' => true, 'response' => $FeesParticular]);
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
            'studentApplicable' => 'required',
            'amount' => 'required',
            'category' => 'required',
        

        ];
    
        $input     = $request->only('name', 'description','studentApplicable','amount','category');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $FeesParticular = FeeParticular::find($id);
        if(!$FeesParticular){
            return response()->json(['success' => false, 'response' => 'we cant find the requested Fee particular']);
        }

        $FeesParticular->name = $request->name;
        $FeesParticular->description    = $request->description;
        $FeesParticular->studentApplicable = $request->studentApplicable;
        $FeesParticular->amount = $request->amount;
        $FeesParticular->category = $request->category;

        $FeesParticular->save();
       
        
        

    
        return response()->json(['success' => true, 'response' => $FeesParticular]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feeparticulars = Feeparticular::find($id);

        if(!$feeparticulars){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified Fee particulars']);
        }
        $feeparticulars->delete();
        return response()->json(['success' => true, 'response' => $feeparticulars]);
    }
}
