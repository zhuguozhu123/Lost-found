<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>
个人失物新建报失
</title>
</head>
<body style="margin:10px auto;">
<h1>个人捡到失物报新建报失</h1>
<hr>
  <table style="margin:10px auto;">
      <tr>
      <td>
      <label><span>失物学号：</span></label>
      <input type="text" id="lostnumber"size="30"/>
      </td>
      </tr>
      <tr>
      <td>
      <label><span>失物姓名: </span></label>
      <input type="text" id="lostname" size="30" />
      </td>
      </tr>
      <tr>
      <td>
      <label><span>失物备注信息:</span></label>
      <textarea id="lostdesc" /></textarea>
      </td>
      </tr>
       <tr>
      <td>
      <label><span>拾物者学号：</span></label>
      <input type="text" id="findnumber" size="30"/>
      </td>
      </tr>
      <tr>
      <td>
      <label><span>拾物者姓名: </span></label>
      <input type="text" id="findname" size="30" />
      </td>
      </tr>
      <tr>
      <td>
      <label><span>拾物者备注信息:</span></label>
      <textarea  id="finddesc" /></textarea>
      </td>
      </tr>
      <tr>
         <td>
         <button onclick="findadd()">提交</button>
         </td>
      </tr>
 </table>
 <div style="visibility:hidden;display:none">
         <div id="personalfindaddAjax">
         <?php echo U('Home/Personal/findaddAjax');?>
         </div>
  </div>
<button onclick="back()" >返回</button>
<button onclick="fullMsg()" >个人信息</button>
<button onclick="lostlist()" >我的报失</button>
<button onclick="lostadd()" >新建报失</button>
<div style="visibility:hidden;display:none">
<div id="userindex">
<?php echo U('Home/User/index');?>
</div>
<div id="fullMsg">
<?php echo U('Home/User/fullMsg');?>
</div>
<div id="personallostlist">
<?php echo U('Home/Personal/lostlist');?>
</div>
<div id="personallostadd">
<?php echo U('Home/Personal/lostadd');?>
</div>
</div>
      <script type="text/javascript" src="/campus/Public/js/jquery-2.2.4.min.js"></script>
      <script type="text/javascript" src="/campus/Public/js/bootstrap.min.js"></script>
      <script type="text/javascript">


            //点击提交按钮时进行提交
         var findadd = function(){
            var data = {
               lname:$('#lostname').val(),
               lnumber:$('#lostnumber').val(),
               ldesc:$('#lostdesc').val(),
               fname:$('#findname').val(),
               fnumber:$('#findnumber').val(),
               fdesc:$('#finddesc').val()
            }
            $.ajax({
               url:$('#personalfindaddAjax').html(),
               type:'post',
               data:data,
               //请求成功
               success:function(res){
                  if(res.success){
                     alert(res.msg);
                  }else {
                     alert(res.errmsg);
                  }
               },
               //请求失败
               error:function(){
                  alert('网络错误');
               }
            })
         }



      var back = function(){
         window.location.href = $('#userindex').html();
      }
      var fullMsg = function(){
         window.location.href = $('#fullMsg').html();
      }
      var lostlist = function(){
         window.location.href = $('#personallostlist').html();
      }
      var lostadd = function(){
         window.location.href = $('#personallostadd').html();
      }

         </script>
</body>
</html>