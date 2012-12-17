<?php

/**
 * Description of SecuredPresenter
 *
 * @author Oli
 */
abstract class SecuredPresenter extends BasePresenter
{
    public function startup()
    {
        parent::startup();

        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect(':Sign:in');
        }
    }
}