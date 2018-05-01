<?php

namespace App\Http\Controllers;

use App\Attachments;
use App\Department;
use App\Notifications\SubmitRequest;
use App\User;
use Illuminate\Http\Request;
use App\FRD;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\AudienceFRD;


class DisplayAllController extends Controller
{
    public function displayAll($id)
    {
        $frd['frd'] = FRD::find($id);
        return view('all', $frd);
    }

    public function displayReq($id)
    {
        $frd['frd'] = FRD::find($id);
        return view('myReq', $frd);
    }

    public function download($id)
    {
        $file = Attachments::findOrFail($id)->file;//go to the comment with this id and find if it has a file if not return
        return Storage::download($file);// else download the file
    }

    public function submit($id)
    {
        $document = FRD::find($id);
        $creator = auth()->user();
        $manager = User::find(Department::find($creator->department_id)->manager_id);
        $message['manager'] = $manager;
        $message['creator'] = $creator;
        $message['document'] = $document;
        $message['id'] = $id;
        $manager->notify(new SubmitRequest($message));
        return redirect()->back()->with('success', 'Email sent successfully');
    }
}
