<template>
    <div class="wrapper">
        <div class="top">
            <div class="top_header">
                <div class="iconfont top_header_back" @click="handleBackClick()">&#xe600;</div>
                确认订单
                
            </div>
            <div class="top_receiver">
                <div class="top_receiver_title">收货地址</div>
                <div class="top_receiver_address">广东工贸职业技术学院</div>
                <div class="top_receiver_info">
                    <span class="top_receiver_info_name">M</span>
                    <span class="top_receiver_info_name">13312312312</span>
                </div>
                <div class="iconfont top_receiver_icon">&#xe600;</div>
            </div>
        </div>
        <div class="product" >
            <div class="product_title">{{shopName}}</div>
            <div class="product_wrapper" >
                <div class="product_list" >
                    <div class="product_item" v-for="item in oderList.checkProductList" :key="item._id">
                        <img class="product_item_img" :src="item.imgUrl" alt="">
                        <div class="product_item_detail">
                            <h4 class="product_item_title">{{item.name}}</h4>
                            <p class="product_item_price">
                                <span>
                                    <span class="product_item_yen">&yen;</span>
                                    {{item.price}}x{{item.count}}
                                </span>
                                <span class="product_item_total">
                                    <span class="product_item_yen">&yen;</span>
                                    {{(item.price*item.count).toFixed(2)}}
                                </span>
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="order">
            <div class="order_price">实付现金：<b>{{oderList.price}}</b></div>
            <div class="order_btn" @click="confirmPay">提交订单</div>
        </div>
        <div class="mask" v-if="showconfirmPay" @click="confirmPay">
            <div class="mask_content" @click.stop>
                <h3 class="mask_content_title">确认要离开收银台？</h3>
                <p class="mask_content_desc">请尽快完成支付,否则将被取消</p>
                <div class="mask_content_btns">
                    <div class="mask_content_btn mask_content_btn--first" @click="handleConfirmation(true)">取消订单</div>
                    <div class="mask_content_btn mask_content_btn--last" @click="handleConfirmation(false)">
                    确认支付
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// 路由对象
import { useRoute,useRouter } from 'vue-router'
// 状态管理
import { useStore } from "vuex"
// 计算属性
import { computed, ref } from 'vue'
import { post } from '../../utils/request.js'

export default {
    name: 'OrderConfirmation',
    setup(){
        const router = useRouter()
        const route = useRoute()
        // store 就是vuex当中的数据与方法
        const store = useStore()
        // 所有商品信息
        const cartList = store.state.cartList
        
        
        // 获取店铺的ID
        const shopId = route.params.id
        // 店铺名称
        const shopName = cartList[shopId].shopName
        console.log(shopName)
        // 通过一个计算属性 去得到当前店铺所有商品的数量总和
        const oderList = computed(() => {
            // 拿到当前这家店铺的所有商品信息
            const productList = cartList[shopId]?.productList
            // 定义一个变量 用于存放所有的商品价格
            let price = 0
            // 定义一个变量 存放选中的商品
            const checkProductList = {}
            for (let i in productList) {
                const product = productList[i]
                // 是否选中
                if (product.check) {
                    // 将商品数量小于0的过滤掉
                    if(product.count >0){
                        checkProductList[i] = product
                    }
                    price += (product.count * product.price)
                }
            }
            console.log(checkProductList)
           const oderList2=checkProductList
            console.log(orderList2)
            return { checkProductList, productList, price: price.toFixed(2) }
            
        })
        
        // 利用路由 返回上一页面
        const handleBackClick = () => {
            router.back()
        }

        // 定义一个变量 showconfirmPay 用于控制显示与否
        const showconfirmPay = ref(false)
        // 定义一个方法 实现提交订单的支付
        const confirmPay = () => {
            showconfirmPay.value = !showconfirmPay.value
        }

        // 定义异步的函数
        const handleConfirmation = async (isCanceled) => {
            // 定义一个空数组 用于存放订单内商品的ID和数量
            const products = []
            for (let i in oderList.value.checkProductList){
                const product = oderList.value.checkProductList[i]
                products.push({id:product._id,num:product.count})
            }
            try {
                const result = await post('/api/order', {
                    // 发送请求的时候 将username和password作为参数传递给接口
                    addressId:1,
                    shopId,
                    shopName,
                    // 当前的订单是否取消 如果是完成支付 传递一个false 如果订单取消 传递true
                    isCanceled,
                    // 传递商品的信息 只需要传递商品的id和商品的数量
                    products

                })
                // 通过返回的结果 去判断是否成功发送数据
                // ?表示这个变量后面并不确定是否包含这个参数
                if (result?.errno === 0) {
                    store.commit('setClearList', { shopId })
                    // 页面跳转
                    router.push({ name:'OrderList'})
                } else {
                    // 弹出提示框
                    showToasts('登录失败')
                }
            } catch (e) {
                showToasts('请求失败')
            }
            
        }
        
        return { cartList, handleBackClick, shopId, oderList, router, showconfirmPay, confirmPay, handleConfirmation,shopName }
    }
    
}
</script>

<style lang="scss" scoped>
.wrapper {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background-color: #eee;
    padding: 0;
}

.top {
    position: relative;
    height: 1.96rem;
    background-size: 100% 1.59rem;
    background-image: linear-gradient(0deg, rgba(0, 145, 255, 0) 4%, #0091ff 50%);
    background-repeat: no-repeat;
    background-color: #eee;

    &_header {
        position: relative;
        padding-top: .26rem;
        line-height: .24rem;
        color: #fff;
        text-align: center;
        font-size: .16rem;

        &_back {
            position: absolute;
            left: .18rem;
            font-size: .22rem;
        }
    }

    &_receiver {
        position: absolute;
        left: .18rem;
        right: .18rem;
        bottom: 0;
        background-color: #fff;
        height: 1.11rem;
        border-radius: .04rem;

        &_title {
            line-height: .22rem;
            padding: .16rem 0 .14rem .16rem;
            font-size: .16rem;
            color: #333;
        }

        &_address {
            line-height: .2rem;
            padding: 0 .4rem 0 .16rem;
            font-size: .14rem;
            color: #333;
        }

        &_info {
            padding: .06rem 0 0 .16rem;

            &_name {
                margin-right: .06rem;
                line-height: .18rem;
                font-size: .12rem;
                color: #666;
            }
        }

        &_icon {
            position: absolute;
            right: .16rem;
            top: .5rem;
            transform: rotate(180deg);
            color: #666;
            font-size: .2rem;
        }
    }
}

.product {
    margin: .16rem .18rem .1rem .18rem;
    background: #FFF;

    &_title {
        padding: .16rem;
        font-size: .16rem;
        color: #333;
    }

    &_wrapper {
        overflow-y: scroll;
        margin: 0 .18rem;
        position: absolute;
        left: 0;
        right: 0;
        bottom: .6rem;
        top: 2.6rem;
    }

    &_list {
        background: #FFF;
    }

    &_item {
        position: relative;
        display: flex;
        padding: 0 .16rem 0.16rem .16rem;

        &_img {
            width: .46rem;
            height: .46rem;
            margin-right: .16rem;
        }

        &_detail {
            flex: 1;
        }

        &_title {
            margin: 0;
            line-height: .2rem;
            font-size: .14rem;
            color: #333;
        }

        &_price {
            display: flex;
            margin: .06rem 0 0 0;
            line-height: .2rem;
            font-size: .14rem;
            color: #E93B3B;
        }

        &_total {
            flex: 1;
            text-align: right;
            color: #000;
        }

        &_yen {
            font-size: .12rem;
        }
    }
}

.order {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    height: .49rem;
    line-height: .49rem;
    background: #FFF;

    &_price {
        flex: 1;
        text-indent: .24rem;
        font-size: .14rem;
        color: #333;
    }

    &_btn {
        width: .98rem;
        background: #4FB0F9;
        color: #fff;
        text-align: center;
        font-size: .14rem;
    }
}
.mask {
    z-index: 1;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    background: rgba(0, 0, 0, 0.50);

    &_content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 3rem;
        height: 1.56rem;
        background: #FFF;
        text-align: center;
        border-radius: .04rem;

        &_title {
            margin: .24rem 0 0 0;
            line-height: .26rem;
            font-size: .18rem;
            color: #333;
        }

        &_desc {
            margin: .08rem 0 0 0;
            font-size: .14rem;
            color: #666666;
        }

        &_btns {
            display: flex;
            margin: .24rem .58rem;
        }

        &_btn {
            flex: 1;
            width: .8rem;
            line-height: .32rem;
            border-radius: .16rem;
            font-size: .14rem;

            &--first {
                margin-right: .12rem;
                border: .01rem solid #4FB0F9;
                color: #4FB0F9;
            }

            &--last {
                margin-left: .12rem;
                background: #4FB0F9;
                color: #fff;
            }
        }
    }
}
</style>