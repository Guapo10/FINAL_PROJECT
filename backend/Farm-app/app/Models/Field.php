<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;


class Field extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'size',
        'location',
        'soil_type',
        'status'
    ];


// scopes


public function scopeActiveOrInactive(Builder $query, $active = true)
{
    if ($active) {
        return $query->where('status', 'active');
    } else {
        return $query->where('status', 'inactive');
    }
}
public function scopeSizeGreaterThanOrEqual($query, $size)
{
    return $query->where('size', '>=', $size);
}

    public function getSizeAttribute($value)
    {
   
        return $value . ' acres'; 
    }
    public function Crop (){
        return $this-> hasMany(Crop::class);
    }
}
