<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'product_id',
        'item_name',
        'item_image',
        'item_cost',
        'item_new_cost',
        'item_stock',
        'item_percentage',
        'item_saved',
        'item_description'

    ];
    public function Market() {
        return $this->belongs('\App\market');
    }
}
