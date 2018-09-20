<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small>Account Receivable (AR)</small>

            </h1>
        </section>


        <section class="content">

            <div class="box box-success">
                <div class="box-header with-border" align="center">
                    <h3 class="box-title"><i class="fa fa-tag" ></i> Unposting Receipt Voucher</h3>
                </div><br>

                <div class="box-body">
                    <div class="page-content-inner">
                        <div class="col-xs-6">
                            <div class="mt-element-ribbon bg-grey-steel">
                                <div class="ribbon ribbon-shadow ribbon-color-success uppercase">Short By Date</div>
                                <div class="ribbon-content row">
                                    <form method="GET" action="<?php echo site_url('ar/ar/short_unpost') ?>">
                                        <div class="col-md-4">
                                            <label for="single" class="control-label">
                                                <b>Month</b>
                                            </label>
                                            <div class="input-icon">
                                                <select  class="form-control select2" name ="month" required>
                                                    <option value="b" selected="" disabled="">Choose Month</option>
                                                    <option value="01">01 - Jan</option>
                                                    <option value="02">02 - Feb</option>
                                                    <option value="03">03 - Mar</option>
                                                    <option value="04">04 - Apr</option>
                                                    <option value="05">05 - Mei</option>
                                                    <option value="06">06 - Jun</option>
                                                    <option value="07">07 - Jul</option>
                                                    <option value="08">08 - Ags</option>
                                                    <option value="09">09 - Spt</option>
                                                    <option value="10">10 - Oct</option>
                                                    <option value="11">11 - Nov</option>
                                                    <option value="12">12 - Des</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="single" class="control-label">
                                                <b>Year</b>
                                            </label>
                                            <div class="input-icon">
                                                <select class="form-control select2" name ="year" required>
                                                    <option value="a" selected="" disabled="">Choose Year</option>
                                                    <?php
                                                    $cr = date("Y");
                                                    $pr3 = date("Y")-3;
                                                    $pr2 = date("Y")-2;
                                                    $pr = date("Y")-1;
                                                    $nx = date("Y")+1;
                                                    ?>
                                                    <option value="<?php echo $pr3 ?>"><?php echo $pr3 ?></option>
                                                    <option value="<?php echo $pr2 ?>"><?php echo $pr2 ?></option>
                                                    <option value="<?php echo $pr ?>"><?php echo $pr ?></option>
                                                    <option value="<?php echo $cr ?>"><?php echo $cr ?></option>
                                                    <option value="<?php echo $nx ?>"><?php echo $nx ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="single" class="control-label">
                                                <b>&nbsp</b>
                                            </label>
                                            <div class="input-icon">
                                                <div class="col-md-4">
                                                    <button type="submit"  class="btn green"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div align="right" style="font-style: italic;"><span class="label label-info">VIEWED <?php echo $month.'/'. $year ?></span></div>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="mt-element-ribbon bg-grey-steel">
                                <div class="ribbon ribbon-shadow ribbon-color-success uppercase">Tick Mark</div>
                                <div class="ribbon-content row">
                                    <div class="col-md-4">
                                        <br>
                                        <br>
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="checkbox33" class="md-check" value="1" onchange="checkAll(this)" name="chk[]" >
                                            <label for="checkbox33">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Select all
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="single" class="control-label">
                                            <b>&nbsp</b>
                                        </label>
                                        <div class="input-icon">
                                            <button id="mass_posting"  class="btn green btn-sm"><i class="fa fa-bookmark-o"></i> UNPOST ALL CHECKED</button>
                                        </div>
                                    </div>

                                </div>
                                <div align="right" style="font-style: italic;"><span >&nbsp</span></div>
                            </div>

                        </div>
                        <table id="example" class="table table-striped table-bordered" cellspacing="0">
                            <thead bgcolor="#1BBC9B">

                            <tr>
                                <th  class="text-center" width="10px" ></th>
                                <th  class="text-center" width="100px">NO. VOUCHER</th>
                                <th  class="text-center" width="50px">DATE</th>
                                <th  class="text-center">DESCRIPTION</th>
                                <th  class="text-center" width="100px" >TOTAL</th>
                                <th  class="text-center" width="70px" >GL. DATE</th>
                                <th  class="text-center" width="90px" >POSTED NO.</th>
                                <th  class="text-center" width="50px" >STATUS</th>
                                <th  class="text-center" width="80px" >ACTION</th>
                            </tr>

                            </thead>
                            <tbody>

                            <?php

                            foreach ($UnpostShort as $p) {
                            ?>
                            <tr>
                                <td align="center">
                                    <?php
                                    if ($p->Fclose == 'close') {
                                        echo '<i class="fa fa-times" aria-hidden="true" title="Confirmation Nedded"></i>';
                                    } else {
                                        echo '
                                    <input type="checkbox" gl-no = "'.$p->gl_no.'" class="chk" value="'.$p->no_voucher.'" name = "nov[]" />
                                    <span></span>
                                ';
                                    }

                                    ?>
                                </td>
                                <td align="center"><?php echo $p->no_voucher ?></td>
                                <td align="center"><?php echo $p->date ?></td>
                                <td><?php echo $p->description ?></td>
                                <td align="right"><?php echo number_format($p->total) ?></td>
                                <td align="center"><?php echo $p->gl_date ?></td>
                                <td align="center"> <?php echo $p->gl_no ?> </td>
                                <?php
                                //for labeling
                                if ($p->status == "unposted" )  {
                                    $label = "label label-danger";
                                } else{
                                    $label = "label label-info";
                                }
                                ?>
                                <td align="center" ><span class="<?php echo $label ?>"> <?php echo strtoupper($p->status) ?></span> </td>
                                <?php
                                $nv = $p->no_voucher;

                                if ($p->Fclose == "close" ) {
                                    echo '
                              <td align="center">
                                <span class="label label-danger">CLOSED !</span>
                              </td>
                              ';
                                } elseif ($p->status == "unposted") {
                                    echo '<td></td>';
                                } else {
                                    echo '<td align="center">
                                <a href="#'.$nv.'"> <button align="center" class="btn green-meadow red-stripe pull-right btn-xs "> <i class="fa fa-bookmark-o"></i> Uposting</button></a>
                              </td>';
                                }

                                ?>

                            </tr>

                            <!--MODAL CONFIRMATION-->
                            <div id="<?php echo $p->no_voucher ?>" class="modalDialog">
                                <div>
                                    <a href="#close" title="Close" ><i class=" pull-right fa fa-remove"></i></a>
                                    <h2 align="center"><i class="fa fa-warning"></i></h2>
                                    <div class="modal-body">
                                        Are you sure to <b>UNPOSTING</b> this data?

                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?php echo site_url('ar/ar/save_unposting?id=').$p->no_voucher.'&gl='.$p->gl_no ?>"  >
                                            <button type="button" class="btn btn-success"><i class="fa fa-check"></i> OK</button>
                                        </a>

                                        <a href="#close" title="Close" >
                                            <button type="button" data-dismiss="modal" form="form1" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</button>
                                        </a>
                                        <div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--/MODAL CONFIRMATION-->



                                    <?php } ?>


                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </section>

    </div>

</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );

    function checkAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                console.log(i)
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }

    $(document).ready(function(){
        $('#mass_posting').click(function(){
            getCheckedValue();
        });
    });

    function getCheckedValue(){
        var check = [];
        var gln = [];

        $('.chk:checked').each(function(){
            gln.push($(this).attr("gl-no"));
            check.push($(this).val());
        });

        if (check.length <= 1) {
            alert('Ups!, Select more than One Voucher')
        } else {

            // to mass unpositng
            $.ajax({
                type : 'POST',
                url : '<?php echo site_url();?>/ar/ar/mass_unposting',
                data : {
                    check : check,
                    gln: gln
                },
                success: function (msg) {
                    console.log(msg);
                    location.reload();
                    toastr.success('All selected Voucher Posted !');
                }
            })

        }


    }
</script>

