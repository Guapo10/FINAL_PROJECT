<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Maintenance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'equipment_id',
        'maintenance_date',
        'description',
        'cost',
    ];

    protected $dates = ['maintenance_date'];

    /**
     * Define an accessor to format the maintenance_date attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getFormattedMaintenanceDateAttribute()
    {
        return $this->maintenance_date->format('Y-m-d');
    }

    /**
     * Define a custom method to calculate the next maintenance due date.
     *
     * @param  int  $daysUntilDue
     * @return \Carbon\Carbon
     */
    public function calculateNextMaintenanceDueDate($daysUntilDue)
    {
        return $this->maintenance_date->addDays($daysUntilDue);
    }

    /**
     * Define a scope to retrieve soft-deleted maintenance records.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithTrashedRecords($query)
    {
        return $query->withTrashed();
    }
}
