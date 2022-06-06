<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    public $fillable = [
        'division',
        'name',
        'loc_name'
    ];

    public function incident()
    {
        return $this->hasMany(Incident::class, 'location');
    }


}
