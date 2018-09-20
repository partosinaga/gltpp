  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
           B<small>ank</small>B<small>ook</small>
        </h1>
      </section>
      <section class="content">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-binoculars"></i> Bank Book Form</h3>
          </div>
          <div class="box-body">
            <div class="page-content-inner">
              <form method="post" action="<?php echo site_url("bank_book/bank_book/view_bb") ?>" target="_blank">
                <div class="row">

                  <div class="col-md-3">
                    <div class="form-group ">
                      <label for="form_control_1">Period End of</label>
                        <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                          <input type="text" class="form-control" name="period" readonly>
                          <span class="input-group-btn">
                            <button class="btn default" type="button">
                              <i class="fa fa-calendar"></i>
                            </button>
                          </span>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="form_control_1">ACCOUNT CODE</label>
                        <div class="input-icon">
                          <select  class="form-control select2" name ="account_code" required>
                              <option value="" selected ></option>
                              <?php
                                foreach ($bank->result_array() as $data){
                                  echo "<option value=".$data["account_code"]." >"
                                                       .$data["account_code"]." - ".$data["bank_id"];
                                        "</option>";
                                }
                              ?>
                          </select>
                        </div>
                      </div>
                    </div>


                      <div class="col-md-4">
                        <div class="form-group ">
                        <label for="form_control_1">&nbsp</label>
                          <div class="input-icon">
                            <button type="submit" class="btn green"><i class="fa fa-search"> </i> View </button>  
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