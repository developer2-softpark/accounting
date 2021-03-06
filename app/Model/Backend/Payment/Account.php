<?php

namespace App\Model\Backend\Payment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "business_location_id",
        "business_type_id",
        "branch_id",
        "payment_method_id",
        "bank_id",
        "account_name",
        "account_no",
        "openning_amount",
        "contract_person",
        "contract_phone",
        "address",
        "status",
        "is_active",
        "is_varified",
    ];

    public function isActive()
    {
        return $this->is_active==1;
    }

    public function isVerified()
    {
        return $this->is_Verified==1;
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

}
