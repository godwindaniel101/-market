<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = [
        'product_name'
    ];

    public function items() {
        return $this->hasMany('\App\Item');
    }
}
