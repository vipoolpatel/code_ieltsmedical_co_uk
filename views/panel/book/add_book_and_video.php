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
                <li><a>Book and Video</a></li>
            </ul>
            <div class="page-title">
                <h2><span class="fa fa-arrow-circle-o-left"></span>Book and Video</h2>
            </div>
            <div class="page-content-wrap">
                <div class="row">
                   <?php if ($this->session->flashdata('SUCCESS')) {?>
                    <div role="alert" class="alert alert-success">
                        <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                        <?=$this->session->flashdata('SUCCESS')?>
                    </div>
                <?php }?>
                <div class="col-md-12">
                    <form class="form-horizontal" id="add_app" method="post" action="<?=base_url()?>panel/book/add_to_cart" enctype="multipart/form-data">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Book and Video</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Book Name <span style="color: red;"> *</span></label>
                                    <div class="col-md-6 col-xs-12">
                                      <div class="">
                                        <select name="book_id" id="" class="form-control select" data-live-search="true" required>
                                            <option value="">Select Book and Video Name</option>
                                            <?php
foreach ($getBook as $row4) {
	?>
                                                <option value="<?=$row4->id?>"><?=$row4->name?> (&pound; <?=$row4->price?>)</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Qty <span style="color: #ff0000"> *</span></label>
                                <div class="col-md-6 col-xs-12">
                                <input type="text" class="form-control" name="qty" required>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                           <button class="btn btn-primary pull-right">Add To Cart</button>
                       </div>
                   </div>
               </form>



               <form class="form-horizontal" id="add_app" method="post" action="<?=base_url()?>panel/book/submit_book" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cart List</h3>
                    </div>
                    <div class="panel-body">
                        <table  class="table table-striped table-bordered table-hover" >
                            <thead>
                                <tr>
                                   <th>Book Name</th>
                                   <th>Price</th>
                                   <th>Qty</th>
                                   <th>SubTotol</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                            <?php
if (!empty($this->cart->contents())) {
	?>
                                <?php foreach ($this->cart->contents() as $item) {

		$getVideo = $this->db->where('id', $item['id']);
		$getVideo = $this->db->get('book')->row();
		?>
                                    <tr>

                                        <td> <?=$getVideo->name?>
                                    </td>

                                    <td>&pound;<?=$item['price']?></td>
                                    <td>
                                        <?=$item['qty']?>
                                    </td>
                                    <td>&pound;<?=$item['subtotal']?></td>

                                    <td>
                                        <a class="btn btn-danger" href="<?=base_url()?>panel/book/remove_cart/<?=$item['rowid']?>"><span class="fa fa-trash-o"></span></a>
                                    </td>
                                </tr>
                            <?php }
} else {
	?>
                            <tr>
                                <td colspan="100%">Cart empty!</td>
                            </tr>
                            <?php
}
?>
                    </tbody>
                </table>
            </div>
            <?php
if (!empty($this->cart->contents())) {
	?>

 <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Client </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="customer_id" id="getCustomerDetail" class="form-control select" data-live-search="true">
                                       <option value="">Select Client</option>
                                       <?php
foreach ($customer as $row) {?>
  <option value="<?=$row->id?>"><?=$row->username?> <?=$row->lastname?> (<?=$row->email?>) (<?=$row->phone?>)</option>
  <?php }?>
                                    </select>
                                 </div>
                              </div>
                           </div>

                        <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label"></label>
                              <div class="col-md-6 col-xs-12">
                                 Or
                              </div>
                           </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">First Name</label>
                    <div class="col-md-6 col-xs-12">
                        <input type="text"  placeholder="First Name" id="getFirstName" class="form-control" name="first_name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                    <div class="col-md-6 col-xs-12">
                        <input type="text" placeholder="Last Name" id="getLastName" class="form-control" name="last_name">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Email</label>
                    <div class="col-md-6 col-xs-12">
                        <input type="text" class="form-control" id="getEmail" placeholder="Email" name="email">
                    </div>
                </div>
<hr />
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Address <span style="color: red;"> *</span></label>
                    <div class="col-md-6 col-xs-12">
                      <textarea type="text" required placeholder="Address" id="getAddress" class="form-control" name="address"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Post Code</label>
                    <div class="col-md-6 col-xs-12">
                        <input type="text" class="form-control" placeholder="Post Code" name="zip_code">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Country</label>
                    <div class="col-md-6 col-xs-12">
                        <input type="text" class="form-control" placeholder="Country" name="country">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Phone</label>
                    <div class="col-md-6 col-xs-12">
                        <input type="text" id="getPhone" class="form-control" placeholder="Phone" name="phone">
                    </div>
                </div>
              <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Message</label>
                    <div class="col-md-6 col-xs-12">
                        <textarea type="text" placeholder="Message" class="form-control" name="message"></textarea>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">International delivery &pound;14.95</label>
                    <div class="col-md-6 col-xs-12">
                        <div style="margin-top: 6px;">
                            <input id="Internationaldelivery" type="checkbox" value="14.95" name="international_delivery">
                        </div>
                    </div>
                </div>




                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Send Payment Link </label>
                  <div class="col-md-6 col-xs-12">
                     <div  style="margin-top: 6px;">
                        <input type="checkbox" name="send_invoice">
                     </div>
                  </div>
               </div>


                 <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Total</label>
                    <div class="col-md-6 col-xs-12">
                        <div style="margin-top: 6px;">
                            &pound;<span id="getTotal"><?=$this->cart->total()?></span>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <button class="btn btn-primary pull-right">Submit</button>
                </div>
            <?php }?>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function() {

      $('#Internationaldelivery').change(function(){

        var total = <?=$this->cart->total()?>;
        var value = 0;
        if(this.checked)
        {
           value = $(this).val();
        }

        total = parseFloat(total)+parseFloat(value);

        $('#getTotal').html(total.toFixed(2));

      });

      $('.datepicker_new').datepicker({
            format: 'dd-mm-yyyy',
      });


  });

</script>


