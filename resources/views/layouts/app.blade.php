<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Task Manager - Anantkamal Studio</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <!-- jQuery (already present) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle JS (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(function () {
    fetchTasks();

    function fetchTasks() {
        $.get("{{ route('tasks.fetch') }}", function(data) {
            let html = '';
            data.forEach(task => {
                html += `
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="${task.status === 'Done' ? 'text-decoration-line-through' : ''}">
                        ${task.title}
                    </span>
                    <span class="text-transform: uppercase; ${task.status === 'Done' ? 'text-success' : 'text-warning'}">
                        ${task.status}
                    </span>
                    <div>
                        <button onclick="editTask(${task.id})" class="btn btn-sm btn-warning">✏️</button>
                        <button onclick="deleteTask(${task.id})" class="btn btn-sm btn-danger">❌</button>
                        <button onclick="toggleStatus(${task.id})" class="btn btn-sm btn-secondary">🔁</button>
                    </div>
                </li>`;
            });
            $('#task-list').html(html);
        });
    }

 $('#saveTaskBtn').click(function () {
    const modal = bootstrap.Modal.getInstance(document.getElementById('taskModal'));

    if (!$('#title').val().trim()) {
        alert('Please enter a task title.');
        return;
    }

    let id = $('#task_id').val();
    let url = id ? `/tasks/${id}` : `/tasks`;
    let method = id ? 'PUT' : 'POST';
    let title = $('#title').val();

    $.ajax({
        url,
        method,
        data: {
            _token: '{{ csrf_token() }}',
            title,
            _method: method
        },
        success: function () {
            modal.hide();
            $('#taskForm')[0].reset();
            fetchTasks();
        }
    });
});

    window.editTask = function(id) {
        $.get(`/tasks/${id}`, function(task) {
            $('#task_id').val(task.id);
            $('#title').val(task.title);
            $('#taskModal').modal('show');
        });
    }

    window.deleteTask = function(id) {
        if (confirm("Delete this task?")) {
            $.ajax({
                url: `/tasks/${id}`,
                method: 'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success: fetchTasks
            });
        }
    }

    window.toggleStatus = function(id) {
        $.ajax({
            url: `/tasks/${id}/toggle`,
            method: 'PATCH',
            data: {_token: '{{ csrf_token() }}'},
            success: fetchTasks
        });
    }
});
</script>


    </body>
</html>
