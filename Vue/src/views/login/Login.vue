<template>
	<div class="wrapper">
		<img class="wrapper_img" src="../../assets/user.png" alt="">
		<div class="wrapper_input">
		
			<input class="wrapper_input_content" placeholder="请输入手机号" v-model="data.username"> <!-- 双向绑定数据 -->
		</div>
		<div class="wrapper_input">
			<input class="wrapper_input_content" placeholder="请输入密码" v-model="data.password" type="password">
		</div>
		<div class="wrapper_login-button" @click="handleLogin">登录</div>
		<div class="wrapper_login-link" @click="handleRegister">立即注册</div>
		<!-- 弹框提示信息 -->
		<Toast v-if="data.showToast" :message="data.toastMessage"/>
	</div>
</template>

<script>
	import { useRouter } from 'vue-router';
	import {reactive} from 'vue'
	import {post} from '../../utils/request.js'
	// 导入组件
	import Toast from '../../components/Toast.vue'
	export default{
	name:'Login',
	components:{Toast},
	setup(){
		// 存储用户信息
		const data = reactive({
			username:'',
			password:'',
			showToast:false,
			toastMessage:''
		})

		// 设置提示框信息显示
		const showToasts = (msg) =>{
			data.showToast = true
			data.toastMessage = msg
			// 设置2秒的定时器
			setTimeout(() =>{
				data.showToast = false
				data.toastMessage = ''
			},2000)
		}
		// 定义路由实例 用于实现路由的跳转
		const router = useRouter()
		// 定义异步的函数
		const handleLogin = async() => {
		try{
			// post方式获取用户信息
			const result = await post('/api/user/login',{
				// 发送请求的时候 将username和password作为参数传递给接口
				username:data.username,
				password:data.password
			})
			// 通过返回的结果 去判断是否成功发送数据
			// ?表示这个变量后面并不确定是否包含这个参数
			if(result?.errno === 0){
				localStorage.isLogin = true;
				// 跳转到主页
				router.push({name:'Home'})
			}else{
				// 弹出提示框
				showToasts('登录失败')
			}
		}catch(e){
				showToasts('请求失败')
		}
	}
	
	// 跳转到注册页面
	const handleRegister = () =>{
		router.push({name:'Register'})
	}
	return { data,handleLogin,handleRegister}
	}
}
</script>


<style lang="scss" scoped>
	.wrapper {
		position: absolute;
		top: 40%;
		left: 0;
		right: 0;
		overflow-y: visible;
		transform: translateY(-50%);
		&_img {
			display: block;
			margin: 0 auto .4rem auto;
			width: .66rem;
			height: .66rem;
		}
		&_input {
			height: .48rem;
			margin: 0 .4rem .16rem .4rem;
			padding: 0 .16rem;
			background: #F9F9F9;
			border: 1px solid rgba(0,0,0,0.1);
			border-radius: 6px;
			&_content {
				line-height: .48rem;
				border: none;
				outline: none;
				width: 100%;
				background: none;
				font-size: .16rem;
				color: #777;
				&::placeholder {
					color: #777;
				}
			}
		}
		&_login-button {
			margin: .32rem .4rem .16rem .4rem;
			line-height: .48rem;
			background: #0091FF;
			box-shadow: 0 .04rem .08rem 0 rgba(0,145,255,0.32);
			border-radius: .04rem;
			color: #fff;
			font-size: .16rem;
			text-align: center;
		}
		&_login-link {
			font-size: .14rem;
			text-align: center;
			color: #777;
		}
	}
</style>
