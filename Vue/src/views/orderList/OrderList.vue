<template>
  <div class="wrapper">
    <div class="title">我的订单</div>
    <div class="orders">
      <div class="order">
        <div class="order_title">
          {{shopName}}
          <span class="order_status">已下单</span>
        </div>
        <div class="order_content">
          <div class="order_content_imgs">
            <img class="order_content_img" src="" alt="" />
            <img class="order_content_img" src="" alt="" />
          </div>
          <div class="order_content_info">
            <div class="order_content_price">￥33.32</div>
            <div class="order_content_count">共5件</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <Docker :current="2"></Docker>
</template>

<script>
import Docker from "../../components/Docker.vue";

// 路由对象
import { useRoute, useRouter } from "vue-router";
// 状态管理
import { useStore } from "vuex";
// 计算属性
import { computed, ref } from "vue";
import { get } from "../../utils/request.js";

export default {
  name: "OrderList",
  components: { Docker },
  setup() {
    const router = useRouter();
    const route = useRoute();
    // store 就是vuex当中的数据与方法
    const store = useStore();
    // 所有商品信息

    // 店铺名称
    const orderList =store.state.orderList;
    const shopName=orderList.shopName
    console.log(orderList);
    return {shopName}
    
  },
};
</script>

<style lang="scss" scoped>
.wrapper {
  overflow-y: auto;
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0.5rem;
  right: 0;
  background: rgb(248, 248, 248);
  padding: 0;
}

.title {
  line-height: 0.44rem;
  background: #fff;
  font-size: 0.16rem;
  color: #333;
  text-align: center;
}

.order {
  margin: 0.16rem;
  padding: 0.16rem;
  background: #fff;

  &_title {
    margin-bottom: 0.16rem;
    line-height: 0.22rem;
    font-size: 0.16rem;
    color: #333;
  }

  &_status {
    float: right;
    font-size: 0.14rem;
    color: #999;
  }

  &_content {
    display: flex;

    &_imgs {
      flex: 1;
    }

    &_img {
      width: 0.4rem;
      height: 0.4rem;
      margin-right: 0.12rem;
    }

    &_info {
      width: 0.7rem;
    }

    &_price {
      margin-bottom: 0.04rem;
      line-height: 0.2rem;
      font-size: 0.14rem;
      color: #e93b3b;
      text-align: right;
    }

    &_count {
      line-height: 0.14rem;
      font-size: 0.12rem;
      color: #333;
      text-align: right;
    }
  }
}
</style>