<div id="TasksAdminView">
    <h3><?php echo __('View 班表', true); ?></h3><hr />
    <div class="col-md-12">
        <div class="col-md-2">攤點</div>
        <div class="col-md-9">&nbsp;<?php
if (empty($this->data['Point']['id'])) {
    echo '--';
} else {
    echo $this->Html->link($this->data['Point']['id'], array(
        'controller' => 'points',
        'action' => 'view',
        $this->data['Point']['id']
    ));
}
?></div>

        <div class="col-md-2">日期</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Task']['date']) {

                echo $this->data['Task']['date'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">開始時間</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Task']['time_begin']) {

                echo $this->data['Task']['time_begin'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">結束時間</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Task']['time_end']) {

                echo $this->data['Task']['time_end'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">需要人數</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Task']['count_need']) {

                echo $this->data['Task']['count_need'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">報名人數</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Task']['count_contacts']) {

                echo $this->data['Task']['count_contacts'];
            }
?>&nbsp;
        </div>
    </div>
    <hr />
    <div class="btn-group">
        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Task.id')), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
        <?php echo $this->Html->link(__('班表 List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
        <?php echo $this->Html->link(__('View Related 聯絡人', true), array('controller' => 'contacts', 'action' => 'index', 'Task', $this->data['Task']['id']), array('class' => 'btn btn-default TasksAdminViewControl')); ?>
    </div>
    <div id="TasksAdminViewPanel"></div>
<?php
echo $this->Html->scriptBlock('

');
?>
    <script type="text/javascript">
        //<![CDATA[
        $(function() {
            $('a.TasksAdminViewControl').click(function() {
                $('#TasksAdminViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>