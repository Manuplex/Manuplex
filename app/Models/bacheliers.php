<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bacheliers extends Model
{
    protected $primaryKey = 'matricule';

    use HasFactory;

    protected $fillable=[
        'matricule',
        'nom',
        'prenom',
        'date_naissance',
        'num_commercial',
        'save_date',
        'code_link',
        'telephone',
    ];
}
