function leit(str)
{
if (str.length==0)
  { 
  document.getElementById("txtFlokkur").innerHTML="";
  return;
  }
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtFlokkur").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","saekjasearch.php?leit="+str,true);
xmlhttp.send();
}
