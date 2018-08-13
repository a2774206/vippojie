<template>
  <div class="hello">
    <!-- 视频破解 -->
		<Input v-model="userUrl">
        <Select v-model="userSelect" slot="prepend" style="width: 80px">
            <Option value="qq.com">腾讯视频</Option>
            <Option value="youku.com">优酷视频</Option>
						<Option value="iqiyi.com">优酷视频</Option>

        </Select>
        <Button slot="append" icon="ios-search" @click="search"></Button>
    </Input> 
		<div>
			<Collapse v-model="value1" v-if="msg!=''">
        <Panel name="1" >
            选集
            <p slot="content">
								<ul class="video_item">
									<li class="v_item" v-for="(item,i) in msg.world" @click="saveNum(item.title)" >
									<!-- 	<a v-bind:href="item.url" 
									:key="i" @click="saveLocal(item.title)">
										</a> -->
										<router-link :to="{path:'/item',query: {url: encodeURI(item.url)}}" :key="i" :data="item.url" @click="saveLocal(item.title)">{{item.title}}</router-link>
									</li>
									<!-- <iframe :src="msg.world[0].url"></iframe> -->
						
								</ul>
						</p>
        </Panel>
     </Collapse>
		</div>
		<div class="load">
				
				<div class="loader" v-show="ajax">
				
            <Spin size="large" fix></Spin>
       
				</div>
			
		</div>
		 <!-- <Alert type="error" show-icon>网址错误请重试！</Alert> -->
	
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  data () {
    return {
      msg: '',
			video:{
				name:'',
				url:''
			},
			 value1: '1',
			 userUrl:'',
			 userSelect:'',
			 vName:'',
			 videonum:'',
			 ajax:false
    }
  },
	methods:{
		getJsons(){
			/*显示加载*/
			this.ajax = true;
			/*获取数据*/
			
			this.axios({
				method:'post',
				url:'vip/index.php',
				headers:{
					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				},
				data:'name='+this.userSelect+'&videoUrl='+ encodeURI(this.userUrl)
				
			}).then(res=>{
				/*保存历史*/
				
				this.ajax = false;
				this.msg = res.data;
				this.vName = res.data.world.vname;
				this.saveLocal();
			
				console.log(this.vName)
				console.log(this.msg)
			})
		},
		saveLocal(value){
			window.localStorage.setItem('url',this.userUrl);
			window.localStorage.setItem('name',this.userSelect);
		},
		search(){
			if(this.userSelect==''){
					this.$Message.info('尚未选择视频平台!');
				}
				else if(this.userUrl == ''){
					this.$Message.info('尚未粘贴地址!');
				}
			this.userSelect!=''&& this.userUrl!='' && this.getJsons();
		},
		saveNum(value){
			this.videonum = value;
			window.localStorage.setItem('vname',this.vName+':第'+value+'集');
			
		},
		isture(){
			let saveUrl = window.localStorage.getItem('url');
			let saveName = window.localStorage.getItem('name');
			if(	saveUrl ){
				this.userUrl = saveUrl;
			}
			if( saveName ){
				this.userSelect = saveName;
			}
			let vname = window.localStorage.getItem('vname');
			if( vname ){
				var promise = new Promise((resolve,reject)=>{
					resolve(this.getJsons())
				}).then(()=>{
					setTimeout(()=>{
						this.$Message.success('上次播放了:'+vname);
					},1000)
				})
			} 
		}
	},
	created(){
		//解析地址https://jiexi.071811.cc/jx.php?url=https://m.v.qq.com/x/cover/3/33bfp8mmgakf0gi.html?vid=l0027bkatkb
		//this.getJsons();
		this.isture()
	}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul.video_item {
  list-style-type: none;
  padding: 0;
	overflow: hidden;
	/* display: -webkit-flex;
	display: flex; */
	/* flex-wrap:  wrap; */
	
}
@media (max-width: 700px) { 
				ul.video_item{
					justify-content:space-between;
				}
				li.v_item{
					margin: 0 5px 15px 8px !important;
				}
}
@media only screen 
    and (device-width : 414px) 
    and (device-height : 736px) 
    and (-webkit-device-pixel-ratio : 3) {
			li.v_item{
				margin: 0 7px 15px 14px !important;
			}
		}
li.v_item{
		
    display: block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    margin: 0 10px 15px 9px;
    text-overflow: ellipsis;
    overflow: hidden;
    color: #222;
    background-color: #ebebeb;
    border-radius: 20px;
		float: left;

}
a {
  color: #42b983;
	text-decoration: none;
	color: #222;
	display: inline-block;
	width: 100%;
	height: 100%;
}
 .demo-spin-icon-load{
        animation: ani-demo-spin 1s linear infinite;
    }
    @keyframes ani-demo-spin {
        from { transform: rotate(0deg);}
        50%  { transform: rotate(180deg);}
        to   { transform: rotate(360deg);}
    }
    .demo-spin-col{
        height: 100px;
        position: relative;
        border: 1px solid #eee;
    }
		li.v_item:last-child{
			display: none;
		}
		@media (max-width: 768px){
			.ivu-modal-wrap>>>.ivu-modal {
					width: 100% !important;
					margin: 10px;
			}
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
