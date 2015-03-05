
  $(document).ready(function() {
    current_page = document.location.href
    if (current_page.match(/dashboard/)) 
    {
    $("ul#main-menu li:eq(0)").addClass('selected');
    } 
    else if (current_page.match(/quotationlist/)) 
    {
    $("ul#main-menuli:eq(1)").addClass('selected');
    }
    else if (current_page.match(/overdue_quotation_list/)) 
     {
     $("ul#main-menu li:eq(2)").addClass('selected');
    } 
    else if (current_page.match(/jobwork_list/)) 
    {
      $("ul#main-menu li:eq(3)").addClass('selected');
    } 
    else if (current_page.match(/service_report_list/)) 
    {
    $("ul#main-menu li:eq(4)").addClass('selected');
    }  
    else if (current_page.match(/quotation/)) 
    {
    $("ul#main-menu li:eq(5)").addClass('selected');
    } 
    else if (current_page.match(/form/)) 
    {
    $("ul#main-menu li:eq(6)").addClass('selected');
    } 

   else { // don't mark any nav links as selected
      $("ul#navigation li").removeClass('selected');
};
});
