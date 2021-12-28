<?php
/**
 * Created by PhpStorm.
 * User: Walid.Dahshour
 * Date: 12/26/2021
 * Time: 6:01 PM
 */

namespace App\Http\Repository\programms;


use App\Contracts\programms\programmsRespositoryInterface;
use App\Models\channels;
use App\Models\programs;
use Carbon\Carbon;

class programsRepository implements  programmsRespositoryInterface
{

    public function getAll()
    {
        return  channels::all();
    }


    public function create($request)
    {
       // dd($request);
       $request['start_at']=Carbon::parse($request['start_at']);
        $request['end_at']=Carbon::parse($request['end_at']);;


        $d1 = strtotime($request['start_at']);
        $d2 = strtotime($request['end_at']);
         $totalSecondsDiff = abs($d1 - $d2); //42600225






        $request['duration'] = $totalSecondsDiff;

      ///  echo $day = $datetime1->format('l');
       // echo Carbon::tomorrow()->format('D');
      //  die;
       // echo $datetime->format('D');

        programs::create($request);

        return ['message' => 'Success'];

    }

    public function update($request)
    {
$program=programs::where(['id'=>$request['program_id'],'channel_id'=>$request['channel_id']])->first();;
if(empty($program))

   return 2; //value to identify there is no program
unset($request['program_id']);
       $program->update($request);


    }
public  function  programs($request){


     return   $program= programs::where(['channel_id'=>$request['channel_id']])->get();;
    dd($program);
}
    /**
     * @param $channel
     */

}