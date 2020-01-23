<div id="TasksIndex">
    <h2><?php echo __('班表', true); ?></h2>
    <div class="btn-group">
    </div>
    <p>
        <?php
        $url = array();

        if (!empty($foreignId) && !empty($foreignModel)) {
            $url = array($foreignModel, $foreignId);
        }

        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></p>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="TasksIndexTable">
        <thead>
            <tr>
                <?php if (empty($scope['Task.Point_id'])): ?>
                    <th><?php echo $this->Paginator->sort('Task.Point_id', '攤點', array('url' => $url)); ?></th>
                <?php endif; ?>

                <th><?php echo $this->Paginator->sort('Task.date', '日期', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Task.time_begin', '開始時間', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Task.time_end', '結束時間', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Task.count_need', '需要人數', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Task.count_contacts', '報名人數', array('url' => $url)); ?></th>
                <th class="actions"><?php echo __('Action', true); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($items as $item) {
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                    <?php if (empty($scope['Task.Point_id'])): ?>
                        <td><?php
                if (empty($item['Point']['id'])) {
                    echo '--';
                } else {
                    echo $this->Html->link($item['Point']['id'], array(
                        'controller' => 'points',
                        'action' => 'view',
                        $item['Point']['id']
                    ));
                }
                        ?></td>
                    <?php endif; ?>

                    <td><?php
                    echo $item['Task']['date'];
                    ?></td>
                    <td><?php
                    echo $item['Task']['time_begin'];
                    ?></td>
                    <td><?php
                    echo $item['Task']['time_end'];
                    ?></td>
                    <td><?php
                    echo $item['Task']['count_need'];
                    ?></td>
                    <td><?php
                    echo $item['Task']['count_contacts'];
                    ?></td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Task']['id']), array('class' => 'btn btn-default TasksIndexControl')); ?>
                        </div>
                    </td>
                </tr>
            <?php }; // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="TasksIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function() {
            $('#TasksIndexTable th a, div.paging a, a.TasksIndexControl').click(function() {
                $('#TasksIndex').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>