<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table = 'roles';

    protected $fillable = ['name', 'description'];

    public function sql()
    {
        return $this
            ->select(
                $this->table.'.id',
                $this->table.'.name',
                $this->table.'.description'
            )->orderBy(
                $this->table.'.name'
            );
    }

    public function user_role()
    {
        return $this->hasMany(UserRole::class);
    }
}
