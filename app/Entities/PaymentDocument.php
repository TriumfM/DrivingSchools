<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentDocument
 * @params int $id
 * @params double $pay_amount
 * @params int $payment_id
 * @params string $pay_file
 * @package App\Entities
 */
class PaymentDocument extends Model
{
    protected $fillable = ['pay_amount'];
    protected $table = 'pay_document';

    public $timestamps = false;
}
