<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date', 'location', 'description', 'photo', 'price'];
    // public function agendas()
    // {
    //     return $this->hasMany(Agenda::class);
    // }
    // public function sponsors() {
    //     return $this->hasMany(Sponsor::class, 'SponsorId'); // ajustează dacă este necesar
    // }
    // public function artists() {
    //     return $this->hasMany(Artist::class, 'ArtistId'); // ajustează dacă este necesar
    // }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'sponsor_events', 'EventId', 'SponsorId');
    }

    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'EventId');
    }
}
