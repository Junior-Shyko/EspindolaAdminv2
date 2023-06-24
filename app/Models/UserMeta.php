<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'cpf',
        'nick',
        'receive_proposal',
        'cep',
        'address',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'nationality',
        'naturalness',
        'marital_status',
        'rental_finance',
        'rg',
        'birth_date',
        'sholarity',
        'sex'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
