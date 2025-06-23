<?php

namespace Hanan\FlightReservation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Hanan\FlightReservation\Database\Factories\AirportFactory;

class Airport extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'city', 'country'];

    public function departures(): HasMany
    {
        return $this->hasMany(Flight::class, 'departure_airport_id');
    }

    public function arrivals(): HasMany
    {
        return $this->hasMany(Flight::class, 'arrival_airport_id');
    }

    protected static function newFactory()
    {
        return AirportFactory::new();
    }
}
