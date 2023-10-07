<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pracownicy extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $fillable = [
        'Imię' ,
        'Nazwisko' ,
        'Nazwa firmy' ,
        'E-mail' ,
        'Numer telefonu' ,
        'Preferencje żywieniowe'
    ];
}
