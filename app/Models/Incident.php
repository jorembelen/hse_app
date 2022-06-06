<?php

namespace App\Models;
use App\User;


use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{

    // public $primaryKey = 'inc_id';
    public $incrementing = false;

    public $fillable = [
        'id',
        'user_id',
        'employee_id',
        'sel_involved',
        'involved',
        'type',
        'inc_category',
        'insurance',
        'location',
        'wps',
        'severity',
        'injury_location',
        'injury_sustain',
        'cause',
        'equipment',
        'description',
        'docs',
        'action',
        'images',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function officer()
    {
        return $this->belongsTo(Employee::class, 'employee_id')->withDefault();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'involved')->withDefault();
    }

    public function reports()
    {
        return $this->hasOne(Report::class);
    }

    public function locations()
    {
        return $this->belongsTo(Location::class, 'location')->withDefault();
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'incidents', 'length' => 10, 'prefix' =>'IAAINR-']);
        });
    }

  
            
}