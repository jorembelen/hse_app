<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $fillable = [
        'badge',
        'name',
        'designation'
    ];

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    public function officer()
    {
        return $this->belongsTo(Incident::class);
    }


}
