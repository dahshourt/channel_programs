<?php
/**
 * Created by PhpStorm.
 * User: Walid.Dahshour
 * Date: 12/26/2021
 * Time: 6:01 PM
 */

namespace App\Http\Repository\channels;


use App\Contracts\channels\channelRespositoryInterface;
use App\Models\channels;

class channelRepository implements channelRespositoryInterface
{

    public function getAll()
    {
        return  channels::all();
    }



    public function create($request)
    {
        if ($image = $request['channel_icon']) {
            $destinationPath = 'channels/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['channel_icon'] = "$profileImage";
        }


        channels::create($request);

        return ['message' => 'Success'];

    }

    public function update($request, $channel)
    {

         $channel->update($request);


    }

    /**
     * @param $channel
     */
    public function delete($channel)
    {
        $channel->delete();
    }
}