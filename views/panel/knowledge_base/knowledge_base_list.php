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
                    <li><a>Knowledge Base</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Knowledge Base List</h2>
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

                            <?php
if ($this->session->userdata('user_account_role') == '1') {
	?>
                             <a href="<?=base_url()?>panel/knowledge_base/add_knowledge_base" class="btn btn-primary" title="Add New Knowledge Base"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Knowledge Base</span></a>
                             <?php }
?>


                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Knowledge Base Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                               <form action="" method = "get">

                               <div class="col-md-2">
                                <label>ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                                </div>
                                <div class="col-md-6">
                                <label> Question</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('question')) ? $this->input->get(' question') : ''?>" placeholder="Question" name="question"/>
                                </div>
                              <!--    <div class="col-md-3">
                                <label> Answer</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('answer')) ? $this->input->get('answer') : ''?>" placeholder="Answer" name="answer"/>
                                </div> -->
                               <!--     <div class="col-md-2">
                                <label> Start Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('start_date')) ? $this->input->get('start_date') : ''?>" placeholder="Start Date" name="start_date"/>
                                </div>
                                 <div class="col-md-2">
                                <label> End Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('end_date')) ? $this->input->get('end_date') : ''?>" placeholder="End Date" name="end_date"/>
                                </div> -->

                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="<?=base_url()?>panel/knowledge_base/knowledge_base_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Knowledge Base List</h3>
                                </div>
                                <div class="panel-body">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Question</th>
                                                <th>Answer</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getKnowledge)) {
	foreach ($getKnowledge as $value) {
		?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                        <td><?=$value->question?></td>
                                                        <td><?=$value->answer?></td>



                                                        <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                                        <td>
        <a class="btn btn-success" href="<?=base_url()?>panel/knowledge_base/view_knowledge_base/<?=$value->id?>" ><span class="fa fa-eye"></span></a>
                                <?php
if ($this->session->userdata('user_account_role') == '1') {
			?>

     <a class="btn btn-primary" href="<?=base_url()?>panel/knowledge_base/edit_knowledge_base/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
         <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/knowledge_base/delete_knowledge_base/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
         <?php }
		?>
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
      $('.datepicker_new').datepicker({
        format: 'dd-mm-yyyy',
    });
});

</script>


