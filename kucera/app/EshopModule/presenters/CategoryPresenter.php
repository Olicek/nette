<?php

namespace EshopModule;
use Nette\Diagnostics\Debugger;

/**
 * Description of CategoryPresenter
 *
 * @author Oli
 */
class CategoryPresenter extends \BasePresenter {
    
    
    private $category;

    public function actionDefault($id)
    {
        $this->category = $this->context->createCategoryList()->get($id);
        if ($this->category === FALSE) {
            $this->setView('notFound');
        }
    }
    
    public function renderDefault($id)
    {
        
        $user = $this->getUser();
        if(!$user->isAllowed('category', 'view')){
            $this->flashMessage('Nemáte oprávnění prohlížet kategorie');
            $this->redirect(':Homepage:default');
        } else {
            $this->template->category = $this->category;
            $this->template->productList = $this->context->createProductList();
        }
    }
}

?>
