<?php

namespace EshopModule;

/**
 * Description of ProductPresenter
 *
 * @author Oli
 */
class ProductPresenter extends \BasePresenter {
    
    private $product;

    public function actionDefault($id)
    {
        $this->product = $this->context->createProductList()->get($id);
        if ($this->product === FALSE) {
            $this->setView('notFound');
        }
    }
    
    public function renderDefault($id)
    {
        $user = $this->getUser();
        if(!$user->isAllowed('product', 'view')){
            $this->flashMessage('Nemáte oprávnění prohlížet kategorie');
            $this->redirect(':Homepage:default');
        } else {
            $product = $this->context->createProduct()->
                    where(array('productlist_id' => $id));
            $this->template->productList = $this->product;
            $this->template->product = $this->context->createProduct();
            $this->template->images = $this->context->createImages()
                    ->where('product_id', $product)->order('id');
        }
    }
    
    public function actionDetail($detailId)
    {
        $this->product = $this->context->createProduct()->get($detailId);
        if ($this->product === FALSE) {
            $this->setView('notFound');
        }
    }
    
    public function renderDetail($detailId)
    {
        $user = $this->getUser();
        if(!$user->isAllowed('product', 'view')){
            $this->flashMessage('Nemáte oprávnění prohlížet kategorie');
            $this->redirect(':Homepage:default');
        } else {;
            $this->template->product = $this->product;
            $this->template->images = $this->context->createImages()
                ->where(array('product_id' => $detailId));
        }
    }
}

?>
