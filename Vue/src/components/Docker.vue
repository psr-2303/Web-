<template>
    <div class="docker">
    <span class="docker_item" :class="{'docker_item--active' : index ===current}" v-for="(item,index) in dockerList" :key="item.desc">
        <router-link :to="item.to">
		<div class="iconfont" v-html="item.icon"></div>
        {{item.desc}}
		</router-link>
		
    </span>
    
    </div>
</template>

<script>
export default {
    name:'Docker',
	props:['current'],
    setup(){
		// 定义数据列表 利用for循环显示数据
        const dockerList = [
			{ icon: '&#xe604;', desc: '首页', to: { name: 'Home' }},
			{ icon: '&#xe75b;', desc: '购物车', to: { name: 'ShoppingCart' } },
			{ icon: '&#xe60b;', desc: '订单', to: { name: 'OrderList' } },
			{ icon: '&#xe606;', desc: '我的', to: { name: 'Home' } },

        ]
        return{dockerList}
    }
}
</script>

<style lang="scss">
.docker {
		display: flex;
		box-sizing: border-box;
		position: absolute;
		padding: 0 .18rem;
		left: 0;
		bottom: 0;
		width: 100%;
		height: .49rem;
		border-top: 1px solid #F1F1F1;
	}
	.docker_item {
		flex: 1;
		text-align: center;
		a{
			text-decoration: none;
			color: rgb(30, 30, 30);
		}
		.iconfont {
			margin: .07rem 0 .02rem 0;
			font-size: .2rem;
		}
	}
	.docker_item--active {
		a{
			color: #1FA4FC;
		}
		
	}
</style>