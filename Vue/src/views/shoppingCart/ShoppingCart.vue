<template>
    <div class="cart">
        <div class="product" >
            <div class="product_header">
                <div class="product_header_all">
                    <span class="product_header_icon iconfont" 
                    ></span>全选
                </div>
                <div class="product_header_clear">
                    <span class="product_header_clear_btn" >清空购物车</span>
                </div>
            </div>
            <template>
                <div class="product_item" >
                    <!-- 是否选中图标 -->
                    <div class="product_item_checked iconfont" 
                    ></div>
                    <img class="product_item_img" src="" alt="">
                    <div class="product_item_detail">
                        <h4 class="product_item_title"></h4>
                        <p class="product_item_price">
                            <span class="product_item_yen">&yen;</span>
                            <span class="product_item_origin">&yen;</span>
                        </p>
                    </div>
                    <div class="product_number">
                        <span class="product_number_minus" >-</span>
                        
                        <span class="product_number_plus" >+</span>
                    </div>
                </div>
            </template>
        </div>
    
        <div class="check">
            <div class="check_icon">
                
                <div class="check_icon_tag"></div>
            </div>
            <div class="check_info">
                总计：<span class="check_info_price">&yen;</span>
            </div>
            
        </div>
    </div>

    <Docker :current="1"></Docker>
</template>

<script>
import Docker from '../../components/Docker.vue'
export default {
    name:'ShoppingCart',
    components: { Docker },

}
</script>

<style lang="scss" scoped>
.cart{
    position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    background: #FFF;
}
</style>