<p><?php echo lang('create_user_subheading');?></p>

<!-- <div id="infoMessage" class="text-danger"><?php //echo $message;?></div> -->

<?php echo form_open("users/create_user");?>

      <div class="form-group">
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
            <div class="text-danger"><?php echo form_error('first_name'); ?></div>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
            <div class="text-danger"><?php echo form_error('last_name'); ?></div>
      </div>
      
      <?php
      if($identity_column!=='email') {
          echo '<div class="form-group">';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_input($identity);
          echo '<div class="text-danger">'. form_error('identity') . '</div>';
          echo '</div>';
      }
      ?>

      <div class="form-group">
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
            <div class="text-danger"><?php echo form_error('company'); ?></div>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
            <div class="text-danger"><?php echo form_error('email'); ?></div>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
            <div class="text-danger"><?php echo form_error('phone'); ?></div>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
            <div class="text-danger"><?php echo form_error('password'); ?></div>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
            <div class="text-danger"><?php echo form_error('password_confirm'); ?></div>
      </div>
      <h5>Select User Group</h5>
      <div class="form-group">
      	<?php foreach($groups as $group): ?>
      	    <input type="radio" name="groups[]" value="<?php echo $group->id; ?>">
      	    <?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'); ?>
      	<?php endforeach; ?>
      </div>

      <div class="form-group"><?php echo form_submit('submit', lang('create_user_submit_btn'), array('class' => 'btn btn-primary btn-block'));?></div>

<?php echo form_close();?>
