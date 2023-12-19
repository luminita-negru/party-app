<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    public $fillable = ['AgendaId', 'EventId', 'program', 'ArtistId', 'startTime', 'finishTime'];
    protected $primaryKey = 'AgendaId';

    public function event()
    {
        return $this->belongsTo(Event::class, 'id');
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'ArtistId');
    }

}
