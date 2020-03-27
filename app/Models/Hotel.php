<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

    public $table = 'hotels';

    protected $fillable = ['name', 'description', 'room_type_id', 'city_id',
        'province_id', 'district_id', 'number_of_rooms', 'price','status'
        ,'postal_code', 'location_detail', 'check_in_time', 'check_out_time', 'phone_number'];

    public function sql(){
        $owner = new User();
        return $this
            ->leftJoin($owner->table, $owner->table.'.id', '=', $this->table.'.hotel_owner_id')
            ->select(
                $this->table.'.id',
                $this->table.'.name',
                $this->table.'.description',
                $this->table.'.room_type_id',
                $this->table.'.city_id',
                $this->table.'.number_of_rooms',
                $this->table.'.price',
                $this->table.'.check_in_time',
                $this->table.'.check_out_time',
                $this->table.'.hotel_owner_id',
                $this->table.'.status',
                $this->table.'.location_detail',
                $owner->table.'.name AS owner'
            );
    }

    public function facility(){
        return $this->hasMany( Facility::class);
    }

    public function city(){
        return $this->hasOne(City::class);
    }

    public function owner(){
        return $this->hasOne(User::class);
    }

    public function image(){
        return $this->hasMany(HotelImage::class);
    }
}
