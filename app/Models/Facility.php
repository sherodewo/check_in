<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    public $table = 'facilities';

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
}
