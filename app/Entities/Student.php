<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * @params int $id
 * @params dateTime $registration_date
 * @params string $registration_number
 * @params string $first_name
 * @params string $parent_name
 * @params string $last_name
 * @params string $email
 * @params string $id_number
 * @params string $birthday
 * @params string $profession
 * @params string $mobile
 * @params string $address
 * @params string $payment
 * @params string $photo
 * @params int $city_id
 * @params enum $gender
 * @params enum $driving_category
 * @package App\Entities
 */

class Student extends Model
{
    protected $table = 'std_student';

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'std_instructor');
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

    public function payments(){
        return $this->belongsToMany(Payment::class, 'pay_student');
    }
}
