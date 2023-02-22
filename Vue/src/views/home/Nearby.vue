<template>
    <div class="nearby">
    <h3 class="nearby_title">附近商店</h3>
	<!-- 实现跳转到店铺对应的详情页 -->
	<router-link :to="`/shop/${item._id}` " v-for="item in nearbyList" :key="item._id">
		<ShopInfo  :item="item" />
    </router-link>
	</div>
</template>

<script>
	import {ref} from 'vue'
	import {get} from '../../utils/request.js'
	// 导入组件
	import ShopInfo from '@/components/ShopInfo.vue';

export default {
    name: "Nearby",
	components: {ShopInfo},
    setup() {
		// 用于将数组转换成动态响应的数据
        const nearbyList = ref([]);
		// 从接口获取商店信息
        const getNearList = async () => {
            const result = await get("/api/shop/hot-list")
			// ?表示这个变量后面并不确定是否包含这个参数
            if (result?.errno === 0) {
				// 如果能够成功从后端获取数据 就将数据存放到nearbyList里面
                nearbyList.value = result.data;
            }
        };
		// 自己调用这个方法 
        getNearList();
        return { nearbyList };
    },

}
</script>

<style lang="scss" scoped>
.nearby {
		&_title {
			margin: .16rem 0 .02rem 0;
			font-size: .18rem;
			color: #333333;
		}
		a{
			text-decoration: none;
		}
	}
</style>