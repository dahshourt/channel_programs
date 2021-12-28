<?php

namespace App\Http\Controllers\channels;

use App\Factories\channels\ChannelFactory;
use App\Http\Controllers\Controller;
use App\Models\channels;
use App\Http\Requests\StorechannelsRequest;
use App\Http\Requests\UpdatechannelsRequest;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private  $channel;
    public function __construct(ChannelFactory $channel)
    {
        $this->channel=$channel::index();
    }

    public function index()
    {

     $channels= $this->channel->getAll();

      return response()->json(['data' => $channels],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->channel->create($request->all());
        return response()->json([
            'message' => 'Created Successfully',
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatechannelsRequest  $request
     * @param  \App\Models\channels  $channels
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatechannelsRequest $request, channels $channels)
    {


        $this->channel->update($request->all(),$channels);

        return response()->json([
            'message' => 'Updated Successfully',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\channels  $channels
     * @return \Illuminate\Http\Response
     */
    public function destroy(channels $channels)
    {
        $this->channel->delete($channels);;
        return response()->json([
            'message' => 'deleted Successfully',
        ]);
    }
}
