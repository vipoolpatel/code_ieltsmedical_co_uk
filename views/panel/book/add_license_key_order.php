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
                <li><a>Licence Key Order</a></li>
            </ul>
            <div class="page-title">
                <h2><span class="fa fa-arrow-circle-o-left"></span> Create  Licence Key Order</h2>
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




               <form class="form-horizontal" id="add_app" method="post" action="<?=base_url()?>panel/book/submit_license_key" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create Licence Key Order</h3>
                    </div>
                    <div class="panel-body">
                  </div>

                              <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Licence Key <span style="color: red;"> *</span></label>
                                    <div class="col-md-6 col-xs-12">
                                      <div class="">
                                        <select name="license_key_id" id="license_key_id" class="form-control select" data-live-search="true" required>
                                            <option data-val="0" value="">Select Licence Key</option>
                                            <?php
foreach ($getBook as $row4) {
	?> <option data-val="<?=$row4->price?>" value="<?=$row4->id?>"><?=$row4->name?> (&pound; <?=$row4->price?>)</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>

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
                    <label class="col-md-3 col-xs-12 control-label">International delivery &pound;9.95</label>
                    <div class="col-md-6 col-xs-12">
                        <div style="margin-top: 6px;">
                            <input id="Internationaldelivery" type="checkbox" value="9.95" name="international_delivery">
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
                            &pound;<span id="getTotal">0</span>
                            <input type="hidden" value="0" id="license_key_id_total" >
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function() {

      $('#license_key_id').change(function(){
          var total = $('#license_key_id option:selected').attr('data-val');
          $('#getTotal').html(total);
          $('#license_key_id_total').val(total);
      });

      $('#Internationaldelivery').change(function(){

        var total = $('#license_key_id_total').val();
        if(total == '0' || total == '')
        {
          total = 0;
        }

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


