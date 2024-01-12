<?php

namespace App\Models;

use App\Models\Kupli;
use App\Models\Penyelaras_Program;
use App\Models\Pensyarah_Penilai;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'phone',
        'about',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Kupli(){
        return $this->hasOne(Kupli::class);
    }

    public function Penyelaras_Program(){
        return $this->hasOne(Penyelaras_Program::class);
    }
    
    public function Pelajar(){
        return $this->hasOne(Pelajar::class);
    }
    
    public function Pensyarah_Penilai(){
        return $this->hasOne(Pensyarah_Penilai::class);
    }
    
    public function Pensyarah_Penilai_OJT(){
        return $this->hasOne(Pensyarah_Penilai_OJT::class);
    }

    public function getRoles(){
        $roles = [];
        
        // Get user roless based on whether user has an existing record at a specific tables
        if($this->isKupli()){
            $roles[] = 'Kupli';
        }
        if($this->isPenyelarasProgram()){
            $roles[] = 'Penyelaras Program';
        }
        if($this->isPensyarahPenilaiOJT()){
            $roles[] = 'Pensyarah Penilai OJT';
        }
        if($this->isPensyarahPenilai()){
            $roles[] = 'Penysarah Penilai';
        }
        if($this->isPelajar()){
            $roles[] = 'Pelajar';
        }

        return $roles;
    }

    // isUser functions
    public function isKupli(){
        return $this->Kupli;
    }

    public function isPelajar(){
        return $this->Pelajar;
    }

    public function isPenyelarasProgram(){
        return $this->Penyelaras_Program;
    }

    public function isPensyarahPenilaiOJT(){
        return $this->Pensyarah_Penilai_OJT;
    }

    public function isPensyarahPenilai(){
        return $this->Pensyarah_Penilai;
    }
}
