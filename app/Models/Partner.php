<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function sector()
    {
        return $this->belongsTo('App\Models\Sector');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
  
}