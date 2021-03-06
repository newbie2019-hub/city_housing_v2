<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;

class Applicant extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes, BelongsToThrough;

    protected $fillable = [
        'applicant_info_id',
        'spouse_id',
        'housing_unit_id',
        // 'real_holding_id',
        'application_status'
    ];
    protected $cascadeDeletes = ['info', 'spouse', 'family_composition'];

    public function info()
    {
        return $this->belongsTo(ApplicantsInfo::class, 'applicant_info_id', 'id')->withTrashed();
    }

    public function spouse()
    {
        return $this->belongsTo(Spouse::class, 'spouse_id', 'id')->withTrashed();
    }

    public function family_composition()
    {
        return $this->hasMany(FamilyComposition::class)->withTrashed();
    }
    public function requirementsImage()
    {
        return $this->hasMany(ApplicantRequirementImage::class);
    }

    public function housing_unit()
    {
        return $this->belongsTo(HousingUnit::class, 'housing_unit_id', 'id');
    }


    public function requirements()
    {
        return $this->belongsToMany(Requirement::class, 'applicants_requirments');
    }

    public function real_holding()
    {
        return $this->belongsTo(RealHolding::class, 'real_holding_id', 'id')->withTrashed();
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()
            ->whereRelation('info', 'first_name', 'like', '%' . $search . '%')
            ->orWhereRelation('info', 'last_name', 'like', '%' . $search . '%');
    }
}
