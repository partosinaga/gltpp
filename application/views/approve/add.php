    
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
					<i class="fa fa-plus"></i> Add Approval
				</h3>
			</div>
			<div class="box-body">


			<form method="POST" action="<?php echo site_url().'/approve/approve/save' ?>">
				<div class="col-md-2">
					<div class="form-group">
						<label>User</label>
						<div class="input-icon">
							<select class="form-control select2" name ="user_id" required="">
								<option value="" selected >Select Group Account </option>
								<?php
				          foreach ($user->result_array() as $data){
				            echo "
										<option value=". $data["user_id"]." >"
				              .$data["user_id"]. " - " .$data["username"]. 
				            "</option>";
				          }?>
							</select>
						</div>
					</div>
				</div> 

				<div class="col-md-2">
          <div class="form-group">
            <label for="form_control_1">Order Number</label>
             <div class="input-icon">
              <i class="fa fa-sort-numeric-asc font-green"></i>
              <input type="Number" name="order" class="form-control" placeholder="Order Number" 
              max="<?php echo $order->no ?>" required="">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="form_control_1">Approval Role</label>
             <div class="input-icon">
              <select class="form-control select2" name ="role" required="">
							<option value="" selected >Select Group Account </option>
								<option value="c">Common - All Transaction</option>
								<option value="x">Extra - Trx Amount > 50.000.000</option>
							<select>
            </div>
          </div>
        </div>




        <div class="col-md-2">
          <div class="form-group">
            <label for="form_control_1">&nbsp</label>
             <div >
              <i ></i>
              <button type="submit" class="btn green"><i class="fa fa-plus-square"> </i> Submit </button>
            </div>
          </div>
        </div>
			</form>


			</div>
		</div>
	</section>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

