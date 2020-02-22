<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $table = 'user_roles';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['user_id', 'role_id'];

    public function sql()
    {
        return $this
            ->select(
                $this->table.'.id',
                $this->table.'.user_id',
                $this->table.'.role_id'
            )->orderBy(
                $this->table.'.user_id'
            );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
