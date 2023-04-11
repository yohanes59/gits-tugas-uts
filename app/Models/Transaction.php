<?php

namespace App\Models;

use App\Models\DetailTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'grandtotal',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detailtransaction()
    {
        return $this->hasOne(DetailTransaction::class, 'transaction_id');
    }
}
