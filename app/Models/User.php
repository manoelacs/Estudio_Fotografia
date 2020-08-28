<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsToMany(App\Role::class);
    }
    public function isAdmin()
    {
        if ($this->roles()->where('role_id', 1)->first()){
            return true;
        }
        return false;

    }
    public function hasPermition(){
        return $this->hasAnyRoles($this->roles());

    }
    public function hasAnyRoles($roles){
        if(is_array($roles) || is_object($roles)){
            foreach ($roles as $role){
                return $this->role->contains('name', $role->name);
            }
        }
        return $this->roles->contains('name', $roles);

    }
}
