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
            <li><a>Book and Video Order</a></li>
         </ul>
         <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Book and Video Order List</h2>
         </div>
         <div class="page-content-wrap">
            <div class="row">
               <div class="col-md-12">
                  <?php if ($this->session->flashdata('SUCCESS')) {?>
                  <div role="alert" class="alert alert-success">
                     <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                     <?=$this->session->flashdata('SUCCESS')?>
                  </div>
                  <?php }?>
                  <?php if ($this->session->flashdata('message_string')) {?>
                  <div role="alert" class="alert alert-success">
                     <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                     <?=$this->session->flashdata('message_string')?>
                  </div>
                  <?php }?>
                  <a href="<?=base_url()?>panel/book/book_order/0" class="btn btn-primary" title="Pending"><span class="bold">Pending</span></a>
                  <a href="<?=base_url()?>panel/book/book_order/1" class="btn btn-primary" title="Processing"><span class="bold">Processing</span></a>
                  <a href="<?=base_url()?>panel/book/book_order/2" class="btn btn-primary" title="History"><span class="bold">History</span></a>
                  <a href="<?=base_url()?>panel/book/book_order/3" class="btn btn-primary" title="Cancel"><span class="bold">Cancel</span></a>
                  <a href="<?=base_url()?>panel/book/add_book_and_video" class="btn btn-info" title="Cancel"><span class="bold">New Book or Video Order</span></a>

                  <br><br>


                            <div class="panel panel-default" style="font-size:14px;">
                                 <div class="panel-body">
<a class="btn btn-primary pull-right" href="<?=base_url()?>panel/book/export_excel">Excel Download</a>
                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Daily Sales Total</th>
                                                <th>Weekly Sales Total</th>
                                                <th>Monthly Sales Total</th>
                                                <th>Yearly Sales Total</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Courses Sold Total</td>
                                                <td><?=!empty($today->totalCourse) ? $today->totalCourse : 0?></td>
                                                <td><?=!empty($weekly->totalCourse) ? $weekly->totalCourse : 0?></td>
                                                <td><?=!empty($monthly->totalCourse) ? $monthly->totalCourse : 0?></td>
                                                <td><?=!empty($yearly->totalCourse) ? $yearly->totalCourse : 0?></td>
                                                <td><?=!empty($total_sales->totalCourse) ? $total_sales->totalCourse : 0?></td>

                                            </tr>
                                            <tr>
                                                <td>Amount (&pound;)</td>
                                                <td><?=!empty($today->totalAmount) ? number_format($today->totalAmount, 2) : 0?></td>
                                                <td><?=!empty($weekly->totalAmount) ? number_format($weekly->totalAmount, 2) : 0?></td>
                                                <td><?=!empty($monthly->totalAmount) ? number_format($monthly->totalAmount, 2) : 0?></td>
                                                <td><?=!empty($yearly->totalAmount) ? number_format($yearly->totalAmount, 2) : 0?></td>
                                                 <td><?=!empty($total_sales->totalAmount) ? number_format($total_sales->totalAmount, 2) : 0?></td>

                                            </tr>


                                        </tbody>

                                    </table>





                                </div>
                            </div>







                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h3 class="panel-title"> Search</h3>
                     </div>
                     <!--  Search Box  Start -->
                     <div class="panel-body">
                        <form action="" method = "get">
                           <div class="col-md-2">
                              <label>  ID</label>
                              <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                           </div>
                           <div class="col-md-3">
                              <label>First Name</label>
                              <input type="text" class="form-control" value="<?=!empty($this->input->get('first_name')) ? $this->input->get('first_name') : ''?>" placeholder="First Name" name="first_name"/>
                           </div>
                           <div class="col-md-3">
                              <label>Email</label>
                              <input type="text" class="form-control" value="<?=!empty($this->input->get('email')) ? $this->input->get('email') : ''?>" placeholder="Email" name="email"/>
                           </div>
                           <div class="col-md-2">
                              <label>Start Date</label>
                              <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('start_date')) ? $this->input->get('start_date') : ''?>" placeholder="Start Date" name="start_date"/>
                           </div>
                           <div class="col-md-2">
                              <label>End Date</label>
                              <input type="text" class="form-control datepicker_new"  value="<?=!empty($this->input->get('end_date')) ? $this->input->get('end_date') : ''?>" placeholder="End Date" name="end_date"/>
                           </div>
                           <div style="clear: both;"></div>
                           <br />
                           <div class="col-md-12">
                              <input type="submit" class="btn btn-primary" value="Search" />
                              <a href="<?=base_url()?>panel/book/book_order" class="btn btn-success">Reset</a>
                           </div>
                        </form>
                     </div>
                     <!-- Search Box  End -->
                  </div>
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h3 class="panel-title">Book and Video Order List</h3>
                     </div>
                     <div class="panel-body" style="overflow: auto;">
                        <table  class="table table-striped table-bordered table-hover" >
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Courier</th>
                                 <th>Tracking No</th>
                                 <th>Reference No</th>
                                 <th>First Name</th>
                                 <th>Last Name</th>
                                 <th>Email</th>
                                 <th>Address</th>
                                 <th>Post Code</th>
                                 <th>Phone</th>
                                 <th>International Delivery</th>
                                 <th>Total</th>
                                 <th>Status</th>
                                 <th>Payment Status</th>
                                 <th>Created Date</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 if (!empty($getBookorder)) {
                                 	foreach ($getBookorder as $value) {
                                 		?>
                              <tr>
                                 <td><?=$value->id?></td>
                                 <td><?=$value->courier_name?></td>
                                 <td><?=$value->tracking_no?></td>
                                 <td><?=$value->reference_number?></td>
                                 <td><?=$value->first_name?></td>
                                 <td><?=$value->last_name?></td>
                                 <td><?=$value->email?></td>
                                 <td><?=$value->address?></td>
                                 <td><?=$value->zip_code?></td>
                                 <td><?=$value->phone?></td>
                                 <td><?=$value->international_delivery?></td>
                                 <td><?=$value->total?></td>
                                 <td width="25%">
                                    <select class="form-control getStatuschange" style="width: 100px;" id="<?=$value->id?>" >
                                       <option <?=($value->status == '0') ? 'selected' : ''?> value="0">Pending</option>
                                       <option <?=($value->status == '1') ? 'selected' : ''?>  value="1">Processing</option>
                                       <option <?=($value->status == '2') ? 'selected' : ''?>  value="2">History</option>
                                       <option <?=($value->status == '3') ? 'selected' : ''?>  value="3">Cancel</option>
                                    </select>
                                 </td>
                                 <td>
                                    <?php
                                       if ($this->session->userdata('user_account_role') == '1') {?>
                                    <select style="width:100px;" class="form-control ChangePaymentStatus" data-table="book_order" id="<?=$value->id?>"  >
                                       <option value="1" <?=($value->payment == '1') ? 'selected' : ''?>>Paid</option>
                                       <option value="0" <?=($value->payment == '0') ? 'selected' : ''?>>Unpaid</option>
                                    </select>
                                    <?php } else {
                                       ?>
                                    <?=($value->payment == '0') ? 'Paid' : 'Unpaid'?>
                                    <?php
                                       }
                                       		?>
                                 </td>
                                 <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                 <td>
                                    <a class="btn btn-primary" href="<?=base_url()?>panel/book/printbook/<?=$value->id?>" >Print</a>
                                    <button type="button" id="<?=$value->id?>" class="btn btn-primary AddTracking">Add Courier & Tracking</button>
                                    <a class="btn btn-primary" href="<?=base_url()?>panel/book/book_order_detail/<?=$value->id?>" ><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-primary" href="<?=base_url()?>panel/book/edit_book_order/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/book/delete_book_order/<?=$value->id?>"><span class="fa fa-trash-o"></span></a>
                                 </td>
                              </tr>
                              <?php }
                                 } else {?>
                              <tr>
                                 <td colspan="100%">No record found.</td>
                              </tr>
                              <?php }
                                 ?>
                           </tbody>
                        </table>
                        <?php echo $this->pagination->create_links(); ?>
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
<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog modal-lg">
      <form method="post" action="<?=base_url()?>panel/book/add_tracking">
         <input type="hidden" id="order_no" name="order_no" class="form-control">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Courier & Tracking </h4>
            </div>
            <div class="modal-body">
               <div class="col-md-2">Courier </div>
               <div class="col-md-6">
                <select name="courier_id" class="form-control">
                    <option value="">Select Courier</option>
                    <?php
                        foreach ($courier as $courier_value)
                        {
                    ?>
                    <option value="<?=$courier_value->id?>"><?=$courier_value->courier_name?> (<?=$courier_value->courier_website?>) </option>
                        <?php
                        }
                        ?>
                </select>
                </div>
               <div style="clear: both;"></div>
               <br />
               <div class="col-md-2">Tracking number</div>
                     <div class="col-md-6"><input type="text" name="tracking_no" class="form-control"></div>       
                     <div style="clear: both;"></div> 
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary" >Save</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </div>
      </form>
   </div>
</div>
<script type="text/javascript" src="<?=base_url()?>front/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script>
   $('.datepicker_new').datepicker({
     format: 'dd-mm-yyyy',
   });
   
   
       $('table').delegate('.AddTracking','click',function(){
           var id = $(this).attr('id');
           $('#order_no').val(id);
            $('#myModal').modal('show');
       });
   
   
       $('table').delegate('.DeleteRecord','click',function(){
           var id = $(this).attr('id');
           $.ajax({
               type:'POST',
               url:"<?=base_url()?>panel/student/DeleteRecordOrderBook",
               data: {id: id},
               dataType: 'JSON',
               success:function(data){
                           location.reload();
               }
           });
       });
   
   
       $('table').delegate('.getStatuschange','change',function(){
           var id = $(this).attr('id');
           var value = $(this).val();
           $.ajax({
               type:'POST',
               url:"<?=base_url()?>panel/book/StatuschangeOrderBook",
               data: {id: id,value:value},
               dataType: 'JSON',
               success:function(data){
                           location.reload();
               }
        });
       });
   
</script>
<script type="text/javascript" src="<?=base_url()?>front/bootstrap-datepicker.min.js"></script>
