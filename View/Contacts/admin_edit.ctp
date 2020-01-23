<div id="ContactsAdminEdit">
    <?php echo $this->Form->create('Contact', array('type' => 'file')); ?>
    <div class="Contacts form">
        <fieldset>
            <legend><?php
                echo __('Edit 聯絡人', true);
                ?></legend>
            <?php
            echo $this->Form->input('Contact.id');
            foreach ($belongsToModels AS $key => $model) {
                echo $this->Form->input('Contact.' . $model['foreignKey'], array(
                    'type' => 'select',
                    'label' => $model['label'],
                    'options' => $$key,
                    'div' => 'form-group',
                    'class' => 'form-control',
                ));
            }
            echo $this->Form->input('Contact.name', array(
                'label' => '姓名/暱稱',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Contact.phone', array(
                'label' => '電話',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            ?>
        </fieldset>
    </div>
            <?php
            echo $this->Form->end(__('Submit', true));
            ?>
</div>