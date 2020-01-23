<div id="PointsAdminView">
    <h3><?php echo __('View 攤點', true); ?></h3><hr />
    <div class="col-md-12">

        <div class="col-md-2">攤點名稱</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Point']['title']) {

                echo $this->data['Point']['title'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">住址</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Point']['address']) {

                echo $this->data['Point']['address'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">緯度</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Point']['latitude']) {

                echo $this->data['Point']['latitude'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">經度</div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Point']['longitude']) {

                echo $this->data['Point']['longitude'];
            }
?>&nbsp;
        </div>
    </div>
    <hr />
    <div class="btn-group">
        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Point.id')), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
        <?php echo $this->Html->link(__('攤點 List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
        <?php echo $this->Html->link(__('View Related 班表', true), array('controller' => 'tasks', 'action' => 'index', 'Point', $this->data['Point']['id']), array('class' => 'btn btn-default PointsAdminViewControl')); ?>
    </div>
    <div id="PointsAdminViewPanel"></div>
<?php
echo $this->Html->scriptBlock('

');
?>
    <script type="text/javascript">
        //<![CDATA[
        $(function() {
            $('a.PointsAdminViewControl').click(function() {
                $('#PointsAdminViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>