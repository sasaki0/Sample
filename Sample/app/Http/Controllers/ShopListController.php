<?php

namespace App\Http\Controllers; 

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Request as GetRequest;
use App\Shoplist;
use App\Genre;

class ShopListController extends Controller {

  public function index(){ 
       return view('welcome');
  }

  public function shoplist(Request $request){ 

		
		$query = Shoplist::query();

		$name_key = GetRequest::get('name');
		$genre_key = GetRequest::get('genre');
		$access_key = GetRequest::get('access');
	
	
		if ($request->has('name') && $name_key != '') {
			$query = DB::table('shop_table');
			$query->select('name','access','pr_text', 'genre_table.genre','id');
			$query->join('genre_table', 'shop_table.genre_id', '=', 'genre_table.genre_id');
			$query->where('name', 'like', '%'.$name_key.'%')->orderBy('name', 'asc')->get();
		}
		
		if ($request->has('access') && $access_key != '') {
			$query = DB::table('shop_table');
			$query->select('name','access','pr_text', 'genre_table.genre','id');
			$query->join('genre_table', 'shop_table.genre_id', '=', 'genre_table.genre_id');
            $query->where('access', 'like', '%'.$access_key.'%')->orderBy('access', 'asc')->get();
		}

		if ($request->has('genre') && $genre_key !='0' ) {
			$query = DB::table('shop_table');
			$query->select('name','access','pr_text', 'genre_table.genre','id');
			$query->join('genre_table', 'shop_table.genre_id', '=', 'genre_table.genre_id');
			$query->where('shop_table.genre_id', '=', $genre_key);
			if ($request->has('name') && $name_key != '') {
				$query->where('name', 'like', '%'.$name_key.'%');
			}
			if ($request->has('access') && $access_key != '') {
				$query->where('access', 'like', '%'.$access_key.'%');
			}
			$query->get();
		}else{
			if($request->has('access') || $request->has('name')){
				$query = DB::table('shop_table');
				$query->select('name','access','pr_text', 'genre_table.genre','id');
				$query->join('genre_table', 'shop_table.genre_id', '=', 'genre_table.genre_id');
				if ($request->has('name') && $name_key != '') {
					$query->where('name', 'like', '%'.$name_key.'%');
				}
				if ($request->has('access') && $access_key != '') {
					$query->where('access', 'like', '%'.$access_key.'%');
				}
				$query->get();
			}else{
				$query = DB::table('shop_table');
				$query->select('name','access','pr_text', 'genre_table.genre','id');
				$query->join('genre_table', 'shop_table.genre_id', '=', 'genre_table.genre_id');
				$query->orderBy('name', 'asc')->get();
			}
		}
		
		//if ($request->has('genre') && $genre_key != ('0')) {
		//	$query->where('genre_id', $genre_key)->get();
		//}
		
		$data = $query->paginate(100);
	
		return view('shoplist',[
			'data' => $data
        ])->with('name',$name_key)->with('genre',$genre_key)->with('access',$access_key);
 }
}