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
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\Auth as Auth;

class BeverageController extends Controller
{
    function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("beverages.beverages");
    }

    public function getBeverageJson() {
        $json = Beverage::getAllBeverages();
        header('Content-type: application/json');
        return $json;
    }

    public function getCommentsForBeverageJson($id) {
        $json = Beverage::getAllCommentsByBeverage($id);
        header('Content-type: application/json');
        return $json;
    }

    public function addRating($beverage_id) {
        $beverage = DB::table('beverages')->where('beverage_id',$beverage_id)->first();
        if($beverage->beverage_type == 1) {
            //wine
        }
        else if($beverage->beverage_type == 2) {
            //beer
        }
        else if($beverage->beverage_type == 3) {
            //mixed drink
        }
        return view("beverages.beverageadd")->with(compact("beverage"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("beverages.beveragecreate");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = $request->url;
        $url = explode('/',$url);
        $newUrl = "";
        for($i = 0; $i < count($url)-1; $i++) {
            $newUrl .= $url[$i];
        }
        if($newUrl == "http:localhost:8000beveragesaddRating") {
            $beverage_id = $request->id;
            $rating = floatval($request->rating)/20;
            $comment = $request->comment;
            $user_id = Auth::user()->id;
            $timestamp = Carbon::now()->toDateTimeString();
            $insert_comment_id = DB::table('beverage_comments')->insertGetId(['beverage_id'=>$beverage_id,'user_id'=>$user_id,'comment_descrip'=>$comment,'timestamp'=>$timestamp,'rating'=>$rating],'comment_id');
            return redirect()->to("/beverages/" . $beverage_id);
        }
        else if($newUrl == "http:localhost:8000beverages") {
            $beverage_type = $request->beverage_type;
            $beverage_name = $request->beverage_name;
            $beverage_descrip = $request->beverage_descrip;
            $rating = floatval($request->rating)/20;
            $comment = $request->comment;
            echo $comment;
            $user_id = Auth::user()->id;
            $timestamp = Carbon::now()->toDateTimeString();
            $insert_id = DB::table('beverages')->insertGetId(['beverage_type'=>$beverage_type,'beverage_name'=>$beverage_name,'beverage_descrip'=>$beverage_descrip],'beverage_id');
            if($beverage_type == "1") {
                $beer_brewery = $request->beer_brewery;
                $insert_beer_id = DB::table('beer')->insertGetId(['beverage_id'=>$insert_id,'brewery'=>$beer_brewery],'beer_id');
            }
            else if($beverage_type == "2") {
                $wine_vineyard = $request->wine_vineyard;
                $wine_vintage = $request->wine_vintage;
                $wine_color = $request->wine_color;
                if($wine_color == "White") {
                    $wine_color = 1;
                }
                else {
                    $wine_color = 2;
                }
                $insert_wine_id = DB::table('wine')->insertGetId(['beverage_id'=>$insert_id,'color_id'=>$wine_color,'vintage'=>$wine_vintage,'vineyard'=>$wine_vineyard],'wine_id');
            }
            else if($beverage_type == "3") {
                $md_ingredients = $request->md_ingredients;
                $insert_md_id = DB::table('mixed_drink')->insertGetId(['beverage_id'=>$insert_id,'ingredients'=>$md_ingredients],'drink_id');
            }
            $insert_comment_id = DB::table('beverage_comments')->insertGetId(['beverage_id'=>$insert_id,'user_id'=>$user_id,'comment_descrip'=>$comment,'timestamp'=>$timestamp,'rating'=>$rating],'comment_id');
            return redirect()->to("/beverages/" . $insert_id);
        }
        return view("beverages.beveragenotfound");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $beverage = DB::table('beverages')->where('beverage_id',$id)->first();
            $ratings = DB::table('beverage_comments')->where('beverage_id','=',$id)->avg('rating');
            $comments = DB::table('beverage_comments')->where('beverage_id','=',$id)->get();
            $userName = DB::table('users')->join('beverage_comments','users.id','=',"beverage_comments.user_id")->select('users.fname')->where('beverage_comments.beverage_id','=',$id)->get();
            return view("beverages.beverage")->with(compact("beverage","ratings","comments","userName"));
        } catch(ModelNotFoundException $mnfe) {
            return view("beverages.beveragenotfound");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$rating = floatval($request->rating)/20;
        $comment = $request->comment;
        $user_id = Auth::user()->id;
        $timestamp = Carbon::now()->toDateTimeString();
        $insert_comment_id = DB::table('beverage_comments')->insertGetId(['beverage_id'=>$id,'user_id'=>$user_id,'comment_descrip'=>$comment,'timestamp'=>$timestamp,'rating'=>$rating],'comment_id');
        return redirect()->to("/beverages/" . $id);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
