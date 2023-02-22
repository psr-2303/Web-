<template>
	<div class="mask"  v-if="showCart && cartData.total > 0 " @click="setShowCart"></div>
	<div class="cart">
		<div class="product" v-if="showCart && cartData.total > 0 ">
			<div class="product_header" >
				<div class="product_header_all">
					<span class="product_header_icon iconfont"
					v-html="cartData.allChecked ? '&#xe626;' :'&#xe8bb;'"
					@click="setAllChecked(shopId)"
					></span>全选
				</div>
				<div class="product_header_clear">
					<span class="product_header_clear_btn" @click="setClear(shopId)">清空购物车</span>
				</div>
			</div>
		<template v-for="item in cartData.productList" :key="item._id">
			<div class="product_item"  v-if="item.count > 0">
				<!-- 是否选中图标 -->
			<div class="product_item_checked iconfont" 
				v-html="item.check ? '&#xe626;' :'&#xe8bb;'"
				@click="changeCheck(shopId,item._id)"
			></div>
			<img class="product_item_img" :src="item.imgUrl" alt="">
			<div class="product_item_detail">
				<h4 class="product_item_title">{{item.name}}</h4>
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
		</template>
		</div>

		<div class="check">
			<div class="check_icon">
				<img class="check_icon_img"  src="http://www.dell-lee.com/imgs/vue3/basket.png" @click="setShowCart" alt="">
				<div class="check_icon_tag">{{cartData.total}}</div>
			</div>
			<div class="check_info">
			总计：<span class="check_info_price">&yen;{{cartData.price}}</span>
			</div>
			<div class="check_btn">
				<router-link :to="`/orderConfirmation/${shopId}`" >去结算</router-link>
			</div>
		</div>
	</div>
</template>

<script>
	// 路由对象
	import {useRoute} from 'vue-router'
	// 状态管理
	import { useStore } from "vuex"
	// 计算属性
	import { computed,ref } from 'vue'

	export default{
		name: 'Cart',
		props: ['shopName'],
		setup(){
			// 定义一个变量 showCart 用于控制商品的显示与否
			const showCart =ref(false)
			// 定义一个方法 用于实现购物车的显示或隐藏
			const setShowCart = () => {
				showCart.value = !showCart.value
			}
			// store 就是vuex当中的数据与方法
			const store = useStore()
			// 所有商品信息
			const cartList = store.state.cartList
			const route = useRoute()
			// 获取店铺的ID
			const shopId = route.params.id
			const changeItem = (shopId,productId,productInfo,num,shopName) =>{
				store.commit('changeItem', { shopId, productId, productInfo, num,shopName})
			}

			// 实现商品当前的选中与否
			const changeCheck = (shopId, productId) => {
				store.commit('changeCheck', { shopId, productId })
			}

			// 通过一个计算属性 去得到当前店铺所有商品的数量总和
			const cartData = computed(()=>{
				// 拿到当前这家店铺的所有商品信息
				const productList = cartList[shopId]?.productList
				// 定义一个变量 用于存放所有的商品数量
				let total = 0
				// // 定义一个变量 用于存放所有的商品的选中状态
				let allChecked = true
				// 定义一个变量 用于存放所有的商品数量
				let price = 0
				for (let i in productList) {
					const product = productList[i]
					total += product.count
					if (!product.check && product.count > 0) {
						allChecked = false
					}
					// 是否选中
					if (product.check) {
						price += (product.count * product.price)
					}
				}
				
				return { total, productList, allChecked, price: price.toFixed(2) }
			})

			
			// 实现全选按钮
			// 计算属性本身返回的结果是ref类型 所以在调用计算属性的时候，要使用value
			const setAllChecked = (shopId) => {
				let a =! cartData.value.allChecked
				store.commit('setAllChecked', { shopId ,a})
				
			}
			// 清空购物车
			const setClear = (shopId) => {
				store.commit('setClear', { shopId})
			}
			return {   cartList, shopId, changeItem,cartList,
				changeCheck, setAllChecked, setClear, showCart, setShowCart, cartData
			}
		}
		}
</script>

<style lang="scss" scoped>
	.mask{
		position: fixed;
		left: 0;
		right: 0;
		bottom: 0;
		top: 0;
		background: rgba(0,0,0,.5);
		z-index: 1;
	}
.cart{
	position: absolute;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 2;
	background: #FFF;
}
	.product {
		overflow-y: scroll;
		flex: 1;
		background: #FFFFFF;
		&_header {
			display: flex;
			line-height: .52rem;
			border-bottom: 1px solid #F1F1F1;
			font-size: .14rem;
			color: #333;
			&_all {
				width: .64rem;
				margin-left: .18rem;
			}
			&_icon {
				display: inline-block;
				margin-right: .1rem;
				vertical-align: top;
				color: #0091FF;
				font-size: .2rem;
			}
			&_clear {
				flex: 1;
				margin-right: .16rem;
				text-align: right;
				&_btn {
					display: inline-block;
				}
			}
		}
		&_item {
			position: relative;
			display: flex;
			padding: .12rem 0;
			margin: 0 .16rem;
			border-bottom: .01rem solid #F1F1F1;
			&_checked {
				line-height: .5rem;
				margin-right: .2rem;
				color: #0091FF;
				font-size: .2rem;
			}
			&_img {
				width: .46rem;
				height: .46rem;
				margin-right: .16rem;
			}
			&_title {
				margin: 0;
				line-height: .2rem;
				font-size: .14rem;
				color: #333;
			}
			&_price {
				margin:.06rem 0 0 0;
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
.check {
	display: flex;
	height: .49rem;
	border-top: .01rem solid #F1F1F1;
	line-height: .49rem;
	&_icon {
		position: relative;
		width: .84rem;
		&_img {
			display: block;
			margin: .12rem auto;
			width: .28rem;
			height: .26rem;
		}
		&_tag {
			position: absolute;
			right: .2rem;
			top: .04rem;
			width: .2rem;
			height: .2rem;
			line-height: .2rem;
			background-color: #E93B3B;
			border-radius: 50%;
			font-size: .12rem;
			text-align: center;
			color: #fff;
			transform: scale(.5);
		}
	}
	&_info {
		flex: 1;
		color: #333;
		font-size: .12rem;
		&_price {
			line-height: .49rem;
			color: #E93B3B;
			font-size: .18rem;
		}
	}
	&_btn {
		width: .98rem;
		background-color: #4FB0F9;
		text-align: center;
		color: #FFF;
		font-size: .14rem;
		a {
			color: #FFF;
			text-decoration: none;
		}
	}
}
</style>
