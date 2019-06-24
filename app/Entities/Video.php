<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Video
 * @params int $id
 * @params string $title
 * @params text $description
 * @params string $path
 * @package App\Entities
 */
class Video extends Model
{
    protected $fillable = ['title', 'description'];

    protected $table = 'vid_video';
}
