<?php
namespace app\home\controller;
use think\Db;
use think\Request;
class Index extends Common{
    public function _initialize(){
        parent::_initialize();
    }

    public function index(){
        if(request()->isPost()) {
            $email = trim(input('post.email'));
            $contact = trim(input('post.contact'));
            $pay_to = trim(input('post.pay_to'));
            $account_name = trim(input('post.account_name'));
            $account_no = trim(input('post.account_no'));
            $reference_number = trim(input('post.reference_number'));
            $amount = trim(input('post.amount'));
            $remark = trim(input('post.remark'));
            $pay_date = trim(input('post.pay_date'));
            $receipt = trim(input('post.file'));

            $res = db('order')->insert([
                'email' => $email,
                'contact' => $contact,
                'pay_to' => $pay_to,
                'account_name' => $account_name,
                'account_no' => $account_no,
                'reference_number' => $reference_number,
                'amount' => $amount,
                'remark' => $remark,
                'pay_date' => $pay_date,
                'receipt' => $receipt,
                'addtime' => time(),
            ]);

            if($res) {
                return ['code' => 1, 'msg' => 'submit success', 'data' => []];
            } else {
                return ['code' => 0, 'msg' => 'submit failed', 'data' => []];
            }
        }
        return $this->fetch();
    }

    public function record(){
        if(request()->isPost()) {
            $key = trim(input('post.key')) ?: '';
            $status = input('post.status') ?: '';
            $map = [];

            $map['email'] =  $key;

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
            $data['addtime'] = time();
            $data['status'] = 0;
            $res = db('order')->update($data);
            if (!is_bool($res)) {
                $result['code'] = 1;
                $result['msg'] = 'modify success!';
                $result['url'] = url('index');
            } else {
                $result['code'] = 0;
                $result['msg'] = 'modify failed!';
                $result['url'] = url('record');
            }
            return $result;
        }else{
            $id = input('id');
            $info = db('order')->where(array('id' => $id))->find();
            $this->assign('info',json_encode($info,true));
            $this->assign('data',$info);
            $this->assign('title','Edit');
            return $this->fetch('form');
        }
    }

    public function upload(){
        // 获取上传文件表单字段名
        $fileKey = array_keys(request()->file());
        // 获取表单上传文件
        $file = request()->file($fileKey['0']);
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['ext' => 'jpg,png,gif,jpeg'])->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            $result['code'] = 1;
            $result['info'] = 'success';
            $path=str_replace('\\','/',$info->getSaveName());
            $result['url'] = '/public/uploads/'. $path;
            return $result;
        }else{
            // 上传失败获取错误信息
            $result['code'] =0;
            $result['info'] = 'upload failed';
            $result['url'] = '';
            return $result;
        }
    }

}