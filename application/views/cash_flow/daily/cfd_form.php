<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small>Cash Flow</small>
            </h1>
        </section>


        <section class="content">

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-exchange"></i> Daily Cash Flow Form</h3>
                </div>
                <div class="box-body">
                    <div class="page-content-inner">
                        <form method="get" action="<?php echo site_url("cash_flow/cfd/view_cfd") ?>"
                              target="_blank">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="form_control_1">DATE</label>
                                </div>
                                <br>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label for="form_control_1">Periode</label>

                                        <div class="input-group input-medium date date-picker"
                                             data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                            <input type="text" class="form-control input" name="periode" readonly>
                                              <span class="input-group-btn">
                                                <button class="btn default" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                              </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for="form_control_1">&nbsp</label>

                                        <div class="input-icon">
                                            <button type="submit" class="btn green"><i class="fa fa-search"> </i> View
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>