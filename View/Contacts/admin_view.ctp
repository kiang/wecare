<div id="ContactsAdminView">
    <h3><?php echo __('View 聯絡人', true); ?></h3><hr />
    <div class="col-md-12">
        <div class="col-md-2">班表</div>
        <div class="col-md-9">&nbsp;<?php
if (empty($this->data['Task']['id'])) {
    echo '--';
} else {
    echo $this->Html->link($this->data['Task']['id'], array(
        'controller' => 'tasks',
        'action' => 'view',
        $this->data['Task']['id']
    ));
}
?></div>

        <div class="col-md-2">姓名/暱稱</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Contact']['name']) {

                echo $this->data['Contact']['name'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">電話</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Contact']['phone']) {

                echo $this->data['Contact']['phone'];
            }
?>&nbsp;
        </div>
    </div>
    <hr />
    <div class="btn-group">
        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Contact.id')), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
        <?php echo $this->Html->link(__('聯絡人 List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
    </div>
    <div id="ContactsAdminViewPanel"></div>
<?php
echo $this->Html->scriptBlock('

');
?>
    <script type="text/javascript">
        //<![CDATA[
        $(function() {
            $('a.ContactsAdminViewControl').click(function() {
                $('#ContactsAdminViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>