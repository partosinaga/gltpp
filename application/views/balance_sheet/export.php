<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=BS-".$periode.".xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
<body>
  <div id="div1">
    <table>
        <tr>
          <td colspan="3" align="center"><b>TPP</b></td>
        </tr>
        <tr>
          <td colspan="3" align="center"><b>BALANCE SHEET</b></td>
        </tr>
        <tr>
          <td colspan="3" align="center"><b>
                  (Periode: <?php
                    $per = New DateTime($periode);
                    echo $per->format('M-Y');
                  ?>)</b>
          </td>
        </tr>
      </table>
   <hr class="style3">

    <div id="body">
      
      <table class="t_content">
        <thead>
          <tr >
            <th width=""></th>
            <th class="head_col">CURRENT MONTH<hr></th>
            <th class="head_col">PREVIOUS MONTH<hr></th>
          </tr>
        </thead>

        <tbody>
<!-- ASSETS -->
          <tr>
            <th class="group" >ASSETS</th>
            <td></td>
            <td></td>
          </tr>
            <?php
              $group='';
              $previous = 0;
              foreach ($bsheetA as $bs) { // GET EACH ROW
            

              foreach ($prev_month_asset as $pma) { //GET PREVIOUS MONTH
                if ($bs->coa_id == $pma->coa_id) { // TO GET PREVIOUS MONTH
                  $previous = $pma->asset_previous;
                  break;
                }else if (count($pma->coa_id) < count($bs->coa_id) ) {
                  $previous = 0;
                }
              };            
              
            ?>
            <?php          
              $result = '';
                if ($group != $bs->subgroup_id) {
                    $result .= '

                      <tr>
                        <td><b> '. strtoupper($bs->name_sg).' </b></td>
                        <td></td>
                        <td></td>
                      </tr>';
                      $group=$bs->subgroup_id;
                } else {
                    $result .= '';
                };
                $result .='
                     <tr >
                        <td style="padding-left: 4em">'.$bs->name_coa.'</td>
                        <td class="content" align="right">'.number_format($bs->asset_current).'</td>
                        <td class="content" align="right">'.number_format($previous).'</td>
                      </tr>';
                
              echo $result;
              
            ?>
          <?php  }; ?>
<!-- END OF ASSETS -->
          <tr>
            <td></td>
            <td><hr class="style1"></td>
            <td><hr class="style1"></td>
          </tr>
          <tr bgcolor="#f9f4f4">
            <th class="group" > TOTAL ASSETS </th>
            <td class="subgroup" align="right"><b> <?php echo number_format($total_asset->t_asset) ?> </b></td>
            <td class="subgroup" align="right"><b> <?php echo number_format($total_prev_asset->t_asset_prev) ?> </b></td>
          </tr>
          <tr>
            <td></td>
            <td><hr class="style1"></td>
            <td><hr class="style1"></td>
          </tr>
<!-- LIABILITIES -->
          <tr>
            <th class="group">LIABILITIES</th>
            <td></td>
            <td></td>
          </tr>
            <?php 
              $group='';
              $prv=0;
              foreach ($bsheetL as $bsl) {
                foreach ($prev_month_liab as $pml) {
                  if ($pml->coa_id == $bsl->coa_id) {
                      $prv = $pml->liabiliti_previous;
                      break;
                  } else {
                      $prv=0;
                  } 
                }
            ?>  
            <?php
              $result = '';

                    if ($group != $bsl->subgroup_id) {
                    $result .= '
                      <tr>
                        <td class="subgroup"><b> '. strtoupper($bsl->name_sg).' </b></td>
                        <td></td>
                        <td></td>
                      </tr>';
                    $group=$bsl->subgroup_id;
                    } else {
                      $result .= '';
                    };
                $result .='
                  <tr >
                    <td style="padding-left: 4em">'.$bsl->name_coa.'</td>
                    <td class="content" align="right">'.number_format($bsl->liabiliti_current).'</td>
                    <td class="content" align="right">'.number_format($prv).'</td>
                  </tr>';
            
              echo $result;
              ?>
            <?php }; ?>

        <!-- LABA DITAHAN -->
          <?php
            $income = $LDI5->ldi5 + $LDI9->ldi9;
            $expense = $LDE7_8->lde7_8 + $LDE905_999->lde905_999;
            $labaDitahan = $income - $expense;
          ?>
            <tr>
              <td class="subgroup"> LABA DITAHAN </td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td style="padding-left: 4em">Laba Ditahan</td>
              <td class="content" align="right"><?php echo number_format($labaDitahan); ?></td>
              <td class="content" align="right"><?php echo number_format($labaDitahan); ?></td>
            </tr>
        <!-- END OF LABA DITAHAN -->

        <!-- LABA/RUGI TAHUN BERJALAN -->
        <?php 
          //FOR CURRENT MONTH
          $inc = $LRI5->lri5 + $LRI9->lri9;
          $exp = $LRE7_8->lre7_8 + $LRE905_999->lre905_999;
          $labaRugiTahunBerjalan = $inc - $exp;
        ?>

        <?php
          //FOR PREVIOUS MONTH
          $pinc = $PLRI5->plri5 + $PLRI9->plri9;
          $pexp = $PLRE7_8->plre7_8 + $PLRE905_999->plre905_999;
          $PlabaRugiTahunBerjalan = $pinc - $pexp;
        ?>
        <tr>
          <td class="subgroup"><b> LABA (RUGI) TAHUN BERJALAN </b></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td style="padding-left: 4em"> Laba (Rugi) Tahun Berjalan</td>
          <td class="content" align="right"><?php echo number_format($labaRugiTahunBerjalan); ?></td>
          <td class="content" align="right"><?php echo number_format($PlabaRugiTahunBerjalan); ?></td>
        </tr>
        <!-- END OF LABA/RUGI TAHUN BERJALAN -->

            <tr>
              <td></td>
              <td><hr class="style1"></td>
              <td><hr class="style1"></td>
            </tr>
            <tr bgcolor="#f9f4f4">
              <th class="group"> TOTAL LIABILITIES </th>
              <td class="subgroup" align="right"><b> <?php echo number_format($total_liabiliti->t_liabiliti+$labaDitahan+$labaRugiTahunBerjalan) ?> </b></td>
              <td class="subgroup" align="right"><b> <?php echo number_format($total_prev_liabiliti->t_liabiliti_prev+$labaDitahan+$PlabaRugiTahunBerjalan) ?></b> </td>
            </tr>
            <tr>
              <td></td>
              <td><hr class="style1"></td>
              <td><hr class="style1"></td>
            </tr>
<!-- END OF LIABILITIES -->
        </tbody>
        <footer>
            <th ></th>
            <th ></th>
            <th align="right"></th>
        </footer>
      </table>
      <hr class="style3">
            <?php 
              echo '
              <table class="t_user">
                <tr>
                  <td>Printed by:</td>
                  <td>'.$this->session->userdata('username').'</td>
                </tr><br>
                <tr>
                  <td>Date/time: </td>
                  <td>'.date('d-M-Y'). ' / ' . date('H;i;sa').'</td>
                </tr>
              <table>'; 
            ?>
      
     
    </div>
  </div>
</body>