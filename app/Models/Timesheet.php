<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contract_id',
        'client_id',
        'timesheet_start',
        'timesheet_end',
        'status',
        'total_unit',
        'hours',
        'notes',
    ];

    protected $casts = [
        'hours' => 'array',
        'notes' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getContractTitleAttribute()
    {
        return $this->contract->contract_title;
    }

    public function getClientIdAttribute()
    {
        return $this->contract->client_id;
    }

    public function getManagerIdAttribute()
    {
        return $this->contract->manager_id;
    }

    public function getContractTypeAttribute()
    {
        return $this->contract->contract_type;
    }

    public function getContractStartDateAttribute()
    {
        return $this->contract->contract_start_date;
    }

    public function getContractEndDateAttribute()
    {
        return $this->contract->contract_end_date;
    }

    public function getPayRateAttribute()
    {
        return $this->contract->pay_rate;
    }

    public function getUnitOfPayAttribute()
    {
        return $this->contract->unit_of_pay;
    }

    public function getPayAmountAttribute()
    {
        return $this->contract->pay_amount;
    }

    public function getChargeAmountAttribute()
    {
        return $this->contract->charge_amount;
    }

    public function getClientAttribute()
    {
        return $this->contract->client;
    }

    public function getManagerAttribute()
    {
        return $this->contract->manager;
    }
}
