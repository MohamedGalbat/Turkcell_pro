<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Comments;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    public function createComment()
    {
        // return  $image=  Storage::disk('project_files')->put('/', Input::file('file'));
        $file = null;
        $data= Input::all();
        $data['file_type'] = null;
        if (Input::has('file')) {
            $file = Input::file('file')->store('files');//what is the last part ('files')
            $type = Storage::mimeType($file); //  mimeType returns the type of the file jpg, ppt etc..
            $data['file_type'] = explode("/", $type)[0];
        }

        $data['user_id'] = auth()->id();
        $data['version'] = 1;
        $data['file'] = $file;
        if (Comments::create($data)) {
            return redirect()->back()->with('success', 'Comment added successfully');
        } else return redirect()->back()->with('error', 'Comment failed try again');
    }

    public function download($id){
        $file = Comments::findOrFail($id)->file;//go to the comment with this id and find if it has a file if not return
        return Storage::download($file);// else download the file
    }
}
