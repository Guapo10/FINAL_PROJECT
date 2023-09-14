<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    /**
     * Define a custom method to retrieve all maintenance records associated with this equipment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maintenanceRecords()
    {
        return $this->hasMany(Maintenance::class);
    }

    /**
     * Define an accessor to retrieve the total cost of maintenance for this equipment.
     *
     * @return float
     */
    public function getTotalMaintenanceCostAttribute()
    {
        return $this->maintenanceRecords->sum('cost');
    }
}
