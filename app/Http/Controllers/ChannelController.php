<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FRD;
use App\ChannelFRD;
use Illuminate\Support\Facades\Input;

class ChannelController extends Controller
{
    public function showChannel($id){
        $data['id']=$id;
        return view('channel',$data);
    }
    public function store($id){
        $frd=FRD::find($id);
        foreach (request('selectedChannel') as $item_id){
            ChannelFRD::create([
                'frd_id'=>$frd->id,
                'channel_id'=>$item_id,
                'version'=>1,
                'user_id'=>auth()->id(),
            ]);
        }
        return redirect("/attach/$frd->id")->with('success','Channels added to your FRD successfully!');
    }
}
