<template>
	<div class="wrapper">
		<img class="wrapper_img" src="../../assets/user.png" alt="">
		<div class="wrapper_input">
			<input class="wrapper_input_content" placeholder="请输入手机号" v-model="data.username">
		</div>
		<div class="wrapper_input">
			<input class="wrapper_input_content" placeholder="请输入密码" v-model="data.password" type="password">
		</div>
        <div class="wrapper_input">
			<input class="wrapper_input_content" placeholder="确认密码" v-model="data.password1" type="password">
		</div>
		<div class="wrapper_login-button" @click="handleRegister">注册</div>
		<div class="wrapper_login-link" @click="handleLogin">已有账号去登录</div>
		<Toast v-if="data.showToast" :message="data.toastMessage" />
	</div>
</template>

<script>
	// 路由
    import { useRouter } from 'vue-router';
	// 响应式
	import {reactive} from 'vue'
	// 请求方式
	import {post} from '../../utils/request.js'
	// 导入组件
	import Toast from '../../components/Toast.vue'

	export default{
	name:'Register',
	components:{Toast},
    setup(){
		// 定义一个对象 存储注册的信息
		const data = reactive({
			username:'',
			password:'',
			password1:'',
			showToast:false,
			toastMessage:''
		})

		// 设置弹框提示信息 
		const showToasts = (msg) =>{
			data.showToast = true
			data.toastMessage = msg
			// 计时器 2秒后提示信息
			setTimeout(() =>{
				data.showToast = false
				data.toastMessage = ''
			},2000)
		}
		// 定义路由
		const router = useRouter()
		// 定义一个异步的函数
		const handleRegister = async() => {
		try{
			// 判断密码是否一致
			if(data.password == data.password1){
			// post 方式请求接口
			const result = await post('/api/user/login',{
				username:data.username,
				password:data.password
			})
			// 成功就跳转登录页面 否则提示注册失败
			// ?表示这个变量后面并不确定是否包含这个参数
			if(result?.errno === 0){
				router.push({name:'Login'})
			}else{
				showToasts('注册失败')
			}
		}else{
		// 密码不一致提示以下信息
			showToasts('请输入一样的密码')
		}
		// 若接口错误 则提示请求失败
		}catch(e){
				showToasts('请求失败')
		}
	}
		// 点击跳转去登录页面
		const handleLogin = () =>{
			router.push({name:'Login'})
		}
	
		return { handleLogin,handleRegister,data}
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
