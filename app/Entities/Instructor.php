<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Instructor
 * @params int $id
 * @params string $first_name
 * @params string $last_name
 * @params string $birthday
 * @params string $email
 * @params string $id_number
 * @params string $mobile
 * @params string $photo
 * @params enum $gender
 * @package App\Entities
 */

class Instructor extends Model
{
    protected $table = 'int_instructor';

    public function students()
    {
        return $this->belongsToMany(Student::class, 'std_instructor');
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'veh_instructor');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function documents(){
        return $this->morphToMany(Document::class, 'doc_documentables');
    }

    public function events(){
        return $this->hasMany(Calendar::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}