<?php

namespace App\Http\Livewire\DataTable;

use App\Models\HousingUnit;

trait WithBulkSelect
{
    public $checked = [];
    public $selectPage = false;
    public $selectAll = false;


    public function selectAllData($value)
    {
        if ($this->selectAll) {
            $this->checked = $value->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
            $this->checked = [];
        }
    }
}
