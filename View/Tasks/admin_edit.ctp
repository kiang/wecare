<div id="TasksAdminEdit">
    <?php echo $this->Form->create('Task', array('type' => 'file')); ?>
    <div class="Tasks form">
        <fieldset>
            <legend><?php
                echo __('Edit 班表', true);
                ?></legend>
            <?php
            echo $this->Form->input('Task.id');
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