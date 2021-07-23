<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'writer',
        'release_date',
        'singer',
        'genre'
        
    ];

    public function container() {
        return $this->belongsTo('App\Models\Song', 'name', 'id');
    }
}
