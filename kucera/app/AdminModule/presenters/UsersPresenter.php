<?php
namespace AdminModule;
/**
 * Description of UserPresenter
 *
 * @author Oli
 */
use Nette\Application\UI\Form;
use Nette\Security as NS;
use Nette\Diagnostics\Debugger;
use Nette\Forms\Container;


class UsersPresenter extends \SecuredPresenter
{
    
    
    public function actionDefault(){
        
    }
    
    public function renderDefault(){
        $user = $this->getUser();
        if (!$user->isAllowed('users', 'view')) {
            $this->flashMessage('Nemáte oprávnění k zobrazení výpisu uživatelů');
            $this->redirect(':Homepage:default');
        } else {
            
            $this->template->users = $this->context->createUsers();
        } 
    }
    
    
    protected function loadItem($id)
        {
                $item = $this->context->createUsers()->find($id);
                if (!$item) {
                        $this->flashMessage("Item with id $id does not exist", 'error');
                        $this->redirect('default'); // aka items list
                }
                return $item;
        }
    
    
    protected function createComponentEditRole()
    {

        $form = new Form();
        
        $array = array('guest','registered','moderator','administrator');
        
        $form->addSelect('role', null)
                ->setItems($array, FALSE);
        $form->addHidden('userId');
        
        $form->addSubmit('send', 'Odeslat');
        $form->onSuccess[] = callback($this, 'editRoleSubmitted');
        return $form;
    }
    
    public function editRoleSubmitted(Form $form){
        $this->context->createUsers()->where(array('id' => $form->values->userId))
                ->update(array(
                    'role' => $form->values->role,
                ));
        $this->flashMessage('Práva uživatele byla změněna', 'success');
        $this->redirect('this');
    }
    
}