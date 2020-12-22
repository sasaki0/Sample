<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Shop;
use App\Genre;
use App\Hour;
use App\Address;

class ShopController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('shoplist');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $shop = new Shop;
            $hour = new Hour;
            $genre = new Genre;
            $address = new Address;
            $user = \Auth::user();

            if ($file = $request->image) {
                $fileName = time() . $file->getClientOriginalName();
                $target_path = public_path('uploads/');
                $file->move($target_path, $fileName);
            } else {
                $fileName = "";
            }

            $shop->name = request('name');
            $hour->start = request('start');
            $hour->end = request('end');
            $hour->holiday = request('holiday');
            $address->p_code = request('p_code');
            $address->prefecture = request('prefecture');
            $address->city = request('city');
            $address->address_num = request('address_num');
            $address->build_name = request('build_name');
            $shop->access = request('access');
            $shop->genre_id = request('genre');
            $shop->pr_text = request('pr_text');
            $shop->coupon_info = request('coupon_info');
            $shop->tel = request('tel');
            $shop->email = request('email');
            $shop->site_url = request('site_url');
            $shop->image = $fileName;
            $shop->user_id = $user->id;

            $shop->save();
            $hour->save();
            $address->save();
            return redirect()->route('shops.show',['id'=>$shop->id]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop=Shop::find($id);
        // $shop = DB::table('shop_table');
		// $shop->select('name','access','pr_text', 'genre_table.genre');
        // $shop->join('genre_table', 'shop_table.genre_id', '=', 'genre_table.genre_id');
        $user = \Auth::user();
        if($user){
            $login_id = $user->id;
        }else{
            $login_id = '';
        }
        return view('shops.show',['shop'=>$shop,'login_id'=>$login_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//Shop $shop,
    {
        $shop = Shop::find($id);
        $address = Address::all();
        $hour = Hour::all();
        $genre = Genre::all();
        return view('shops.edit',['shop'=>$shop,'address'=>$address,'hour'=>$hour,'genre'=>$genre]);
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
            $shop = Shop::find($id);
            $hour = Hour::find($id);
            $address = Address::find($id);

            if ($file = $request->image) {
                $fileName = time() . $file->getClientOriginalName();
                $target_path = public_path('uploads/');
                $file->move($target_path, $fileName);
            } else {
                $fileName = "";
            }

            $shop->name = request('name');
            $hour->start = request('start');
            $hour->end = request('end');
            $hour->holiday = request('holiday');
            $address->p_code = request('p_code');
            $address->prefecture = request('prefecture');
            $address->city = request('city');
            $address->address_num = request('address_num');
            $address->build_name = request('build_name');
            $shop->access = request('access');
            $shop->genre_id = request('genre');
            $shop->pr_text = request('pr_text');
            $shop->coupon_info = request('coupon_info');
            $shop->tel = request('tel');
            $shop->email = request('email');
            $shop->site_url = request('site_url');
            $shop->image = $fileName;

            $shop->save();
            $hour->save();
            $address->save();
            return redirect()->route('shops.show',['id'=>$shop->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);
        $hour = Hour::find($id);
        $address = Address::find($id);

        $shop->delete();
        $hour->delete();
        $address->delete();

        return redirect('/');
    }
}
