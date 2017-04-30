<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>
个人失物新建报失
</title>
</head>
<body style="margin:10px auto;">
<h1>个人失物新建报失</h1>
<hr>
  <table style="margin:10px auto;"> 
      <tr>
      <td>
      <label><span>类型：</span></label>
      <input type="text"  id="type" size="30"/>
      </td>
      </tr>
      <tr>
      <td>
      <label><span>学号：</span></label>
      <input type="text"  id="number" size="30"/>
      </td>
      </tr>
      <tr>
      <td>
      <label><span>姓名: </span></label>
      <input type="text"  id="name" size="30" />
      </td>
      </tr>
      <tr>
      <td>
      <label><span>备注信息:</span></label>
      <textarea  id="desc" /></textarea>
      </td>
      </tr>
         <td>
         <button onclick="personallostadd()">提交</button>
         </td>
      </tr>
 </table>
<div style="visibility:hidden;display:none">
         <div id="personallostaddAjax">
         <?php echo U('Home/Personal/lostaddAjax');?>
         </div>
</div>
<button onclick="back()" >返回</button>
<button onclick="fullMsg()" >个人信息</button>
<button onclick="lostlist()" >我的报失</button>
<button onclick="lostadd()" >新建报失</button>
<div style="visibility:hidden;display:none">
<div id="personalindex">
<?php echo U('Home/Personal/index');?>
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
         var personallostadd = function(){
            var data = {
               type:$('#type').val(),
               name:$('#name').val(),
               number:$('#number').val(),
               desc:$('#desc').val()
            }
            $.ajax({
               url:$('#personallostaddAjax').html(),
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
         window.location.href = $('#personalindex').html();
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