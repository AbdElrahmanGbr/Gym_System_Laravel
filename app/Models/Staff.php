<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Staff extends Authenticatable implements BannableContract
{
    use HasFactory, Notifiable, HasRoles, Bannable;

    protected $guard_name = 'web';
    protected $guard = 'staff';

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'national_id',
        'is_banned',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    // City Manager
    public function city()
    {
        return $this->hasOne(City::class);
    }

    // Gym Manager
    public function gymManger()
    {
        return $this->belongsToMany(Gym::class, 'gym_managers', 'staff_id', 'gym_id');
    }

    public function coachGyms()
    {
        return $this->belongsToMany(Gym::class, 'gym_coaches', 'staff_id', 'gym_id');
    }

    public function coachSessions()
    {
        return $this->belongsToMany(Session::class, 'session_staff', 'staff_id', 'session_id');
    }
    public function session()
    {
        return $this->belongsToMany(Session::class);
    }
}
