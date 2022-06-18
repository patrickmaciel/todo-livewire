<?php

namespace App\Http\Livewire\Pages\Tasks;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithFileUploads;

class Taskshow extends Component
{
    public Task $task;

    public function mount($id)
    {
        ray('method: mount');
        $this->task = Task::findOrFail($id);
    }

    public function render()
    {
        ray('method: render');
        return view('livewire.pages.tasks.taskshow');
    }
}
