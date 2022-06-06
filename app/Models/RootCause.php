<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RootCause extends Model
{
    // protected $casts = [
    //     'root_name ' => 'array',
    //     'description ' => 'array',
    // ];


    public $fillable = [
        'user_id',
        'report_id',
        'incident_id',
        'root_name',
        'type',
        'rec_name',
        'rec_type',
        'status'
    ];

    public function Report()
    {
        return $this->belongsTo(Report::class);
    }

    
}
