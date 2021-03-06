<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small>Journal Voucher (JV)</small>

            </h1>
        </section>


        <section class="content">

            <div class="box box-success">
                <div class="box-header with-border" align="center">
                    <h3 class="box-title"><i class="fa fa-tag" ></i> Posting Journal Voucher</h3>
                </div><br>
                <div class="box-body">
                    <div class="page-content-inner">
                        <div class="col-xs-6">
                            <div class="mt-element-ribbon bg-grey-steel">
                                <div class="ribbon ribbon-shadow ribbon-color-success uppercase">Short By Date</div>
                                <div class="ribbon-content row">
                                    <form method="GET" action="<?php echo site_url('jv/jv/short_post') ?>">
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

                                <div align="right" style="font-style: italic;"><span class="label label-info">VIEWED <?php echo date("m").'/'. date("Y") ?></span></div>
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
                                            <button id="buttonClass"  class="btn green btn-sm"><i class="fa fa-bookmark"></i> POSTING ALL CHECKED</button>
                                        </div>
                                    </div>

                                </div>
                                <div align="right" style="font-style: italic;"><span >&nbsp</span></div>
                            </div>
                        </div>



                        <table id="example" class="table table-striped table-bordered" cellspacing="0">
                            <thead bgcolor="#578EBE">
                            <tr>
                                <th width="10px"  class="text-center" ></th>
                                <th width="100px" class="text-center">NO. VOUCHER</th>
                                <th class="text-center" width="50px">DATE</th>
                                <th class="text-center">DESCRIPTION</th>
                                <th class="text-center" width="100px" >TOTAL</th>
                                <th class="text-center" width="70px" >GL. DATE</th>
                                <th class="text-center" width="90px" >POSTED NO.</th>
                                <th class="text-center" width="50px" >ACTION</th>
                            </tr>

                            </thead>
                            <tbody>

                            <?php
                            foreach ($postlist as $p) {
                            ?>
                            <tr>
                                <td align="center">
                                    <?php
                                    if ($p->status == "unposted" ) {

                                        echo '<i class="fa fa-times" aria-hidden="true" title="Confirmation Nedded"></i>';
                                    } else {
                                        echo '
                                    <input type="checkbox" gl-date = "'.$p->gl_date.'" class="chk" value="'.$p->no_voucher.'" name = "nov[]" />
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
                                <td align="center"> <?php echo $p->posted_no ?> </td>
                                <?php

                                if ($p->Fmonth == "close" ) {
                                    echo '
                              <td align="center"> 
                                <span title="Have been close month" class="label label-danger">CLOSED !</span>
                              </td>                            
                              ';
                                } else {
                                    $nv = $p->no_voucher;
                                    $po = $p->posted_no;
                                    if ($p->status == "post") {
                                        echo '
                                  <td class="text-center">  
                                    <a href="#'.$nv.'"> <button align="center" class="btn blue-soft red-stripe pull-right btn-xs "> <i class="fa fa-bookmark"></i> Posting</button></a>
                                  </td>
                                      
                                  ';
                                    } else {
                                        echo '
                                    <td align="center">  
                                      <a data-target="#static2'.$po.'" data-toggle="modal">
                                      <button align="center" class="btn blue-soft red-stripe pull-right btn-xs "> <i class="fa fa-bookmark"></i> Reposting</button>
                                      </a>
                                    </td>
                                     ';
                                    };
                                }

                                ?>

                            </tr>
                            <!--MODAL CONFIRMATION-->
                            <div id="<?php echo $p->no_voucher ?>" class="modalDialog">
                                <div>
                                    <a href="#close" title="Close" ><i class=" pull-right fa fa-remove"></i></a>
                                    <h2 align="center"><i class="fa fa-warning"></i></h2>
                                    <div class="modal-body">
                                        Are you sure to <b>POSTING</b> this data?
                                        <form method="post" action="<?php echo site_url('jv/jv/save_posting') ?>">
                                            <input type="hidden" name="posted_no" value="<?php echo $p->posted_no ?>">
                                            <input type="hidden" name="gl_date" value="<?php echo $p->gl_date ?>">
                                            <input type="hidden" name="noVoc" value="<?php echo $p->no_voucher ?>">
                                            <input type="hidden" name="description" value="<?php echo $p->description ?>">
                                            <input type="hidden" name="total" value="<?php echo $p->total ?>">
                                            <input type="hidden" name="is_cashflow" value="<?php echo $p->is_cashflow ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> OK</button>
                                        <a href="#close" title="Close" > <button type="button" data-dismiss="modal" form="form1" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</button></a>
                                        <div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--/MODAL CONFIRMATION-->

                                    <!--MODAL CONFIRMATION REPOST-->
                                    <div id="static2<?php echo $p->posted_no ?>"  class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            Existing journal number found, use it or generate new one? <br>
                                            Click <b>Yes</b> to use <br>
                                            Click <b>No</b> to generate new one <br>
                                        </div>
                                        <div class="modal-footer">

                                            <form method="GET" action="<?php echo site_url().'/jv/jv/save_upd_reposting'?>">

                                                <input type="hidden" name="no_voucher" value="<?php echo $p->no_voucher ?>">
                                                <input type="hidden" name="postedNo" value="<?php echo $p->posted_no ?>">
                                                <input type="hidden" name="gl_date" value="<?php echo $p->gl_date ?>">
                                                <a href="<?php echo site_url().'/jv/jv/save_reposting?id='.$p->no_voucher.'&pstd='.$p->posted_no?>" >
                                                    <button type="button" class="btn btn-success"><i class="fa fa-check"></i> Yes</button>
                                                </a>

                                                <a>
                                                    <button type="button" data-dismiss="modal" form="form1" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</button>
                                                </a>

                                                <a>
                                                    <button type="submit"  class="btn btn-success"><i class="fa fa-check"></i> No</button>
                                                </a>

                                            </form>


                                        </div>
                                    </div>
                                    <!--/MODAL CONFIRMATION REPOST-->



                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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


        $(document).ready(function () {
            /* Get the checkboxes values based on the class attached to each check box */
            $("#buttonClass").click(function() {
                getValueUsingClass();
            });
        });


        function getValueUsingClass(){
            var chkArray = [];
            var gld = [];

            $(".chk:checked").each(function() {
                gld.push($(this).attr("gl-date"));
                chkArray.push($(this).val());
            });
            // alert(gld);
            if (chkArray.length <= 1) {
                alert('Ups!, Select more than One Voucher');
            } else {
                //to mass posting
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url();?>/jv/jv/mass_posting', // link to CI function
                    data: {
                        chkArray: chkArray,
                        gld: gld
                    },
                    success: function (msg) {
                        console.log(msg);
                        location.reload();
                        toastr.success('All selected Voucher Posted !');
                    }
                });

            }

        }
    </script>
