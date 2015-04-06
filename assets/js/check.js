function showUser(str)
{
if (str=="")
{
    document.getElementById("company_name").value="";
    return;
}
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        var data = JSON.parse(xmlhttp.responseText);
        for(var i=0;i<data.length;i++) 
        {
          document.getElementById("company_name").value = data[i].name;
          document.getElementById("address").value = data[i].web;
        }
    }
}
xmlhttp.open("GET","formdata.php?q="+str,true);
xmlhttp.send();
}