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
                    <li><a>Company</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Company List</h2>
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
                            <a href="<?=base_url()?>panel/company/add_company" class="btn btn-primary" title="Add New Company"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Company</span></a>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Course Company List Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                             <form action="" method = "get">
                               <div class="col-md-2">
                                <label>ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                                </div>

                            <div class="col-md-3">
                                <label>Company Code</label>
                                <input type="text" value="<?=!empty($this->input->get('company_code')) ? $this->input->get('company_code') : ''?>" class="form-control" placeholder="Company Code" name="company_code"/>
                                </div>

                                <div class="col-md-3">
                                <label>Company Price</label>
                                <input type="text" value="<?=!empty($this->input->get('company_price')) ? $this->input->get('company_price') : ''?>" class="form-control" placeholder="Company Price" name="company_price"/>
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
                                    <a href="<?=base_url()?>panel/company/company_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Company List</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Company ID</th>
                                                <th>Company Code</th>
                                                <th>Company Price</th>
                                                <th>Company Type</th>
                                                <th>Create Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getCompany)) {
	foreach ($getCompany as $value) {
		?>
                        <tr>
                            <td><?=$value->id?></td>
                            <td><?=$value->company_code?></td>
                            <td><?=$value->company_price?></td>
                            <td><?=($value->type == 1) ? 'Amount' : 'Percentage'?></td>
                            <td><?=date('d-m-Y', strtotime($value->created_date));?></td>
                            <td>
                                <a class="btn btn-primary" href="<?=base_url()?>panel/company/edit_company/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/company/delete_company/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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




<script type="text/javascript" src="<?=base_url()?>front/bootstrap-datepicker.min.js"></script>

<script>
$(document).ready(function() {
      $('.datepicker_new').datepicker({
        format: 'dd-mm-yyyy',
    });
});

</script>
