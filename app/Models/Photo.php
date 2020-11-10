<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'item_id'];
    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }
}
