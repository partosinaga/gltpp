<!DOCTYPE html>
<html>
<head>
  <title>PRINT | Receipt Voucher</title>
    <style type="text/css">
      table {
          border-collapse: collapse;
      }

      table, td, th {
          border: 1px solid black;
      }
      .ehe{
        border: 0px;
      }
      body {
        background-color: #fff;
        margin: 15px 15px 15px 15px;
        font: 11px normal Helvetica, Arial, sans-serif;
        color: #000000;
      }
    </style>
</head>
<!--onload="window.print();" -->
  <body onload="window.print();">  
  <table width="100%">
    <tr class="ehe">
      <td colspan="3" class="ehe" >  
        <h3>PT PAKUBUWONO PROPERTI </h3>
      </td>
      <td colspan="3" class="ehe" >
        <h3 align="right">RECEIPT VOUCHER</h3> 
      </td>
    </tr>

    <tr>
      <th width="17%" align="left" >NO</th>
      <td width="17%" >
        
        <?php foreach ($header as $h) {
          echo $h->no_voucher;
        } ?>
      </td>
      <th width="17%" align="left" >BG / C</th>
      <td width="17%" ></td>
      <th width="17%" align="left" >GL</th>
      <td width="17%"></td>
    </tr>

    <tr>
      <th align="left" >TANGGAL</th>
      <td>
         <?php foreach ($header as $h) {
          $date = new DateTime($h->date);
          echo $date->format('d-m-Y');
        } ?>
      </td>
      <th  align="left" >TANGGAL</th>
      <td>
      </td>
      <th  align="left" >TANGGAL</th>
      <td></td>
    </tr>
  </table><br>


  <table width="100%">
    <tr>
      <th  align="left" width="17%">KEPADA</th>
      <td width="51%" colspan="2">
        <?php foreach ($header as $h) {
          echo $h->name;
        } ?>
      </td>
      <th width="17%">PENERIMA</th>
      <th width="15%">TANGGAL</th>
    </tr>
    <tr>
      <th  align="left">JUMLAH</th>
      <td width="5%">IDR</td>
      <td>
        <?php foreach ($header as $h) {
          echo number_format($h->total);
        } ?>
      </td>
      <td rowspan="2"></td>
      <td rowspan="2"></td>
    </tr>
    <tr>
      <th height="50px" style="text-align: left;vertical-align: top">KETERANGAN</th>
      <td colspan="2"  style="text-align: left;vertical-align: top">
        <?php foreach ($header as $h) {
          echo $h->description;
        } ?>
      </td>
    </tr>
  </table><br>






<table width="100%">
    <tr>
      <th width="17%"  >NO PERKIRAAN</th>
      <th width="34%" colspan="2" >PERKIRAAN</th>
      <th width="17%" >DEBIT</th>
      <th width="17%" >CREDIT</th>
      <th width="17%" >KETERANGAN</th>
    </tr>
     <?php
      foreach ($detail as $d) { 
     ?>
      <tr>
        <td style="border: none !important; border-right: solid 1px black !important;" align="center"><?php echo $d->coa_id ?></td>
        <td style="border: none !important; border-right: solid 1px black !important;" colspan="2"><?php echo $d->name_coa ?></td>
        <td style="border: none !important; border-right: solid 1px black !important;" align="right"><?php echo number_format($d->debit) ?></td>
        <td style="border: none !important; border-right: solid 1px black !important;" align="right"><?php echo number_format($d->credit) ?></td>
        <td class="ehe"></td>
      </tr>
    <?php } ?>
    <tr>
      <th colspan="3">JUMLAH</th>
      <td align="right">
        <?php foreach ($totalDetail as $td) {
          echo number_format($td->total_debit);
        } ?>
      </td>
      <td align="right">
        <?php foreach ($totalDetail as $h) {
          echo number_format ($td->total_credit);
        } ?>
      </td>
      <td></td>
    </tr>
  </table><br>






  <table class="table" bordercolor="black" width="100%" border="1">
      <tr>
        <th align="center" width="32%" ><B> DISIAPKAN</th>
        <th width="36%" align="center"><B>DIPERIKSA</th>
        <th align="center" width="32%"><B>DISETUJUI</th>
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
        
      </tr>
    </table>
</body>
</html>