<template>
	<div class="content">
		<div class="category">
			<div :class="{'category_item':true,'category_item--active':currentTab === item.tab}"
				v-for="item in categories" :key="item.name" @click="() => handleCategoryClick(item.tab)">
				{{item.name}}
			</div>
		</div>
		<div class="product">
		<div class="product_item" v-for="item in contentList" :key="item._id">
			<img class="product_item_img" :src="item.imgUrl" alt="">
			<div class="product_item_detail">
				<h4 class="product_item_title">{{item.name}}</h4>
				<p  class="product_item_sales">月售{{item.sales}}件</p>
				<p  class="product_item_price">
					<span class="product_item_yen">&yen;{{item.price}}</span>
					<span class="product_item_origin">&yen;{{item.oldPrice}}</span>
				</p>
			</div>
			<div class="product_number">
				<span class="product_number_minus" @click="changeItem(shopId,item._id,item,-1,shopName)">-</span>
				{{cartList[shopId]?.productList?.[item._id]?.count || 0}}
				<span class="product_number_plus" @click="changeItem(shopId,item._id,item,1,shopName)">+</span>
			</div>
		</div>
		</div>
	</div>
	
</template>

<script>
	// 从后端获取数据
	import {get} from '../../utils/request.js'
	// 用于为对象添加响应式状态
	import {toRefs,reactive} from 'vue'
	// 路由对象
	import {useRoute} from 'vue-router'
	// 状态管理
	import { useStore } from "vuex"



	export default{
		name: 'Content',
		props: ['shopName'],
		setup(){
			// store 就是vuex当中的数据与方法
			const store = useStore()
			// 所有商品信息
			const cartList = store.state.cartList
			const route = useRoute()
			// 获取店铺的ID
			const shopId = route.params.id
			// 定义方法实现数量加一
			const changeItem = (shopId, productId, productInfo, num, shopName) =>{
				store.commit('changeItem', { shopId, productId, productInfo, num, shopName })
			}
			// 侧边栏列表
			const categories = [
				{name: '全部商品',tab:'all'},
				{name: '秒杀',tab:'seckill'},
				{name: '新鲜水果',tab:'fruit'}
			]
			
			// ref 用于将数组转换成动态响应的数据
			// reactive 用于将对象转换成动态响应的数据
			// 存放获取选中的tab
			const data = reactive({
				// 存放当前被选中的分类tab
				currentTab:categories[0].tab,
				// 存放右侧的商品信息 这里面的数据是从后端取得的
				contentList:[]
			})
			// 从接口获取商品详情的数据 这个请求同时带一个参数 这个参数就是对应分类tab
			const getContent = async(tab) => {
				const result = await get('/api/shop/1/products',{tab})
				if(result?.errno === 0){
					// 如果成功 就存放到contentList当中去
					data.contentList = result.data
				}
			}
			// 显示点击选中的tab 
			const handleCategoryClick = (tab) => {
				// getContentList发送一个请求 这个请求会带上当前分类的tab作为参数
				getContent(tab)
				data.currentTab = tab
			}
			getContent('all')
			// 解构赋值，实现将对象当中的属性拆分成单个对象，给页面使用
			const {contentList,currentTab} = toRefs(data)
			return {contentList,categories,currentTab,handleCategoryClick,shopId,cartList,changeItem}
		}
	}
</script>


<style lang="scss" scoped>
	.content {
		display: flex;
		position: absolute;
		left: 0;
		right: 0;
		top: 1.5rem;
		bottom: .5rem;
	}
	.category {
		overflow-y: scroll;
		height: 100%;
		width: .76rem;
		background: #F5F5F5;
		&_item {
			line-height: .4rem;
			text-align: center;
			font-size: 14px;
			color: #333;
			&--active {
				background: #FFF;
			}
		}
	}
	.product {
		overflow-y: scroll;
		flex: 1;
		&_item {
			position: relative;
			display: flex;
			padding: .12rem 0;
			margin: 0 .16rem;
			border-bottom: .01rem solid #F1F1F1;
			&_img {
				width: .68rem;
				height: .68rem;
				margin-right: .16rem;
			}
			&_title {
				margin: 0;
				line-height: .2rem;
				font-size: .14rem;
				color: #333;
			}
			&_sales {
				margin: .06rem 0;
				font-size: .12rem;
				color: #333;
			}
			&_price {
				margin:0;
				line-height: .2rem;
				font-size: .14rem;
				color: #E93B3B;
			}
			&_yen {
				font-size: .12rem;
			}
			&_origin {
				margin-left: .06rem;
				line-height: .2rem;
				font-size: .12rem;
				color: #999;
				text-decoration: line-through;
			}
		}
		.product_number {
			position: absolute;
			right: 0;
			bottom: .12rem;
			&_minus,&_plus {
				display: inline-block;
				width: .2rem;
				height: .2rem;
				line-height: .16rem;
				border-radius: 50%;
				font-size: .2rem;
				text-align: center;
			}
			&_minus {
				border: .01rem solid #666;
				color: #666;
				margin-right: .05rem;
			}
			&_plus {
				background: #0091FF;
				color: #FFF;
				margin-left: .05rem;
			}
		}
	}
</style>
