<?php

namespace AdminModule;
use Nette\Application\UI\Form;

/**
 * Description of ProductPresenter
 *
 * @author Oli
 */
class ProductListPresenter extends \SecuredPresenter {
 
    
    private $categoryList;
    private $productList;
    
    
    public function startup()
    {
        parent::startup();
        $user = $this->getUser();
        if (!$user->isAllowed('administrace', 'view')) {
            $this->flashMessage('Nemáte oprávnění k zobrazení administrační sekce');
            $this->redirect(':Homepage:default');
        }
    }
    
    public function actionDefault($id)
    {
        $this->categoryList = $this->context->createCategorylist()->find($id)->fetch();
        if ($this->categoryList === FALSE) {
            //$this->setView('notFound');
            $this->presenter->redirect('find');
        }
    }

    public function renderDefault($id)
    {
        $this->template->categoryList = $this->categoryList;
        $this->template->productList = $this->context->createProductlist()->
                where(array('categorylist_id' => $id));
    }
    
    public function renderFind()
    {
        //$this->template->productList = $this->productList;
    }
    
    protected function createComponentPlist()
    {
        return new \PList($this->context->createProductlist());
    }
    
    public function handleMarkPublished($taskId)
    {
        $this->context->createProductlist()->where(array('id' => $taskId))->update(array('published' => 1));
        $this->flashMessage('Seznam produktů byl publikován');
        if (!$this->isAjax()) {
            $this->presenter->redirect('this');
        } else {
            $this->invalidateControl('table');
            $this->invalidateControl('flashMessages');
        }
    }
    
    public function handleMarkUnPublished($taskId)
    {
        $this->context->createProductlist()->where(array('id' => $taskId))->update(array('published' => 0));
        $this->flashMessage('Publikování seznamu produktů bylo zrušeno');
        if (!$this->isAjax()) {
            $this->presenter->redirect('this');
        } else {
            $this->invalidateControl('table');
            $this->invalidateControl('flashMessages');
        }
    }
    
    public function handleDeleteProductList($taskId)
    {
        $this->context->createProductlist()->where(array('id' => $taskId))->delete();
        $this->flashMessage('Seznam produktů byl odstraněn');
        if (!$this->isAjax()) {
            $this->presenter->redirect('this');
        } else {
            $this->invalidateControl('table');
            $this->invalidateControl('flashMessages');
        }
    }
    
    protected function createComponentNewProductList()
    {
        $form = new Form();
        $form->addText('text', 'Nový seznam produktů:', 20, 30)
            ->addRule(Form::FILLED, 'Je nutné zadat název seznamu produktů.');
        $form->addSelect('categoryId', 'Kategorie:', $this->context->createCategorylist()->fetchPairs('id', 'title'))
            ->setPrompt('- Vyberte -')
            ->addRule(Form::FILLED, 'Je nutné vybrat, kategorii do které je seznam přiřazen.');
        $form->addSubmit('create', 'Vytvořit');
        $form->onSuccess[] = callback($this, 'newProductListSubmitted');
        return $form;
    }
    
    public function newProductListSubmitted(Form $form){
        $this->context->createProductList()->insert(array(
            'title' => $form->values->text,
            'categorylist_id' => $form->values->categoryId
        ));
        $this->flashMessage('Seznam produktů byl přidán.', 'success');
        $this->redirect('this');
    }
    
    
    
}

?>
