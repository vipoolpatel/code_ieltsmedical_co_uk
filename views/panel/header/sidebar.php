
<div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="" style="background: #e34724; text-align: center;">
                        <a style="font-size: 22px;" href="<?=base_url()?>panel/dashboard"><b>IELTS Medical</b></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>

                    <li class="<?php if (uri_string() == 'panel/dashboard') {
	echo "active";
}
?>">
                        <a href="<?=base_url()?>panel/dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>

                                   <li class="<?php if ($this->uri->segment(2) == "client") {
	echo "active";
}
?>">
    <a href="<?=base_url()?>panel/client/client_list"><span class="fa fa-user"></span>
<span class="xn-text">Client</span>
    </a>
</li>

<li class="<?php if ($this->uri->segment(2) == "introductions") {
	echo "active";
}
?>">
<a href="<?=base_url()?>panel/introductions/introductions_list"><span class="fa fa-user"></span>
<span class="xn-text">Introductions</span>
</a>
</li>

<li class="<?php if ($this->uri->segment(2) == "knowledge_base") {
	echo "active";
}
?>">
<a href="<?=base_url()?>panel/knowledge_base/knowledge_base_list"><span class="fa fa-info-circle"></span>
<span class="xn-text">Knowledge Base</span>
</a>
</li>

<?php
if ($this->session->userdata('user_account_role') == '1') {
	?>
                    <li class="<?php if ($this->uri->segment(2) == "page") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/page/page_list"><span class="fa fa-file"></span><span class="xn-text">Page</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == "apps") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/apps/apps_list"><span class="fa fa-mobile"></span><span class="xn-text">Apps</span></a>
                    </li>

<?php }
?>

<li class="<?php if ($this->uri->segment(3) == "book_list") {
	echo "active";
}
?>">
    <a href="<?=base_url()?>panel/book/book_list"><span class="fa fa-book"></span><span class="xn-text"> Book and Video</span></a>
</li>

<li class="<?php if ($this->uri->segment(3) == "book_order") {
	echo "active";
}
?>">
    <a href="<?=base_url()?>panel/book/book_order/1"><span class="fa fa-book"></span><span class="xn-text"> Book and Video Order</span></a>
</li>

                    <?php
if ($this->session->userdata('user_account_role') == '1') {
	?>

                    <li class="<?php if ($this->uri->segment(2) == "coursemain") {
		echo "active";
	}
	?>">
                    <a href="<?=base_url()?>panel/coursemain/course_main_list"><span class="fa fa-graduation-cap"></span><span class="xn-text">Course Main</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == "course") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/course/course_list"><span class="fa fa-graduation-cap"></span><span class="xn-text">Course</span></a>
                    </li>

                      <!--   <li class="<?php if ($this->uri->segment(2) == "coursedate") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/coursedate/course_date_list"><span class="fa fa-calendar"></span><span class="xn-text">Course Date</span></a>
                    </li> -->

                    <li class="<?php if ($this->uri->segment(2) == "centercoursedates") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/centercoursedates/centercoursedates_list"><span class="fa fa-calendar"></span><span class="xn-text">Center Course Dates</span></a>
                    </li>

<?php }
?>


                     <li class="<?php if ($this->uri->segment(2) == "bookingcourse") {
	echo "active";
}
?>">
                        <a href="<?=base_url()?>panel/bookingcourse/booking_course_list"><span class="fa fa-book"></span><span class="xn-text">Course Bookings</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == "flexcoursebookings") {
	echo "active";
}
?>">
                    <a href="<?=base_url()?>panel/flexcoursebookings/flex_course_bookings_list"><span class="fa fa-book"></span><span class="xn-text">Flex Course Bookings</span></a>

                    </li>



                     <li class="<?php if ($this->uri->segment(2) == "accommodation") {
	echo "active";
}
?>">
                        <a href="<?=base_url()?>panel/accommodation/accommodation_list"><span class="fa fa-book"></span><span class="xn-text">Accommodation</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == "exam") {
	echo "active";
}
?>">
                        <a href="<?=base_url()?>panel/exam/exam_list"><span class="fa fa-book"></span><span class="xn-text">Exam</span></a>
                    </li>


                       <li class="<?php if ($this->uri->segment(2) == "livecourse") {
	echo "active";
}
?>">
                        <a href="<?=base_url()?>panel/livecourse/live_course_booking_list"><span class="fa fa-book"></span><span class="xn-text">Online Courses</span></a>
                    </li>


                    <li class="<?php if ($this->uri->segment(2) == "uploaddocument") {
	echo "active";
}
?>">
    <a href="<?=base_url()?>panel/uploaddocument/upload_document_list" title=""><span class="fa fa-file"></span><span class="xn-text">Document Library</span></a>
</li>
                                        <?php
if ($this->session->userdata('user_account_role') == '1') {
	?>


                     <li class="<?php if ($this->uri->segment(2) == "location") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/location/location_list" title=""><span class="fa fa-map-marker"></span><span class="xn-text">Location</span></a>
                    </li>


                      <li class="<?php if ($this->uri->segment(2) == "contactus") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/contactus/contact_us_list"><span class="fa fa-phone"></span><span class="xn-text">Contact Us</span></a>
                    </li>

                      <li class="<?php if ($this->uri->segment(2) == "emailsubscribe") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/emailsubscribe/email_subscribe_list"><span class="fa fa-envelope"></span><span class="xn-text">Email Subscribe</span></a>
                    </li>
                      <li class="<?php if ($this->uri->segment(2) == "calender") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/calender/calender_list"><span class="fa fa-calendar"></span><span class="xn-text">Calendar</span></a>
                    </li>

                    <li class="<?php if ($this->uri->segment(2) == "calendarbook") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/calendarbook/calendar_book_list"><span class="fa fa-calendar"></span><span class="xn-text">Book Calendar</span></a>
                    </li>

                   <li class="<?php if ($this->uri->segment(2) == "requestconsultation") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/requestconsultation/request_consultation_list"><span class="fa fa-paper-plane"></span><span class="xn-text">Request Consultation</span></a>
                    </li>





                    <li class="<?php if ($this->uri->segment(2) == "blog") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/blog/blog_list"><span class="fa fa-tag"></span><span class="xn-text">Blog</span></a>
                    </li>


                <li class="<?php if ($this->uri->segment(2) == "company") {
		echo "active";
	}
	?>">
                    <a href="<?=base_url()?>panel/company/company_list" title=""><span class="fa fa-building-o"></span><span class="xn-text">Company Code</span></a>
                </li>




                 <li class="<?php if ($this->uri->segment(2) == "document") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/document/document_list"><span class="fa fa-file"></span><span class="xn-text">Document</span></a>
                    </li>
                    <li class="<?php if ($this->uri->segment(2) == "admin") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/admin/admin_list"><span class="fa fa-user"></span> <span class="xn-text">Admin</span></a>
                    </li>


                   <!--     <li class="<?php if ($this->uri->segment(2) == "sendemail") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/sendemail/sendemail"><span class="fa fa-user"></span> <span class="xn-text">Send Email</span></a>
                    </li>
                    -->
                     <li class="<?php if ($this->uri->segment(2) == "setting") {
		echo "active";
	}
	?>">
                        <a href="<?=base_url()?>panel/setting/setting"><span class="fa fa-cog"></span> <span class="xn-text">Setting</span></a>
                    </li>
<?php }
?>

                </ul>
                <!-- END X-NAVIGATION -->
            </div>
