<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'user_id', 'about', 'picture', 'facebook', 'twitter'
    // ];
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    // protected $attributes = [
    //     'user_id' => 0,
    // ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
