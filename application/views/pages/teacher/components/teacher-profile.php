<div class="row">
	<div class="col-lg-3 text-center">
		<img src="<?php echo (!empty($details['profile_photo_filepath'])) ? $details['profile_photo_filepath'] : site_url('assets/img/default-user-image-male.png'); ?>" alt="" class="img-thumbnail" style="height: 200px; width: 300px; overflow: auto;">
		<?php echo form_open_multipart('teacher/upload_profile_picture/' . $teacherID, array()); ?>
			<div class="form-group row">
				<input type="file" name="userfile" size="20" style="margin-left: 15px; margin-top: 10px;">
			</div>
			<input type="submit" value="Change Profile Picture" class="btn btn-sm btn-primary btn-block">
		<?php echo form_close(); ?>
	</div>
	<div class="col-lg-9">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="classes-tab" data-toggle="tab" href="#classes" role="tab" aria-controls="classes" aria-selected="false">Classes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="account-settings-tab" data-toggle="tab" href="#account-settings" role="tab" aria-controls="account-settings" aria-selected="false">Account Settings</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="classes" role="tabpanel" aria-labelledby="classes-tab">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Student List</th>
								<th>Time Slot</th>
								<th>Days</th>
								<th>Subject</th>
								<th>Department - Grade Level - Section</th>
							</tr>
						</thead>
						<tbody>
							<?php if (count($classes) > 0) : ?>
							<?php foreach ($classes as $i => $class) : ?>
							<tr>
								<td><a href="<?php echo site_url('account/my_class/students/' . $class['id']); ?>">View List</a></td>
								<td><?php echo $class['timeSlot']; ?></td>
								<td><?php echo $class['days']; ?></td>
								<td><?php echo $class['subjectName']; ?></td>
								<td><?php echo $class['sdName'] . ' ' . $class['sglName'] . ' ' . $class['ssName']; ?></td>
							</tr>
							<?php endforeach; ?>
							<?php else : ?>
							<tr>
								<td colspan="6" class="text-center">No Classes Found.</td>
							</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<table class="table table-striped">
					<tr>
						<td>Fullname: </td>
						<td><?php echo $details['full_name']; ?></td>
					</tr>
					<tr>
						<td>Account Number:</td>
						<td><?php echo $details['teacher_number']; ?></td>
					</tr>
					<tr>
						<td>Telephone #:</td>
						<td><?php echo $details['telephone_number']; ?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?php echo $details['email_address']; ?></td>
					</tr>
					<tr>
						<td>Subject Specialization:</td>
						<td><?php echo implode(': ', array($details['school_grade_level_name'], $details['subject_name'])); ?></td>
					</tr>
					<!-- <tr>
						<td colspan="2"><?php // dump($details); ?></td>
					</tr> -->
				</table>
			</div>
			<div class="tab-pane fade" id="account-settings" role="tabpanel" aria-labelledby="account-settings-tab">
				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<td style="width: 150px;">Username:</td>
							<td><?php echo $user_account['username']; ?></td>
						</tr>
						<tr>
							<td style="width: 150px;">Email:</td>
							<td><?php echo $user_account['email']; ?></td>
						</tr>
						<tr>
							<td style="width: 150px;">Password:</td>
							<td><a href="<?php echo site_url('users/change_password/' . $user_account['id'] . '/teacher'); ?>">Change Password</a></td>
						</tr>
						<tr>
							<td style="width: 150px;">Status:</td>
							<td><?php echo $user_account['account_status']; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>