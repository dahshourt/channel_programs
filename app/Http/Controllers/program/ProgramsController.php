<?php

namespace App\Http\Controllers\program;

use App\Factories\programs\ProgramsFactory;
use App\Http\Controllers\Controller;
use App\Models\programs;
use App\Http\Requests\StoreprogramsRequest;
use App\Http\Requests\UpdateprogramsRequest;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{

    private  $program;
    public function __construct(ProgramsFactory $program)
    {
        $this->program=$program::index();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
$request['channel_id'] =$request->channel;


        $this->program->create($request->all());
        return response()->json([
            'message' => 'Created Successfully',
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprogramsRequest  $request
     * @param  \App\Models\programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request['program_id']=  $request->programs;
        $request['channel_id']= $request->channel;
        $program=$this->program->update($request->except('_method'));
        if($program==2){
            return response()->json([
                'message' => 'program not fount',
            ]);
        }
        return response()->json([
            'message' => 'updated Successfully',
        ]);

    }
public function  programs(Request $request){
         $request['channel_id']=$request->channel;
      $request['date']=$request->date;
    $programs=$this->program->programs($request);

    return response()->json(['data' => $programs],200);


}

}
