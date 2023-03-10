<?php

namespace App\Models;

use App\Notifications\BannedUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Offeror extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'user_id';


    protected $fillable = [
        'banned_until'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function bans()
    {
        return $this->hasMany(Ban::class,"user_id","user_id");
    }

}
