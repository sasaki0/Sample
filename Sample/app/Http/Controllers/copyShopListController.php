<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Request as GetRequest;
use App\Shoplist;
use App\Genre;

class ShopListController extends Controller {

  public function index(){ 
       return view('welcome');
  }

  public function shoplist(Request $request){ 

		#$query = Shoplist::query();

		$name_key = GetRequest::get('name');
		$genle_key = GetRequest::get('genre');
		$access_key = GetRequest::get('access');
	
	
		if($name_key){//検索時に店名が入力されていたら、それで検索、入力なのでlike
			$name = Shoplist::where('name','like','%'.$name_key.'%')->simplePaginate(10);
			return view('shoplist',['names' => $name])->with('name_key',$name_key);
		}else{//無ければ、ジャンルとエリアの値を使って検索
			if(!empty($genre_key) && !empty($access_key)){//ジャンルとエリアの値が空じゃないか判定
			//ここで二つの値を使ってdb検索
			//エリアは入力なのでlike
			$genre_access=Shoplist::where('genre_id',$genre_key)
			->where('access','like','%'.$access_key.'%');
			return view('shoplist',['genre_accesses' => $genre_access])->with('genre_key',$genre_key)->with('access_key',$access_key);

			}else{//どちらかが空または両方空の時
				if(empty($genre_key)||empty($access_key)){//どちらかの値が空の時
					if(empty($genre_key)){//ジャンルの値が空の時
						$access=Shoplist::where('access','like','%'.$access_key.'%');
						return view('shoplist',['accesses' => $access])->with('access_key',$access_key);
					}
					if(empty($access_key)){//エリアの値が空の時
						$genre=Shoplist::where('genre_id',$genre_key);
						return view('shoplist',['genres' => $genre])->with('genre_key',$genre_key);;
					}
				}else{//両方の値が空の時
					return view('welcome');
				 }
		     }

		 } 
		 
  }
}