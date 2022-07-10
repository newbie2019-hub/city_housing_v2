<?php

namespace App\Http\Livewire;

use App\Models\HousingProject;
use App\Models\HousingUnit;
use App\Models\OccupancyStatus;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ConfirmDeleteModal extends ModalComponent
{

    use AuthorizesRequests;

    public $collection;
    public $arhive;
    public  $type;
    public  $message;

    public function mount($id, $type, $archive = null)
    {
        $this->archive = $archive;
        $this->type = $type;
        if ($type == 'User') {
            $this->collection = User::withTrashed()->find($id);
        }
        if ($type == 'Housing Project') {
            $this->collection = HousingProject::withTrashed()->find($id);
        }
        if ($type == 'Housing Unit') {
            $this->collection = HousingUnit::withTrashed()->find($id);
        }
        if ($type == 'Status') {
            $this->collection = OccupancyStatus::withTrashed()->find($id);
        }
    }

    public function restoreDelete()
    {
        if ($this->archive == "restore") {
            $this->collection->restore();
            $this->message =  $this->type . " restored succesfully";
        } elseif ($this->archive == "delete") {
            $this->authorize('user_delete');
            $this->message =  $this->type . " deleted succesfully";
            $this->collection->delete();
        }

        if ($this->type == 'User') {
            $this->emit('archiveUserTableRefreshEvent');
            $this->emit('userTableRefreshEvent');
        }
        if ($this->type == 'Housing Project') {
            $this->emit('housingprojectUpdated');
        }
        if ($this->type == 'Housing Unit') {
            $this->emit('housingunitUpdated');
        }
        if ($this->type == 'Status') {
            $this->emit('occupancyStatusRefresh');
        }

        $this->emit('showToastNotification', ['type' => 'success', 'message' =>   $this->message, 'title' => 'Success']);

        $this->closeModal();
    }


    public function render()
    {
        return view('livewire.confirm-delete-modal');
    }
}
