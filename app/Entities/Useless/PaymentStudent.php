<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentStudent
 * @params int $id
 * @params int $student_id
 * @params int $payment_id
 * @package App\Entities
 */
class PaymentStudent extends Model
{
    protected $table = 'pay_student';

    public $timestamps = false;

}