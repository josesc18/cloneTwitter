<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $table='tweets';

    protected $fillable = [
        'id',
        'tweet',
        'user_id',
        'created_at',
        'update_up'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
