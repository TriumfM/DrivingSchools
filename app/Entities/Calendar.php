<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Calendar
 * @params int $id
 * @params string $title
 * @params dateTime $start
 * @params dateTime $end
 * @params string $event_color
 * @params string $text_color
 * @params int $instructor_id
 * @params int $student_id
 * @package App\Entities
 */

class Calendar extends Model
{
    protected $table = 'cld_calendar';

    public function students(){
        return $this->belongsTo(Student::class);
    }

    public function instructors(){
        return $this->belongsTo(Instructor::class);
    }
}