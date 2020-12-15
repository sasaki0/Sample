<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'test_db.genre_table';

    protected $primaryKey="genre_id";

    // protected $fillable = [
    //     'name','genre_id',
    // ];

    // public function shoplist(){
    //     return $this->hasOne('App\Shoplist');
    // }

    // public function shop()
    // {
    //     return $this->hasMany('App\Shop');
    // }
}
