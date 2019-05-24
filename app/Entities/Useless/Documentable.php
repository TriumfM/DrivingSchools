<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Documentable
 * @params int $id
 * @params int $document_id
 * @params int $doc_documentables_id
 * @params string $doc_documentables_type
 * @package App\Entities
 */

class Documentable extends Model
{
    protected $table = 'doc_documentables';

    public $incrementing = false;

}