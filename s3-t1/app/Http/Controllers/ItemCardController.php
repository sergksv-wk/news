<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class ItemCardController extends Controller
{
    public function showCard($cat_name, $item_name){
        preg_match('/(\d+)-(.+)/', $item_name, $ret);

        if (count($ret) == 3) {
            $item = News::
                where('id', '=', $ret[1])->
                get()->
                first()
            ;

            return view('item_card', ['item' => $item]);
        }else{
            return false;
        }
    }
}
