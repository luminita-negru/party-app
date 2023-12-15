<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    public $fillable = ['SponsorId', 'name', 'logo'];
    protected $primaryKey = 'SponsorId';

    // public function agendas()
    // {
    //     return $this->hasMany(Agenda::class, 'SponsorId');
    // }
}
