<div id="PointsIndex">
    <h2><?php echo __('攤點', true); ?></h2>
    <div class="btn-group">
    </div>
    <p>
        <?php
        $url = array();

        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></p>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="PointsIndexTable">
        <thead>
            <tr>

                <th><?php echo $this->Paginator->sort('Point.title', '攤點名稱', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Point.address', '住址', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Point.latitude', '緯度', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Point.longitude', '經度', array('url' => $url)); ?></th>
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

                    <td><?php
                    echo $item['Point']['title'];
                    ?></td>
                    <td><?php
                    echo $item['Point']['address'];
                    ?></td>
                    <td><?php
                    echo $item['Point']['latitude'];
                    ?></td>
                    <td><?php
                    echo $item['Point']['longitude'];
                    ?></td>
                    <td>
                        <div class="btn-group">
                            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Point']['id']), array('class' => 'btn btn-default PointsIndexControl')); ?>
                        </div>
                    </td>
                </tr>
            <?php }; // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="PointsIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function() {
            $('#PointsIndexTable th a, div.paging a, a.PointsIndexControl').click(function() {
                $('#PointsIndex').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>