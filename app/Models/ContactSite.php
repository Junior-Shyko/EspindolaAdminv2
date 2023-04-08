<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSite extends Model
{
    use HasFactory;
    protected $fillable = [
        'cep','address','number','complements','district',
        'city','state','email','creci','cnpj'
    ];
}
