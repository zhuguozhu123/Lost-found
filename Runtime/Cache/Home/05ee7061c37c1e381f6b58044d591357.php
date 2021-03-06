<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>南苑校园失物招领登录</title>
		<link rel="stylesheet" type="text/css" href="/lost_found/Public/css/bootstrap.min.css">
		<script type="text/javascript" src="/lost_found/Public/js/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="/lost_found/Public/js/bootstrap.min.js"></script>
	    <style type="text/css">
			.header {
				margin-left: 0;
				margin-right: 0;
				height:50px;
				line-height: 50px;
				background-color: #4A515B;
				color:#fff;
			}
			.content {
				margin-top:0px;
				/*width:90%;*/
				margin-left: 5%;
			}
			.content input {
				width:60%;
				border:1px #eee solid;
				height:30px;
				line-height: 30px;
				padding:16px 16px 16px 16px ;
			}
		</style>
	</head>
	<body>
		<div align="center" class="header">
			验证手机号
		</div>
		
		  <div id="myCarousel" class="carousel slide"  style="height:140px;">
                      <!-- 轮播（Carousel）项目 -->
                      <div class="carousel-inner">
                          <div class="item active">
                              <img src="/lost_found/Public/img/1.jpg"  alt="First slide">
                          </div>
                      </div>
         </div>
     
		<div class="content">
			<div>
				<input type="text" placeholder="手机号" id="mobile">
				<button onclick="getCode()" id="getBtn" class="btn btn-warning">
					获取验证码
				</button>
				<div id="getdefaultBtn" class="btn btn-gray" style="display: none">
					60s后重新获取
				</div>
			</div>
			<input class="form-control" style="width:80%;margin-top:16px" type="text" placeholder="输入验证码" id="code">
		</div>
			<div align="center">
				<button style="width:80%;margin-top:60px" onclick="checkCode()" class="btn btn-success">
					提交
				</button>
			</div>

			<div style="visibility:hidden;display:none">
			<div id="getCodeAjax">
				<?php echo U('Home/Index/getCodeAjax');?>
			</div>
			<div id="checkCodeAjax">
				<?php echo U('Home/Index/checkCodeAjax');?>
			</div>
			<div id="loginindex">
			    <?php echo U('Home/User/index');?>
			</div>
		    </div>
		<script type="text/javascript">

		//验证码码点击后需要等待60秒
			var disableBtn = function(){
				var btn = $('#getBtn');
				var defaultBtn = $('#getdefaultBtn');
				btn.hide();
				defaultBtn.show();
				var number = 60;
				defaultBtn.html(number+ "s后重新获取");
				var intervalFun = function(){
					if(number == 0){
						btn.show();
						defaultBtn.hide();
						clearInterval(interval);
					}else {
						number -- ;
						defaultBtn.html(number + "s后重新获取");
					}
				}
				var interval = setInterval(function(){
					intervalFun();
				},1000);
			}

            //获取验证码
			var getCode = function(){
				var data = {
					mobile:$('#mobile').val()
				}
				$.ajax({
					url:$('#getCodeAjax').html(),
					type:'post',
					data:data,
					success:function(res){
						if(res.success){
							disableBtn();//获取成功
						}else {
							alert(res.errmsg);
						}
					},
					error:function(){
						alter('网络错误');
					}
					
				})
			}

            //点击提交按钮时进行验证
			var checkCode = function(){
				var data = {
					mobile:$('#mobile').val(),
					code:$('#code').val()
				}
				$.ajax({
					url:$('#checkCodeAjax').html(),
					type:'post',
					data:data,
					//请求成功
					success:function(res){
						if(res.success){
							alert(res.msg);
							window.location.href = $('#loginindex').html();
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
			
		  </script>  
	</body>
</html>