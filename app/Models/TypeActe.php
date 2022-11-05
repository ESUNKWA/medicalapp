<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeActe extends Model
{
    use HasFactory;
    protected $table = 't_types_actes';
    protected $fillable = ['r_libelle', 'r_description'];
}
