<?php
namespace app\home\controller;
use think\Db;
use think\Request;
use clt\Form;
class EmptyController extends Common{
    protected  $dao,$fields;
    public function _initialize()
    {
        parent::_initialize();
        $this->dao = db(DBNAME);
    }
    public function index(){
        
    }
    public function info(){
        
    }
    public function senMsg(){
        
    }
}