<template>
	<div class="wrapper">
		<div class="search">
			<div class="search_back iconfont" @click="handleBackClick()">&#xe600;</div>
			<div class="search_content">
				<span class="search_content_icon iconfont">&#xe694;</span>
				<input type="text" class="search_content_input" placeholder="请输入商品名称" />
			</div>
		</div>
		<!-- 组件的引用 -->
		<ShopInfo :item="item"/>
		</div>
		<Content :shopName="item.name"/>
		<Cart :shopName="item.name"/>
</template>

<script>
	import {ref} from 'vue'
	import {get} from '../../utils/request.js'
	import {useRouter,useRoute} from 'vue-router'
	// 导入组件
	import ShopInfo from '../../components/ShopInfo.vue'
	import Content from './Content.vue'
	import Cart from './Cart.vue'

	export default{
		name:'Shop',
		components: { ShopInfo,Content,Cart},
		setup(){
			// router是一个全局的路由对象
			// route相当于正在跳转的路由对象
			// 方法不一样
			const router = useRouter();
			const route = useRoute();
			// 对应店铺的ID
			const shopId = route.params.id
			// 用于将数组转换成动态响应的数据
			const item = ref([]);
			// 从后端接口获取的对应店铺的数据
			const getShopList = async () => {
            const result = await get("/api/shop/hot-list")
			// ?表示这个变量后面并不确定是否包含这个参数
            if (result?.errno === 0) {
                item.value = result.data[shopId-1]
            }
            }
            getShopList()
			
			// 利用路由 返回上一页面
			const handleBackClick = () => {
				router.back()
			}
			
			return {item,handleBackClick}
		}
	}
</script>

<style lang="scss" scoped>
	.wrapper {
		padding: 0 .18rem
	}
	.search {
		display: flex;
		margin: .14rem 0 .04rem 0;
		line-height: .32rem;
		&_back {
			width: .3rem;
			font-size: .24rem;
			color: #B6B6B6;
		}
		&_content {
			display: flex;
			flex: 1;
			background: #F5F5F5;
			border-radius: .16rem;
			&_icon {
				width: .44rem;
				text-align: center;
				color: B7B7B7;
			}
			&_input {
				display: block;
				width: 100%;
				padding-right: .2rem;
				border: none;
				outline: none;
				background: none;
				height: .32rem;
				&::placeholder {
					color: #333;
				}
			}
			
		}
	}
</style>
