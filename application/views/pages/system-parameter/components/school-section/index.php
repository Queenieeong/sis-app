<div class="row">
    <div class="col-sm-3">
        <button type="button" class="btn btn-raised btn-primary" data-toggle="modal" data-target="#createNewSection">Create New Section</button>
        <div class="modal fade" id="createNewSection" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content"><?php $this->load->view($modalContent); ?></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-10">
        <div class="card">
            <div class="card-body">
                <table id="example" class="table" style="width:100%; height: 20%">
                    <thead>
                        <tr>
                            <?php foreach($columnsRows as $cell): ?><th><?php echo $cell['header']; ?></th><?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $check = false;foreach($sections as $item): ?>
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
	<div class="col-sm-2">
		<div class="card">
		<div class="card-header bg-primary">GRADE LEVELS</div>
		<div class="list-group">
			<?php foreach ($gradeLevels as $item): ?>
			<a class="list-group-item list-group-item-action"><?php echo $item['name']; ?></a>
			<?php endforeach; ?>
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
