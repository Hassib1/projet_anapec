<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'date',
        'description',
        'type_contrat',
        'formation',
        'lieu_travail',
        'entreprise',
    ];
}
