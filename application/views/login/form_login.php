<html lang="en">

<?php
 $this->load->view('alert/alert');
    $sql ="SELECT * FROM system_parameter";
     $query = $this->db->query($sql);
      if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {?>
        <b value="<?php echo $row->company_id;?>">
<?php } } ?>
    <head>
        <meta charset="utf-8" />
        <title>LOGIN | TPP</title>
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>resource/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>resource/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>resource/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>resource/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>resource/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>resource/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>resource/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url() ?>resource/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>resource/pages/css/login-2.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <body class="login" >
        <div class="logo">
               <h3 class="font-black tittle"> <b><?php echo strtoupper( $row->name); ?> </b></h3>
        </div>
        <div class="content">
            <form class="login-form" action="<?php echo site_url('home/valid_login') ?>" method="post">
                <div class="form-title"  >
                    <span class="form-title" style="color: black" >Welcome,</span>
                    <span class="form-subtitle" style="color: black">please login to continue</span>
                </div>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input style="background-color: transparent ;color: black; border-color: #26C281;" class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> 
				</div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input style="background-color:transparent;color: black; border-color: #26C281" class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> 
				</div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-block uppercase" style="background-color: #26C281; color:black; border-color: #26C281"">Login</button>
                </div>
            </form>
			 <div class="copyright" style="color: black"> <?php echo date('Y') ?> © Monstera Inti Teknologi </div>
        </div>
    </body>
</html>
<style>
.login{
    background-image:url("<?php echo base_url() ?>resource/bann.jpg");
}
    
</style>