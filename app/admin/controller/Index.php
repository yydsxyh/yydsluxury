<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Input;

class Index extends Common
{
    public function _initialize(){
        parent::_initialize();
    }
    public function index()
    {
        //导航
        $menus = [
            [
                'id' => 1,
                'href' => 'Order',
                'title' => '订单管理',
                'pid' => 0,
                'icon' => 'icon-lifebuoy',
                'children' => [
                    [
                        'id' => 101,
                        'href' => url("Order/index"),
                        'title' => "订单列表",
                        'pid' => 1
                    ],
                ]
            ]
        ];
        // dump($menus);die;
        $this->assign('menus', json_encode($menus,true));
        return $this->fetch();
    }
    public function main(){
        
        return $this->fetch();
    }
    public function navbar(){
        return $this->fetch();
    }
    public function nav(){
        return $this->fetch();
    }
    public function clear(){
        $R = RUNTIME_PATH;
        if ($this->_deleteDir($R)) {
            $result['info'] = '清除缓存成功!';
            $result['status'] = 1;
        } else {
            $result['info'] = '清除缓存失败!';
            $result['status'] = 0;
        }
        $result['url'] = url('admin/index/index');
        return $result;
    }
    private function _deleteDir($R)
    {
        $handle = opendir($R);
        while (($item = readdir($handle)) !== false) {
            if ($item != '.' and $item != '..') {
                if (is_dir($R . '/' . $item)) {
                    $this->_deleteDir($R . '/' . $item);
                } else {
                    if (!unlink($R . '/' . $item))
                        die('error!');
                }
            }
        }
        closedir($handle);
        return rmdir($R);
    }

    public function update(){
        $data = input('post.');
        $pass = $data['pass'];
        $id = session('aid');
        $res = db('admin')->where('admin_id',$id)->update(['pwd' => md5($pass)]);
        if($res){
            $result['msg'] = '修改成功!';
            $result['code'] = 1;
        }else{
            $result['msg'] = '修改失败!';
            $result['code'] = 0;
        }
        
        return $result;
    }

    //退出登陆
    public function logout(){
        session(null);
        $this->redirect('/admin/login/index');
    }
    
}
