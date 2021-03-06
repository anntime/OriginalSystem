<?php 
/**
 * 升级TP3.2.3新语法~~
 */
namespace Admin\Action;
use Think\Action;
	Class UserManageAction extends CommonAction{
		/**
		 * 此控制器为用户管理控制器
		 */
		Public function index(){
			$this->redirect("/Admin/UserManage/listinfo");
		}
		Public function listinfo(){
			$this->redirect("/Admin/UserManage/listUserInfo");
		}
		Public function listUserInfo(){
			$userinfo = user_info();
			$this->assign('userinfo',$userinfo)->display("index");
		}

		/**
		 * 根据前台ajax请求的用户ID返回用户信息。
		 * 返回值格式为json
		 */
		Public function getInfoById(){
		$id = I('id');
		$info=getInfById($id);
		if(empty($info)) $this->ajaxReturn(array('status'=>0),'json');
		else $this->ajaxReturn($info,'json');
	}
		/**
		 * 删除指定用户
		 */
		Public function userDel(){
			$id = I('id');
			if(M('user')->delete($id)) $this->success('删除成功',U('/Admin/UserManage/index'));
			else $this->error('删除失败',U('/Admin/UserManage/index'));
		}
		/**
		 * 添加用户模块
		 */
		Public function UserAdd(){
			$this->display("userAdd");
		}
		Public function douserAdd(){
			$data = array(
				'username'=>I('username'),
				'password'=>md5(I('password')),
				'province'=>I('province'),
				'city'=>I('city'),
				'longitude'=>I('longitude'),
				'latitude'=>I('latitude'),
				'ip'=>I('ip'),
				'visittime'=>time(),
			);
			if(M('user')->add($data)) $this->success('添加成功',U('/Admin/UserManage/index'));
			else $this->error('添加失败',U('/Admin/UserManage/index'));
		}
		Public function userSetting(){
			$this->display();
		}
		Public function SaveUserSetting(){
			$simulateNum = I('simulateNum');
			if ($simulateNum=='') $simulateNum =10;
			$max = user_count();
			if ($simulateNum>=$max||$simulateNum<=0) 
				$this->error('参数设置不合法',U('/Admin/UserManage/userSetting'));
			$data['Val'] = $simulateNum;
			if(SaveConfig("SIMULATE_NUM",$data)) 
				$this->success('修改成功',U('/Admin/UserManage/userSetting'));
			else 
				$this->error('数据没有修改',U('/Admin/UserManage/userSetting'));
		}
		/**
		 * 预留编辑用户模块
		 */
		Public function EditUser(){
			$this->success("正在开发中！~~~");
		}
		Public function Remain(){
			$this->success("正在开发中！~~~");
		}
	}
 ?>