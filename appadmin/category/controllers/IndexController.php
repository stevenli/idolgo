<?php

/**
 * 分类控制器
 *
 */
class Category_IndexController extends BaseController
{
	/**
	 *
	 * @var CategoryModel
	 */
	protected $model;

	public function init ()
	{
		$this->model = new CategoryModel();
	}

	public function listAction ()
	{
		$page_no = intval($this->_request->page_no);
        
        if ($this->_request->keyword)
        {
            $params['keyword'] = addslashes($this->_request->keyword);
        }
        
        if ($this->_request->c)
        {
            $params['c'] = $this->_request->c;
        }
        
        $list = $this->model->get_list($page_no, $params);
        $this->view->items = $list->data;
        $this->view->navigator = $list->pager->get_navigator_str($this->build_url('list',null,null,$params));
		
		$this->render('category-list');
	}
	
	public function addAction ()
	{
		$property = array();
		
		$property['sn'] = $this->_request->sn;
		$property['title'] = $this->_request->title;
		$property['condition'] = $this->_request->condition;
		
		$this->forward('list');
	}
	
	public function ajaxaddAction ()
	{
		$this->_helper->layout->disableLayout();
		
		$property = array();
		
		$property['sn'] = $this->_request->sn;
		$property['title'] = $this->_request->title;
		$property['condition'] = $this->_request->condition;
		
		try
		{
			$this->model->add($property);
			AjaxUtils::json('ok');
		}
		catch (Exception $e)
		{
			AjaxUtils::json_err($e->getCode(), $e->getMessage());
		}
	}
	
	public function ajaxdeleteAction ()
	{
		$this->_helper->layout->disableLayout();
		
		$id = $this->_request->id;
		
		$this->model->delete($id);
		
		AjaxUtils::json('ok');
	}
	
	public function ajaxeditAction ()
	{
		$this->_helper->layout->disableLayout();
		
		$id = $this->_request->id;
		$fields = $this->_request->p;
		
		$this->model->edit($id, $fields);
		
		AjaxUtils::json('ok');
	}
	
	public function ajaxdisableAction ()
	{
		$this->_helper->layout->disableLayout();
		
		$id = $this->_request->id;
		$status = $this->_request->status ? 0 : 1;
		
		$this->model->status($id, $status);
		
		AjaxUtils::json('ok');
	}
	
	public function popuptagAction ()
	{
		$page_no = intval($this->_request->page_no);
        
        if ($this->_request->keyword)
        {
            $params['keyword'] = addslashes($this->_request->keyword);
        }
        
        if ($this->_request->c)
        {
            $params['c'] = $this->_request->c;
        }
        
        $list = $this->model->get_list($page_no, $params);
        $this->view->items = $list->data;
        $this->view->navigator = $list->pager->get_navigator_str($this->build_url('popuptag',null,null,$params));
		
		$this->render('popup-category');
	}

	public function searchfieldsAction ()
    {
        $this->_helper->layout->disableLayout();
        
        AjaxUtils::json(array(
            array('l'=>'ID', 'f'=>'id', 't'=>'str'),
            array('l'=>'序列号', 'f'=>'sn', 't'=>'str'),
            array('l'=>'标题', 'f'=>'title', 't'=>'str'),
            array('l'=>'发布时间', 'f'=>'ctime', 't'=>'date')
        ));
    }
}