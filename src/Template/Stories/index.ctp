<?php
$this->layout = 'default';


$this->start('top-menu');
echo $this->element('Menus/AdminMenuBreadcrumbed',[
    "title" =>  __('Story'),
    "breadcrumb" => false
]);
$this->end();

?>

<?= $this->fetch('top-menu') ?>
<?= $this->element('General/flashbar') ?>


<?= $this->element('General/PageTitle', [
    'pageTitle'  =>  __('Role'),

]); ?>

<div class="gr-container">
    <div class="row">
        <div class="col-xs-12">

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Story'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stories index large-9 medium-8 columns content">
    <h3><?= __('Stories') ?></h3>
    <table class="table">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('controller') ?></th>
                <th><?= $this->Paginator->sort('action') ?></th>
                <th><?= $this->Paginator->sort('ip') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('level') ?></th>
                <th><?= $this->Paginator->sort('webroot') ?></th>
                <th><?= $this->Paginator->sort('currentpath') ?></th>
                <th><?= $this->Paginator->sort('plugin') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stories as $story): ?>
            <tr>
                <td><?= $this->Number->format($story->id) ?></td>
                <td><?= h($story->controller) ?></td>
                <td><?= h($story->action) ?></td>
                <td><?= $story->convertedIp ?></td>
                <td><?= $story->has('user') ? $this->Html->link($story->user->fullname, ['controller' => 'Users', 'action' => 'view', $story->user->id]) : '' ?></td>
                <td><?= h($story->level) ?></td>
                <td><?= h($story->webroot) ?></td>
                <td><?= h($story->currentpath) ?></td>
                <td><?= h($story->plugin) ?></td>
                <td><?= h($story->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $story->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $story->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $story->id], ['confirm' => __('Are you sure you want to delete # {0}?', $story->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

        </div>
    </div>
</div>
