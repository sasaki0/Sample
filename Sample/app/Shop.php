<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'test_db.shop_table';

    public function genre()
    {
        return $this->belongsTo('App\Genre','genre_id');
    }

    public function address()
    {
        return $this->belongsTo('App\Address','id');
    }

    public function hour()
    {
        return $this->belongsTo('App\Hour','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','id');
    }


}
