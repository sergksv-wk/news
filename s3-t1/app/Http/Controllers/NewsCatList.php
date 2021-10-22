<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCat;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class NewsCatList extends Controller
{
    public function list(){

        $list = NewsCat::where('state', '=', 1)->withCount(['news'=>function (Builder $q){
            $q->where('state', '=', 1);
        }])->get();

        return $list;
    }

    public function getCategory($cat_name){
        return view('cat_news', ['cat_name'=>$cat_name]);
    }

    public function getNewsByCatName(Request $req, $cat_name=''){

        if ($req->method() == 'GET') {
            $local_cat_name = $cat_name;
        } else {
            $local_cat_name = $req->input("cat_name");
        }

        $category = NewsCat::
        where('name', '=', $local_cat_name, 'and')->
        where('state', '=', 1)->
        withCount(['news' => function (Builder $q) {
            $q->where('state', '=', 1);
        }])->
        get()->first();

//        \DB::connection()->enableQueryLog();
        $list = $category->
        news()->
        where('state', '=', 1)->
        orderBy('date_reg', 'DESC')->
        paginate(10);

/*
            $queries = \DB::getQueryLog();
            dd($queries);
*/

        return [
            'category' => $category,
            'news' => $list
        ];
    }
}
