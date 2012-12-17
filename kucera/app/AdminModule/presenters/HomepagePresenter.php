<?php

namespace AdminModule;
use Nette\Diagnostics\Debugger;
/**
 * Description of HomepagePresenter
 *
 * @author Oli
 */
class HomepagePresenter extends \SecuredPresenter {
    
    
    public function startup()
    {
        parent::startup();
        $user = $this->getUser();
        if (!$user->isAllowed('administrace', 'view')) {
            $this->flashMessage('Nemáte oprávnění k zobrazení administrační sekce');
            $this->redirect(':Homepage:default');
        }
    }
    
    public function actionDefault()
    {
        
    }
    
    public function handleMarkPublished($taskId)
    {
        $this->context->createCategorylist()->where(array('id' => $taskId))->update(array('published' => 1));
        $this->presenter->redirect('this');
    }
    
    public function handleMarkUnPublished($taskId)
    {
        $this->context->createCategorylist()->where(array('id' => $taskId))->update(array('published' => 0));
        $this->presenter->redirect('this');
    }
    
}

?>
