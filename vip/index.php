<?php
header('Content-type:text/html;charset=utf-8');
header('Access-Control-Allow-Origin:*');
require './phpQuery/phpQuery.php';

class tx{
   function __construct($world,$url) {
   	/*腾讯视频电视剧*/
		$html = phpQuery::newDocumentFile("$url");
		$list = pq(".mod_episode a");
		foreach($list as $k=>$v){
			/*判断是否为空*/
			if(pq($v)->find('span')->text() != ''){
					$this->world[$k]['title'] = pq($v)->find('span')->text();
					$this->world[$k]['url'] = pq($v)->attr('href');
			}
		}
		$names = pq(".video_title_cn a");
		$this->world['vname'] = $names->text();
	}
}

if($_POST['name']=='qq.com'){
	$txsp = new tx(array(),$_POST['videoUrl']);
	echo json_encode($txsp);
}

