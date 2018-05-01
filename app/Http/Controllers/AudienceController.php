<?php

namespace App\Http\Controllers;

use App\AudienceFRD;
use App\FRD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AudienceController extends Controller
{
    public function showAudience($id)
    {
        $data['id'] = $id;
        return view('audience',$data);
    }

    public function store($id){
        $frd=FRD::find($id);
        foreach (request('selectedAudience') as $item_id){
            AudienceFRD::create([
                'frd_id'=>$frd->id,//we could have used the parameter of the store function ($id) directly cuz it's the frd id
                'audience_id'=>$item_id,
                'version'=>1,
                'user_id'=>auth()->id(),
            ]);
        }
        return redirect("/channel/$frd->id")->with('success','Audience added to your FRD successfully!');
    }
}
