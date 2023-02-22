import { createStore } from 'vuex'
// 全局状态管理

// 实现购物车信息的长期存储
// 首先实现将cartList存放到浏览器本地存储当中
const setLocalCartList = (state) => {
  const { cartList } = state
  // JSON.stringify 将对象转换成字符串
  localStorage.cartList = JSON.stringify(cartList)
}

//第二 实现将cartList从浏览器本地存储拿出来用
const getLocalCartList = () => {
  if (localStorage.cartList) {
    // 将字符串转换成对象
    return JSON.parse(localStorage.cartList)
  } else {
    return {}
  }
}
export default createStore({
  // 存放全局方法
  state: {
    // 定义一个数组 用于存放订单
    orderList: [],
    // 定义一个对象 用于存放所有商品的信息
    cartList: getLocalCartList(),
    // 第一层 首先定义店铺id
    // shopId:{
    // 第二层 店铺名称和商品信息
    // shopName: '沃尔玛',
    // productList:{
    // 第三层 存放商品的id
    // productId:{
    //   }
    // }
    //   
    // }

  },
  getters: {
  },
  // 存放用于修改上面state数据的方法
  mutations: {
    // state 就是上面的的数据
    // payload 就是传递进来的参数 本身是一个对象
    changeItem(state, payload) {
      const { shopId, productId, productInfo, num, shopName } = payload
      // 首先通过店铺id 拿到这个id对应的整个店铺里面所有的商品
      let shopInfo = state.cartList[shopId]
      if (!shopInfo) { shopInfo = { shopName: '', productList: {} } }
      shopInfo.shopName = shopName
      // 第二 拿到传递进来的商品id对应的那个商品信息
      let product = shopInfo.productList[productId]
      if (!product) {
        product = productInfo
        product.count = 0
      }
      product.count += num
      if (num > 0) { product.check = true }
      if (product.count <= 0) { product.count = 0 }

      // 反向把数据传回去
      shopInfo.productList[productId] = product
      state.cartList[shopId] = shopInfo
      setLocalCartList(state)

    },
    // 实现每个商品的选中与取消
    changeCheck(state, payload) {
      const { shopId, productId } = payload
      const product = state.cartList[shopId].productList[productId]
      product.check = !product.check
      setLocalCartList(state)
    },
    // 实现全选
    setAllChecked(state, payload) {
      const { shopId, a } = payload
      const products = state.cartList[shopId].productList
      for (let i in products) {
        const product = products[i]
        product.check = a
      }
      setLocalCartList(state)
    },
    // 清空购物车
    setClear(state, payload) {
      const { shopId } = payload
      state.cartList[shopId] = { shopName: '', productList: {} }
      setLocalCartList(state)
    },
    // 实现订单完成后，将订单内的商品信息从购物车内清除
    setClearList(state, payload) {
      
      const { shopId, productId,oderList } = payload
      
      const products = oderList
      console.log(2333)
      console.log(products)
      // const product = state.cartList[shopId].productList[productId]

      // 将信息存放到这个这个对象里
      const order = {}
      order.shopName = state.cartList[shopId].shopName
      order.products = products
      console.log(order);


      for (let i in products) {
        const product = products[i]
        // 只有当商品被选中添加到订单 才会被删除
        if (product.check) {
          product.count = 0
        }
      }
      // state.orderList.unshift(order)
      state.orderList = order
      setLocalCartList(state)
    }
  },
  actions: {
  },
  modules: {
  }
})
