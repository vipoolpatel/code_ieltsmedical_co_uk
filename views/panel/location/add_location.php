 <?php
$this->load->view('panel/header/header');
?>
    <body>
        <div class="page-container">
            <?php
$this->load->view('panel/header/sidebar');
?>
            <div class="page-content">
                <?php
$this->load->view('panel/header/top_header');
?>
                <ul class="breadcrumb">
                    <li><a>Location</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Location</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Location</h3>
                                    </div>

                                    <div class="panel-body">

                                             <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Type <span style="color: red;"> *</span></label>
                                <div class="col-md-6 col-xs-12">
                                  <select class="form-control" required="" name="type">
                                      <option value="">Select Type</option>
                                      <option value="OET">OET</option>
                                      <option value="OSCE">OSCE</option>
                                        <option value="NMC CBT">NMC CBT</option>
                                      <option value="GMC Plab">GMC Plab</option>
                                      <option value="Other">Other</option>
                                  </select>
                                </div>
                              </div>


                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Location <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="location_office" required type="text" placeholder="Location" class="form-control" value="<?=set_value('location_office');?>" />
                                                    <div class="error"><?php echo form_error('location_office'); ?></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Venue Name <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="venue_name" required type="text" placeholder="Venue Name" class="form-control" value="<?=set_value('venue_name');?>" />
                                                    <div class="error"><?php echo form_error('venue_name'); ?></div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-primary pull-right">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>


                        <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="<?=base_url()?>panel/location/upload_location" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Upload Excel</h3>
                                    </div>

                                    <div class="panel-body">

                                             <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Type <span style="color: red;"> *</span></label>
                                <div class="col-md-6 col-xs-12">
                                  <select class="form-control" required="" name="type">
                                      <option value="">Select Type</option>
                                      <option value="OET">OET</option>
                                      <option value="OSCE">OSCE</option>
                                        <option value="NMC CBT">NMC CBT</option>
                                      <option value="GMC Plab">GMC Plab</option>
                                      <option value="Other">Other</option>
                                  </select>
                                </div>
                              </div>


                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">File <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="result_file"  required type="file"  />
                                                    <br />
                                                    <a href="<?=base_url()?>file/demo/demo_locations.xlsx">
                                                        Download Demo File
                                                    </a>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-primary pull-right">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>


                    </div>

                </div>
            </div>
        </div>
<?php
$this->load->view('panel/header/footer');
?>

    </body>
</html>






