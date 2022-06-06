<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Location;
use Webpatser\Uuid\Uuid;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;

    use \App\Http\Traits\UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'username', 'location_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function remarks()
    {
        return $this->hasOne(Remark::class);
    }

    public function locations()
    {
        return $this->belongsTo(Location::class, 'location_id')->withDefault();
    }

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    public function getAvatar() {
        return 'https://www.gravatar.com/avatar/' .md5($this->email);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function hasLocation()
    {
        return $this->location_id != null;
    }

}
