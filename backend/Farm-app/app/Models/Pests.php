<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        // Add other pest-related fields as needed
    ];

    protected $dates = ['deleted_at'];

    /**
     * Define an accessor to format the pest name.
     *
     * @return string
     */
    public function getFormattedNameAttribute()
    {
        return ucfirst($this->name);
    }

    /**
     * Define an accessor to format the created_at timestamp.
     *
     * @return string
     */
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('F d, Y h:i A');
    }

    /**
     * Define a relationship to other models (e.g., PestCrops or PestTreatments).
     *
     * Example: a pest can be associated with many crops it affects.
     */
    public function crops()
    {
        return $this->belongsToMany(Crop::class)->withTimestamps();
    }

    /**
     * Attach the pest to a specific crop.
     *
     * @param  int  $cropId
     * @return void
     */
    public function attachToCrop($cropId)
    {
        $this->crops()->attach($cropId);
    }

    /**
     * Detach the pest from a specific crop.
     *
     * @param  int  $cropId
     * @return void
     */
    public function detachFromCrop($cropId)
    {
        $this->crops()->detach($cropId);
    }

    /**
     * Get all crops associated with the pest.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCrops()
    {
        return $this->crops;
    }

    /**
     * Search for pests by name.
     *
     * @param  string  $searchTerm
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function searchByName($searchTerm)
    {
        return Pest::where('name', 'like', "%$searchTerm%")->get();
    }

    /**
     * Calculate the number of associated crops.
     *
     * @return int
     */
    public function countAssociatedCrops()
    {
        return $this->crops->count();
    }
}
