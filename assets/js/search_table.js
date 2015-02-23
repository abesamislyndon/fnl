function searchItem(){
  xmlhttp= new XMLHttpRequest();
  xmlhttp.open("GET", "main/search_item?item="+document.form1.search_item.value,false);
  xmlhttp.send(null);
  document.getElementById("search_table").innerHTML=xmlhttp.responseText;
}
$(document).ready(function(e) {
      $.ajaxSetup({cache:false});
      $('#search_table').load('main/display_info');
    });

