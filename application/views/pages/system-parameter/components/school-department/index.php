<div class="row">
    <div class="col-sm-3">
        <button type="button" class="btn btn-raised btn-primary" data-toggle="modal" data-target="#createNewDepartment">Create New Department</button>
        <div class="modal fade" id="createNewDepartment" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content"><?php $this->load->view($modalContent); ?></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-striped table-sm" style="width:100%; height: 20%">
                    <thead>
                        <tr>
                            <?php foreach($columnsRows as $cell): ?><th><?php echo $cell['header']; ?></th><?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($departments as $item): ?>
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
        // toastr.options = {
        //     "positionClass": "toast-top-right",
        //     "onclick": null,
        //     "showDuration": "300",
        //     "hideDuration": "1000",
        //     "timeOut": "5000",
        //     "extendedTimeOut": "1000",
        //     "showEasing": "swing",
        //     "hideEasing": "linear",
        //     "showMethod": "fadeIn",
        //     "hideMethod": "fadeOut"
        // }
        // toastr.success('Are you the 6 fingered man?')
        $('#example').DataTable({
            "scrollY":        "300px",
            "scrollCollapse": true,
            "paging":         true
        });
    });
</script>