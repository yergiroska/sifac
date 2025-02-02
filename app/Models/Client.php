<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Define los campos que se permiten para asignación masiva
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];
}
