<div class="row">
    <div class="col-lg-12">
        <form action="<?php echo site_url('announcements/edit/'.$announcementID); ?>" method="post" class="form-horizontal">
            <div class="form-group row">
                <label for="" class="col-sm-2">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $details['title']; ?>" disabled>
                    <div class="text-danger"><?php echo form_error('title'); ?></div>                    
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2">Message</label>
                <div class="col-sm-10">
                    <textarea  class="form-control" id="message" name="message"><?php echo $details['message']; ?></textarea>
                    <div class="text-danger"><?php echo form_error('message'); ?></div>                    
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2">Date Start</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="date_start" name="date_start" value="<?php echo $details['date_start']; ?>">
                    <div class="text-danger"><?php echo form_error('date_start'); ?></div>                    
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2">Date End</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="date_end" name="date_end" value="<?php echo $details['date_end']; ?>">
                    <div class="text-danger"><?php echo form_error('date_end'); ?></div>                    
                </div>
            </div>
            <div class="form-group row">
                <div class=" offset-2 col-sm-10">
                    <button type="submit" class="btn btn-block btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>