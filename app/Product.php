<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = [];
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
