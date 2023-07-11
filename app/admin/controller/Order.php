<?php
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Controller;
class Order extends Common
{
    public function _initialize(){
        parent::_initialize();
    }
    //列表
    public function index(){
        if(request()->isPost()) {
            $key = trim(input('post.key'));
            $status = input('post.status') ?: '';
            $map = [];

            if ($key) {
                $map['email'] = ['like', "%" . $key . "%"];
            }
            if ($status !== '') {
                $status = explode(':', $status)[1];
                $map['status'] = $status;
            }
            $page = input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $list = Db::table(config('database.prefix') . 'order')
                ->where($map)
                ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
                ->toArray();
            foreach ($list['data'] as $k=>$v){
                $list['data'][$k]['addtime'] = $v['addtime'] ? date('Y/m/d',$v['addtime']) : '';
            }
            return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list['data'],'count'=>$list['total'],'rel'=>1];
        }
        return $this->fetch();
    }

    public function edit(){
        if(request()->isPost()) {
            $data = input('post.');
            
            db('order')->update($data);
            $result['code'] = 1;
            $result['msg'] = '修改成功!';
            $result['url'] = url('index');
            return $result;
        }else{
            $id = input('id');
            $info = db('order')->where(array('id' => $id))->find();
            $this->assign('info',json_encode($info,true));
            $this->assign('title',lang('edit').'订单');
            return $this->fetch('form');
        }
    }
    //设置应用状态
    public function editState(){
        $id = input('post.id');
        $status = input('post.status');
        if(db('order')->where('id='.$id)->update(['status'=>$status])!==false){
            return ['status'=>1,'msg'=>'设置成功!'];
        }else{
            return ['status'=>0,'msg'=>'设置失败!'];
        }
    }
    public function proOrder(){
        $product = db('song');
        $data = input('post.');
        if($product->update($data)!==false){
            return $result = ['msg' => '操作成功！','url'=>url('index'), 'code' =>1];
        }else{
            return $result = ['code'=>0,'msg'=>'操作失败！'];
        }
    }
    public function del(){
        db('song')->where(array('id'=>input('id')))->delete();
        return ['code'=>1,'msg'=>'删除成功！'];
    }
    public function delall(){
        $map['id'] =array('in',input('param.ids/a'));
        db('song')->where($map)->delete();
        $result['msg'] = '删除成功！';
        $result['code'] = 1;
        $result['url'] = url('index');
        return $result;
    }

}