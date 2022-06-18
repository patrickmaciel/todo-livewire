<?php

namespace App\Http\Livewire\Pages\Tasks;

use App\Models\Task;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Taskcreate extends Component
{
    use WithFileUploads;

    public Task $task;
    public $filepath;
    protected $oldFilepath;

    public $rules = [
        'task.name' => 'required',
        'task.finished' => 'nullable|boolean',
        'task.filepath' => 'nullable',
        'task.file_extension' => 'nullable',
        'task.remember_at' => 'nullable|date',
        'task.cost' => 'nullable',
        'filepath' => 'nullable|file|max:8096'
    ];

    public function mount($id = null)
    {
        ray('method: mount');

        if ($id) {
            $this->task = Task::findOrFail($id);
        } else {
            $this->task = new Task;
        }
    }

    public function render()
    {
        ray('method: render');
        return view('livewire.pages.tasks.taskcreate');
    }

    public function updated()
    {
        ray('method: updated');
        ray($this->task);
        ray($this->filepath);
    }

    public function save()
    {
        ray('method: save');
        ray($this->task);
        ray($this->filepath);

        $this->validate();

        if ($this->filepath) {
            $uploadedFile = $this->filepath->store('uploads');
            if (!empty($this->task->filepath)) {
                Storage::delete($this->task->filepath);
            }
            $this->task->filepath = $uploadedFile;
            $this->task->file_extension = $this->filepath->extension();
        }

        $this->task->finished = $this->task->finished ?? 0;
        $this->task->cost = removeMascaraMoeda($this->task->cost);
        $this->task->user_id = auth()->user()->id;
        $this->task->save();
        return redirect()->route('tasks.index');
    }
}
