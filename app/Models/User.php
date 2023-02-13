<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'last_name',
        'username',
        'password',
        'profile_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function profile(){
        if($this->profile_type =='App\Models\Admin')
        {
            return $this->hasOne(Admin::class);
        }
        else if($this->profile_type =='App\Models\Offeror')
        {
            return $this->hasOne(Offeror::class);
        }

    }


     // Mutadores
     public function setNameAttribute($value)
     {
         $this->attributes['name'] = $this->ucFirstAndLower($value);
     }

     public function setLastNameAttribute($value)
     {
         $this->attributes['last_name'] = $this->ucFirstAndLower($value);
     }
     private function ucFirstAndLower($cad)
     {
         $words = explode(" ",$cad);
         $result = "";
         foreach ($words as $w) {
             $w = trim($w);
             $w = strtolower($w);
             $w = ucfirst($w);

             if($result=="")
                 $result = $w;
             else
                 $result = $result." ".$w;
         }

         return $result;
     }
}
