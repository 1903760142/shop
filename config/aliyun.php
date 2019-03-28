<?php
return array (
		//应用ID,您的APPID。
		'app_id' => "2016092500595694",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAscGtqXRKNaWF7YIQ3dO9M/hYdvi/y7qineUGSP7X1HLVmjo8FizKjie3lKOgNTz77AeP8G8iOjqQpkzCfRbwGB8RJMeVcTMcF96ndJWA20foHK9sRq+H6SnYTlffbaH/vC+/X7f2r/EyJ1Y1eHhFUYwNIfLnxO5lRpqS8IGmMNsbK04lddTDOs3taFaFdTKTDUZQYqpCm0bhq6NjZcJ33aTzcL7pkY1DfpTrNjRG84oaxvpYksXd9fwijuNXQpJeHk5UWTuFoMeKLu4yr9xB/gBm4w10TKF3l5CGCnShrjEpXK5BgKS7Z0nBfOHEifZHfujKFcCEBrd1XF7w6dY/bQIDAQABAoIBAEGx39nZxbdv9kBiKpOhNrLnXOKTamcEEieixiDiNqgozLLURPK5GR9SpHGFy6cBY+XGobbti8vTazRa+CI9AP0ZNj/Ol3efuQlFW8QloNrqB2nal3zEUMmmkm/Z4BRno9lMGEFq/vvle3C4VsiwQoYx6YSbfnb02G8wn4/NirtRESMHixvJw+KbxrgtuG+L/dD52ChcAo8ETmSrB3Wao88g3pngXGPRbI94vln5UntzLkWi9z/Bkzfl5s7F0cQK1qn1hF0SfakvO3M9h3TPtwCSeXphld1XjTZO92fE4fwaVrRnKBw3mWVF1FMPCuK1j3li59d197fYlLi+eZbDs4ECgYEA4M8DOQwQwx+uoSxmF6aT01tBm6k/NI6ckiQDIr1F0i1vkBRw5KNUXk7TS2n0UPEUfHxyb4uYijUrii9qLdOCqpsePAbyf1Ea+mkyzc2EtG5e+NW0M1/nLOJmkbWy3DrQCnodleiP0dVWcc3Rnk4z1eyBrDcoosxJ1K3BJgwVUc0CgYEAymtrt/xXsyg+DRUyqRZ0lXihZR/avfG0Tg+YmVlwELn6Xy2DwvRwYVs0JRc+JheJzFKSV+n3G1GHaow3nZ0Nfs4nf6w7XH8/b+EzspCxKWyRKcPhZ78l92bPvNApV8XWhC8vCS5/PnmYptb9fAcDicwg5vKEvKDqfOQQPouNhCECgYBKHvcJEBlWvFNvgJwIoDuNLEFteVgFlB+7b3Q5N/6VVbW644J1YASpM4QnEUAkj9gZU07HyFb6+pzoasmvYlVquso1MHUz1SH3/kdp46ElfF6D3LIVXkFyYxM+Z5IZWqrNSYYHry38GULvMtUyRMaCegAnL+iOBJ0zKjbMvJ8q4QKBgQCksSXhelS4lcN2zYp8fKK6gn1+U56b8K5s3M+h5V0Cnu6Qxe1wj4VoENaqXvDX+UrKjVw4X0oIVhtBm3gcqw2x4HXOsQlTRs0McESpwoQCWiz5uEALM0DmvCXFT/BzU6onvmQcqlIpOLH0/PMdGG/Oi+ExRpytBJgEqWJ2IQExQQKBgQCmfUrVrSdCnhkLvVdomxSKHE6T6b2aedWKw0cddvwta4BLP9bLylV9BvTQrxs0Pd/y1OpT4GgJkkYPoPf46EEIjGztpmpqWryefKoHrN/j7JeMU04pRbgqF/kZKrhnslrDPcWjFqJ0G7oU10KHmiFi6G8oQUJLBd3GX4Mxd0GAJQ==",
		
		//异步通知地址
		'notify_url' => "http://www.shop.com/async",
		
		//同步跳转
		'return_url' => "http://www.shop.com/sync",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAxqAeAbsQzI7itA9+SMWGxPHHEVvYtIFdxlILwqPHVJiNis2FjjzGfy87es7BDw/zwqmUtUWrb+nOjy73vm8e2uhhUnQFT+/z0kpVltG11Cs77PxNqEnuXao1F3ujwJVFtNcf/gjckbO8shVtmHhmdqiCWMQrJFuj6IhIsgJLGHTcOKFzPHdKl3HLo5fe2Xu6cNpTerMi5KNbcuslZowDJ9SdLtVr1OvuXztElpyq2lXlwTJ3Y7sElcGfp8Y1FW/R3Jg5pTyEGyDrIIuedQLSi9RBN1A47b7En93/Ally/KmNpID9MzSuA9/hPKt0YDvezE7VYzY42Jsb9G2tj/ETUQIDAQAB",
		
	
);