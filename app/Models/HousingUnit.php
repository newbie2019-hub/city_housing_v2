<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HousingUnit extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;
    protected $guarded = [];

    public function housingproject()
    {
        return $this->belongsTo(HousingProject::class, 'housing_project_id', 'id');
    }
}
