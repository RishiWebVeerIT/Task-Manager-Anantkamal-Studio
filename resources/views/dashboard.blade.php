<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Dashboard</h2>
    </x-slot>

    <div class="container mt-4">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#taskModal">➕ Add Task</button>
        <ul id="task-list" class="list-group"></ul>
    </div>

    @include('task-modal')
</x-app-layout>

