<?php
if (!isset($url)) {
    $url = array();
}

if (!empty($foreignId) && !empty($foreignModel)) {
    $url = array($foreignModel, $foreignId);
}
$this->Html->addCrumb('攤點', '/admin/points/index');
$this->Html->addCrumb($point['Point']['title'] . '的班表');
?>
<div id="TasksAdminIndex">
    <h2><?php echo $this->Html->getCrumbs(' > '); ?></h2>
    <div class="btn-group">
        <?php echo $this->Html->link(__('Add', true), array_merge($url, array('action' => 'add')), array('class' => 'btn btn-default dialogControl')); ?>
    </div>
    <div><?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="TasksAdminIndexTable">
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
                                <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Task']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                                <?php echo $this->Html->link('聯絡人', array('controller' => 'contacts', 'action' => 'index', 'Task', $item['Task']['id']), array('class' => 'btn btn-default')); ?>
                                <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $item['Task']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                                <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $item['Task']['id']), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
                        </div>
                    </td>
                </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="TasksAdminIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function() {
    });
    //]]>
    </script>
</div>