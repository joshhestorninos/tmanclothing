<?php
include 'includes/session.php';
$sql = "SELECT *,p.id as part_id FROM performance p LEFT JOIN position po ON po.id = p.position_id LEFT JOIN employees e ON e.position_id = po.id WHERE e.id = {$_POST['id']}";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    ?>
    <div class = "form-group">
        <label for = "title" class = "col-sm-3 control-label"><?= $row['Part'] ?></label>
        <div class = "col-sm-9">
            <input type = "hidden" class = "form-control" id = "title" name = "part[]" value = "<?= $row['part_id'] ?>"required>
        </div>
    </div>
    <div class="form-group">
        <label for="rate" class="col-sm-3 control-label">Rate</label>
        <div class="col-sm-9">
            <label for="rate" class="col-sm-3 control-label"><?= number_format($row['Rate'], 2) ?></label>
            <input type = "hidden" class = "form-control" id = "title" name = "rate[]" value = "<?= $row['Rate'] ?>"required>
        </div>
    </div>
    <div class="form-group">
        <label for="rate" class="col-sm-3 control-label">Pieces</label>
        <div class="col-sm-9">
            <input type = "text" class = "form-control" id = "title" name = "pcs[]" required>
        </div>
    </div>
<?php } ?>
