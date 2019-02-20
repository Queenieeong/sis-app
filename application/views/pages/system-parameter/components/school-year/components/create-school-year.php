

<form method="post" action="<?php echo site_url('schoolYears/saveData'); ?>">
    <div class="modal-header">
        <h5 class="modal-title">Create New School Year</h5>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="">Date Start</label>
            <input type="date" class="form-control" id="date_start" name="date_start">
        </div>
        <div class="form-group">
            <label for="">Date End</label>
            <input type="date" class="form-control" id="date_end" name="date_end">
        </div>
		<div class="form-group">
			<label><input type="checkbox" id="is_current" name="is_current" checked> Is Current?</label>
		</div>
        <div class="form-group">
            <label for="">Remarks</label>
            <textarea type="text" class="form-control" id="description" name="description"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <a href="<?php echo site_url('schoolYears'); ?>" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
