<?php

namespace App\Http\Controllers;

use App\Discounts;
use App\DiscountsFRD;
use App\Http\Requests\discountsRequest;
use Illuminate\Http\Request;


class DiscountsController extends Controller
{
    public function display($id)
    {
        $data['id'] = $id;
        $arr = [];
        foreach (Discounts::all() as $discounts) {
            $temp = array(
                "discount_name" => $discounts->discount_name,
                "discount_code" => $discounts->discount_code,
                "added_by" => $discounts->added_by,
                "date" => $discounts->date,
                "status" => 1,
            );
            $arr[] = $temp;
        }
        foreach (DiscountsFRD::orderBy('code', 'asc')->get() as $discounts) {
            $temp = array(
                "discount_name" => $discounts->description,
                "discount_code" => $discounts->code,
                "added_by" => $discounts->full_name,
                "date" => $discounts->created_at->toDateString(),
                "status" => $discounts->status,
            );
            $arr[] = $temp;
        }

        $collection = collect($arr);//collects allow us to apply a couple of functionalities on a collection of data eg: sortBy, Average ....
        $data['discounts'] = $collection->sortBy('discount_code')->values()->all();
        return view('discounts', $data);
    }

    public function storeDiscounts($id, discountsRequest $request)
    {
        $dis = DiscountsFRD::create([
            'frd_id' => $id,
            'user_id' => auth()->id(),
            'version' => 1,
            'description' => request('name'),
            'code' => request('code'),
        ]);
        if ($dis) return redirect("/displayAll/$id")->with('success', 'Discounts Prioritization Added Successfully');
    }
}
