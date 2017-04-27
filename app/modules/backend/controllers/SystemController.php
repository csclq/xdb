<?php
namespace App\Modules\Backend\Controllers;

use App\Models\YztAdmin;
use App\Models\YztApp;
use App\Models\YztAuth;
use App\Models\YztRole;

class SystemController extends ControllerBase
{


    public function userAction()
    {

        if ($this->request->isPost()) {
            $this->view->disable();
            $where['conditions'] = ' active = 1 ';
            empty($this->post['username']) || $where['conditions'] .= " and username like '%" . $this->post['username'] . "%'";
            empty($this->post['role_id']) || $where['conditions'] .= " and role_id=" . intval($this->post['role_id']);
            $total = YztAdmin::count($where);
            $where['limit'] = array('number' => $this->config->pageNum, 'offset' => (intval($this->post['p']) - 1) * $this->config->pageNum);
            $user = YztAdmin::find($where);
            $arr=[];
            foreach ($user as $k=> $v){
                $arr[$k]['username']=$v->getUsername();
                $arr[$k]['id']=$v->getId();
                $arr[$k]['status']=$v->getActive()?'正常':'冻结';
                $arr[$k]['role']=$v->YztRole->name;
            }


            $this->result['total']= ceil($total /$this->config->pageNum);
            $this->result['data']= $arr;
            echo json_encode($this->result);
        }
        $this->view->departs = YztRole::find();

    }

    public function departAction()
    {
        if ($this->request->isPost()) {
            $this->view->disable();
            $where ['conditions']= '1=1 ';
            empty($this->request->getPost('name')) || $where['conditions'] .= " and name like '%" . htmlspecialchars(trim($this->request->getPost('name'))) . "%'";
            empty($this->request->getPost('remark')) || $where['conditions'] .= " and remark like '%" . htmlspecialchars(trim($this->request->getPost('remark'))) . "%'";
            $total = YztRole::count($where);
            $limit = array('number' => $this->config->pageNum,//$GLOBALS['config']['pageNum'],
                'offset' => (intval($this->request->getPost('p')) - 1) * $this->config->pageNum);
            $where['limit'] =  $limit;
            $where['order'] = 'id desc';
            $user = YztRole::find($where);

            $this->result['total']= ceil($total /$this->config->pageNum);
            $this->result['data']= $user->toArray();
            echo json_encode($this->result);
        }

    }



    public function roleditAction(){
        if($this->request->isPost()) {
            $this->view->disable();
            if ($this->post['action'] == 'edit' && $this->post['id']) {
                $data=[];
                foreach ($this->post as $k => $v){
                    if($k!='action'&& $k!='result'){
                        $data[$k]=$v;
                    }
                }
                YztRole::findFirst('id=' . $this->post['id'])->update($data);
            } elseif ($this->post['action'] == 'delete') {
                YztRole::findFirst('id=' . $this->post['id'])->delete();
            } elseif ($this->post['action'] == 'add') {
                $model=new YztRole();
                $data=[];
                foreach ($this->post as $k => $v){
                    if($k!='action'&& $k!='result'){
                        $data[$k]=$v;
                    }
                }
                $model->create($data);
            }
            echo json_encode($this->result);
        }

    }

    public function usereditAction(){
        $admin=null;
        if($this->dispatcher->getParam(0)){
            $uid=intval($this->dispatcher->getParam(0));
            $admin=YztAdmin::findFirst('id='.$uid)->toArray();
            $this->view->actionname="编辑";
            $this->post['action']="edit";
        }else{
            $this->view->actionname="添加";
            $this->post['action']="add";
        }
        if($this->request->isPost()) {
            $this->view->disable();
            if ($this->post['action'] == 'edit' && $uid) {
                $data=[];
                foreach ($this->post as $k => $v){
                    if($k=='password' && !empty($v)){
                        $data[$k]=md5(trim($v));
                    }elseif($k=='password' && empty($v)){
                       continue;
                    }elseif($k!='action'&& $k!='result'){
                        $data[$k]=$v;
                    }
                }


                YztAdmin::findFirst('id=' . $uid)->update($data);
            } elseif ($this->post['action'] == 'delete') {
                YztAdmin::findFirst('id=' . $uid)->delete();

            } elseif ($this->post['action'] == 'add') {
                $model=new YztAdmin();
                $data=[];
                foreach ($this->post as $k => $v){
                    if($k=='password' && !empty($v)){
                        $data[$k]=md5(trim($v));
                    }elseif($k=='password' && empty($v)){
                        $data[$k]=md5('123456');
                    }elseif($k!='action'&& $k!='result'){
                        $data[$k]=$v;
                    }
                }
              $model->create($data);

            }
            if($this->post['result']=='jump'){
                $this->response->redirect('/backend/system/user');
            }else{
                echo json_encode($this->result);
            }

        }

        $this->view->departs = YztRole::find();
        $this->view->admin=$admin;
    }






    public function clearcacheAction()
    {             //清队缓存
        cleancache();
        cleancache();
        $this->common->syslog("清除缓存");
        echo "<script>alert('缓存清除成功');history.back()</script>";
    }

    public function backupAction()
    {               //数据备份
        $total = ceil(dircount() /$this->config->pageNum);// $GLOBALS['config']['pageNum']);
        $this->view->total = $total;
        if ($this->request->isPost()) {
            $this->view->disable();
            $post = json_decode(file_get_contents("php://input"), true);

            if (isset($post['back'])) {
                databackup();
                if (dircount() % $this->config->pageNum  == 1) {
                    $total++;
                }
                $p = $total;
                $this->common->syslog("手动备份数据库");
            } else {
                $p = $post['p'];
            }

            $file = fileList($p);
            $i = 0;
            $filelist = array();
            foreach ($file as $v) {
                if ($i++ < $this->config->pageNum ) {
                    $info['filename'] = $v;
                    $info['path'] =$this->config->dataDir  . $v;
                    $info['mtime'] = date("Y-m-d H:i:s", filemtime(getcwd() . $info['path']));
                    array_push($filelist, $info);
                }
            }
            $info = array('total' => $total,
                'info' => $filelist);
            echo json_encode($info);

        }

    }

    public function delbackupAction()
    {
        $this->view->disable();
        if ($this->request->isGet()) {
            $file = getcwd() .$this->config->dataDir  . trim($this->dispatcher->getParam(0));
            if (file_exists($file)) {
                unlink($file);
                $this->common->syslog("删除数据库备份");
            }
        }
        if ($this->request->isPost()) {
            if ($this->request->getPost('backfile')) {
                foreach ($this->request->getPost('backfile') as $v) {
                    $file = getcwd() . $this->config->dataDir . trim($v);
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            }
        }


        $this->response->redirect('/backend/system/backup');


    }

    public function adduserAction()
    {                                            //添加管理员
        if ($this->request->isPost()) {
            $this->view->disable();
            if (stristr($_SERVER['CONTENT_TYPE'], 'application/x-www-form-urlencoded')) {
                $post = $_POST;
            } elseif (stristr($_SERVER['CONTENT_TYPE'], 'application/json')) {
                $post = json_decode(file_get_contents("php://input"), true);
            }

            $admin = new Admin();
            $admin->setPasswd(md5(trim($post['passwd'])));
            $admin->setAddTime();
            $admin->setName(htmlspecialchars(trim($post['name'])));
            $admin->setDepart(intval(trim($post['depart'])));
            $admin->create();
            exit;
        }
    }

    public function chuserAction()
    {                                            //修改管理员
        if ($this->request->isPost()) {
            $this->view->disable();
            $id = $this->request->getPost('id','int');
            $depart = $this->request->getPost('depart','int');
            $active = $this->request->getPost('active','int');
            $username = ($this->request->getPost('name','string'));

            $admin = Admin::findFirst($id);
            empty($username) || $admin->setName($username);
            $admin->setDepart($depart);
            $admin->setActive($active);
            $admin->setUpdateTime();
            $admin->save();
            return $this->response->redirect('/backend/system/user');
        }
    }







    public function permissionAction()
    {                                //权限管理
        $did = intval($this->dispatcher->getParam(0))??0;
        if ($this->request->isPost()) {
            if($did && $this->post['action']=='edit'){
                $this->modelsManager->executeQuery("delete from App\Models\YztAuth where role_id=:did:", array('did' => $did));
                is_array($this->post['app'])||$this->post['app']=explode(',',$this->post['app']);
                foreach ($this->post['app'] as $v) {
                    $model = new YztAuth();
                    $model->setAppId($v);
                    $model->setRoleId($did);
                    $model->create();
                }
            }
            $perm = YztApp::find('active=1');
            $arr = array();
            if($did){
                $acc = YztAuth::find('role_id=' . $did);
                if ($acc) {
                    foreach ($acc as $v) {
                        array_push($arr, $v->app_id);
                    }
                }
            }
            $list = $this->common->infinate($perm->toArray(), 0, $arr);
            $this->result['data']=$list;
            echo json_encode($this->result);
        }
        $this->view->role_id=$did;
    }

    public function appeditAction()
    {                         //添加新应用
        if ($this->request->isPost()) {
            $this->view->disable();
            $app = new YztApp();
            $app->setName(htmlspecialchars(trim($this->request->getPost('name'))));
            $app->setRemark(htmlspecialchars(trim($this->request->getPost('remark'))));
            $app->setPid($this->request->getPost('pid','int'));
            $app->setShow($this->request->getPost('show','int'));
            $app->setLevel(intval($this->request->getPost('pid')) > 0 ? 2 : 1);
            $app->save();
            echo json_encode($this->result);
        }
    }



    public function operlogAction(){                //系统操作日志
        if ($this->request->isPost()) {
            $this->view->disable();
            $post = json_decode(file_get_contents("php://input"), true);
            $where = '1=1';
            empty($post['username']) || $where .= " and username like '%" . htmlspecialchars(trim($post['username'])) . "%'";
            empty($post['content']) || $where .= " and content like '%" . htmlspecialchars(trim($post['content'])) . "%'";
            $limit = array('number' => $this->config->pageNum , 'offset' => (intval($post['p']) - 1) * $this->config->pageNum);
            $arr = array($where, 'limit' => $limit, 'order' => 'id desc');
            $list = Syslog::find($arr);

            $total = Syslog::count($where);
            $info = array('total' => ceil($total / $this->config->pageNum),
                'info' => $list->toArray());
            echo json_encode($info);
        }
    }




    public function testAction()
    {

    }


}