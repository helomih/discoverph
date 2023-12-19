<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `payments` where id = '{$_GET['id']}' and delete_flag = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
?>
		<center>Unknown Category</center>
		<style>
			#uni_modal .modal-footer{
				display:none
			}
		</style>
		<div class="text-right">
			<button class="btn btndefault bg-gradient-dark btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
		</div>
		<?php
		exit;
		}
}
?>
<style>
	#uni_modal .modal-footer{
		display:none
	}

	.close-btn {
        background-color: #6c757d;
        color: #fff;
        border: 1px solid #6c757d;
    }
</style>
<div class="container-fluid">
	<dl>
        <dt class="text-muted">Payment Method</dt>
        <dd class="pl-3"><?= isset($name) ? $name : "" ?></dd>
        <dt class="text-muted">Details</dt>
        <dd class="pl-3"><?= isset($description) ? $description : "" ?></dd>
		<dt class="text-muted">Image Location</dt>
        <dd class="pl-3"><?= isset($qr_code) ? $qr_code : "" ?></dd>
		<dt class="text-muted">Uploaded Image</dt>
		<dd class="pl-3">
			<?php if (isset($qr_code) && !empty($qr_code)): ?>
				<img src="<?= validate_image($qr_code) ?>" alt="QR Code" class="border border-gray img-thumbnail">
			<?php else: ?>
				<img src="../uploads/qr/sample.jpg" alt="Placeholder" class="border border-gray img-thumbnail">
			<?php endif; ?>
		</dd>
        <dt class="text-muted">Status</dt>
        <dd class="pl-3">
            <?php if($status == 1): ?>
                <span class="badge badge-success bg-gradient-success px-3 rounded-pill">Active</span>
            <?php else: ?>
                <span class="badge badge-danger bg-gradient-danger px-3 rounded-pill">Inactive</span>
            <?php endif; ?>
        </dd>
    </dl>
	<div class="clear-fix mb-3"></div>
	<div class="text-right">
		<button class="btn close-btn" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
	</div>
</div>