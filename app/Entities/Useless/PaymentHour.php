<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentHour
 * @params int $id
 * @params string $title
 * @params double $pay_hours
 * @params double $pay_per_hour
 * @params double $pay_total
 * @params int $payment_id
 * @package App\Entities
 */
class PaymentHour extends Model
{
    protected $table = 'pay_hour';

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment(){

        return $this->belongsTo(Payment::class);
    }
}
