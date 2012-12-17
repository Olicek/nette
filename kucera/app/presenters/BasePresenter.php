<?php


/**
 * Base class for all application presenters.
 *
 * @author     John Doe
 * @package    MyApplication
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

    private $imageDir = WWW_DIR;
    
    public function startup()
    {
        parent::startup();
        Nette\Application\UI\Replicator::register();
    }
    
    public function beforeRender()
    {
        $this->template->productList_menu = $this->context->createProductlist()
        ->order('title ASC');
        $this->template->categoryList_menu = $this->context->createCategorylist()
        ->order('title ASC');
    }
    
    public function getImageDir(){
        return $this->imageDir;
    }
    
    public function handleSignOut()
    {
        $this->getUser()->logout();
        $this->flashMessage('Byl jste úspěšně odhlášen!');
        $this->redirect(':Homepage:default');
    }
}
