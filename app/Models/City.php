<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    private $provinceModel;

    public $table = 'cities';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['name', 'province_id'];

    public function sql()
    {
        $this->provinceModel = new Province;

        return $this
            ->leftJoin($this->provinceModel->table, $this->provinceModel->table.'.id', '=', $this->table.'.province_id')
            ->select(
                $this->table.'.id',
                $this->table.'.name',
                $this->table.'.province_id',
                $this->provinceModel->table.'.name as province'
            )->orderBy(
                $this->table.'.name'
            );
    }
}
