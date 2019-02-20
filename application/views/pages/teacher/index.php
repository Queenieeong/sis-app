<div class="row">
    <div class="col-sm-12">
        <a href="<?php echo site_url('teacher/add'); ?>" class="btn btn-primary">Add New Teacher</a>
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
                            <?php foreach($columnsRows as $cell): ?><th><?php echo $cell['header']; ?></th><?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($teachers as $item): ?>
                        <tr>
                            <?php foreach($columnsRows as $cell): ?>
                                <td><?php echo $item[$cell['data']]; ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <?php foreach($columnsRows as $cell): ?><th><?php echo $cell['header']; ?></th><?php endforeach; ?>
                        </tr>
                    </tfoot>
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