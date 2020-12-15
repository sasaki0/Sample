<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoplist extends Model
{
    protected $table = 'test_db.shop_table';
    protected $fillable = [
        'name','genre_id','access'
    ];

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
