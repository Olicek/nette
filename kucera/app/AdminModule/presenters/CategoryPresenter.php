<?php

namespace AdminModule;
use Nette\Application\UI\Form;
use Nette\Diagnostics\Debugger;
use Nette\Forms\Container;
/**
 * Description of CategoryPresenter
 *
 * @author Oli
 */
class CategoryPresenter extends \SecuredPresenter {
    
    /** @persistent int */
    public $categoryId;
    
    public function startup()
    {
        parent::startup();
        $user = $this->getUser();
        if (!$user->isAllowed('administrace', 'view')) {
            $this->flashMessage('Nemáte oprávnění k zobrazení administrační sekce');
            $this->redirect(':Homepage:default');
        }
    }
    
    
    public function renderDefault()
    {
        $this->template->categoryList = $this->context->createCategorylist()
        ->order('title ASC');
    }
    
    public function handleMarkPublished($taskId)
    {
        $this->context->createCategorylist()->where(array('id' => $taskId))->update(array('published' => 1));
        $this->flashMessage('Kategorie byla publikována');
        if (!$this->isAjax()) {
            $this->presenter->redirect('this');
        } else {
            $this->invalidateControl('form');
            $this->invalidateControl('flashMessages');
        }
    }
    
    public function handleMarkUnPublished($taskId)
    {
        $this->context->createCategorylist()->where(array('id' => $taskId))->update(array('published' => 0));
        $this->flashMessage('Publikování kategorie bylo zrušeno');
        if (!$this->isAjax()) {
            $this->presenter->redirect('this');
        } else {
            $this->invalidateControl('form');
            $this->invalidateControl('flashMessages');
        }
    }
    
    public function handleDeleteCategory($taskId)
    {
        $this->context->createCategorylist()->where(array('id' => $taskId))->delete();
        $this->flashMessage('Kategorie byla odstraněna');
        if (!$this->isAjax()) {
            $this->presenter->redirect('this');
        } else {
            $this->invalidateControl('form');
            $this->invalidateControl('flashMessages');
        }
        
    }
    
    protected function createComponentNewCategory()
    {
        $form = new Form();
        

        $form->addDynamic('dates', function (Container $container) {
                $container->addDate('date');
        });
        
        $form->addText('text', 'Nová kategorie:', 20, 30)
            ->addRule(Form::FILLED, 'Je nutné zadat název kategorie.');
        $form->addSubmit('create', 'Vytvořit');
        $form->onSuccess[] = callback($this, 'newCategorySubmitted');
        return $form;
    }
    
    public function newCategorySubmitted(Form $form){
        $this->context->createCategoryList()->insert(array(
            'title' => $form->values->text,
        ));
        $this->flashMessage('Kategorie přidána.', 'success');
        $this->redirect('this');
    }
    
    protected function createComponentEditCategory()
    {
        $form = new Form();
        $form->addHidden('editId');
        $form->addText('text', 'Nový název kategorie:', 20, 20)
            ->addRule(Form::FILLED, 'Je nutné vyplnit název kategorie.');
        $form->addSubmit('create', 'Vytvořit');
        $form->onSuccess[] = callback($this, 'editCategorySubmitted');
        return $form;
    }
    
    public function editCategorySubmitted(Form $form)
    {
        $this->context->createCategorylist()->where(array('id' => $form->values->editId))->update(array('title' => $form->values->text));
        $this->flashMessage('Název kategorie aktualizován.');
        if (!$this->isAjax()) {
            $this->redirect('this');
        } else {
            $form->setValues(array(), TRUE);
            $this->invalidateControl('form');
            $this->invalidateControl('flashMessages');
        }
    }
    
}

?>
