<div class="modal fade" id="taskModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="taskForm">
            @csrf
            <input type="hidden" id="task_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="title" name="title" class="form-control" placeholder="Task Title">
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveTaskBtn" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
