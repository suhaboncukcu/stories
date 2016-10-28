<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Story'), ['action' => 'edit', $story->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Story'), ['action' => 'delete', $story->id], ['confirm' => __('Are you sure you want to delete # {0}?', $story->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Story'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="container gr-container">

<div class="stories view row">
    <h3><?= h($story->id) ?></h3>
    <table class="table table-hover table-striped table-condensed">
                                            <tr>
            <th><?= __('Controller') ?></th>
            <td><?= h($story->controller) ?></td>
        </tr>
                        <tr>
            <th><?= __('Action') ?></th>
            <td><?= h($story->action) ?></td>
        </tr>
                                    <tr>
                        <th><?= __('User') ?></th>
                        <td><?= $story->has('user') ? $this->Html->link($story->user->fullname, ['controller' => 'Users', 'action' => 'view', $story->user->id]) : '' ?></td>
                    </tr>
                        <tr>
            <th><?= __('Level') ?></th>
            <td><?= h($story->level) ?></td>
        </tr>
                        <tr>
            <th><?= __('Webroot') ?></th>
            <td><?= h($story->webroot) ?></td>
        </tr>
                        <tr>
            <th><?= __('Currentpath') ?></th>
            <td><?= h($story->currentpath) ?></td>
        </tr>
                        <tr>
            <th><?= __('Plugin') ?></th>
            <td><?= h($story->plugin) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($story->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ip') ?></th>
            <td><?= $this->Number->format($story->ip) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($story->created) ?></td>
        </tr>
    </table>
    <div class="related" style="overflow-x:auto">
        <h4 class="label label-info"><?= __('Related Phinxlog') ?></h4>
        <?php if (!empty($story->phinxlog)): ?>
        <table class="table table-hover table-striped table-condensed">
            <tr>
                <th><?= __('Version') ?></th>
                <th><?= __('Migration Name') ?></th>
                <th><?= __('Start Time') ?></th>
                <th><?= __('End Time') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($story->phinxlog as $phinxlog): ?>
            <tr>
                <td><?= h($phinxlog->version) ?></td>
                <td><?= h($phinxlog->migration_name) ?></td>
                <td><?= h($phinxlog->start_time) ?></td>
                <td><?= h($phinxlog->end_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Phinxlog', 'action' => 'view', $phinxlog->version]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Phinxlog', 'action' => 'edit', $phinxlog->version]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Phinxlog', 'action' => 'delete', $phinxlog->version], ['confirm' => __('Are you sure you want to delete # {0}?', $phinxlog->version)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
</div>
