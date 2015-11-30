<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Beverage as Beverage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Request as SpecialRequest;

class BeverageController extends Controller
{
    public function __construct(Beverage $beverage, Request $request) {
        $this->beverage = $beverage;
        $this->request = $request;
    }

    public function index()
    {
        $beverages = $this->beverage->all();
        $ratings = DB::table('beverage_comments')->where('beverage_id','=',$this->beverage->beverage_id)->avg('rating');
        return view("beverages.beverages")->with(compact("beverages","ratings"));
    }


    public function create()
    {
        return view("beverages.beveragecreate");
    }


    public function store()
    {
        if(SpecialRequest::ajax()) {
            $data = Input::all();
            return dd($data);
        }
        else {
            return "failed";
        }
    }

    public function show($id)
    {
        try{
            $beverage = DB::table('beverages')->where('beverage_id',$id)->first();
            $ratings = DB::table('beverage_comments')->where('beverage_id','=',$id)->avg('rating');
            $ratingCount = DB::table('beverage_comments')->where('beverage_id','=',$id)->count();
            $comments = DB::table('beverage_comments')->where('beverage_id','=',$id)->get();
            //$users = DB::view('comments_username_view')->where('beverage_id','=',$id)->get();
            return view("beverages.beverage")->with(compact("beverage","ratings","comments","ratingCount"));
        } catch(ModelNotFoundException $mnfe) {
            return view("beverages.beveragenotfound");
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
