<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantsInfo extends Model
{
    use HasFactory, SoftDeletes;
    // protected $appends = ['full_name'];

    protected $fillable = [
        'first_name',
        'middle_name', // nullable
        'last_name',
        'suffix',
        'gender',
        'brgy_origin',
        'birth_date',
        'place_of_birth',
        'citizenship',
        'contact',
        'tin_no',
        'govt_id',
        'civil_status',
        'office',
        'income_per_month',
    ];

    protected $casts = [
        'income_per_month' => 'double'
    ];

    public function getFullNameAttribute()
    {
        return sprintf(
            '%s %s',
            $this->first_name,
            $this->last_name
        );
    }
}
