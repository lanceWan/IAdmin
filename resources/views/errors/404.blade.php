<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>404</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
body{ margin:0;padding:0;font-family:Microsoft Yahei;color:#797979;text-align:center; }
img{ border:0; }
a{ color:#333; }
a:hover{ color:#f60; }
.erro-img{ position:relative;width:600px;height:600px;margin:0 auto;padding-top:50px; }
.notice-text{ position:absolute;left:190px;bottom:10px;font-size:17px; }
</style>
</head>
<body>
<div class="erro-img">
<a  href="{{url()->previous()}}" title="返回IT之家首页"><img src="http://img.ithome.com/file/images/404.png"  alt="404错误，没有找到页面" style="border:0;" /></a>
<p>{{$exception->getMessage()}}</p>
<span class="notice-text">不要慌！<strong id="overTime" style="font-size:18px;color:red;">5</strong> 秒后将自动返回上一页，请稍候...</span>
</div>
<script>
function jump()
{
    window.location.href = "{{url()->previous()}}";
}

 var ot = 5;
 var sto;
  
 function doverTime()
 {
  ot--;
  sto = setTimeout('doverTime()', 1000);
  if(ot!=0)
  	document.all['overTime'].innerHTML = ot;
  if(ot==0)
  {
   clearTimeout(sto);
   jump();
  } 
}
setTimeout("doverTime()", 1000);
</script>
</body>
</html>