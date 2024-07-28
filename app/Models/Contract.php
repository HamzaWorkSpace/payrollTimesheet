<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'user_id',
        'manager_id',
        'contract_title',
        'invoicing_required',
        'invoicing_scheduler',
        'purchase_order',
        'contract_start_date',
        'contract_end_date',
        'timesheet_frequency',
        'timesheet_approved_by',
        'place_of_employment',
        'jurisdiction',
        'position_description',
        'award',
        'insurance_details',
        'contract_conditions',
        'total_contract_units',
        'rate_name',
        'unit_of_pay',
        'standard_hours_of_pay',
        'pay_amount',
        'charge_amount',
        'contract_status',
        'additional_clause',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
