<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Record</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="sample_add.php">
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Employee</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="employee"name="employee" required>
							<option></option>
                                <?php
                                $sql = "SELECT * FROM employees";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    echo"<option value='{$row['id']}'>{$row['firstname']} {$row['lastname']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date</label>

                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                    </div>
                    <div id="ajax_result">

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Update Record</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="sample_edit.php">
                    <input type="hidden" id="posid" name="id">
                    <div class="form-group">
                        <label for="edit_title" class="col-sm-3 control-label">Position Title</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_title" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_rate" class="col-sm-3 control-label">Rate</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_rate" name="rate">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="sample_delete.php">
                    <input type="hidden" id="del_posid" name="id">
                    <div class="text-center">
                        <p>DELETE POSITION</p>
                        <h2 id="del_position" class="bold"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#employee').change(function () {
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'sample_ajax.php',
            data: {id: id},
           
            success: function (response) {
                $('#ajax_result').html(response);
            }
        });
    });
</script>

