<template>
  <div class="item">
    <!-- 视频破解 -->
		<iframe frameborder="no" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes" width="100%" height="500px" border="0" :src="msg" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
 </div>
</template>

<script>
export default {
  name: 'item',
  data () {
    return {
     msg: ''
    }
  },
	created(){
		//解析地址规则:"http://v.qq.com/x/cover/639agzdh10yu2q2/v0026oj49rc.html"
		//源地址：http://v.qq.com/x/cover/639agzdh10yu2q2.html?vid=v0026oj49rc
		let str = encodeURI(this.$route.query.url);
		let v = str.split('?');
		let arr = v[0].slice(0,v[0].lastIndexOf('.')) +'/' + v[1].slice(v[1].indexOf('=')+1) + '.html';
		this.msg = 'https://jiexi.071811.cc/jx.php?url='+ arr;
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
	display: -webkit-flex;
	display: flex;
	flex-wrap:  wrap;
	
}
@media (max-width: 700px) { 
				ul.video_item{
					justify-content:space-between;
				}
}
li.v_item{
		
    display: block;
    width: 39px;
    height: 39px;
    line-height: 39px;
    margin: 0 8px 15px 7px;
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
</style>
