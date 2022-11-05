<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $table = 't_personnels';
    protected $fillable = ['r_code', 'r_nom', 'r_prenoms', 'r_contact',
    'r_description', 'r_categorie', 'r_specialite',
    'r_status', 'created_at', 'updated_at'];
}
