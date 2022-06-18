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
                        Create new Task
                        <a class='text-blue-500 underline' href="{{ route('tasks.index') }}">Back to list</a>
                    </h1>

                    <form wire:submit.prevent='save' wire:key='task_form' class='flex flex-col items-start gap-4'>
                        <label for="name">
                            <input type="text" name='name' wire:model.debounce.500ms='task.name' placeholder="your name">
                            @error('task.name') {{ $message }} @enderror
                        </label>

                        <label
                            for="filepath"
                            x-data="{ isUploading: false, progress: 0 }"
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                        >
                            <input type="file" name='filepath' wire:model='filepath' placeholder="your filepath">
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                            @error('filepath') {{ $message }} @enderror
                        </label>

                        <label for="remember_at">
                            <input type="date" name='remember_at' wire:model.debounce.500ms='task.remember_at' placeholder="your remember_at">
                            @error('task.remember_at') {{ $message }} @enderror
                        </label>

                        <label for="finished">
                            <input type="checkbox" name='finished' wire:model.debounce.500ms='task.finished' placeholder="your finished">Finished
                            @error('task.finished') {{ $message }} @enderror
                        </label>

                        <label for="cost">
                            <input class='money-mask' type="text" name='cost' wire:ignore wire:model.debounce.500ms='task.cost' placeholder="your cost">
                            @error('task.cost') {{ $message }} @enderror
                        </label>

                        <button class='p-2 border-gray-300 border-2' type="submit">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-page-layout>
