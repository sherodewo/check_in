<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    public $table = 'hotel_images';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['hotel_id', 'facility_id'];

    public function sql()
    {
        return $this
            ->select(
                $this->table.'.id',
                $this->table.'.hotel_id',
                $this->table.'.url'
            )->orderBy(
                $this->table.'.hotel_id'
            );
    }

    public function hotel()
    {
        return $this->hasOne(Hotel::class);
    }
}
