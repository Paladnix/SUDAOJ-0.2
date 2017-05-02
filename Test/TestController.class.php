<?php 


class TestController extends Controller{

    public function index( $params ){

        $content = (new TestModel)->selectAll();

        $this->assign('title', '全部条目');

        $this->assign('content', $content);

        $this->_view->render();
    }

    public function add(){

        $data['name'] = $_POST['value'];

        $count = (new TestModel)->add($data);

        $this->assign('title', '添加成功');
        $this->assign('count', $count);
        $this->_view->render();
    }

    public function view($id = null)
    {
        $test = (new TestModel)->select($id);

        $this->assign('title', "正在查看".$test['test_name']);

        $this->assign('test', $test);

        $this->_view->render();
    }
   
   
    public function update()
    {
        $data = array('id'=>$_POST['id'], 'name'=>$_POST['value']);

        $count = (new TestModel)->update($data['id'], $data);

        $this->assign('title', '修改成功');
        $this->assign('count', $count);
        $this->_view->render();
    }

    public function delete($id = null)
    {
        $count = (new TestModel)->delete($id);

        $this->assign('title', '删除成功');
        $this->assign('count', $count);
        $this->_view->render();
    }
}
