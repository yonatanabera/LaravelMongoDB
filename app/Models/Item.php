<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use \App\Models\User;

class Item extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'type',
        'qty',
        'user_id'
    ];

    public function user(){
        return $this->hasOne(User::class, '_id', 'user_id');
    }
}
