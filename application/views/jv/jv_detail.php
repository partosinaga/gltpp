<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
        <h1 class="gl">
         Approve Journal Voucher
        </h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-search"></i> Journal Voucher Detail</h3>
      </div>
      <div class="box-body">
<!-- HEADER -->
        <div class="row">
          <div class="col-md-4">
            <label>VOUCHER NO.: </label><br>
              <?php echo $trx->no_voucher ?>
          </div>

          <div class="col-md-4">
            <label>DATE: </label><br>
              <?php echo $trx->date ?>
          </div>

          <div class="col-md-4">
            <label>BANK CODE: </label><br>
              <?php echo $trx->bank_id ?>
          </div>       
        </div><br>
        
        <div class="row">
          <div class="col-md-12">
            <label>DESCRIPTION: </label><br>
             <?php echo $trx->description ?>
          </div>       
        </div><br>

        <div class="row">
          <div class="col-md-4">
            <label>CURRENCY: </label><br>
              <?php echo $trx->curr_id ?>
          </div>

          <div class="col-md-4">
            <label>TOTAL: </label><br>
              <?php echo number_format($trx->total) ?>
          </div>

          <div class="col-md-4">
            <label>EXCHANGE RATE: </label><br>
              <?php echo $trx->kurs ?>
          </div>       
        </div><br>

        <div class="row">
          <div class="col-md-4">
            <label>RECEIVE FROM: </label><br>
              <?php echo $trx->receive_from ?>
          </div>

          <div class="col-md-4">
            <label>NO.CEK/GIRO: </label><br>
              <?php echo $trx->no_cek ?>
          </div>

          <div class="col-md-4">
            <label>GL.DATE: </label><br>
              <?php echo $trx->gl_date ?>
          </div>       
        </div><br>
<!-- END OF HEADER -->
<!-- DETAIL -->
        <table class="table table-bordered">
          <thead bgcolor="#E1E5EC">
            <th width="120px" class="text-center">ACCOUNT NO.</th>
            <th class="text-center" >DESCRIPTION</th>
            <th width="200px" class="text-right">DEBIT</th>
            <th width="200px" class="text-center">CREDIT</th>
          </thead>
          <tbody>
            <?php foreach ($dtl as $d) {?>
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
<!-- APPROVE/NO -->

        <table class="table table-bordered">
          <thead >
            <th bgcolor="#D05454"  width="50%" class="text-center">SUGGESTION?</th>
            <th bgcolor="#26C281" class="text-center">APPROVE!</th>
          </thead>
          <tbody>
            <tr>
              <td>
                <form method="POST" action="<?php echo site_url().'/jv/approve/jv_suggest' ?>">
                  <input type="hidden" name="no_voucher" value="<?php echo $trx->no_voucher ?>">
                  <textarea class="form-control" name="suggest" placeholder="Enter your suggestion" ></textarea> <br>
                  <button type="submit" style="background-color:#D05454; color: black" class="btn  pull-right" name="save"><i class="fa fa-save" ></i> Submit</button>
                </form>
                  <br><br>
                  <p><i class="fa fa-warning"></i> This voucher will not be posted to the next person until <b>APPROVAL</b> is done.<br>Make sure to <b>APPROVE</b> it back in case there's suggestion</p>
              </td>

              <td>
                <div align="center">
                  <p><i class="fa fa-check"></i> Voucher will be posted after <b>APPROVAL</b> is done!</p>
                  <a href="<?php echo site_url().'/jv/approve/jv_accept?id='.$trx->no_voucher.'&total='.$trx->total ?>">
                    <button type="submit" style="background-color:#26C281; color: black"  class="btn center" name="save"><i class="fa fa-check" ></i> APPROVE !</button>
                  </a>
                </div>
              </td>


            </tr>
          </tbody>
        </table>
<!-- END OF APPROVE/NO -->

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
</style>