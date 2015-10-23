<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $table = 'user_roles';
    protected $primaryKey = 'role_id';
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\User', 'user_role_id');
    }
}
