<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use HasFactory;
    protected $table = 't_prestations';
    protected $fillable = ['r_code', 'r_libelle', 'r_prix', 'r_status', 'r_description'];
}
