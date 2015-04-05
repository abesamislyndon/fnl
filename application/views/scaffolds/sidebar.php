   <!--/. NAV SIDE BAR  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
               <li class = "divider"></li>
            <li><a href="<?php echo base_url()?>dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url()?>quotation/overdue_quotation_list"><i class="fa fa-fw fa-file"></i>Overdue Quotation</a><?php foreach($overdue as $overdue_each){?><?php if( $overdue_each->total == 0){?><span class = "notification_no none"></span><?php }else{ ?><span class = "notification_no"><?php echo $overdue_each->total; } }?></span></li>
            <li><a href="<?php echo base_url()?>quotation/quotationlist"><i class="fa fa-desktop"></i>Quotation List</a><?php foreach($count_quote as $pending_quote){?><?php if( $pending_quote->total == 0){?><span class = "notification_no none"></span><?php }else{ ?><span class = "notification_no"><?php echo $pending_quote->total; } }?></span></li>
            <li><a href="<?php echo base_url()?>jobwork/jobwork_list"><i class="fa fa-fw fa-file"></i>Job Work List</a><?php foreach($count_jobwork as $pending_jobwork){?><?php if( $pending_jobwork->total == 0){?><span class = "notification_no none"></span><?php }else{ ?><span class = "notification_no"><?php echo $pending_jobwork->total; } } ?></span></li>
            <li><a href="<?php echo base_url()?>service_report/service_report_list"><i class="fa fa-fw fa-file"></i>Checkout List</a><?php foreach($job_complete as $complete_jobwork){?><?php if( $complete_jobwork->total == 0){?><span class = "notification_no none"></span><?php }else{ ?><span class = "notification_no"><?php echo $complete_jobwork->total; } } ?></span></li>
           <li class = "divider"></li>
            <li><a href="<?php echo base_url()?>quotation/form"><i class="fa fa-fw fa-file"></i>Form</a></li>
           
             <li>
                <a href="#"><i class="fa fa-files-o"></i>Manage Description<span class="fa arrow arrow1"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url()?>description"><i class="fa fa-files-o"></i>Add New Description</a></li>
                   <li><a href="<?php echo base_url()?>description/description_list"><i class="fa fa-files-o"></i>Description List</a></li>
       
                </ul>
       
             <li>
    
            <li>
                <a href="#"><i class="fa fa-search-plus"></i>Search<span class="fa arrow arrow1"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url()?>search/quotation_search">by Quotation #</a></li>
                    <li><a href="<?php echo base_url()?>search/sr_search">by Service report #</a></li>
                    <li><a href="<?php echo base_url()?>search/invoice_search">by Invoice #</a></li>
                    <li><a href="<?php echo base_url()?>search/company_search">by Company</a></li>
                </ul>
       
             <li>
                <a href="#"><i class="fa fa-sitemap"></i>Generate Report<span class="fa arrow arrow1"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url()?>report/generate_report_reject">Rejected Quotation</a></li>
                    <li><a href="<?php echo base_url()?>report/generate_report_complete">Job Complete</a></li>
                    <li><a href="<?php echo base_url()?>report/generate_report_invoice">Invoice</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-user"></i>Manage User<span class="fa arrow arrow1"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url()?>manage_user_accounts/add_user">Add New User</a></li>
                    <li><a href="<?php echo base_url()?>manage_user_accounts/account_list">User List</a></li>
                </ul>
            </li>
            <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        </ul>
    </div>
</nav>


