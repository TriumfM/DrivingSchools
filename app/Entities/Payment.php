<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * @params int $id
 * @params int $category_id
 * @params double $pay_total
 * @params double $pay_amount
 * @params double $pay_dept
 * @params boolean $pay_flag
 * @params string $description
 * @params enum $pay_type
 * @package App\Entities
 */
class Payment extends Model
{
    protected $fillable = ['pay_dept', 'pay_amount', 'pay_flag', 'pay_total'];
    protected $table = 'pay_payment';

    public function hours(){

        return $this->hasMany(PaymentHour::class);
    }

     public function transactions(){

        return $this->hasMany(PaymentDocument::class);
    }

    public function category(){

        return $this->belongsTo(DrivingCategory::class);
    }
}