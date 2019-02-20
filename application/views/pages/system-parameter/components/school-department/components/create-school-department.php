

<form method="post" action="<?php echo site_url('schoolDepartments/saveData'); ?>">
    <div class="modal-header">
        <h5 class="modal-title">Create New Section</h5>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="">Code Name</label>
            <input type="text" class="form-control" id="code_name" name="code_name">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea type="text" class="form-control" id="description" name="description"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <a href="<?php echo site_url('schoolDepartments'); ?>" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
