<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
        <h1 class="gl">
          Payment Voucher Status 
          <a class="pull-right" href="#" onclick="close_window();return false;"><button type="button" class="btn btn-red"><i class="fa fa-remove"></i> Close</button></a>
        </h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-body">
        <div class="well">
           <?php
              if ($head->total >= 50000000) {
                  if ($head->approve_status == 1) {
                    $bar =  ($head->approve_status*100)/4;
                  } else if ($head->approve_status == 2) {
                      $bar =  ($head->approve_status*100)/4;
                  } else if ($head->approve_status == 3) {
                      $bar =  ($head->approve_status*100)/4;
                  } else if ($head->approve_status == 4) {
                      $bar =  ($head->approve_status*100)/4 - 1; 
                  }else if ($head->approve_status == 0) {
                      $bar =  100;
                  }
               } else {
                  if ($head->approve_status == 1) {
                    $bar =  ($head->approve_status*100)/3;
                  } else if ($head->approve_status == 2) {
                      $bar =  ($head->approve_status*100)/3;
                  } else if ($head->approve_status == 3) {
                      $bar =  ($head->approve_status*100)/3 - 1;
                  }else if ($head->approve_status == 0) {
                      $bar =  100;
                  }
               }
              ?>
          <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $bar ?>%">
              <b><?php echo ceil($bar) ?>%</b>
            </div> 
          </div>
          <div class="text-center" style="color: blue;">
            <?php
              if ($head->approve_status == 0) {
                echo '<b>FINISHED</b>';
              } else {
                echo 'Wait For <b>'.strtoupper($head->username).'</b> Approving';
              }
              
            ?>
            
          </div>
        </div>
          <!-- HEADER -->
          <div class="row">
            <div  class="col-md-4">
              <label>VOUCHER NO.: </label><br>
                <?php echo $head->no_voucher ?>
            </div>

            <div class="col-md-4">
              <label>DATE: </label><br>
                <?php echo $head->date ?>
            </div>

            <div class="col-md-4">
              <label>BANK CODE: </label><br>
                <?php echo $head->bank_id ?>
            </div>       
          </div><br>
          
          <div class="row">
            <div class="col-md-12">
              <label>DESCRIPTION: </label><br>
               <?php echo $head->description ?>
            </div>       
          </div><br>

          <div class="row">
            <div class="col-md-4">
              <label>CURRENCY: </label><br>
                <?php echo $head->curr_id ?>
            </div>

            <div class="col-md-4">
              <label>TOTAL: </label><br>
                <?php echo number_format($head->total) ?>
            </div>

            <div class="col-md-4">
              <label>EXCHANGE RATE: </label><br>
                <?php echo $head->kurs ?>
            </div>       
          </div><br>

          <div class="row">
            <div class="col-md-4">
              <label>RECEIVE FROM: </label><br>
                <?php echo $head->receive_from ?>
            </div>

            <div class="col-md-4">
              <label>NO.CEK/GIRO: </label><br>
                <?php echo $head->no_cek ?>
            </div>

            <div class="col-md-4">
              <label>GL.DATE: </label><br>
                <?php echo $head->gl_date ?>
            </div>       
          </div><br>
<!-- END OF HEADER -->  
<!-- DETAIL -->
        <table class="table table-bordered" >
          <thead bgcolor="#99d6ff">
            <th width="120px" class="text-center">ACCOUNT NO.</th>
            <th class="text-center" >DESCRIPTION</th>
            <th width="200px" class="text-right">DEBIT</th>
            <th width="200px" class="text-right">CREDIT</th>
          </thead>
          <tbody>
            <?php foreach ($det as $d) {?>
            <tr>
              <td class="text-center" ><?php echo $d->coa_id ?></td>
              <td><?php echo $d->name_coa ?></td>
              <td align="right"><?php echo number_format($d->debit) ?></td>
              <td align="right"><?php echo number_format($d->credit) ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table><hr>
<!-- END OF DETAIL -->
        <fieldset class="groupbox-border">
            <legend class="groupbox-border" style="color: red">NOTED</legend>
            <div class="control-group">
              <table>
                <?php foreach ($suggest as $s) { ?>
                  <tr>
                    <td style="color: red">&#10004;  </td>
                    <td> <i>Requested by  </i> </td>
                    <th> <?php echo $s->username ?></th>
                    <td> - <?php echo $s->suggest ?>.</td>
                  </tr>
                <?php } ?>
              </table>
            </div>
        </fieldset>
      </div>
    </div>
    


  </section>
</div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<style type="text/css">
.gl{
  font-family: Courier, monospace;
  font-size: 30pt;
}
fieldset.groupbox-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 1.2em 1.2em 1.2em 1.2em !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
    box-shadow:  0px 0px 0px 0px #000;
}

legend.groupbox-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    width:auto;
    padding:0px 10px 0px 10px;
    border-bottom:none;
    
}
</style>
<script type="text/javascript">
  function close_window() {
  if (confirm("Close this tab?")) {
    close();
  }
}
</script>