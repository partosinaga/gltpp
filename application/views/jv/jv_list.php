<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <small>Journal</small>
        <small>Voucher (JV)</small>

    </h1>
</section>


<section class="content">

    <div class="box box-success">
        <div class="box-header with-border" align="center">
            <h3 class="box-title"><i class="fa fa-book"></i> Journal Voucher List</h3>
        </div>
        <div class="box-body">

            <div class="page-content-inner">
                <div class="col-xs-12">
                    <div class="mt-element-ribbon bg-grey-steel">
                        <div class="ribbon ribbon-shadow ribbon-color-success uppercase">Short By Date</div>
                        <div class="ribbon-content row">
                            <form method="GET" action="<?php echo site_url('jv/jv/short_list') ?>">
                                <div class="col-md-2">
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

                                <div class="col-md-2">
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
                                            <button type="submit" class="btn green"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div align="right" style="font-size: 20px;font-style: italic;"><span class="label label-info">VIEWED <?php echo date("m").'/'. date("Y") ?></span></div>
                    </div>
                </div>
                <table id="example" class="table table-striped table-bordered" cellspacing="0">
                    <thead bgcolor="#578EBE">

                    <tr>
                        <th width="30px" style="text-align: center">NO</th>
                        <th width="100px" style="text-align: center">NO. VOUCHER</th>
                        <th width="50px" style="text-align: center">DATE</th>
                        <th>DESCRIPTION</th>
                        <th width="140px">RECEIVE FROM/PAID TO</th>
                        <th width="80px" style="text-align: center">GL DATE</th>
                        <th width="100px" style="text-align: right">TOTAL</th>
                        <th width="10px" hidden>CF</th>
                        <th width="100px">TAGS</th>
                        <th width="10px" style="text-align: center">STATUS</th>
                        <th width="40px" style="text-align: center">#</th>
                    </tr>

                    </thead>
                    <tbody>

                    <?php
                    $no = 1;
                    foreach ($jvList as $ap) {
                        ?>
                        <tr>

                            <td align="center"><?php echo $no++ ?></td>
                            <td align="center"><?php echo $ap->no_voucher ?></td>
                            <td align="center"><?php $d = New DateTime($ap->date);
                                echo $d->format('d-m-Y') ?></td>
                            <td><?php echo $ap->description ?></td>
                            <td><?php echo $ap->receive_from ?></td>
                            <td align="center">
                                <?php
                                if ($ap->status == 'posted') { ?>
                                    <p title="This voucher have been posted">
                                        <?php
                                        $date = New DateTime($ap->gl_date);
                                        echo $date->format("d-m-Y");
                                        ?>
                                    </p>
                                <?php } else { ?>

                                    <a style="color: black">
                                        <button class="select_date" nov="<?php echo $ap->no_voucher ?>"
                                                style="background-color: transparent;border: 0">
                                            <?php
                                            $date = New DateTime($ap->gl_date);
                                            echo $date->format("d-m-Y");
                                            ?>
                                        </button>
                                    </a>

                                <?php } ?>
                            </td>

                            <td align="right"><?php echo number_format($ap->total) ?></td>
                            <td align="center" hidden>
                                <?php
                                if ($ap->is_cashflow == 'on') {
                                    echo '&#10004';
                                };
                                ?>
                            </td>
                            <td><?php echo $ap->tags ?></td>
                            <td align="center">
                                <?php
                                if ($ap->status == 'post') {
                                    echo '<label class="label label-primary">' . strtoupper($ap->status) . '</label>';
                                } elseif ($ap->status == 'posted') {
                                    echo '<label class="label label-success">' . strtoupper($ap->status) . '</label>';
                                } elseif ($ap->status == 'unposted') {
                                    echo '<label class="label label-danger">' . strtoupper($ap->status) . '</label>';
                                } elseif ($ap->status == 'close') {
                                    echo '<label class="label label-warning">' . strtoupper($ap->status) . '</label>';
                                } else {
                                    echo '<label class="label label-default">' . strtoupper($ap->status) . '</label>';
                                }
                                ?>
                            </td>

                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn red blue-hoki-stripe btn-xs dropdown-toggle"
                                            data-toggle="dropdown"><i class="angle-down"></i> Action
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a class="view_data" name="view" value="view"
                                               id="<?php echo $ap->no_voucher ?>"><i class="fa fa-search"></i> Detail
                                            </a>
                                        </li>
                                        <li>
                                            <!-- CEK APAKAH TOTAL > 50JT OR NOT -->
                                            <?php
                                            $result = '';
                                            if ($ap->total >= 50000000) {
                                                $result .= '<a href ="' . site_url('/jv/jv/print_jv_up?id=') . $ap->no_voucher . '" target="_blank"  "><i class="fa fa-print"></i> Print </a>';
                                            } else {
                                                $result .= '<a href ="' . site_url('/jv/jv/print_jv?id=') . $ap->no_voucher . '" target="_blank"  "><i class="fa fa-print"></i> Print </a>';
                                            }
                                            echo $result;
                                            ?>
                                            <!-- END CEK APAKAH TOTAL > 50JT OR NOT -->
                                        </li>
                                        <?php
                                        $result = '<li>';
                                        if ($ap->status == "posted" OR $ap->Fmonth == 'close') {
                                            echo '
                                              <li>
                                              </li>';
                                        } else {
                                            $result .=
                                                '<a href=' . site_url('jv/jv/edit_jv?id=') . $ap->no_voucher . ' >
                                                  <i class="fa fa-edit"></i> Edit
                                                </a> </li>';
                                        };
                                        echo $result;

                                        ?>
                                        <?php
                                        if ($ap->status == 'posted' OR $ap->status == 'unposted') {
                                            $id = $ap->posted_no;
                                        } else {
                                            $id = $ap->no_voucher;
                                        }

                                        ?>
                                        <li>
                                            <a href="<?php echo site_url('jv/jv/cancel_jv?id=' . $id . '&status=' . $ap->status) ?>"><i
                                                    class="fa fa-remove"></i> Cancel </a>
                                        </li>
                                        <!-- <li>
                                  <a href="<?php echo site_url() . '/approve/approve/get_trx?id=' . $ap->no_voucher ?>" target="_blank"><i class="fa fa-recycle"></i> Status </a>
                                </li> -->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>


                    </tbody>

                </table>
                <div class="note note-info">
                    <h4 class="block"><i class="fa  fa-info-circle"></i> PS</h4>

                    <p><b>Edit</b> can only be done for transactions that are not Posted <b>AND/OR</b> not Close
                        Month </p>
                </div>
            </div>
        </div>

    </div>
</section>

<!--EDIT GL DATE-->
<div id="glmodal" class="modal fade  modale" data-backdrop="static" data-keyboard="false">
    <div class="modal-header" align="center">
        <i class="fa fa-calendar"></i> EDIT GL DATE
    </div>

    <div class="modal-body">
        <form>
            <div class="row">

                <div class="col-md-4">
                    <select class="form-control select2 input-sm" name="hari" required>
                        <option value="a" selected="" disabled="">Day</option>
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            if ($i < 10) {
                                $i = '0' . $i;
                            }
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control select2" name="bulan" required>
                        <option value="b" selected="" disabled="">Month</option>
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
                <div class="col-md-4">
                    <select class="form-control select2" name="tahun" required>
                        <option value="a" selected="" disabled="">Year</option>
                        <?php
                        $cr = date("Y");
                        $pr = date("Y") - 1;
                        $nx = date("Y") + 1;
                        ?>
                        <option value="<?php echo $pr ?>"><?php echo $pr ?></option>
                        <option value="<?php echo $cr ?>"><?php echo $cr ?></option>
                        <option value="<?php echo $nx ?>"><?php echo $nx ?></option>
                    </select>
                </div>
            </div>
        </form>

    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn red blue-hoki-stripe btn-sm"><i class="fa fa-remove"></i>
            Cancel
        </button>
        <button class="btn green blue-hoki-stripe btn-sm pull-left save"><i class="fa fa-save"></i> Save</button>
    </div>

</div>

<!--EDIT GL DATE-->

<!--modals-->
<div width="1000px" id="dataModal" class="modal container fade" tabindex="-1" data-backdrop="static"
     data-keyboard="false">
    <div class="modal-header">
        <h4 align="center"><i class="fa fa-search-plus"></i> TRANSACTION DETAIL</h4>
    </div>

    <div class="modal-body" id="transaction_detail">
    </div>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn red blue-hoki-stripe"><i class="fa fa-remove"></i> Cancel
        </button>
    </div>
</div>
<!--modals-->
<style type="text/css">
    .modal-header {
        background: #578EBE;;
    }

    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        $('.view_data').click(function () {
            var id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url('index.php/jv/jv/detail_jv');?>",
                method: "post",
                data: {id: id},
                success: function (data) {
                    $('#transaction_detail').html(data);
                    $('#dataModal').modal("show");

                }
            });

        });
    });

    $(document).ready(function () {
        $('#example').DataTable();

    });


    $('.select_date').on("click", function () {
        var hari = '';
        var bulan = '';
        var tahun = '';
        var otable = '';
        var nv = $(this).attr("nov");


        $('#glmodal').modal('show');
        $('.save').on("click", function (e) {

            hari = $('select[name="hari"]').val();
            bulan = $('select[name="bulan"]').val();
            tahun = $('select[name="tahun"]').val();
            // console.log(nv + hari + bulan + tahun);
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url();?>/jv/jv/edit_glDate',
                data: {
                    nv: nv,
                    hari: hari,
                    bulan: bulan,
                    tahun: tahun
                },

                success: function (msg) {
                    toastr.success('Success edit !');
                    console.log(msg);
                    reload();

                }
            })

        })
    })

    function reload() {
        setTimeout(location.reload.bind(location), 1000);
    }

    $('.enabled').on("click", function () {
        var nov = $(this).attr('nov');//no vucher
        var input = document.getElementById(nov); //detect input form by no voucher


        if (input.hasAttribute('readonly') == true) {// if readonly
            input.removeAttribute('readonly');
        } else {
            input.setAttribute('readonly', 'readonly');
            value = $('input[id="' + nov + '"]').val();

            $.ajax({
                method: 'POST',
                url: '<?php echo site_url() ?>/jv/jv/edit_cek',
                data: {
                    nov: nov,
                    value: value
                },

                success: function (msg) {
                    console.log(msg);
                    toastr.success('Cek/Giro Number Saved !');
                }
            })

        }
    })

</script>