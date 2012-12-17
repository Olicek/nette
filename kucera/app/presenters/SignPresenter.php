<?php

use Nette\Application\UI,
	Nette\Security as NS;


/**
 * Sign in/out presenters.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class SignPresenter extends BasePresenter
{


	/**
	 * Sign in form component factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
        {
            $form = new UI\Form();
            $form->addText('username', 'Uživatelské jméno:', 30, 20);
            $form->addPassword('password', 'Heslo:', 30);
            $form->addCheckbox('persistent', 'Pamatovat si mě na tomto počítači');
            $form->addSubmit('login', 'Přihlásit se');
            $form->onSuccess[] = callback($this, 'signInFormSubmitted');
            return $form;
        }

        public function signInFormSubmitted(UI\Form $form)
        {
            try {
                $user = $this->getUser();
                $values = $form->getValues();
                if ($values->persistent) {
                    $user->setExpiration('+30 days', FALSE);
                }
                $user->login($values->username, $values->password);
                $this->flashMessage('Přihlášení bylo úspěšné.', 'success');
                $this->redirect('Homepage:');
            } catch (NS\AuthenticationException $e) {
                $form->addError('Neplatné uživatelské jméno nebo heslo.');
            }
        }

        public function createComponentNewUser(){
            
            $form = new UI\Form();
            $form->addText('username', 'Uživatelské jméno', 30, 20)
                ->setRequired('Prosím vyplňte uživatelské jméno.');
            
            $form->addPassword('password', 'Heslo:', 30)
                ->setRequired('Prosím vyplňte heslo.');
            
            $form->addText('name', 'Vaše celé jméno', 30, 50)
                ->setRequired('Prosím vyplňte své jméno.');
            
            $form->addSubmit('register', 'Registrovat se');
            
            $form->onSuccess[] = callback($this, 'newUserSubmitted');
            
            return $form;
        }
        
        public function newUserSubmitted(UI\Form $form){
            if ($this->context->createUsers()->where('username = "'.$form->values->username.'"')->count('username')){
                $form->addError('Uživatelské jméno již existuje, prosím zvolte si jiné');
            } else {
                $this->context->createUsers()->insert(Array(
                    'username' => $form->values->username,
                    'password' => $this->calculateHash($form->values->password),
                    'name' => $form->values->name,
                    'role' => 'registered'
                ));
                $this->flashMessage('Byl jste úspěšně zaregistrován. Můžete se přihlásit.');
                $this->redirect('Sign:in');
            }
        }

        public function calculateHash($password)
        {
            return hash('sha512', $password);
        }
        
	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('Byl jste úspěšně odhlášen!');
		$this->redirect(':Homepage:');
	}

}
