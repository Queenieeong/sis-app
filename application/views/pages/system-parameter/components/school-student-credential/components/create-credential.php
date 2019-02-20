<div class="row">
    <div class="col-lg-12">
        <form action="<?php echo site_url('credential/create'); ?>" method="post" class="form-horizontal">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Credential Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo set_value('name'); ?>">
                    <div class="text-danger"><?php echo form_error('name'); ?></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Credential Description</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="description" placeholder="Description"><?php echo set_value('description'); ?></textarea>
                    <div class="text-danger"><?php echo form_error('description'); ?></div>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-2 col-sm-10">
                    <button class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>