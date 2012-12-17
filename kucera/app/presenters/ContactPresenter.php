<?php

use Nette\Application\UI\Form,
        Nette\Mail\Message;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactPresenter
 *
 * @author Oli
 */
class ContactPresenter extends BasePresenter {
    
    
    protected function createComponentContactForm() 
    {
        
        $form = new Form();
        $form->addText('name', 'Vaše jméno', 30, 50)
            ->addRule(Form::FILLED, 'Vyplňte prosím Vaše jméno.');
        
        $form->addText('email', 'Váš e-mail', 30, 50)
            ->setAttribute('type', 'email')
            ->setRequired('Vyplňte prosím Váš email');
        
        $form->addText('subject', 'Předmět zprávy', 30, 30)
            ->addRule(Form::FILLED, 'Vyplňte prosím předmět zprávy.');
        
        $form->addTextArea('message', 'Vaše zpráva', 35, 7)
            ->addRule(Form::FILLED, 'Vyplňte prosím pole zprávy.');
        
        $form->addSubmit('send', 'Odeslat');
        
        $form->onSuccess[] = callback($this, 'contactFormSubmitted');
        return $form;
    }
    
    public function contactFormSubmitted(UI\Form $form){
        $mail = new Message();
        $mail->setFrom($form->values->email, $form->values->name)
            ->addTo('petr.olisar@gmail.com')
            ->setSubject($form->values->subject)
            ->setBody($form->values->message)
            ->setHeader('Reply-To', $form->values->email)
            ->send();
        $this->flashMessage('Vaše zpráva byla odeslána.');
    }
    
}

?>
