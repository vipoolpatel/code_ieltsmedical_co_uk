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
            <li><a>Joining Instruction Booking</a></li>
         </ul>
         <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Joining Instruction Booking</h2>
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
                        <h3 class="panel-title">
                           <?=$upcomming->course?> - Joining Instruction Booking <span style="color: blue">(Start Date: <?php echo date('d-m-Y', strtotime($upcomming->start_date)); ?> to End date: <?php echo date('d-m-Y', strtotime($upcomming->end_date)); ?>)</span>
                        </h3>
                     </div>
                     <div class="panel-body" style="overflow: auto;">
                        <form action="<?=base_url()?>panel/centercoursedates/booking_generate_pdf" method="post"  class="form-horizontal" accept-charset="utf-8">
                           <input type="hidden" value="<?=$upcomming->id?>" name="id">
                           <table  class="table " >
                              <thead>
                                 <tr>
                                    <th>Action</th>
                                    <th>Course Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Location</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>
                                       <input  type="checkbox" checked name="checkbox_1" >
                                    </td>
                                    <td>
                                       <input  type="text"  name="event_name_1" value="<?=$upcomming->course?>" class="form-control">
                                    </td>
                                    <td>
                                       <input   type="text" name="date_1" value="<?=date('d-m-Y', strtotime($upcomming->start_date))?>" class="form-control datepicker_new">
                                    </td>
                                    <td>
                                       <input  type="text" name="time_1" value="<?=$upcomming->time?>" class="form-control">
                                    </td>
                                    <td>
                                    <input required="" value="IM Marylebone" placeholder="IM Marylebone" type="text" name="address_1" class="form-control">
                                    <br />
                                       <select required name="location_1" class="form-control">
                                          <option value="">Select Location</option>
                                          <?php
foreach ($location as $row) {
	?>
                                          <option value="<?=$row->location?>"><?=$row->location?></option>
                                          <?php }?>
                                       </select>
                                    </td>
                                 </tr>

                                  <tr>
                                    <td>
                                       <input  type="checkbox" checked name="checkbox_2" >
                                    </td>
                                    <td>
                                       <input  type="text" name="event_name_2" value="<?=$upcomming->course?>" class="form-control">
                                    </td>
                                    <td>
                                    <?php

$middle = date('Y-m-d', strtotime($upcomming->start_date . ' + 1 days'));
?>
                                       <input   type="text" name="date_2" value="<?=date('d-m-Y', strtotime($middle))?>" class="form-control datepicker_new">
                                    </td>
                                    <td>
                                       <input  type="text" name="time_2" value="<?=$upcomming->time?>" class="form-control">
                                    </td>
                                    <td>
                                    <input required="" placeholder="IM Marylebone" value="IM Marylebone" type="text" name="address_2" class="form-control">
                                    <br />
                                       <select required name="location_2" class="form-control">
                                          <option value="">Select Location</option>
                                          <?php
foreach ($location as $row) {
	?>
                                          <option value="<?=$row->location?>"><?=$row->location?></option>
                                          <?php }?>
                                       </select>
                                    </td>
                                 </tr>



                                  <tr>
                                    <td>
                                       <input  type="checkbox" checked name="checkbox_3" >
                                    </td>
                                    <td>
                                       <input  type="text" name="event_name_3" value="<?=$upcomming->course?>" class="form-control">
                                    </td>
                                    <td>
                                       <input   type="text" name="date_3" value="<?=date('d-m-Y', strtotime($upcomming->end_date))?>" class="form-control datepicker_new">
                                    </td>
                                    <td>
                                       <input  type="text" name="time_3" value="<?=$upcomming->time?>" class="form-control">
                                    </td>
                                    <td>
                                    <input required="" placeholder="IM Marylebone" value="IM Marylebone" type="text" name="address_3" class="form-control">
                                    <br />
                                       <select required name="location_3" class="form-control">
                                          <option value="">Select Location</option>
                                          <?php
foreach ($location as $row) {
	?>
                                          <option value="<?=$row->location?>"><?=$row->location?></option>
                                          <?php }?>
                                       </select>
                                    </td>
                                 </tr>


                                   <tr>
                                    <td>
                                       <input  type="checkbox"  name="checkbox_4" >
                                    </td>
                                    <td>
                                       <input  type="text" name="event_name_4" value="" class="form-control">
                                    </td>
                                    <td>
                                       <input   type="text" name="date_4" value="" class="form-control datepicker_new">
                                    </td>
                                    <td>
                                       <input  type="text" name="time_4" value="" class="form-control">
                                    </td>
                                    <td>
                                    <input  placeholder="IM Marylebone" value="" type="text" name="address_4" class="form-control">
                                    <br />
                                       <select  name="location_4" class="form-control">
                                          <option value="">Select Location</option>
                                          <?php
foreach ($location as $row) {
	?>
                                          <option value="<?=$row->location?>"><?=$row->location?></option>
                                          <?php }?>
                                       </select>
                                    </td>
                                 </tr>


                                   <tr>
                                    <td>
                                       <input  type="checkbox"  name="checkbox_5" >
                                    </td>
                                    <td>
                                       <input  type="text" name="event_name_5" value="" class="form-control">
                                    </td>
                                    <td>
                                       <input   type="text" name="date_5" value="" class="form-control datepicker_new">
                                    </td>
                                    <td>
                                       <input  type="text" name="time_5" value="" class="form-control">
                                    </td>
                                    <td>
                                    <input  placeholder="IM Marylebone" value="" type="text" name="address_5" class="form-control">
                                    <br />
                                       <select  name="location_5" class="form-control">
                                          <option value="">Select Location</option>
                                          <?php
foreach ($location as $row) {
	?>
                                          <option value="<?=$row->location?>"><?=$row->location?></option>
                                          <?php }?>
                                       </select>
                                    </td>
                                 </tr>






                              </tbody>
                           </table>
                           <div class="form-group">
                              <div class="col-sm-12" >
                                 <button type="submit" style="float: right;margin-top: 8px;" class="btn btn-success"> Generate PDF</button>
                              </div>
                           </div>
                        </form>
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
