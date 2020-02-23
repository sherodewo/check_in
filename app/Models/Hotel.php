<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

    public $table = 'hotels';

    protected $fillable = ['name', 'description', 'room_type_id', 'city_id',
        'province_id', 'district_id', 'facility_id', 'number_of_rooms', 'price'];

    public function sql(){
        return $this
            ->select(
                $this->table.'.id',
                $this->table.'.name',
                $this->table.'.description',
                $this->table.'.room_type_id',
                $this->table.'.city_id',
                $this->table.'.province_id',
                $this->table.'.district_id',
                $this->table.'.facility_id',
                $this->table.'.number_of_rooms',
                $this->table.'.price'
            );
    }

    public function facility(){
        return $this->hasMany( Facility::class);
    }

    public function city(){
        return $this->hasOne(City::class);
    }

    public function province(){
        return $this->hasOne(Province::class);
    }

    public function district(){
        return $this->hasOne(District::class);
    }
}
