<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Document
 * @params int $id
 * @params string $number
 * @params string $name
 * @params string $description
 * @params string $file
 * @params dateTime $start_date
 * @params dateTime $end_date
 * @package App\Entities
 */

class Document extends Model
{
    protected $table = 'doc_document';

    public function students()
    {
        return $this->morphedByMany(Student::class, 'doc_documentables');
    }

    public function instructors()
    {
        return $this->morphedByMany(Instructor::class, 'doc_documentables');
    }
}