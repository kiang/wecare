<div id="PointsAdminAdd">
        <?php echo $this->Form->create('Point', array('type' => 'file')); ?>
    <div class="Points form">
        <h3>批次新增</h3>
            <?php
            echo $this->Form->input('Point.title', array(
                'type' => 'textarea',
                'label' => '攤點名稱',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
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
            echo $this->Form->input('Task.shift', array(
                'type' => 'radio',
                'options' => array(
                    '0' => '沒有輪班',
                    '1' => '2 小時一班',
                ),
                'legend' => '輪班',
                'div' => 'form-group',
            ));
            echo $this->Form->input('Task.count_need', array(
                'label' => '每班次需要人數',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            ?>
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