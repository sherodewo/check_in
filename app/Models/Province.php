<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{

    public $table = 'provinces';

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
