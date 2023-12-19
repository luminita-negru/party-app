<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorEvents extends Model
{
    use HasFactory;
    public $fillable = ['SponsorId', 'EventId'];
    public $primaryKey = 'SponsorEventsId';

}
