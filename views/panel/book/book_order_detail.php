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
                    <li><a>Book Order Detail</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Book Order Detail</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">

                        <div class="col-md-12">
                           <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
Book Order List
</h3>

<a href="<?=base_url()?>panel/book/book_order" class="btn btn-primary pull-right">Back</a>
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


                        <div class="col-md-12">
                            <?php if ($this->session->flashdata('SUCCESS')) {?>
                                <div role="alert" class="alert alert-success">
                                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                                    <?=$this->session->flashdata('SUCCESS')?>
                                </div>
                            <?php }?>


                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Book Order Detail</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                     <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Created Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
if (!empty($processing_list)) {
	foreach ($processing_list as $value) {?>
                                                <tr>
                                                    <td><?=$value->id?></td>
                                                    <td><?=$value->name?></td>
                                                    <td>&pound;<?=$value->price?></td>
                                                    <td><?=$value->qty?></td>
                                                    <td>&pound;<?=$value->subtotal?></td>
                                                    <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                                </tr>
                                           <?php }
} else {?>
                                            <tr>
                                                <td colspan="100%">No record found!</td>
                                            </tr>
                                      <?php }

?>
                                </tbody>
                              </table>

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



