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
                    <li><a>Contact Us</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Contact Us List</h2>
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
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Contact Us Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                               <form action="" method = "get">

                               <div class="col-md-3">
                                <label>ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                                </div>
                                <div class="col-md-3">
                                <label> First Name</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('first_name')) ? $this->input->get(' first_name') : ''?>" placeholder="First Name" name="first_name"/>
                                </div>
                                 <div class="col-md-3">
                                <label> Last Name</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('last_name')) ? $this->input->get('last_name') : ''?>" placeholder="Last Name" name="last_name"/>
                                </div>
                                <div class="col-md-3">
                                <label> Email ID</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('email')) ? $this->input->get('email') : ''?>" placeholder="Email ID" name="email"/>
                                </div>

                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="<?=base_url()?>panel/contactus/contact_us_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Contact Us List</h3>
                                </div>
                                <div class="panel-body">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name </th>
                                                <th>Email ID</th>
                                                <th>Message</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getContactus)) {
	foreach ($getContactus as $value) {
		?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                        <td><?=$value->first_name?></td>
                                                        <td><?=$value->last_name?></td>
                                                         <td><?=$value->email?></td>
                                                          <td><?=$value->message?></td>

                        
                                                        <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                                        <td>
                                                            
                                                            <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/contactus/delete_contactus/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
                                                        </td>
                                                    </tr>

                                            <?php }
} else {?>
                                            <tr><td colspan="100%">No record found.</td></tr>
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






<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function() {

   $( ".datepicker" ).datepicker();

$( ".datepicker1" ).datepicker();

});

</script>


