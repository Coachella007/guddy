<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'usersemail',
        'amountloaned',
        'intrest',
        'phone',
        'fullname',
        'status',
        'paid'
    ];

    public function duser(){
    	return $this->belongsTo(User::class , 'user_id');
    }
}
