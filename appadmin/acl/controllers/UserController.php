<?php

/**
 * 用户管理
 *
 */
class Acl_UserController extends BaseController
{
    /**
	 *
	 * @var UserModel
	 */
    protected $model;
    
    public function init ()
    {
        $this->model = new ACLUserModel();
    }
    
    public function listAction ()
    {
		$page_no = intval($this->_request->page_no);
        
        $list = $this->model->get_list($page_no, $params);
        $this->view->items = $list->data;
        $this->view->navigator = $list->pager->get_navigator_str($this->build_url('list',null,null,$params));
		
        $this->render('user-list');
    }
	
	public function infoAction ()
	{
		$this->render('user-info');
	}
	
	public function detailsAction ()
	{
		$this->render('user-details');
	}
	
	public function projectsAction ()
	{
		$this->render('user-projects-list');
	}
	
	public function followersAction ()
	{
		$this->render('user-followers-list');
	}
    
    public function ajaxdisableAction ()
    {
        
    }
	
	public function ajaxenableAction ()
	{
		
	}
    
    public function ajaxdeleteAction ()
    {
        $id = intval($this->_request->id);
        $this->model->delete($id);
        
        AjaxUtils::json('ok');
    }
}

