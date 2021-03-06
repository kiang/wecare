<div id="TasksAdminAdd">
        <?php
    $url = array();
    if (!empty($foreignId) && !empty($foreignModel)) {
        $url = array('action' => 'add', $foreignModel, $foreignId);
    } else {
        $url = array('action' => 'add');
        $foreignModel = '';
    }
    echo $this->Form->create('Task', array('type' => 'file', 'url' => $url));
    ?>
    <div class="Tasks form">
        <fieldset>
            <legend><?php
                echo __('Add 班表', true);
                ?></legend>
            <?php
            echo $this->Form->input('Task.date', array(
                'type' => 'text',
                'label' => '日期',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Task.time_begin', array(
                'type' => 'time',
                'interval' => 30,
                'timeFormat' => 24,
                'label' => '開始時間',
                'div' => 'form-group',
            ));
            echo $this->Form->input('Task.time_end', array(
                'type' => 'time',
                'interval' => 30,
                'timeFormat' => 24,
                'label' => '結束時間',
                'div' => 'form-group',
            ));
            echo $this->Form->input('Task.count_need', array(
                'label' => '需要人數',
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
<script>
    $(function() {
        $('#TaskDate').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    })
</script>