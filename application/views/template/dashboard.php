<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <b class="gl">GL APPS</b>

        <ol class="pull-right" style="font-size: 9pt"><i>Last Login <?php echo $logged->date_time ?></i></ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- REMINDER -->
        <?php if (date("d") >= 29 AND empty($current->date)) {
            echo '
            <div class="panel panel-danger">
              <div class="panel-heading"><i class=" fa fa-bell"></i> REMINDER</div>
              <div class="panel-body">Now <b>' . date("M-Y") . '</b>. Dont Forget to Close Month.
                Click <a href=' . site_url('close_month/close_month/close_month_form') . '>Here</a> to Go</div>
            </div>
          ';
        }
        ?>
        <!-- REMINDER -->


        <!--          <div class="portlet mt-element-ribbon light portlet-fit ">-->
        <!--            <div class="ribbon ribbon-vertical-right ribbon-shadow ribbon-color-primary uppercase">-->
        <!--              <div class="ribbon-sub ribbon-bookmark"></div>-->
        <!--              <i class="fa fa-star"></i>-->
        <!--            </div>-->
        <!--            <div class="portlet-title">-->
        <!--              <div class="caption">-->
        <!--                <i class=" icon-layers font-green"></i>-->
        <!--                <span class="caption-subject font-green bold uppercase">New Update!</span>-->
        <!--              </div>-->
        <!--            </div>-->
        <!--            <div class="portlet-body">-->
        <!--              <ul>-->
        <!--                <li><b>Edit GL DATE & CEK/GIRO NUMBER in AR/AP/JV List</b><br>-->
        <!--                  <ul>-->
        <!--                    Edit GL DATE & CEK/GIRO NUMBER sekarang tersedia pada menu AR/AP/JV List.<br>-->
        <!--                    Semua Voucher yang sudah di posting tidak bisa di edit, silahkan UNPOSTING jika ingin di edit.<br>-->
        <!--                    Edit CEK/GIRO NUMBER Tekan Tombol yang ada di sebelah kanan setiap List, dan tekan tombol yang sama untuk menyimpan. Edit berhasil apabila sudah mucul <i>Notifikasi</i> 'Cek/Giro Number Saved!'.<br> -->
        <!--                    -->
        <!--                  </ul>-->
        <!--                </li>-->
        <!--              </ul>-->
        <!---->
        <!--              <ul>-->
        <!--                <li><b>POSTING & UNPOSTING dengan <i>Tick Mark</i></b><br>-->
        <!--                  <ul>-->
        <!--                    POSTING & UNPOSTING dalam jumlah lebih dari 1 silahkan ceklis daftar yang akan di posting/unposting. klik <i><b>Select All</b></i> untuk menceklis seluruh voucher. dan tekan tombol <b>POSTING ALL CHECKED</b> untuk posting, dan <b>UNPOST ALL CHECKED</b> untuk unposting-->
        <!--                    -->
        <!--                  </ul>-->
        <!--                </li>-->
        <!--              </ul><b style="font-size: 10px; color: red" class="pull-right"><i>Hubungi IT TEAM jika perlu bantuan</i></b>-->
        <!--            </div>-->
        <!---->
        <!--          </div>-->


        <div class="panel panel-default">
            <div class="panel-heading"><i class=" fa fa-tag"></i> TOTAL UNPOSTED VOUCHER</div>
            <div class="panel-body">

                <div class="col-md-4">
                    <div class="widget-thumb ehe margin-bottom-20 ">
                        <h4 class="widget-thumb-heading">ACCOUNT RECEIVABLE</h4>

                        <div class="widget-thumb-wrap">
                            <p title="klick to open list..."><a href="<?php echo site_url('ar/ar/posting') ?>"><i
                                        class="widget-thumb-icon bg-green fa fa-download"></i></a></p>

                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle">AR</span>
                                <span class="widget-thumb-body-stat count"><?php echo $ar->t_ar ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="widget-thumb ehe text-uppercase margin-bottom-20 ">
                        <h4 class="widget-thumb-heading">ACCOUNT PAYABLE</h4>

                        <div class="widget-thumb-wrap">
                            <p title="klick to open list..."><a href="<?php echo site_url('ap/ap/posting') ?>"><i
                                        class="widget-thumb-icon bg-red fa fa-upload"></i></a></p>

                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle">AP</span>
                                <span class="widget-thumb-body-stat count"><?php echo $ap->t_ap ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="widget-thumb ehe text-uppercase margin-bottom-20 ">
                        <h4 class="widget-thumb-heading">JOURNAL VOUCHER</h4>

                        <div class="widget-thumb-wrap">
                            <p title="klick to open list..."><a href="<?php echo site_url('jv/jv/posting') ?>"><i
                                        class="widget-thumb-icon bg-blue fa fa-file"></i></a></p>

                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle">JV</span>
                                <span class="widget-thumb-body-stat count"><?php echo $jv->t_jv ?></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.container -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<style type="text/css">
    .notif {
        font-family: Courier, monospace;
        font-size: 15pt;
    }

    .gl {
        font-family: Courier, monospace;
        font-size: 15pt;
    }

    .ehe {
        background-color: #E9EDEF;

    }
</style>

<script type="text/javascript">
    $('.count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 1000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
</script>
