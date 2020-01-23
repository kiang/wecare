<div id="ContactsIndex">
    <h2><?php echo __('聯絡人', true); ?></h2>
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
    <table class="table table-bordered" id="ContactsIndexTable">
        <thead>
            <tr>
                <?php if (empty($scope['Contact.Task_id'])): ?>
                    <th><?php echo $this->Paginator->sort('Contact.Task_id', '班表', array('url' => $url)); ?></th>
                <?php endif; ?>

                <th><?php echo $this->Paginator->sort('Contact.name', '姓名/暱稱', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Contact.phone', '電話', array('url' => $url)); ?></th>
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
                    <?php if (empty($scope['Contact.Task_id'])): ?>
                        <td><?php
                if (empty($item['Task']['id'])) {
                    echo '--';
                } else {
                    echo $this->Html->link($item['Task']['id'], array(
                        'controller' => 'tasks',
                        'action' => 'view',
                        $item['Task']['id']
                    ));
                }
                        ?></td>
                    <?php endif; ?>

                    <td><?php
                    echo $item['Contact']['name'];
                    ?></td>
                    <td><?php
                    echo $item['Contact']['phone'];
                    ?></td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Contact']['id']), array('class' => 'btn btn-default ContactsIndexControl')); ?>
                        </div>
                    </td>
                </tr>
            <?php }; // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="ContactsIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function() {
            $('#ContactsIndexTable th a, div.paging a, a.ContactsIndexControl').click(function() {
                $('#ContactsIndex').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>