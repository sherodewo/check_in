<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    private $cityModel;
    private $provinceModel;

    public $table = 'districts';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['name', 'city_id', 'province_id'];

    public function sql()
        {
            $this->cityModel = new City;
            $this->provinceModel = new Province;

            return $this
                ->leftJoin($this->cityModel->table, $this->cityModel->table.'.id', '=', $this->table.'.city_id')
                ->leftJoin($this->provinceModel->table, $this->provinceModel->table.'.id', '=', $this->table.'.province_id')
                ->select(
                    $this->table.'.id',
                    $this->table.'.name',
                    $this->cityModel->table.'.name as city',
                    $this->provinceModel->table.'.name as province'
                )->orderBy(
                    $this->table.'.name'
                );
        }
}
