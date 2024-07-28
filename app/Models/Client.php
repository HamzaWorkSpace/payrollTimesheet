<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ABN',
        'contract_name',
        'email',
        'Xero_contact_id',
        'invoice_date_type',
        'payment_terms',
        'invoicing',
        'merge_attachments_as_zip',
        'auto_upload_attachments_to_xero',
        'active',
        'notes',
    ];

    public function timesheets()
    {
        return $this->hasMany(Timesheet::class);
    }
}
