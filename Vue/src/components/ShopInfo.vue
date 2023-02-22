<template>
    <div class="nearby">
        <div class="nearby_item">
        <img :src="item.imgUrl" class="nearby_item_img" alt="">
        <div class="nearby_content">
            <div class="nearby_content_title">{{item.name}}</div>
            <div class="nearby_content_tags">
            <span class="nearby_content_tag" >月售：{{item.sales}}</span>
			<span class="nearby_content_tag" >起送：{{item.expressLimit}}</span>
			<span class="nearby_content_tag" >基础运费：{{item.expressPrice}}</span>
            </div>
            <p class="nearby_content_highlight">{{item.slogan}}</p>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:'ShopInfo',
        props:['item']
}
</script>

<style lang="scss" scoped>
    .nearby {
		&_title {
			margin: .16rem 0 .02rem 0;
			font-size: .18rem;
			color: #333333;
		}
		&_item {
			display: flex;
			padding-top: .12rem;
			&_img{
				margin-right: .16rem;
				width: .56rem;
				height: .56rem;
			}
		}
		&_content {
			flex: 1;
			padding-bottom: .12rem;
			border-bottom: 1px solid #F1F1F1;
			&_title{
				line-height: .22rem;
				font-size: .16rem;
				color: #333333;
			}
			&_tags {
				margin-top: .08rem;
				line-height: .18rem;
				font-size: .13rem;
				color: #333333;
			}
			&_tag {
				margin-right: .16rem;
			}
			&_highlight {
				margin: .08rem 0 0 0;
				line-height: .18rem;
				font-size: .13rem;
				color: #E93B3B;
			}
		}	
	}

</style>