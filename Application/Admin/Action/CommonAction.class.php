<?php
	//ThinkPHP默认添加 
	namespace Admin\Action;
	use Think\Action;

Class CommonAction extends Action{
	/**
	 * 此控制器为公用控制器，访问每个控制器之前都要执行Common控制器的_函数
	 */
		public function _initialize(){
			/**
			 * 通过Session判断用户是否已经登录系统。
			 * 如果没有登录系统，重定向到登录界面。
			 */
			if(!isset($_SESSION['uid'])||!isset($_SESSION['username'])){
				$this->redirect('Admin/Login/index');
			}
			$this->assign("Menu",$this->getSubMenu());
		}
		Public function getUrl(){
			// $url = "/SmartOrder/index.php/Admin/MenuManage/addCookMenu.html";
			// $url = $_POST["Url"];
			$url = I("post.url");
			if(strpos($url, ".html")) $url = substr($url,0,strpos($url, ".html"));
			$url = explode("/", $url);
			$controller = $url["4"];
			$function = $url["5"];
			$match = $controller."/".$function;
			$menu = M("menu")->field("id,Pid,Url")->select();
			foreach ($menu as $key => $value) {
				if($value["Url"]==$match) {
					if($value["Pid"]-1>=0) 
						$ReturnUrl[] = $menu[$value["Pid"]-1]["Url"];
				}
			}
			foreach ($menu as $key => $value) {
				if(!empty($ReturnUrl)){
					if($value["Url"]==$ReturnUrl[0])
						$ReturnUrl[] = $menu[$value["Pid"]-1]["Url"];
				}
			}
			// dump($ReturnUrl);
			if(empty($ReturnUrl)) $ReturnUrl[]=$match;
			$this->ajaxReturn($ReturnUrl,"json");
		}
		/**
		 * 完成Url和标题的树状结构
		 */
		Public function getSubMenu(){
			$model = explode('/', __ACTION__);
			// dump($model);die;
			$url = $model[4]."/index";
			$Third =$model[4]."/".$model[5];
			$cc = array("Url"=>$url,"Pid"=>0);
			$subinfo = M("menu")->where($cc)->find();
			$subId	= $subinfo["id"];
			$all = M("menu")->select();
			//识别判断URL并且找出该URL的二级菜单
			$ThirdFather = $this->findFather($all,$Third);
			foreach ($all as $key => $value) {
				$value["Url"] = C("GROUP_NAME")."/".$value["Url"];
				if ($value["Pid"]==0) $mainUrl[] = $value;
				if ($value["Pid"]==$subId) $subUrl[]=$value;
				if ($value["Pid"]==$ThirdFather) $thirdUrl[] = $value;
			}
			$Menu =array();
			$Menu["main"] = $mainUrl;
			$Menu["subMenu"] = $subUrl;
			$Menu["thirdMenu"] = $thirdUrl;
			// dump($Menu);
			return $Menu;
		}
		Public function findFather($all,$Third){
			foreach ($all as $key => $value) {
				if($value["Pid"]==0&&$value["Url"]==$Third) return "###"; 
				elseif($value["Url"]==$Third) 
					{	
						$t1 = $all[ $value["Pid"]-1 ]["Pid"];
						if($t1==0) return $value["id"];
							else return $value["Pid"];						
					}
			}
		}
}
 ?>