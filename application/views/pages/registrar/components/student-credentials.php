<div class="row">
    <div class="col-lg-12">
    
        <form name="formOne" method="post" action="<?php echo site_url('student/credentials/' . $studentID); ?>">
            <h4><?php echo $studentDetails['student_fullname']; ?></h4><br>
            <div class="form-group row">
                <label class="col-sm-3">Select Credential Template</label>
                <div class="col-sm-9">
                    <select class="custom-select mr-sm-2" name="credentialTemplateID" id="credential-template">
                        <option value="" selected>-----</option>
                        <?php foreach($credentialTemplates as $item): ?>
                        <option value="<?php echo $item['id']; ?>" <?php echo (isset($selected) && $selected === $item['id']) ? 'selected' : ''; ?> ><?php echo $item['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" value="chooseCredentialTemplate" name="mode">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center text-danger">&check;</th>
                        <th>Credentials</th>
                        <th>Description</th>
                        <th>Format</th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <form action="<?php echo site_url('student/credentials/' . $studentID); ?>" method="post">
                <tbody>

                    <?php if (isset($templateRequirements)): ?>
                    <?php foreach($templateRequirements as $item): ?>
                    <tr>
                        <td class="text-center"><input type="checkbox" onclick="handleClick(<?php echo $item['credential_id']; ?>)" name="credential[<?php echo $item['credential_id']; ?>]" value="<?php echo $item['credential_id']; ?>"></td>
                        <td><?php echo $item['credentialName']; ?></td>
                        <td><?php echo $item['credentialDescription']; ?></td>
                        <td>
                            <select name="document_type[<?php echo $item['credential_id']; ?>]" id="combobox-<?php echo $item['credential_id']; ?>" class="form-control" disabled required>
                                <option value="">--</option>
                                <option value="1">PDF File</option>
                                <option value="2">Docx</option>
                                <option value="3">Hard Copy</option>
                            </select>
                        </td>
                        <td><textarea name="remarks[<?php echo $item['credential_id']; ?>]" cols="30" rows="2" id="txtArea-<?php echo $item['credential_id']; ?>" disabled></textarea></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr><td colspan="5" class="text-center">No Data Match Found</td></tr>
                    <?php endif; ?>

                </tbody>
                <?php if (isset($templateRequirements)): ?>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            
                            <input type="hidden" name="mode" value="submitCredential">
                            <input type="hidden" name="credential_template_id" value="<?php echo isset($selected)?$selected:''; ?>">

                            <button class="btn btn-primary btn-block">Submit</button>
                        </td>
                        
                    </tr>
                </tfoot>
                <?php endif; ?>

                </form>

            </table>
        <div style="margin-bottom: 100px;"></div>
    </div>
</div>


<script>
    $(document).ready(function() {
        
        var $credentialTemplate = $('#credential-template');

        $credentialTemplate.on('change', function(evt) {
            document.formOne.submit();
        });

        $('.birthdatepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
        
    });

    function handleClick (id) {
        document.getElementById('combobox-' + id).disabled = false;
        document.getElementById('txtArea-' + id).disabled = false;
    }

    

</script>