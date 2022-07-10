<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HousingProject extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $guarded = [];
    protected $cascadeDeletes = ['housingunits'];

    public function housingunits()
    {
        return $this->hasMany(HousingUnit::class, 'housing_project_id', 'id');
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('project', 'like', '%' . $search . '%')
            ->OrWhere('location', 'like', '%' . $search . '%')
            ->OrWhere('description', 'like', '%' . $search . '%');
    }
}
