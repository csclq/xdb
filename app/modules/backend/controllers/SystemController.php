<?php
namespace App\Modules\Backend\Controllers;

use App\Models\YztApp;
use App\Models\YztAuth;
use App\Models\YztRole;
use Backend\Models\Admin;
use Backend\Models\App;
use Backend\Models\Depart;
use Backend\Models\NhsO2oAdmin;
use Backend\Models\Permission;
use Backend\Models\Syslog;

class SystemController extends ControllerBase
{


    public function userAction()
    {



        if ($this->request->isPost()) {
            $this->view->disable();
            $where = ' active = 1 ';
            empty($post['username']) || $where .= " and name like '%" . $this->post['username'] . "%'";
            empty($post['depart']) || $where .= " and depart=" . intval($this->post['depart']);
            $limit = array('number' => $this->config->pageNum, 'offset' => (intval($this->post['p']) - 1) * $this->config->pageNum);
            $arr = array($where, 'limit' => $limit, 'order' => 'id desc');
            $user = Admin::find($arr);

            $total = Admin::count($where);
            $info = array('total' => ceil($total / $this->config->pageNum),
                'info' => $user->toArray());
            echo json_encode($info);
        }
        $this->view->departs = YztRole::find()->toArray();

    }

    public function departAction()
    {
        if ($this->request->isPost()) {
            $this->view->disable();
            $where ['conditions']= '1=1 ';
            empty($this->request->getPost('name')) || $where['conditions'] .= " and name like '%" . htmlspecialchars(trim($this->request->getPost('name'))) . "%'";
            empty($this->request->getPost('remark')) || $where['conditions'] .= " and remark like '%" . htmlspecialchars(trim($this->request->getPost('remark'))) . "%'";
            $limit = array('number' => $this->config->pageNum,//$GLOBALS['config']['pageNum'],
                'offset' => (intval($this->request->getPost('p')) - 1) * $this->config->pageNum);
            $where['limit'] =  $limit;
            $where['order'] = 'id desc';
            $user = YztRole::find($where);
            $total = YztRole::count($where);
            $this->result['total']= ceil($total /$this->config->pageNum);
            $this->result['data']= $user->toArray();
            echo json_encode($this->result);
        }

    }

    public function appAction()
    {

    }

    public function roleditAction(){
        if($this->request->isPost()) {
            $this->view->disable();
            if ($this->request->getPost('action') == 'edit' && $this->request->getPost('id')) {
                $data=[];
                foreach ($_POST as $k => $v){
                    if($k!=='action'|| $k!='result'){
                        $data[$k]=htmlspecialchars($v);
                    }
                }
                YztRole::findFirst('id=' . $this->request->getPost('id'))->update($data);
            } elseif ($this->request->getPost('action') == 'delete') {
                YztRole::findFirst('id=' . $this->request->getPost('id'))->delete();
            } elseif ($this->request->getPost('action') == 'add') {
                $goods=new YztRole();
                $data=[];
                foreach ($_POST as $k => $v){
                    if($k!=='action'|| $k!='result'){
                        $data[$k]=htmlspecialchars($v);
                    }
                }
                $goods->create($data);
            }
            echo json_encode($this->result);
        }

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


    public function adddepartAction()
    {                                            //添加新部门
        if ($this->request->isPost()) {
            $this->view->disable();
            if (stristr($_SERVER['CONTENT_TYPE'], 'application/x-www-form-urlencoded')) {
                $post = $_POST;
            } elseif (stristr($_SERVER['CONTENT_TYPE'], 'application/json')) {
                $post = json_decode(file_get_contents("php://input"), true);
            }
            $admin = new Depart();
            $admin->setAddTime();
            $admin->setName(htmlspecialchars(trim($post['name'])));
            $admin->setRemark(htmlspecialchars(trim($post['remark'])));

            $admin->save();
            if ($admin->getId()) {
                echo 1;
            } else {
                echo 0;
            }
            exit;
        }
    }


    public function deleteUserAction()
    {                                     //删除管理员
        if ($this->request->isPost()) {
            $this->view->disable();
            $post = json_decode(file_get_contents("php://input"), true);
            $model = Admin::findFirst(intval($post['id']));
            $model->delete();
            exit;
        }
    }

    public function deleteDepartAction()
    {                               //删除部门
        if ($this->request->isPost()) {
            $this->view->disable();
            $post = json_decode(file_get_contents("php://input"), true);
            $model = Depart::findFirst(intval($post['id']));
            $model->delete();
            exit;
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
        }
    }

    public function chpassAction()
    {              //密码修改
        if ($this->request->isPost()) {
            $this->view->disable();
            $oldpass=trim($this->request->getPost('oldpass'));
            $newpass=trim($this->request->getPost('newpass'));
            if(empty($oldpass)||empty($newpass)){
                echo "<script>alert('密码不能为空'),history.back();</script>";
                exit;
            }
            $user=Admin::findFirst($this->uid);
            if(md5($oldpass)!=$user->getPasswd()){
                echo "<script>alert('原密码错误'),history.back();</script>";
                exit;
            }
            $user->setPasswd(md5($newpass));
            $user->update();
            echo "<script>alert('密码修改成功'),history.back();</script>";
            exit;
        }else{
            $this->response->setStatusCode(404, "Not Found");
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