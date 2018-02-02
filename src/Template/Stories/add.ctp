
<?php
  $this->layout = 'default';


?>


<?= $this->fetch('top-menu') ?>
<?= $this->element('General/flashbar') ?>


<?= $this->element('General/PageTitle', [
    'pageTitle'  =>  __('Stories'),

]); ?>

<div id="add-story-form-container" class="add-story-form-container">
 <div class="container gr-container">
    <div class="row">
        <div class="col-xs-6">
            <div class="small-form-container">
    <?= $this->Form->create($story) ?>
   
    <fieldset>
        <legend><?= __('Add Story') ?></legend>
        <?php
?>
            <div class="form-group">
                <label class="control-label">controller</label>

                <?php echo $this->Form->input('controller',[ 'class' => 'form-control','label' => false,'empty' => true]);  ?>
                <p class="help-block">help-block</p>

            </div>
<?php
?>
            <div class="form-group">
                <label class="control-label">action</label>

                <?php echo $this->Form->input('action',[ 'class' => 'form-control','label' => false,'empty' => true]);  ?>
                <p class="help-block">help-block</p>

            </div>
<?php
?>
            <div class="form-group">
                <label class="control-label">ip</label>

                <?php echo $this->Form->input('ip',[ 'class' => 'form-control','label' => false,'empty' => true]);  ?>
                <p class="help-block">help-block</p>

            </div>
<?php

?>
            <div class="form-group">
                <label class="control-label">user_id</label>

                <?php echo $this->Form->input('user_id',['options' => $users, 'class' => 'form-control','label' => false,'empty' => true]);  ?>
                <p class="help-block">help-block</p>

            </div>


<?php
?>
            <div class="form-group">
                <label class="control-label">level</label>

                <?php echo $this->Form->input('level',[ 'class' => 'form-control','label' => false,'empty' => true]);  ?>
                <p class="help-block">help-block</p>

            </div>
<?php
?>
            <div class="form-group">
                <label class="control-label">webroot</label>

                <?php echo $this->Form->input('webroot',[ 'class' => 'form-control','label' => false,'empty' => true]);  ?>
                <p class="help-block">help-block</p>

            </div>
<?php
?>
            <div class="form-group">
                <label class="control-label">currentpath</label>

                <?php echo $this->Form->input('currentpath',[ 'class' => 'form-control','label' => false,'empty' => true]);  ?>
                <p class="help-block">help-block</p>

            </div>
<?php
?>
            <div class="form-group">
                <label class="control-label">plugin</label>

                <?php echo $this->Form->input('plugin',[ 'class' => 'form-control','label' => false,'empty' => true]);  ?>
                <p class="help-block">help-block</p>

            </div>
<?php
      ?>      
            <div class="form-group">
                <label class="control-label">phinxlog</label>

             <?php   echo $this->Form->input('phinxlog._ids',['options' =>  $phinxlog, 'class' => 'form-control','label' => false]);  ?>
                <p class="help-block">help-block</p>

            </div>

        <?php
        ?>
    </fieldset>


        <div class="row row--no-gutter">
            <div class="col-xs-12">
                <div class="text-center add-client-form-container__btn-area">
                    <button class="btn btn-raised btn-success btn-lg" type="submit">CREATE</button>
                </div>
            </div>

        </div>


    
    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
