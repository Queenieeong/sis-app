<div class="row">
    <div class="col-sm-3">
        <a href="<?php echo site_url('scheduling/create'); ?>" class="btn btn-raised btn-primary">Create New Master Schedule</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <?php foreach($columnsRows as $cell): ?><th class="<?php echo $cell['alignment']; ?>"><?php echo $cell['header']; ?></th><?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($scheduleMasters as $item): ?>
                        <tr>
                            <?php foreach($columnsRows as $cell): ?>
                                <td class="<?php echo $cell['alignment']; ?>"><?php echo $item[$cell['data']]; ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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