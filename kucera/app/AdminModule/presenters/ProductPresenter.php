<?php

namespace AdminModule;
use Nette\Application\UI\Form,
    Nette\Http\FileUpload,
    Nette\Image;
use Nette\Diagnostics\Debugger;

/**
 * Description of ProductPresenter
 *
 * @author Oli
 */
class ProductPresenter extends \SecuredPresenter {
 
    
    private $product;
    private $productList;
    
    public function startup()
    {
        parent::startup();
        $user = $this->getUser();
        if (!$user->isAllowed('administrace', 'view')) {
            $this->flashMessage('Nemáte oprávnění k zobrazení administrační sekce');
            $this->redirect(':Homepage:default');
        }
    }
    
    
    // Default
    public function actionDefault($id)
    {
        $this->productList = $this->context->createProductlist()->find($id)->fetch();
        if ($this->productList === FALSE) {
            $this->setView('notFound');
        }
    }

    public function renderDefault($id)
    {
        $this->template->productList = $this->productList;
        $product = $this->context->createProduct()->
                where(array('productlist_id' => $id));
        $this->template->product = $product;
        $this->template->images = $this->context->createImages()
                ->where('product_id', $product)->order('id');
    }
    
    
    // Detail
    
    protected function loadProduct($detailId)
    {
        $item = $this->context->createProduct()->find($detailId)->fetch();
        if (!$item) {
                $this->flashMessage("Item with id $id does not exist", 'error');
                $this->redirect('default'); // aka items list
        }
        return $item;
    }
    
    public function actionDetail($detailId)
    {
        $defaults = $this->loadProduct($detailId);
        //Debugger::dump($defaults);
        $this['editProduct']->setDefaults($defaults);
        
        $this->product = $this->context->createProduct()->find($detailId)->fetch();
        if ($this->productList === FALSE) {
            $this->setView('notFound');
        }
    }
    
    public function renderDetail($detailId)
    {
        $this->template->product = $this->product;
        $this->template->images = $this->context->createImages()
                ->where(array('product_id' => $detailId));
    }
    
    
    // Formuláře
    protected function createComponentNewProduct()
    {
        $form = new Form();
        
        $form->addText('title', 'Nový produkt:', 20, 30)
            ->addRule(Form::FILLED, 'Je nutné zadat název produktu.');
        
        $form->addText('description', 'Popis produktu:', 20, 30)
            ->addRule(Form::FILLED, 'Je nutné zadat popis produktu.');
        
        $form->addTextArea('text', 'Text:', 40, 10)
                ->addRule(Form::FILLED, 'Je nutné zadat text vztahující se k produktu');
        
        $form->addText('price', 'Cena:', 20, 30)
            ->addRule(Form::FILLED, 'Je nutné zadat cenu produktu.')
            ->addRule(Form::NUMERIC, 'Cena nesmí obsahovat jiné znaky než čísla.');
        
        $form->addUpload('foto', 'Obrázek:');
        
        $form->addSubmit('create', 'Vložit');
        $form->onSuccess[] = callback($this, 'newProductSubmitted');
        return $form;
    }
    
    public function newProductSubmitted(Form $form){
        $lastId = $this->context->createProduct()->insert(array(
            'title' => $form->values->title,
            'description' => $form->values->description,
            'text' => $form->values->text,
            'price' => $form->values->price,
            'created' => new \DateTime(),
            'productlist_id' => $this->productList->id
        ));
        if ($form->values->foto->isOk()) {
            $idImg = $this->context->createImages()->max('id') + 1;
            $filename = 'product_'.$idImg.'.jpg';
            $targetPath = '/images/slozka/';
            $path = \BasePresenter::getImageDir().$targetPath; 
            //Debugger::dump(getImageDir());
            //$form->values->foto->move($path);
            
            $img = Image::fromFile($form->values->foto);
            $img->resize(800, 600, Image::SHRINK_ONLY);
            $img->save($path.$filename);
            $img->resize(200, 200, Image::SHRINK_ONLY);
            $img->save($path.'thumb/'.$filename);
            
            $pokus = $this->context->createImages()->insert(array(
                'name' => $filename,
                'path' => $targetPath,
                'product_id' => $lastId->id,
            ));
        }
        $this->flashMessage('Produkt byl vložen.', 'success');
        $this->redirect('this');
    }
    
    protected function createComponentEditProduct()
    {
        
        $form = new Form();
        
        $form->addText('title', 'Nový produkt:', 20, 30)
            ->addRule(Form::FILLED, 'Je nutné zadat název produktu.');
        
        $form->addText('description', 'Popis produktu:', 20, 30)
            ->addRule(Form::FILLED, 'Je nutné zadat popis produktu.');
        
        $form->addTextArea('text', 'Text:', 40, 10)
                ->addRule(Form::FILLED, 'Je nutné zadat text vztahující se k produktu');
        
        $form->addText('price', 'Cena:', 20, 30)
            ->addRule(Form::FILLED, 'Je nutné zadat cenu produktu.')
            ->addRule(Form::NUMERIC, 'Cena nesmí obsahovat jiné znaky než čísla.');
//        $form->addProtection('Vypršel časový limit, odešlete formulář znovu');
        $form->addSubmit('create', 'Vložit');
        $form->onSuccess[] = callback($this, 'editProductSubmitted');
        return $form;

    }
    
    public function editProductSubmitted(Form $form)
    {
        $this->context->createProduct()->where(array('id' => $this->product->id))
                ->update(array(
                    'title' => $form->values->title,
                    'description' => $form->values->description,
                    'text' => $form->values->text,
                    'price' => $form->values->price
                ));
        $this->flashMessage('Produkt upraven');
        $this->redirect('this');
    }
    
    
    // Signály
    public function handleMarkPublished($productId)
    {
        $this->context->createProduct()->where(array('id' => $productId))->update(array('published' => 1));
        if (!$this->isAjax()) {
            $this->presenter->redirect('this');
        } else {
            $this->invalidateControl('item');
            $this->invalidateControl('flashMessages');
        }
    }
    
    public function handleMarkUnPublished($productId)
    {
        $this->context->createProduct()->where(array('id' => $productId))->update(array('published' => 0));
        if (!$this->isAjax()) {
            $this->presenter->redirect('this');
        } else {
            $this->invalidateControl('flashMessages');
            $this->invalidateControl('item');
        }
    }
    
    public function handleDeleteProduct($productId, $productListId)
    {
        $this->context->createProduct()->where(array('id' => $productId))->delete();
        $this->presenter->redirect('Product:default', $productListId);
    }
    
}

?>
