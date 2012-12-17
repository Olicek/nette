<?php //netteCache[01]000402a:2:{s:4:"time";s:21:"0.10181800 1354639180";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:80:"C:\server\www\pokusy\test\kucera\app\EshopModule\templates\Product\default.latte";i:2;i:1341166645;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\pokusy\test\kucera\app\EshopModule\templates\Product\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'f4uxr1ivse')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb80a6ea45a4_content')) { function _lb80a6ea45a4_content($_l, $_args) { extract($_args)
?><h1><?php echo Nette\Templating\Helpers::escapeHtml($productList->title, ENT_NOQUOTES) ?></h1>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($product) as $list): if ($list->published && $productList->id == $list->productlist_id): ?>
<div class="box"<?php if ($_l->tmp = array_filter(array($iterator->isOdd() ? 'odd' : 'even'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
    <div class="tm">
<?php $iterations = 0; foreach ($images as $image): if ($image->product_id == $list->id): ?>
                <div class="imgbox">
                    <a href="<?php echo htmlSpecialChars($_control->link(":Eshop:Product:detail", array($list->id))) ?>
">
                        <img src="<?php echo htmlSpecialChars($basePath) ;echo htmlSpecialChars($image->path) ?>
thumb/<?php echo htmlSpecialChars($image->name) ?>" alt="<?php echo htmlSpecialChars($image->name) ?>" />
                    </a>
                </div>
<?php if (($image->product_id == $list->id)) break ;endif ;$iterations++; endforeach ?>
        <h2><a href="<?php echo htmlSpecialChars($_control->link(":Eshop:Product:detail", array($list->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($list->title, ENT_NOQUOTES) ?></a></h2>
        <div class="price">
            <div class="cena"><?php echo Nette\Templating\Helpers::escapeHtml($list->price, ENT_NOQUOTES) ?> Kč</div>
            <div class="kosik">
<?php if ($user->isAllowed('product', 'buy')): ?>
                <a href="">Košík</a>
<?php else: ?>
                <acronym title="Pro nákup se musíte přihlásit">Košík</acronym>
<?php endif ?>
            </div>
        </div>
    </div>
        <p><?php echo Nette\Templating\Helpers::escapeHtml($list->description, ENT_NOQUOTES) ?></p>
</div><?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;
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
$title = $productList->title ;if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 