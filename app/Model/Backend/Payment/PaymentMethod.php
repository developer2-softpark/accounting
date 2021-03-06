<?php

namespace App\Model\Backend\Payment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "business_location_id",
        "business_type_id",
        "branch_id",
        "method",
        "status",
        "is_active",
        "is_verified",
        "deleted_at",
        "created_by"
    ];

    public function isActive()
    {
        return $this->is_active==1;
    }

    public function isVerified()
    {
        return $this->is_Verified==1;
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function banks()
    {
        return $this->hasMany(Bank::class);
    }

}
