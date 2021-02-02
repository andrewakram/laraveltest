<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class UserCompany extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="users_companies";
    protected $hidden = [
        'updated_at'
    ];

    public function company(){
        return $this->belongsTo(Company::class,"company_id");
    }

    public function getCompanyNameAttribute(){
        return $this->company()->first()->name;
    }


}
