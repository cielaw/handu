$(function(){
			var validate = {email:false,password:false,repassword:false,verify:false};
			$('#email').blur(function(){
				var email = $(this).val();
				if(email == ''){
					$('#emailError').html('请填写邮箱');
					validate.email = false;
				}else{
					$('#emailError').html('');
					validate.email = true;
				}
				//正则判断
				if(!/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/g.test(email)){
					msg = '所填写必须是邮箱';
					$('#emailError').html(msg);
					validate.email = false;
					return false;
				}else{
					$('#emailError').html('');
					validate.email = true;
				}
				
				$.ajax({
					type:"post",
					url:"ajaxEmail",
					data:{email,email},
					dataType:'html',
					success:function(phpData){
						if(phpData==1){
							$('#emailError').html('邮箱可以注册');
							validate.email = true;
							
						}else{
							$('#emailError').html('邮箱已注册');
							validate.email = false;
						}
					}
				});	
			});
			$('#password').blur(function(){
				var password = $(this).val();
				if(!/^[a-zA-Z0-9_\u4e00-\u9fa5]{8,24}$/.test(password)){
					$('#passwordError').html('必须是8-12位');
					validate.password = false;
				}else{
					$('#passwordError').html('');
					validate.password = true;
				}
			});
			$('#repassword').blur(function(){
				var repassword = $(this).val();
				var password = $('#password').val();
				if(repassword != password){
					$('#repassworderror').html('两次密码不一致');
					validate.repassword = false;
				}
				if(!/^[a-zA-Z0-9_\u4e00-\u9fa5]{8,24}$/.test(password)){
					$('#repassworderror').html('必须是8-12位');
					validate.repassword = false;
				}else{
					$('#repassworderror').html('');
					validate.repassword = true;
				}
			});
			$('#imgVerify').click(function(){
				var src = $(this).attr('src');
				$(this).attr('src',src+'&'+Math.random());
				
			});
			$('.verify').blur(function(){
				var verify = $(this).val();
				if(verify == ''){
					$('#verifyError').html('请填写验证码');
					validate.verify = false;
					return false;
				}else{
					validate.verify = true;
				}
				$.ajax({
					type:"post",
					url:"verifyAjax",
					data:{verify,verify},
					dataType:'html',
					success:function(phpData){
						if(phpData==1){
							$('#verifyError').html('');
							validate.verify = true;
							
						}else{
							$('#verifyError').html('验证码错误');
							validate.verify = false;
						}
					}
				});	
			});
			$('#registerForm').submit(function(){
				if(validate.verify == false || validate.repassword==false || validate.password ==false || validate.email == false){
					return false;
				}
				
				
			});
		})












