<?php

namespace App\Models\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    const CUSTOM_STATUS = [
        1 => 'pending',
        2 => 'assigned',
        3 => 'approved',
        4 => 'rejected'
    ];

    const PROJECT_STATUS = [
        1 => 'welcome_call',
        2 => 'send_welcome_package',
        3 => 'create_charter',
        4 => 'business_license',
        5 => 'apply_for_meter_spot'
    ];

    protected $fillable = [
        'lead_id',
        'opportunity_id',
        'contract_id',
        'user_id',
        'lead_date',
        'client_name',
        'client_phone',
        'client_email',
        'client_address',
        'note',
        'status',
        'pm_status',
        'financial_status',
        'pdf_path',
        'project_status'
    ];

    protected $appends = ['project_custom_status'];

    public function getProjectStatusAttribute($value)
    {
        if ($value) {
            return self::PROJECT_STATUS[$value];
        }
    }

    public function getProjectCustomStatusAttribute()
    {
        if (!$this->project_status) {
            return 0;
        }
        return $this->getOriginal('project_status');
    }

    public function setProjectStatusAttribute($value)
    {
        $this->attributes['project_status'] = array_search($value, self::PROJECT_STATUS);
    }

    public function getStatusAttribute($value)
    {
        return self::CUSTOM_STATUS[$value];
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = array_search($value, self::CUSTOM_STATUS);
    }

    public function getProjectStatus($value)
    {
        return array_search($value, self::PROJECT_STATUS);
    }

    public function getStatus($value)
    {
        return array_search($value, self::CUSTOM_STATUS);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticketMedia()
    {
        return $this->hasMany(TicketMedia::class);
    }

    public function getPdfPathAttribute($val)
    {
        return $val ? asset('/profiles/' . $val) : "";
    }
}
