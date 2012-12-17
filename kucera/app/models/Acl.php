<?php

use Nette\Security\Permission;
/**
 * Description of Acl
 *
 * @author Oli
 */
class Acl extends Permission {
    
    public function __construct() {

        // definujeme role
        $this->addRole('guest');
        $this->addRole('registered', 'guest'); // registered
        $this->addRole('moderator', 'registered');
        $this->addRole('administrator', 'registered'); // a od něj dědí administrator
        
        $this->addResource('productList');
        $this->addResource('product');
        $this->addResource('category');
        $this->addResource('users');
        $this->addResource('administrace');
        
        //guest
        $this->allow('guest', array('productList', 'product', 'category'), array('view'));
        
        $this->deny('guest', array('administrace', 'users'));
        
        // registrovaný
        $this->allow('registered', array('productList', 'product', 'category'), array('view'));
        $this->allow('registered', 'product', array('buy'));
        
        //moderator
        $this->allow('moderator', array('productList', 'product', 'category', 'administrace'));
        $this->allow('moderator', 'users', array('view', 'delete'));

        // administrace může prohlížet a editovat cokoliv
        $this->allow('administrator', array('productList', 'product', 'category', 'administrace', 'users'));
    }
    
}
