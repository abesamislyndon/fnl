   <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li><a href="<?php echo base_url()?>dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="<?php echo base_url()?>quotation/quotationlist"><i class="fa fa-desktop"></i>Quotation List</a><span class = "notification_no"><?php foreach($count_quote as $pending_quote){ echo $pending_quote->total; } ?></span></li>
                    <li><a href="<?php echo base_url()?>quotation/overdue_quotation_list"><i class="fa fa-fw fa-file"></i>Overdue Quotation</a><span class = "notification_no"><?php foreach($overdue as $pending_jobwork){ echo $pending_jobwork->total; } ?></span></li>
                    <li><a href="<?php echo base_url()?>jobwork/jobwork_list"><i class="fa fa-fw fa-file"></i>Job Work List</a><span class = "notification_no"><?php foreach($count_jobwork as $pending_jobwork){ echo $pending_jobwork->total; } ?></span></li>
                    <li><a href="<?php echo base_url()?>jobwork/jobwork_list"><i class="fa fa-fw fa-file"></i>Service Report  List</a><span class = "notification_no"><?php foreach($count_jobwork as $pending_jobwork){ echo $pending_jobwork->total; } ?></span></li>
                    <li><a href="<?php echo base_url()?>quotation/form"><i class="fa fa-fw fa-file"></i>Quotation Form</a></li>
                    <li><a href="<?php echo base_url()?>description"><i class="fa fa-fw fa-file"></i>Add New Description</a></li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i>Manage User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#">Add New User</a></li>
                            <li><a href="#">Update</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                </ul>
            </div>
        </nav>


    