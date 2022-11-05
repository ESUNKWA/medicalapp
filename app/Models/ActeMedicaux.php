<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActeMedicaux extends Model
{
    use HasFactory;
    protected $table = 't_actes_medicaux';
    protected $fillable = ['r_code', 'r_libelle', 'r_prix', 'r_status', 'r_description',
    'r_type_acte'];
}
