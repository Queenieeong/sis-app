<div class="row">
    <div class="col-lg-3">
        <img src="<?php echo site_url('assets/img/sample-profile-image.jpg'); ?>" alt="" class="img-thumbnail" style="height: 200px; width: 300px; overflow: auto;">
        <h1>Hello <?php echo $details['fullname']; ?></h1>
    </div>
    <div class="col-lg-9">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="news-tab" data-toggle="tab" href="#news" role="tab" aria-controls="news" aria-selected="false">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="announcements-tab" data-toggle="tab" href="#announcements" role="tab" aria-controls="announcements" aria-selected="false">Announcements</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <table class="table table-striped">
                    <tr>
                        <td>Fullname: </td>
                        <td><?php echo $details['fullname']; ?></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><?php echo $details['username']; ?></td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                        <td><?php echo $details['email']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">News</div>
            <div class="tab-pane fade" id="announcements" role="tabpanel" aria-labelledby="announcements-tab">Announcements</div>
            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">Settings</div>
        </div>
    </div>
</div>