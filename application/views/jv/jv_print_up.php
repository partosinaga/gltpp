<!DOCTYPE html>
<html>
<head>
  <title>PRINT | Journal Voucher</title>
  <style type="text/css">
      table {
          border-collapse: collapse;
      }

      table, td, th {
          border: 1px solid black;
      }
      body {
        background-color: #fff;
        margin: 15px 15px 15px 15px;
        font: 11px normal Helvetica, Arial, sans-serif;
        color: #000000;
      }
    </style>
</head>
  <body onload="window.print();"  >      
  <table width="100%">
    <tr>
      <td colspan="7" align="center" style="font-size: 12pt"><b>JOURNAL VOUCHER</b></td> 
    </tr>

    <tr>
      <td width="250px;" align="center" ><b>VOUCHER NO.</b></td>  
      <td width="150pxpx">
        <?php foreach ($header as $h) {
          echo $h->no_voucher;
        } ?>
      </td>  
      <td width="90px;" align="center"><b>DATE</td>  
      <td width="200pxpx" >
        <?php foreach ($header as $h) {
          $date = new DateTime($h->date);
          echo $date->format('d-m-Y');
        } ?>
      </td>  
      <td align="center" colspan="3" width="300px"><b>
        <?php foreach ($syspar as $s) {
          echo strtoupper($s->name); 
        } ?>
      </td>  
    </tr>

    <tr>
      <td rowspan="2" align="center" ><b>ACCOUNT CODE</b></td>  
      <td rowspan="2" colspan="3" align="center"><b>ACCOUNT</b></td>  
      <td colspan="3" align="center"><b>AMMOUNT</b></td>  
    </tr>
    <tr>
      <td align="center" width="50px"><b>DEPT.</b></td>  
      <td align="center" width="170px"><b>DEBIT</b></td>  
      <td align="center" width="170px"><b>CREDIT</b></td>  

    </tr>
    <?php
      foreach ($detail as $d) {?>
    <tr>
      <td> <?php echo $d->coa_id ?> </td>  
      <td colspan="3"> <?php echo $d->name_coa ?> </td>  
      <TD>  </td>  
      <td align="right"> <?php echo number_format($d->debit) ?> </td>  
      <td align="right"> <?php echo number_format($d->credit) ?> </td>  
    
    </tr>
    <?php } ?>
    <tr><b>
      <td colspan="5" align="center" >TOTAL</td>    
      <td align="right">
        <?php foreach ($totalDetail as $td) {
          echo number_format($td->total_debit);
        } ?>
      </td>  
      <td align="right">
        <?php foreach ($totalDetail as $td) {
          echo number_format($td->total_credit);
        } ?>
      </td>  
    </tr></b>
  </table><br>

  <table width="100%">
  <tr>
    <th width="155px;"><B>CHEQUE/BG.NUMBER</B></th>
    <th width="709px" align="center"><B>DESCRIPTION</B></th>
    <th width="158px" align="center"  ><B>AMOUNT</B></th>
  </tr>
  <tr>
    <td height="50px">
      <?php foreach ($header as $h) {
          echo $h->no_cek;
        } ?>
    </td>
    <td height="50px">
       <?php foreach ($header as $h) {
          echo $h->description;
        } ?>
    </td>
    <td align="right"  height="50px">
      <?php foreach ($header as $h) {
          echo number_format((float)$h->total);
        } ?>
    </td>
  
  </tr>
  <tr>
    <td align="right" colspan="2"><B>TOTAL</td>
    
    <td align="right">
      <?php foreach ($header as $h) {
           echo number_format((float)$h->total);
        } ?>
    </td>
  </tr>
   <tr>
        <td colspan="3">
          <b>TERBILANG:</b> <?php echo $terbilang->terb; ?> Rupiah
        </td>
      </tr>
  </table><br>

  <table width="100%">
    <tr>
      <th align="center" width="360px"><b>RECEIVE FROM</b></th>
        <th align="center"  width="360px" ><b>RECEIVE BY</b></th>
    </tr>
    <tr>
      <td>
         <?php foreach ($header as $h) {
          echo $h->receive_from;
        } ?>
      </td >
      <?php
        $tgl=date("Y");
      ?>
      <td align="center"><br><br>
      ________________________ Date: _____/_____/<?php echo $tgl; ?></td>
    </tr>
  </table><br>

  <table class="table" bordercolor="black" width="100%" border="1">
      <tr>
        <th align="center" width="25%" ><B> PEREPARED BY</th>
        <th align="center" width="25%" ><B>CHECKED BY</th>
        <th colspan="2" align="center" width="25%"><B>APPROVALS</th>
      </tr>
      <tr align="center">
          <td height="50px" ><br>
            ________________________ <br>
          </td>
		  <td height="50px" ><br>
            ________________________ <br>
          </td>
		  <td height="50px" ><br>
            ________________________ <br>
          </td>
		  <td height="50px" ><br>
            ________________________ <br>
          </td>
      </tr>
    </table>
</body>
</html>
