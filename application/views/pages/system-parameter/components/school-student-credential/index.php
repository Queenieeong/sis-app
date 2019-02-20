<div class="row">
    <div class="col-sm-12">
        <a href="<?php echo site_url('credential/create'); ?>" class="btn btn-primary">Add Credential</a>
        <a href="<?php echo site_url('credential/createTemplate'); ?>" class="btn btn-primary">Add Credential Template</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-5">
        <h5 class="card-title"><i class="fas fa-file"></i> Credentials Templates</h5>
        <div class="list-group list-group-flush">

            <?php if(count($credentialTemplates) > 0): ?>
            <?php foreach($credentialTemplates as $credentialTemplate): ?>
                <a href="#" data-toggle="modal" data-target="#modalCredentialTemplate-<?php echo md5($credentialTemplate['id']); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1"><?php echo $credentialTemplate['name']; ?></h6>
                        <small><?php echo date('M d, Y', strtotime($credentialTemplate['date_created'])); ?></small>
                    </div>
                    <p class="mb-1">No. of Required Credentials: <?php echo word_limiter($credentialTemplate['numberOfRequiredCredential'], 5); ?></p>
                    <!-- <small>Donec id elit non mi porta.</small> -->
                </a>

                <div class="modal fade" id="modalCredentialTemplate-<?php echo md5($credentialTemplate['id']); ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header"><h4 class="modal-title"><?php echo $credentialTemplate['name']; ?></h4></div>
                        <div class="modal-body">
                            <h5>List of Credentials</h5>
                            <ul>
                                <?php foreach($credentialTemplate['listOfCredentials'] as $credential): ?>
                                    <li><?php echo $credential['credentialName']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
            <h5>No Credential Found</h5>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-sm-7">
        <h5 class="card-title"><i class="fas fa-file"></i> Credentials</h5>
        <div class="list-group list-group-flush">

            <?php if(count($credentials) > 0): ?>
            <?php foreach($credentials as $item): ?>
                <a href="#" data-toggle="modal" data-target="#mdViewAnnouncement-<?php echo md5($item['id']); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1"><?php echo $item['name']; ?></h6>
                    <small><?php echo date('M d, Y', strtotime($item['date_created'])); ?></small>
                </div>
                <p class="mb-1"><?php echo word_limiter($item['description'], 5); ?></p>
                <!-- <small>Donec id elit non mi porta.</small> -->
                </a>

                <div class="modal fade" id="mdViewAnnouncement-<?php echo md5($item['id']); ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header"><h4 class="modal-title">Credential Details</h4></div>
                    <div class="modal-body">
                        <h5><?php echo $item['name']; ?></h5>
                        <p><?php echo $item['description']; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
            <h5>No Credential Found</h5>
            <?php endif; ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "scrollY":        "300px",
            "scrollCollapse": true,
            "paging":         true
        });
    });
</script>