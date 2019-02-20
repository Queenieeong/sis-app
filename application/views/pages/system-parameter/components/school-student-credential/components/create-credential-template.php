<div class="row">
    <div class="col-lg-12">
        <form action="<?php echo site_url('credential/createTemplate'); ?>" method="post" class="form-horizontal">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Credential Template Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo set_value('name'); ?>">
                    <div class="text-danger"><?php echo form_error('name'); ?></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Select Credentials</label>
                <div class="col-sm-10">
                    <?php foreach($credentials as $item): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="credential[<?php echo $item['id']?>]" value="<?php echo $item['id']; ?>">
                            <label class="form-check-label">
                                <?php echo $item['name'];?>
                            </label>
                        </div>
                    <?php endforeach; ?>
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

<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>