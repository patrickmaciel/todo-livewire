<?php

namespace App\Http\Livewire\Pages\Tasks;

use App\Models\Task;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Tasklist extends Component
{
    use WithPagination;

    public $search = '';

    public $queryString = [
        'search' => '',
    ];

    public function render()
    {
        return view('livewire.pages.tasks.tasklist', [
            'tasks' => Task::query()
                ->when(!empty($this->search), function ($query) {
                    return $query->where('name', 'like', '%'.$this->search.'%');
                })
                ->paginate(25)
        ]);
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        if ($task->filepath) {
            Storage::delete($task->filepath);
        }

        $this->emit('$refresh');
    }
}
