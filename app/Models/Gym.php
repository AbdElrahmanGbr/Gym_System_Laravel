<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD



class Gym extends Model
{
    use HasFactory;

=======
class Gym extends Model
{
    use HasFactory;
>>>>>>> d327182f648f8d48c4f933b4a1d42f2c5853cdf4
    protected $fillable = [
        'name',
        'image',
        'revenue',
<<<<<<< HEAD
        'city_id',
        'created_by'
    ];

    // Managers
    public function gymManager()
    {
        return $this->belongsToMany(Staff::class, 'gym_managers', 'gym_id', 'staff_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function gymCoaches()
    {
        return $this->belongsToMany(Staff::class, 'gym_coaches', 'gym_id', 'staff_id');
    }

    public function trainingPackages()
    {
        return $this->hasMany(TrainingPackage::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
=======
        'city_id',   
    ];
>>>>>>> d327182f648f8d48c4f933b4a1d42f2c5853cdf4
}
