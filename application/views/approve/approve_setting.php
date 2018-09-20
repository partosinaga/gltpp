    
<div class="container">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<small>Approval</small>
			<small>Settings</small>
		</h1>
	</section>
	<section class="content">
		<div class="box box-success">
			<div class="box-header witd-border">
				<h3 class="box-title">
					<i class="fa fa-envelope"></i> Voucher Approval Priority
				</h3>
			</div>
			<div class="box-body">
				<div style="opacity: 0.5; font-color: black" class="alert alert-info">
					<font color="black">Number one always first priority</font>
				</div>
				<table class="table table-striped table-bordered">
					<?php foreach ($user as $u) { ?>



						<td bgcolor="#F2784B" width="10px">
							<div class="btn-group">
								<button title="Action" class="btn yellow-casablanca dropdown-toggle " data-toggle="dropdown">
									 <?php echo $u->order ?>
									<i class="fa fa-angle-down"></i>
								</button>
								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo site_url('/approve/approve/delete?id=').$u->order ?>">
											<i class="fa fa-remove"></i> Delete 
										</a>
									</li>
								</ul>
							</div>
						</td>
					<td>
						<b>
							<?php echo $u->username ?>
						</b>
						<br>
						<i style="font-size: 10pt">
							<?php echo $u->email ?>
						</i><br>
						<i style="font-size: 9pt; color:red">
							<?php if ($u->role == 'x') {
								echo 'Approve Trx Amount > 50.000.000';
							}  ?>
						</i>
					</td>
						<?php } ?>
						<td width="20px">
							<div class="btn-group">
								<button title="Action" class="btn red dropdown-toggle " data-toggle="dropdown">
									<i class="angle-down fa fa-cogs"></i>
									<i class="fa fa-angle-down"></i>
								</button>
								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo site_url().'/approve/approve/add' ?>">
											<i class="fa fa-plus"></i> Add 
										</a>
									</li>
									<li>
										<a href="<?php echo site_url().'/approve/approve/edit' ?>">
											<i class="fa fa-edit"></i> Edit 
										</a>
									</li>
								</ul>
							</div>
						</td>

				</table>
			</div>
		</div>
	</section>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

