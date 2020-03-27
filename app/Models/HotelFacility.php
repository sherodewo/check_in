<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelFacility extends Model
{
    public $table = 'hotel_facilities';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['hotel_id', 'facility_id'];

    public function sql()
    {
        return $this
            ->select(
                $this->table.'.id',
                $this->table.'.hotel_id',
                $this->table.'.facility_id'
            )->orderBy(
                $this->table.'.hotel_id'
            );
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
