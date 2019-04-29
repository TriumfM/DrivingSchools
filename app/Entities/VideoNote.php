<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VideoNote
 * @params int $id
 * @params string $title
 * @params string $description
 * @params string $path
 * @package App\Entities
 */
class VideoNote extends Model
{
    protected $table = 'vid_note';
}