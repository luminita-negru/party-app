<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['UserId', 'EventId', 'nr_tickets'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'EventId');
    }
}
