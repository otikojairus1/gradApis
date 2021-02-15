<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Classs;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classs::all();
        return response()->json(['success' => true, 'response' => $classes]);
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
            'className' => 'unique:Classses|required',
            'sectionName'    => 'required',
            'code' => 'required',
            'gradingSystemType' => 'required',
            'enableElectiveSelection' => 'required',

        ];
    
        $input     = $request->only('className', 'sectionName','code','gradingSystemType','enableElectiveSelection');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $className = $request->className;
        $sectionName    = $request->sectionName;
        $code = $request->code;
        $gradingSystemType = $request->gradingSystemType;
        $enableElectiveSelection = $request->enableElectiveSelection;
        $newClass    = Classs::create([
        'className' => $className, 
        'sectionName' => $sectionName,
        'code' => $code,
        'gradingSystemType' => $gradingSystemType,
        'enableElectiveSelection' => $enableElectiveSelection, ]);
        return response()->json(['success' => true, 'response' => $newClass]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Classs::find($id);

        if(!$class){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified class']);
        }
        return response()->json(['success' => true, 'response' => $class]);
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
            'className' => '',
            'sectionName' => 'required',
            'code' => 'required',
            'gradingSystemType' => 'required',
            'enableElectiveSelection' => 'required',

        ];
    
        $input     = $request->only('className', 'sectionName','code','gradingSystemType','enableElectiveSelection');
        $validator = Validator::make($input, $rules);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $class = Classs::find($id);
        if(!$class){
            return response()->json(['success' => false, 'response' => 'we cant find the requested class']);
        }
        $class->className = $request->className;
        $class->sectionName    = $request->sectionName;
        $class->code = $request->code;
        $class->gradingSystemType = $request->gradingSystemType;
        $class->enableElectiveSelection = $request->enableElectiveSelection;
        $class->save();
        return response()->json(['success' => true, 'response' => $class]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classs::find($id);

        if(!$class){
            return response()->json(['success' => false, 'response' => 'we couldnt find the specified class']);
        }
        $class->delete();
        return response()->json(['success' => true, 'response' => $class]);
    }
}
