

<form method="post" action="<?php echo site_url('schoolGradeLevels/saveData'); ?>">
    <div class="modal-header">
        <h5 class="modal-title">Create New Grade Level</h5>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="">Department</label>
			<select class="form-control" id="department_id" name="department_id">
				<option>-- Select Department --</option>
				<?php foreach ($departments as $item): ?>
				<option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
				<?php endforeach; ?>
			</select>
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="name" name="name" data-role="tagsinput">
        </div>
		<!-- <div class="form-group">
			<div class="switch">
				<label><input type="checkbox" id="active_status" name="active_status" checked> Active?</label>
			</div>
		</div> -->
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
    </div>
    <div class="modal-footer">
        <a href="<?php echo site_url('schoolGradeLevels'); ?>" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
