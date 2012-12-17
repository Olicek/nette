<?php

use Nette\Database\Connection,
    Nette\Database\Table\Selection;
/**
 * Description of Products
 *
 * @author Oli
 */
class CategoryList extends Selection
{    
    public function __construct(\Nette\Database\Connection $connection)
    {
        parent::__construct('zam_categorylist', $connection);
    }
}