   <div class="col-lg-3  col-md-12">

              <ul>
                        <!-- <li class="active"> -->
                     <li class="<?php if ($this->uri->segment(2) == "dashboard") {
	echo "active";
}
?>">
                            <a href="<?=base_url()?>user/dashboard"><i class="fa fa-plus"></i>&nbsp;&nbsp; Dashboard</a>
                     </li>

                     <li class="<?php if ($this->uri->segment(2) == "book-order") {
	echo "active";
}
?>">
                            <a href="<?=base_url()?>user/book-order"><i class="fa fa-plus"></i>&nbsp;&nbsp;Book Orders</a>
                      </li>

                      <li class="<?php if ($this->uri->segment(2) == "center-course-dates") {
	echo "active";
}
?>">
                             <a href="<?=base_url()?>user/center-course-dates"><i class="fa fa-plus"></i>&nbsp;&nbsp;Course and Exam Dates</a>
                      </li>

                      <li class="<?php if ($this->uri->segment(2) == "course"){
                      echo "active";
                      }
                      ?>">
<a href="<?=base_url()?>user/course"><i class="fa fa-plus"></i>&nbsp;&nbsp;Course</a>

                      </li>



                       <li class="<?php if ($this->uri->segment(2) == "profile") {
	echo "active";
}
?>">
                          <a href="<?=base_url()?>user/profile"><i class="fa fa-plus"></i>&nbsp;&nbsp;Account Details</a>
                       </li>

                        <li class="<?php if ($this->uri->segment(2) == "logout") {
	echo "active";
}
?>">
                          <a href="<?=base_url()?>user/logout"><i class="fa fa-plus"></i>&nbsp;&nbsp;Logout</a></li>
                      </ul>


          </div>
