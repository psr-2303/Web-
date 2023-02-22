<template>
    <div class="position">
        <span class="iconfont position_icon">&#xebbc;</span>
        广东工贸职业技术学院(天河校区)
        <span class="iconfont position_notice">&#xe6af;</span>
    </div>

    <div class="search">
    <span class="iconfont">&#xe694;</span>
    山姆会员商店优惠商品
    </div>

    <div class="banner">
    <img class="banner_img" src="../../assets/img/banner.jpg" alt="">
    </div>

    <div class="icons">
    <div class="icons_item" v-for="item in iconsList" :key="item.desc">
        <img class="icons_item_img" :src="item.imgName" alt="">
        <p class="icons_item_desc">{{item.desc}}</p>
    </div>
    </div>

    <div class="gap"></div>

</template>

<script>
export default {
    name:'StaticPart',
    setup(){
		// 定义数据列表 利用for循环显示数据
        const iconsList = [
            {imgName:require('../../assets/img/超市.png'),desc:'超市'},
            {imgName:require('../../assets/img/菜市场.png'),desc:'菜市场'},
            {imgName:require('../../assets/img/水果店.png'),desc:'水果店'},
            {imgName:require('../../assets/img/鲜花.png'),desc:'鲜花绿植'},
            {imgName:require('../../assets/img/医药健康.png'),desc:'医药健康'},
            {imgName:require('../../assets/img/家居.png'),desc:'家居'},
            {imgName:require('../../assets/img/蛋糕.png'),desc:'烘焙蛋糕'},
            {imgName:require('../../assets/img/签到.png'),desc:'签到'},
            {imgName:require('../../assets/img/大牌免运.png'),desc:'大牌免运'},
            {imgName:require('../../assets/img/红包.png'),desc:'红包套餐'},
        ]
        return{iconsList}
    }
}
</script>

<style lang="scss" scoped>
	.position {
		overflow: hidden;
		position: relative;
		padding: .16rem .24rem .16rem 0;
		line-height: .22rem;
		font-size: .16rem;
		white-space: nowrap;
		text-overflow: ellipsis;
		.position_icon {
			position: relative;
			top: .01rem;
			font-size: .2rem;
		}
		.position_notice {
			position: absolute;
			right: 0;
			top: .17rem;
			font-size: .2rem;
		}
	}
	.search {
		margin-bottom: .12rem;
		line-height: .32rem;
		background: #F5F5F5;
		color: #B7B7B7;
		border-radius: .16rem;
		font-size: .14rem;
		.iconfont {
			display: inline-block;
			padding: 0 .08rem 0 .16rem;
			font-size: .2rem;
		}
		&_text {
			display: inline-block;
			font-size: .14rem;
		}
	}
	.banner {
		height: 0;
		overflow: hidden;
		padding-bottom: 25.4%;
		&_img {
			width: 100%;
		}
	}
	.icons {
		display: flex;
		flex-wrap: wrap;
		margin-top: .16rem;
		&_item {
			width: 20%;
			&_img {
				display: block;
				width: .4rem;
				height: .4rem;
				margin: 0 auto;
			}
			&_desc {
				margin: .06rem 0 .16rem 0;
				text-align: center;
			}
		}
	}
	.gap {
		margin:0 -.18rem;
		height: .1rem;
		background: #F1F1F1;
	}
	
	
	
</style>
