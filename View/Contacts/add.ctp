<div id="ContactsAdd">
        <?php
    echo $this->Form->create('Contact', array('type' => 'file', 'url' => array('action' => 'add', 'admin' => false)));
    ?>
    <div class="Contacts form">
        <h3>報名攤位志工</h3>
            <?php
            $options = array();
            foreach($tasks AS $task) {
                $options[$task['Task']['id']] = "{$task['Point']['title']}({$task['Task']['date']} {$task['Task']['time_begin']} ~ {$task['Task']['time_end']})";
            }
            echo $this->Form->input('Contact.Task_id', array(
                'type' => 'select',
                'options' => $options,
                'label' => '地點/時段',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
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
    </div>
        <?php
    echo $this->Form->end('送出報名表');
    ?>
</div>