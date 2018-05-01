<?php

namespace App\Http\Controllers;

use App\DiscountsApp;
use App\DiscountsFRD;
use App\SMS_FRD;
use Illuminate\Http\Request;
use App\FRD;
use App\FRDApproving;


class managerController extends Controller
{
    public function permission()
    {
        return view('permission');
    }

    public function display()
    {
        $frd['FRD'] = FRD::orderBy('id', 'des')->paginate(15);
        return view('pendingReq', $frd);
    }

    public function displayViewed()
    {
        $frd['FRD'] = FRD::orderBy('id', 'des')->paginate(15);
        return view('viewed', $frd);
    }

    public function viewed($id)
    {
        $frd['frd'] = FRD::find($id);
        return view('displayViewed', $frd);
    }

    public function approve($id)
    {
        $data['frd'] = FRD::find($id);
        if (($data['frd']->is_active) == 0) {
            $FRD = FRDApproving::create([
                'user_id' => auth()->id(),
                'frd_id' => $id,
                'status' => 1
            ]);
        }
        DiscountsFRD::where('frd_id',$id)->update(['status'=>1]);
        SMS_FRD::where('frd_id',$id)->update(['status'=>1]);
        if ($FRD) {
            return redirect("/displayReq/$id")->with('success', 'This FRD has been approved successfully');
        }
    }

    public function disapprove($id)
    {
        $data['frd'] = FRD::find($id);
        if (($data['frd']->is_active) == 0) {
            $FRD = FRDApproving::create([
                'user_id' => auth()->id(),
                'frd_id' => $id,
                'status' => 2
            ]);
        }
        if ($FRD) {
            return redirect("/displayReq/$id")->with('success', 'This FRD has been disapproved successfully');
        }
    }

    public function managerSearch()
    {
        $id = request('search');
        //$data['frd'] = FRD::findOrFail($id);//exists
        $data['frd'] = FRD::where('id', $id);
        //whereIn('is_approved', [1, 2])
        if (!$data['frd']->exists()) {
            return redirect("/viewedReq")->with('error', 'No matching FRD ID!');
        }
        $data['frd'] = $data['frd']->first();//get returns an array // first only 1 piece of data
        return view('displayViewed', $data);
    }

    public function pendingSearch()
    {
        $id = request('search');
        //$data['frd'] = FRD::findOrFail($id);//exists
        $data['frd'] = FRD::where('id', $id);
        if (!$data['frd']->exists()) {
            return redirect("/pendingReq")->with('error', 'No matching FRD ID!');
        }
        $data['frd'] = $data['frd']->first();//get returns an array // first only 1 piece of data
        return view('myReq', $data);
    }
}
