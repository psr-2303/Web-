import axios from 'axios'

const instance = axios.create({
	baseURL: 'https://www.fastmock.site/mock/ae8e9031947a302fed5f92425995aa19/jd',
	timeout: 10000
})
// get 方式获取数据
export const get = (url,params = {}) => {
	return new Promise((resolve,reject) => {
		instance.get(url,{ params }).then((response) => {
			resolve(response.data)
		},err => {
			reject(err)
		})
	})
}
// post 方式获取数据
export const post = (url,data = {}) => {
	return new Promise((resolve,reject) => {
		instance.post(url,data,{
			headers: {
				'Content-Type': 'application/json'
			}
		}).then((response) => {
			resolve(response.data)
		},err => {
			reject(err)
		})
	})
}

