<?php

namespace App\Http\Controllers;

use App\Http\Requests\smsRequest;
use App\SMS_FRD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;




class SmsController extends Controller
{
    public function display($id){
        $data['id']=$id;
        return view('sms',$data);
    }
    public function storeSms($id,SMSRequest $request){
        $sms = SMS_FRD::create([
            'frd_id' => $id,
            'explanation' => request('description'),
            'user_id' => auth()->id(),
            'version' => 1,
            'content_tr' =>request('Turkish_content'),
            'content_en' => request('English_content'),
            'sender' => 'KKTCELL',
        ]);

        if($sms) return redirect("/discounts/$id")->with('success', 'SMS Added Successfully');
    }
}
