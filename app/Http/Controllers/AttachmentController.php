<?php

namespace App\Http\Controllers;

use App\Attachments;
use App\Http\Requests\AttachmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\FRD;
use Illuminate\Support\Facades\Storage;


class AttachmentController extends Controller
{
    public function display($id){
        $data['id']=$id;
        return view('attachment',$data);
    }
    public function StoreAttachment($id,AttachmentRequest $request ){
        $frd=FRD::find($id);
        foreach (Input::file('File') as $key=>$file){
            $file_name = $file->store('files');//STORAGE
            $type = Storage::mimeType($file_name); //  mimeType returns the type of the file jpg, ppt etc..
            $data=Attachments::create([
                'title' => request('Title')[$key],
                'frd_id' => $frd->id,
                'version' => 1,
                'user_id'=>auth()->id(),
                'file'=>$file_name,
                'file_type' => explode("/", $type)[0],
            ]);
        }
        if($data) return redirect("/sms/$frd->id")->with('success','Attachments added to the FRD successfully!');
        else return redirect("/attachment/$frd->id")->with('error','Failed to attach files!');
    }
}
