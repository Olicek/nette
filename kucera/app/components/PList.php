<?php

use Nette\Application\UI,
    Nette\Database\Table\Selection,
    Nette\Application\UI\Form;

/**
 * Description of productList
 *
 * @author Oli
 */
class PList extends UI\Control
{
    /** @var \Nette\Database\Table\Selection */
    private $databaze;

    public function __construct(Selection $databaze)
    {
        parent::__construct(); // vždy je potřeba volat rodičovský konstruktor
        $this->databaze = $databaze;
    }

    public function render()
    {
        $this->template->setFile(__DIR__ . '/PList.latte');
        $this->template->pList = $this->databaze;
        $this->template->render();
    }
    
    public function handleMarkPublished($id)
    {
        $this->databaze->where(array('id' => $id))->update(array('published' => 1));
        $this->presenter->redirect('this');
    }
    
    public function handleMarkUnPublished($id)
    {
        $this->databaze->where(array('id' => $id))->update(array('published' => 0));
        $this->presenter->redirect('this');
    }
    
    public function handleDeleteProductList($taskId)
    {
        $this->databaze->where(array('id' => $taskId))->delete();
        $this->presenter->redirect('this');
    }
    
    
    protected function createComponentEditProductList()
    {
        $form = new Form();
        $form->addHidden('editId');
        $form->addText('text', '', 20, 20)
            ->addRule(Form::FILLED, 'Je nutné vyplnit název kategorie.');
        $form->addSubmit('create', 'Editovat');
        $form->onSuccess[] = callback($this, 'editProductListSubmitted');
        return $form;
    }
    
    public function editProductListSubmitted(Form $form)
    {
        $this->databaze->where(array('id' => $form->values->editId))->update(array('title' => $form->values->text));
        $this->flashMessage('Seznam produktů aktualizován.');
        $this->redirect('this');
    }
}