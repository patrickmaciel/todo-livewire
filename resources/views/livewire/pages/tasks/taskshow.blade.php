<x-page-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Task Show
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>
                        Show Task
                        <a class='text-blue-500 underline' href="{{ route('tasks.index') }}">Back to list</a>
                    </h1>

                    <ul>
                        <li>{{ $task->user_id }}</li>
                        <li>{{ $task->name }}</li>
                        <li>{{ $task->filepath }}</li>
                        <li>{{ $task->remember_at }}</li>
                        <li>{{ $task->finished }}</li>
                        <li>{{ $task->cost }}</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-page-layout>
