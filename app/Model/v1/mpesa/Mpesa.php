<?php

namespace App\Model\v1\mpesa;

use Illuminate\Database\Eloquent\Model;

class Mpesa extends Model
{
    const STATUS_PENDING = 0;
    const STATUS_COMPLETE = 1;
    const STATUS_FAILED = 2;

    protected $fillable = [
        'status', 'transaction_number', 'transaction_time', 'amount', 'short_code', 'bill_reference',
        'mobile_number', 'payer_first_name', 'payer_middle_name', 'payer_last_name'
    ];

}
