

<form method="post" action="<?php echo site_url('schoolSubjects/saveData'); ?>">
    <div class="modal-header">
        <h5 class="modal-title">Create New Subject</h5>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="">Grade Level</label>
			<select class="form-control" id="grade_level_id" name="grade_level_id">
				<option value="0">-- Select Grade Level --</option>
				<?php foreach ($gradeLevels as $item): ?>
				<option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
				<?php endforeach; ?>
			</select>
        </div>
        <div class="form-group">
            <label for="">Name</label>
			<input type="text" class="form-control" id="name" name="name" data-role="tagsinput">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
    </div>
    <div class="modal-footer">
        <a href="<?php echo site_url('schoolSubjects'); ?>" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
