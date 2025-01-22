<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'year',
        'type',
    ];

    /**
     * Get the archives for the event.
     */
    public function archives()
    {
        return $this->hasMany(Archive::class);
    }
}
