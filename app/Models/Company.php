<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
     protected $hidden = [
        'created_at','updated_at'
    ];

    public function country(){
        return $this->belongsTo(Country::class,"country_id",'id');
    }

    public function users(){
        return $this
            ->belongsToMany(User::class,'users_companies');
    }


}
