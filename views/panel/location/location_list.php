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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Location List</h2>
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
                            <a href="<?=base_url()?>panel/location/add_location" class="btn btn-primary" title="Add New Location"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Location</span></a>
                          <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Location Search</h3>
                                </div>


                           <div class="panel-body">

                             <form action="" method = "get">
                               <div class="col-md-2">
                                <label>ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                                </div>
                                <div class="col-md-2">
                                <label>Location</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('name')) ? $this->input->get('name') : ''?>" placeholder="Location" name="name"/>
                                </div>
                                <div class="col-md-2">
                                <label>Venue Name</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('venue_name')) ? $this->input->get('venue_name') : ''?>" placeholder="Venue Name" name="venue_name"/>
                                </div>


                          <div class="col-sm-2">
            <?php
                $type = !empty($this->input->get('type')) ? $this->input->get('type') : '';
            ?>

                                 <label>Type</label>
                                   <select class="form-control" name="type">
                                      <option value="">Select Type</option>
                                      <option <?=($type == 'OET')?'selected':''?> value="OET">OET</option>
                                      <option <?=($type == 'OSCE')?'selected':''?> value="OSCE">OSCE</option>
                                      <option <?=($type == 'NMC CBT')?'selected':''?>  value="NMC CBT">NMC CBT</option>
                                      <option <?=($type == 'GMC Plab')?'selected':''?> value="GMC Plab">GMC Plab</option>
                                      <option <?=($type == 'Other')?'selected':''?> value="Other">Other</option>
                                  </select>
                          </select>
                        
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
                                    <a href="<?=base_url()?>panel/location/location_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                        </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Location List</h3>
                                </div>



                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Location</th>
                                                    <th>Venue Name</th>
                <th>Type</th>
                                                <th>Create Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getLocation)) {
	foreach ($getLocation as $value) {
		?>
                        <tr>
                            <td><?=$value->id?></td>
                            <td><?=$value->location?></td>
                            <td><?=$value->venue_name?></td>
                            <td><?=$value->type?></td>

                            <td><?=date('d-m-Y', strtotime($value->created_date));?></td>
                            <td>
                                <a class="btn btn-primary" href="<?=base_url()?>panel/location/edit_location/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/location/delete_location/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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
