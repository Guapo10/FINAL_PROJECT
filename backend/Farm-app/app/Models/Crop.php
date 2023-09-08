<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Crop extends Model
{
    use HasFactory,SoftDeletes;



    protected $fillable = [
        'name', 
        'crop_type',
         'planting_date',
          'harvesting_date',
          
    ];


//calculate the age of the crops.

    public function calculateAge()
{
    $plantingDate = $this->planting_date;
    $harvestingDate = $this->harvesting_date;
    // Calculate and return the age logic here
}

//accessors 
public function getStatusAttribute()
{
    $currentDate = now();
    $plantingDate = $this->planting_date;
    $harvestingDate = $this->harvesting_date;

    if ($currentDate < $plantingDate) {
        return 'Planted';
    } elseif ($currentDate >= $plantingDate && $currentDate <= $harvestingDate) {
        return 'Growing';
    } else {
        return 'Harvested';
    }
}

    /**
     * Define a many-to-one relationship where a crop belongs to a farm.
     */

    public function farm()
{
    return $this->belongsTo(Farm::class);
}

  /**
     * Define a many-to-many relationship where a crop has many pests.
     */
    public function pests()
    {
        return $this->belongsToMany(Pest::class);
    }

}


