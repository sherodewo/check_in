<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    public $table = 'room_types';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['name'];

    public function sql()
    {
        return $this
            ->select(
                $this->table.'.id',
                $this->table.'.name'
            )->orderBy(
                $this->table.'.name'
            );
    }
}
