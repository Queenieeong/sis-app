<div class="row">
    <div class="col-sm-12">
       <!--  <a class="btn btn-sm btn-primary" href="<?php echo site_url('registrar/add'); ?>">Add New Student</a> -->
        <a class="btn btn-sm btn-info" href="#">Export Student List</a><br><br>
        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <?php foreach($columnsRows as $cell): ?><th colspan="<?php echo is_array($cell['data']) ? count($cell['data']) : 1; ?>" class="<?php echo $cell['alignment']; ?>"><?php echo $cell['header']; ?></th><?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($students as $item): ?>
                        <tr>
                            <?php foreach($columnsRows as $cell): ?>
                                <?php if(is_array($cell['data'])): ?>
                                <td class="<?php echo $cell['alignment']; ?>">
                                <?php foreach($cell['data'] as $cdItem): ?>
                                    <?php echo $item[$cdItem]; ?>
                                <?php endforeach; ?>
                                </td>
                                <?php else: ?>
                                    <td class="<?php echo $cell['alignment']; ?>"><?php echo $item[$cell['data']]; ?></td>
                                <?php endif; ?>
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