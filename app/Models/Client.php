<?php

namespace App\Models;

use App\Models\User;
use App\Models\Balance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function balances()
    // {
    //     return $this->hasMany(Balance::class);
    // } 
     

}
