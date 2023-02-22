import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '../views/home/Home.vue'
import Login from '../views/login/Login.vue'
import Register from '../views/login/Register.vue'
import Shop from '../views/shop/Shop.vue'
import OrderConfirmation from '../views/orderConfirmation/OrderConfirmation.vue'
import OrderList from '../views/orderList/OrderList.vue'
import ShoppingCart from '../views/shoppingCart/ShoppingCart.vue'

const routes = [
  {
    path:'/',
    name:'Home',
    component: Home
  },
  {
    path:'/login',
    name:'Login',
    component: Login,
  },
  {
    path:'/register',
    name:'Register',
    component: Register,
  },
  {
    // 动态路由
    path:'/shop/:id',
    name:'Shop',
    component: Shop,
    
  },
  {
    path:'/orderConfirmation/:id',
    name:'OrderConfirmation',
    component: OrderConfirmation,
  },
  {
    path:'/orderList',
    name:'OrderList',
    component: OrderList,
  },
  {
    path:'/shoppingCart',
    name:'ShoppingCart',
    component: ShoppingCart,
  }
  
]

// 用于路由实现历史记录
const router = createRouter({
  history: createWebHashHistory(),
  routes
})

// 路由守卫
// to： 要进入的目标路由（去哪儿）
// from： 要离开的路由（从哪来）
// next： 是否进行下一步（要不要继续）
router.beforeEach((to,from,next) => {
  // 定义变量 存储当前登录状态
	const isLogin = localStorage.isLogin;
  // 判断是去登录还是去注册
	if(isLogin || to.name === 'Login' || to.name === 'Register'){
	next();
	}else{
	next({name:'Login'})
	}
})

export default router


