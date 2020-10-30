<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'section_id'];

    public function section()
    {
        return $this->belongsTo(section::class);
    }
}
