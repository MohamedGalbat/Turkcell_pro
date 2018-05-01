<?php

namespace App\Http\Controllers;

use App\FRD;
use App\User;
use App\Http\Requests\FRDRequest;
use App\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FrdController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(FRDRequest $request)
    {

        $FRD = FRD::create([
            'title' => request('title'),
            'description' => request('description'),
            'user_id' => auth()->id(),
        ]);
        $frd_id = $FRD->id;//take the id from the top $FRD variable
        foreach (request('Item') as $value){//take the title from the form and put it in $value
            Items::create(['title' => $value, 'frd_id' => $frd_id, 'version' => 1]);
        }
        return redirect("/audience/$frd_id")->with('success', 'Title and Description have been add to your FRD successfully');

    }

    public function showById($id)
    {
        $data['frd'] = FRD::find($id);
        return view('comment', $data);
    }


    public function ReqSearch()
    {
        $id=request('search');
        //$data['frd'] = FRD::findOrFail($id);//exists
        $data['frd'] = FRD::where('id',$id);
        if(!$data['frd']->exists()){
            return redirect("/search")->with('error', 'No matching FRD ID!');
        }
        $data['frd']=$data['frd']->first();//get returns an array // first only 1 piece of data
        return view('comment', $data);
    }
    public function MyReqSearch()
    {
        $id=request('search');
        //$data['frd'] = FRD::findOrFail($id);//exists
        $data['frd'] = FRD::where([
            ['id', $id],
            ['user_id', auth()->id()]
        ]);
        if(!$data['frd']->exists()){
            return redirect("/myrequests")->with('error', 'No matching FRD ID!');
        }
        $data['frd']=$data['frd']->first();//get returns an array // first only 1 piece of data
        return view('myReq', $data);
    }

    public function search()
    {
        $data['FRD'] = FRD::orderBy('created_at', 'des')->paginate(15);
        return view('search', $data);
    }

}
