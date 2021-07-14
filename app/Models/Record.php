<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'date_of_birth',
        'gender',
        'height',
        'weight',
        'blood'
    ];

    public function container() {
        return $this->belongsTo('App\Models\Record', 'height', 'id');
    }
}
