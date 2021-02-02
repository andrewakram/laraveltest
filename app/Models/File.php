<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class File extends Model
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','size'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function setNameAttribute($value)
    {
        if(is_file($value)) {
            $namewithextension = $value->getClientOriginalName(); //Name with extension
            $name = explode('.', $namewithextension)[0]; ////Name without extension
            ///
            $file_name = $name.'.'.$value->getClientOriginalExtension();
            $value->move(public_path('/uploads/files/'),$file_name);
            $this->attributes['name'] = $file_name ;
        }

    }

    public function getNameAttribute($value)
    {
        if($value)
            return asset('/uploads/files/'.$value);

    }

}
