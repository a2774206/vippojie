<template>
	<div id="app">
		<center style="position: relative;" class="header">
			<i class="icon-left-i" v-if="$route.path=='/item'" @click="back">
				<</i>
					<span>{{msg}}</span>
		</center>
		<keep-alive>
			<router-view/>
		</keep-alive>
		<Modal v-model="modalshow" fullscreen title="使用方法">
			<div class="wbsm">
				<ol>
					<li>到视频
						<strong>
							pc
						</strong>站点找到看的电视剧->打开电视剧->右侧点击
						<strong>
							电视剧名
						</strong>（在评分左边）->复制该列表页网址</li>
					<li>切回到破解页，选择视频平台->粘贴网址->点击按钮</li>
					<li>选集播放</li>
				</ol>
				<p>
					<strong>列表示例：点击此处跳转到列表页复制网址即可</strong>
				</p>
				
			</div>
			<p>
				<img src="https://www.lipengpeng.com/vip/sm_img/ms.png">
			</p>
		</Modal>
		<div class="footer">
			<ul class="list_y" style="clear: both;padding: 10px 0;">
				<li>站点工具：</li>
				<li>
					<a @click="modalshow = true">使用说明</a>
				</li>
				<li>
					<a href="">电影破解</a>
				</li>

			</ul>
			<p style="float: left;padding: 5px 15px;"></p>
			<ul class="list_y" style="clear: both;padding: 10px 0;">
				<li>支持平台：</li>
				<li>
					<a href="http://v.qq.com" target="_blank">腾讯视频</a>
				</li>
				<li>
					<a href="https://youku.com" target="_blank">
						<s>
							优酷视频
						</s>
					</a>
				</li>
				<li>
					<a>
						待定
					</a>
				</li>

			</ul>
			<div style="clear: left;margin-top: 18px;">
				仅供学习使用，如有侵权请联系
				<a target="blank" href="tencent://message/?uin=2774206&amp;Site=lipengpeng&amp;Menu=yes">
					<img style="vertical-align: middle;" border="0" src="https://pub.idqqimg.com/qconn/wpa/button/button_old_91.gif" alt="点击这里给我发消息">
				</a>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'App',
		data() {
			return {
				msg: '电视剧破解',
				modalshow: false
			}
		},
		created() {

		},
		methods: {
			back() {
				this.$router.back(-1);
			}
		},
		watch: {
			'$route' (to, from) {
				if (to.path == '/item') {
					this.msg = window.localStorage.getItem('vname');
				} else {
					this.msg = '电视剧破解'
				}
			}
		}
	}
</script>

<style>
	#app {
		font-family: 'Avenir', Helvetica, Arial, sans-serif;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		text-align: center;
		color: #2c3e50;
		width: 750px;
		margin: 0 auto;
	}

	a:hover {
		color: #13C2C2 !important;
	}

	@media (max-width: 700px) {
		#app {
			width: 100%;
		}
	}

	.icon-left-i {
		display: inline-block;
		transform: scaleY(1.7);
		left: 15px;
		position: absolute;
		width: 20px;
		height: 40px;
		text-align: center;
		cursor: pointer;
	}

	center {
		width: 100%;
		height: 40px;
		line-height: 40px;
		background: #999;
		color: #fff;
	}

	.footer {
		width: 100%;
		overflow: hidden;
		padding: 15px 0;
		background: #999;
		color: #fff;
		text-align: center;
	}

	.list_y li {
		float: left;
		list-style: none;
		width: 80px;
		text-align: center;
	}

	.list_y li a {
		color: #5d605d;
	}

	.wbsm {
		letter-spacing: 3px;
		line-height: 25px;
		margin-left: 18px;
	}
	@media (max-width: 768px){
	 .v-transfer-dom .ivu-modal-wrap .ivu-modal-wrap>>>.ivu-modal {
				width: 100% !important;
				margin: 10px;
		}
		.v-transfer-dom .ivu-modal-wrap .ivu-modal-fullscreen{
			width: 94% !important;
		}
	}
	
</style>
