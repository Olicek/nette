<?php //netteCache[01]000405a:2:{s:4:"time";s:21:"0.97028500 1355062568";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:83:"C:\server\www\Bakalarka\Nette\kucera\app\EshopModule\templates\Product\detail.latte";i:2;i:1341166645;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\Bakalarka\Nette\kucera\app\EshopModule\templates\Product\detail.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '3uf2zroi4j')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb64f976b70d_content')) { function _lb64f976b70d_content($_l, $_args) { extract($_args)
?><div id="detail">
    <a href="<?php echo htmlSpecialChars($_control->link("Product:", array($product->productlist_id))) ?>
">zpět</a>
<?php if ($user->isAllowed('product', 'delete')): ?>
    <div id="options">
        <a class="icon untick" href="<?php echo htmlSpecialChars($_control->link("deleteProduct!", array($product->id, $product->productlist_id))) ?>
">smazat</a>
        <span class="icon edit opener">editovat</span>
    </div>
<?php endif ?>
    
    <h2><?php if ($user->isAllowed('product', 'edit')): ?>

<?php if ($product->published): ?>            <a class="icon tick" href="<?php echo htmlSpecialChars($_control->link("markUnPublished!", array($product->id))) ?>
"></a>
<?php endif ;if (!$product->published): ?>        <a class="icon untick" href="<?php echo htmlSpecialChars($_control->link("markPublished!", array($product->id))) ?>
"></a>
<?php endif ;endif ?>
        <?php echo Nette\Templating\Helpers::escapeHtml($product->title, ENT_NOQUOTES) ?>

    </h2>
    
    <div class="content">
        <div class="box">
<?php $iterations = 0; foreach ($images as $image): ?>            <span>
                <img src="<?php echo htmlSpecialChars($basePath) ;echo htmlSpecialChars($image->path) ?>
/thumb/<?php echo htmlSpecialChars($image->name) ?>" alt="" />
            </span>
<?php $iterations++; endforeach ?>
        </div>
        <div class="box">
            <p><?php echo Nette\Templating\Helpers::escapeHtml($product->description, ENT_NOQUOTES) ?></p>
            <p><?php echo Nette\Templating\Helpers::escapeHtml($product->price, ENT_NOQUOTES) ?> Kč</p>
            
            <p><?php echo Nette\Templating\Helpers::escapeHtml($product->created, ENT_NOQUOTES) ?></p>
        </div>
        <div class="clear"></div>
    </div>
    <div class="content">
        <p><?php echo Nette\Templating\Helpers::escapeHtml($product->text, ENT_NOQUOTES) ?></p>
    </div>
</div>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 