<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
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

    public function sql(){
        $user_role = new UserRole;
        $role = new Role;

        return $this
            ->leftJoin($user_role->table, $user_role->table.'.user_id', '=', $this->table.'.id')
            ->leftJoin($role->table, $role->table.'.id', '=', $user_role->table.'.role_id')
            ->select(
                $this->table.'.id',
                $role->table.'.name AS role',
                $user_role->table.'.role_id AS roleId',
                $this->table.'.name',
                $this->table.'.email'
            );
        }

    public function user_role()
    {
        return $this->hasOne(UserRole::class);
    }
}
