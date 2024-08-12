<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{ 
    protected $fillable = ['image_url', 'start_date', 'end_date'];

    use HasFactory;
}
