<x-page-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Task List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>
                        All tasks
                        <a class='text-blue-500 underline' href="{{ route('tasks.create') }}">Create new</a>
                    </h1>

                    <div>
                        <div class="tasks flex flex-col space-y-4">
                            <div class="search">
                                <form action="{{ route('tasks.index') }}" method='GET' class='flex flex-col'>
                                    <input type="text" name='search' wire:model.debounce.500ms='search' placeholder='Type what you need to search here'>
                                </form>
                            </div>

                            <div class="task-cards flex flex-wrap gap-2">
                            @foreach ($tasks as $task)
                                <div class="task border-2 p-2 rounded-md">
                                    <div>
                                        <strong>{{ $task->name }}</strong>&nbsp;<br>
                                        <a class='text-green-500 underline cursor-pointer' href="{{ route('tasks.show', $task->id) }}">SHOW </a>&nbsp;
                                        <a class='text-blue-500 underline cursor-pointer' href="{{ route('tasks.create', $task->id) }}">EDIT</a>&nbsp;
                                        <a class='text-red-500 underline cursor-pointer' href="#" wire:click.prevent='deleteTask({{ $task->id }})'>DELETE</a>
                                    </div>
                                    <p>
                                        @if (!empty($task->filepath))
                                            @if (isImage($task->file_extension))
                                                <strong>IMG: </strong><img src="{{ asset($task->filepath) }}" width='80px' alt="{{ $task->name }}">
                                            @else
                                                <strong>FILE: </strong><a class='text-blue-500 underline cursor-pointer' href="{{ asset($task->filepath) }}">{{ $task->filename }}</a>
                                            @endif
                                            <br>
                                        @endif
                                        {{ $task->filepath }} |
                                        {{ $task->file_extension }}
                                    </p>
                                    <p><em>{{ $task->finished }}</em> | {{ $task->remember_at }}</p>
                                    <p>{{ $task->cost }}</p>
                                </div>
                            @endforeach
                            </div>
                        </div>

                        <div class="pagination">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-page-layout>
