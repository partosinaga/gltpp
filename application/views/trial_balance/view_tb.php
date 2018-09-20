<!DOCTYPE html>
<html>
<head>
  <title>TPP | Trial Balance</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="<?php echo base_url(); ?>resource/trial_balance.css" rel="stylesheet" type="text/css"/>
  <!-- <link href="<?php echo base_url(); ?>resource/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/> -->
 <!--  <script src="<?php echo base_url(); ?>resource/global/plugins/jquery.min.js" type="text/javascript"></script> -->
<script>
  function printContent(el){
      var restorepage = document.body.innerHTML;
      var printcontent = document.getElementById(el).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
  }
</script>
  <?php
    $sql ="SELECT * FROM system_parameter";
     $query = $this->db->query($sql);
      if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
  ?> 
  <?php } } ?>
</head>
<div class="dropdown" style="position: fixed;">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-magic"></i> Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li ><a href="#" onclick="printContent('div1')"><i class="fa fa-print"></i> Print</a></li>
    <li ><a target="_blank" href=""><i class="fa fa-file-excel-o"></i> Export to Excel</a></li>
  </ul>
</div>
<body>
  <div id="div1">
    <div>  
      <table style="width:100%;" >
        <tr>
            <p align="center" style="font-size:14pt;" ><?php echo strtoupper($row->name); ?></p>
            <p align="center" style="font-size:14pt ">TRIAL BALANCE</p>
            <p class="text-center" style="font-size:10pt ">Date : 
            <?php 
              $per = New DateTime($period);
              echo $per->format('M-Y')
            ?>
          </p>
        </tr>
      </table>
    </div>

    <div id="body">
      <i align="right">IDR</i>
      <table class="table-hover " id="category" >
        <thead>
          <tr >
            <th rowspan="2" width="10px" class="va" >#</th>
            <th rowspan="2" width="100px" class="va" >ACCOUNT NO.</th>
            <th rowspan="2" >DESCRIPTION</th>
            <th colspan="2" >BEGINNING</th>
            <th colspan="2" >MUTATION</th>
            <th colspan="2" >ENDING</th>
          </tr>
          <tr>
            <th width="150px" class="text-center">DEBIT</th>
            <th width="150px" class="text-center">CREDIT</th>
            <th width="150px" class="text-center">DEBIT</th>
            <th width="150px" class="text-center">CREDIT</th>
            <th width="150px" class="text-center">DEBIT</th>
            <th width="150px" class="text-center">CREDIT</th>
          </tr>
        </thead>

        <tbody class="table-body">
          <?php
            // $t_begin = get from controller
            // $t_mutasi =  get from controller
            $no=1;
            $bgc='';
            foreach ($begining as $b) {
              foreach ($mutasi as $m) {
                if ($m->coa_id == $b->coa_id) {
                  break;
                }
              }
            
          ?>
            <tr>
              <td align="center"><?php echo $no++ ?></td>
              <td align="center">
                <?php 
                  if ($t_begin > $t_mutasi) {
                    echo $b->coa_id;
                  }else{
                    echo $m->coa_id;
                  }
                ?>
              </td>

              <td>
                <?php 
                  if ($t_begin > $t_mutasi) {
                    echo $b->name_coa;
                  }else{
                    echo $m->name_coa;
                  }
                ?>
              </td>

              <td align="right" class="d_begin"><?php echo number_format($b->d_begin) ?></td>

              <td align="right" class="c_begin"><?php echo number_format($b->c_begin) ?></td>

              <td align="right">
                <?php
                  if ($b->coa_id==$m->coa_id) {
                    echo number_format($m->d_mutasi);
                  }else{
                    echo 0;
                  }
                ?>
              </td>
              <td align="right">
                <?php
                  if ($b->coa_id==$m->coa_id) {
                    echo number_format($m->c_mutasi);
                  }else{
                    echo 0;
                  }
                ?>
              </td>
              <td align="right">
                <?php
                  if ($b->coa_id==$m->coa_id) {
                    $d_ending = $b->d_begin - $m->d_mutasi;
                    echo number_format($d_ending);
                  } else {
                    echo number_format($b->d_begin);
                  }
                ?>
              </td>
              <td align="right">
                <?php
                  if ($b->coa_id==$m->coa_id) {
                    $c_ending = $b->c_begin - $m->c_mutasi;
                    echo number_format($c_ending);
                  }else{
                    echo number_format($b->c_begin);
                  }
                ?>
              </td>

            </tr>


          <?php  } ?>
        </tbody>
        <tfoot>
          <th colspan="3">TOTAL</th>
          <th id="demo"></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tfoot>
      </table>

<a id="back-to-top" href="#" class=" btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

    </div>
  </div>
</body>
</html>
<i class="pull-right"><?php echo 'Page render time:' .$this->benchmark->elapsed_time('code_start', 'code_end'); ?></i>
<style type="text/css">
  tr:nth-child(even) {background: #f4f4f4}
  tr:nth-child(odd) {background: #FFF}

.back-to-top {
  cursor: pointer;
  position: fixed;
  bottom: 20px;
  right: 20px;
  display:none;
}
</style>
<script type="text/javascript">
  $(document).ready(function(){
     $(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
          $('#back-to-top').fadeIn();
      } else {
          $('#back-to-top').fadeOut();
      }
  });
  // scroll body to 0px on click
  $('#back-to-top').click(function () {
      $('#back-to-top').tooltip('hide');
      $('body,html').animate({
          scrollTop: 0
      }, 800);
      return false;
  });
  
  $('#back-to-top').tooltip('show');

});
</script>