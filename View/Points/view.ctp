<div id="PointsView">
    <h3><?php echo __('View 攤點', true); ?></h3><hr />
    <div class="col-md-12">

        <div class="col-md-2">攤點名稱</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['title']) {

                echo $this->data['Point']['title'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">住址</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['address']) {

                echo $this->data['Point']['address'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">緯度</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['latitude']) {

                echo $this->data['Point']['latitude'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">經度</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['longitude']) {

                echo $this->data['Point']['longitude'];
            }
?>&nbsp;
        </div>
    </div>
    <div class="btn-group">
        <?php echo $this->Html->link(__('攤點 List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
        <?php echo $this->Html->link(__('View Related 班表', true), array('controller' => 'tasks', 'action' => 'index', 'Point', $this->data['Point']['id']), array('class' => 'btn btn-default PointsAdminViewControl')); ?>
    </div>
    <div id="PointsViewPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function() {
            $('a.PointsViewControl').click(function() {
                $('#PointsViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>