<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonStarted for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Started\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    // public function editAction()
    // {
    // 	$checkMethod = $this -> getRequest();

    // 	echo "edit page <br>";

    // 	$getAction = $this -> params() -> fromRoute('action','không có Get'); 

    // 	//$getActionByPost = $this -> params() -> fromPost('action','không có Post'); //

    // 	$getId = $this -> params() -> fromRoute('id','không có');

    // 	echo $getAction.' : action <br> Id : '.$getId.' <br> ';

    // 	echo $checkMethod -> getMethod().' : Method <br> Url : '.$checkMethod -> getUriString();

    //     return false;
    // }

    public function editAction()
    {
 
    	$checkMethod = $this -> getRequest();

    	if ($checkMethod->isGET()) {

    		$getAction = $this -> params() -> fromRoute('action','không có Get'); 

    		$getId = $this -> params() -> fromRoute('id',0);
    	}
    	else {
    		$getAction = 'index';
    		$getId = -1;
    	}

    	if ($getId <= 0) {
    		$this -> fileNotFound();
    		//or throw new \Exception("id $getId không được tìm thấy");
    	}

    	$ViewModel = new ViewModel([
        	'action' => $getAction, //gán tên 
        	'id' => $getId
        ]);
    	$ViewModel->setTemplate('started/index/edit');

        return $ViewModel;
    }

    public function fileNotFound()
    {
    	return $this->getResponse()->setStatusCode(404);
    }
}
