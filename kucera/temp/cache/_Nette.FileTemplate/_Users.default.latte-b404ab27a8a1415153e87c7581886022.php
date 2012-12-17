<?php //netteCache[01]000404a:2:{s:4:"time";s:21:"0.98880800 1355390532";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:82:"C:\server\www\Bakalarka\Nette\kucera\app\AdminModule\templates\Users\default.latte";i:2;i:1341166642;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"6a33aa6 released on 2012-10-01";}}}?><?php

// source file: C:\server\www\Bakalarka\Nette\kucera\app\AdminModule\templates\Users\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'korh460dit')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb20453ee7c6_content')) { function _lb20453ee7c6_content($_l, $_args) { extract($_args)
?><table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Přihlašovací jméno</th>
        <th>Jméno</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($users) as $user1): ?>
    <tr<?php if ($_l->tmp = array_filter(array($iterator->isOdd() ? 'odd' : 'even'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
        <td><?php echo Nette\Templating\Helpers::escapeHtml($user1->id, ENT_NOQUOTES) ?></td>
        <td><?php echo Nette\Templating\Helpers::escapeHtml($user1->username, ENT_NOQUOTES) ?></td>
        <td><?php echo Nette\Templating\Helpers::escapeHtml($user1->name, ENT_NOQUOTES) ?></td>
<?php if ($user->isAllowed('users', 'edit')): ?>
            <td>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("editRole") ? "editRole" : $_control["editRole"]), array()) ?>

<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>

                    <?php echo $_form["userId"]->getControl()->addAttributes(array('value' => $user1->id)) ?>

                    <?php echo $_form["role"]->getControl()->addAttributes(array()) ?>
 <?php echo $_form["send"]->getControl()->addAttributes(array()) ?>


<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
            </td>
<?php else: ?>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($user1->role, ENT_NOQUOTES) ?></td>
<?php endif ?>
    </tr>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
    </tbody>
</table>
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