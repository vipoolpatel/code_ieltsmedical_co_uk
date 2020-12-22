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
                    <li><a> Licence Key Order Detail</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Licence Key Order Detail</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">

                        <div class="col-md-12">
                           <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
Licence Key Order List
</h3>

<a href="<?=base_url()?>panel/book/license_key_order" class="btn btn-primary pull-right">Back</a>
                                </div>
                                <div class="panel-body">



                                    <div class="col-md-12">

<?php
if (!empty($getUser->username)) {
	?>
                                    <div class="col-md-2">
                                        <label>Customer Name</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=!empty($getUser->username) ? $getUser->username : ''?>
                                    </div>
                                    <?php }
?>
                                     <div style="clear: both"></div>
                                      <br />
                                    <div class="col-md-2">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-10">
                                       <?=$getOrder->first_name?>
                                    </div>
                                    <div style="clear: both"></div>


                                    <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="col-md-10">

                                    <?=$getOrder->last_name?>
                                    </div>
                                     <div style="clear: both"></div>
                                    <br />
                                        <div class="col-md-2">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-10">

                                          <?=$getOrder->email?>
                                    </div>


                                     <div style="clear: both"></div>
                                    <br />

                                      <div class="col-md-2">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-10">
                                       <?=$getOrder->address?>
                                    </div>
                                    <div style="clear: both"></div>
                                    <br />

                                    <div class="col-md-2">
                                        <label>Post Code</label>
                                    </div>
                                    <div class="col-md-10">
                                          <?=$getOrder->zip_code?>
                                    </div>

 <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Country</label>
                                    </div>
                                    <div class="col-md-10">
                                       <?=$getOrder->country?>
                                    </div>
                                      <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-10">
                                        <?=$getOrder->phone?>
                                    </div>
                                     <div style="clear: both"></div>
                                    <br />
                                    <div class="col-md-2">
                                        <label>Message</label>
                                    </div>
                                    <div class="col-md-10">

                                          <?=$getOrder->message?>
                                    </div>
                                      <div style="clear: both"></div>


                                    <div style="clear: both"></div>
                                    <br />

                                     <div class="col-md-2">
                                        <label>Total</label>
                                    </div>
                                    <div class="col-md-10">
                                         <?=$getOrder->total?>
                                    </div>
                                     <div style="clear: both"></div><br />
                                     <div class="col-md-2">
                                        <label>Created Date</label>
                                    </div>

                                    <div class="col-md-10">
                                    <?=date('d-m-Y h:i A', strtotime($getOrder->created_date));?>
                                    </div>



                                    <div style="clear: both"></div>
                                    <br />
                                    </div>


                                </div>
                            </div>
                        </div>


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






<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>



