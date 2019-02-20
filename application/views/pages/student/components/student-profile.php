<div class="row">
    <div class="col-lg-3 text-center">
        <img src="<?php echo ( ! empty($details['profile_photo_filepath'])) ? $details['profile_photo_filepath'] : site_url('assets/img/default-user-image-male.png'); ?>" alt="" class="img-thumbnail" style="height: 200px; width: 300px; overflow: auto;">
        <?php echo form_open_multipart('students/do_upload/' . $studentID, array());?>
            <div class="form-group row">
                <input type="file" name="userfile" size="20" style="margin-left: 15px; margin-top: 10px;">
            </div>
            <input type="submit" value="Change Profile Picture" class="btn btn-sm btn-primary btn-block">
        <?php echo form_close(); ?>
    </div>
    <div class="col-lg-9">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
            </li>
       <!--      <li class="nav-item">
                <a class="nav-link" id="admission-tab" data-toggle="tab" href="#admission" role="tab" aria-controls="admission" aria-selected="false">Admission</a>
            </li> -->
    <!--         <li class="nav-item">
                <a class="nav-link" id="credentials-tab" data-toggle="tab" href="#credentials" role="tab" aria-controls="credentials" aria-selected="false">Credentials</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" id="account-settings-tab" data-toggle="tab" href="#account-settings" role="tab" aria-controls="account-settings" aria-selected="false">Account Settings</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <table class="table table-striped">
                    <tr>
                        <td style="width: 150px;">Fullname: </td>
                        <td><?php echo $details['student_fullname']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Account Number:</td>
                        <td><?php echo $details['student_number']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Telephone #:</td>
                        <td><?php echo $details['telephone_number']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Email</td>
                        <td><?php echo $details['email_address']; ?></td>
                    </tr>
                </table>
            </div>
            <!-- <div class="tab-pane fade" id="admission" role="tabpanel" aria-labelledby="admission-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>School Year: <span class="text-success"><?php echo $scheduleMaster['sYearName']; ?></span></th>
                            <th>Department: <span class="text-success"><?php echo $scheduleMaster['sDeptName']; ?></span></th>
                        </tr>
                        <tr>
                            <th>Grade Level: <span class="text-success"><?php echo $scheduleMaster['sGradeName']; ?></span></th>
                            <th>Section: <span class="text-success"><?php echo $scheduleMaster['sSectionName']; ?></span></th>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Time Slot</th>
                                <th>Day</th>
                                <th>Teacher</th>
                                <th>Room</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($scheduleClasses) > 0): ?>
                            <?php foreach($scheduleClasses as $row): ?>
                            <tr>
                                <td><?php echo $row['subjectName']; ?></td>
                                <td><?php echo $row['timeSlot']; ?></td>
                                <td><?php foreach($row['daysAsArray'] as $day){ echo $day . ', '; } ?></td>
                                <td>
                                    <a href="<?php echo site_url('teacher/details/' . $row['teacher_id']); ?>">
                                        <?php echo strtoupper(implode('', array($row['tlname'].', ', $row['tfname']))); ?>
                                    </a>
                                </td>
                                <td><?php echo $row['room_id']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr><td colspan="5" class="text-center">No Schedule Class Found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div> -->
            <div class="tab-pane fade" id="credentials" role="tabpanel" aria-labelledby="credentials-tab">
            
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Document Type</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if(count($credentials) > 0): ?>
                        <?php foreach($credentials as $item):
                        
                            $format[1] = 'PDF Format';
                            $format[2] = 'Docx Format';
                            $format[3] = 'Hard Copy';
                            
                            $credential_doc_type = $format[$item['document_type']];
                        ?>
                            <tr>
                                <td><?php echo $item['credential_name']; ?></td>
                                <td><?php echo $item['credential_description']; ?></td>
                                <td><?php echo $credential_doc_type; ?></td>
                                <td><?php echo $item['remarks']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                            <?php else: ?>
                            <tr><td colspan="5" class="text-center">No Credentials Found.</td></tr>
                            <?php endif; ?>
                        
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="account-settings" role="tabpanel" aria-labelledby="account-settings-tab">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <td style="width: 150px;">Username:</td>
                            <td><?php echo $student_account['username']; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px;">Email:</td>
                            <td><?php echo $student_account['email']; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px;">Password:</td>
                            <td><a href="<?php echo site_url('users/change_password/' . $student_account['id'] . '/students');?>">Change Password</a></td>
                        </tr>
                        <tr>
                            <td style="width: 150px;">Status:</td>
                            <td><?php echo $student_account['account_status']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>