<?php

namespace EshopModule;

class HomepagePresenter extends \BasePresenter
{
    private $categoryList;
    
    public function actionDefault()
    {

    }
    
    public function renderDefault()
    {
        $this->template->categoryList = $this->context->createCategorylist()
        ->order('title ASC');
    }
    

}
