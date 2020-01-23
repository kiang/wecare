<div id="PointsAdminEdit">
    <?php echo $this->Form->create('Point', array('type' => 'file')); ?>
    <div class="Points form">
        <fieldset>
            <legend><?php
                echo __('Edit 攤點', true);
                ?></legend>
            <?php
            echo $this->Form->input('Point.id');
            echo $this->Form->input('Point.title', array(
                'label' => '攤點名稱',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Point.address', array(
                'label' => '住址',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Point.latitude', array(
                'label' => '緯度',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Point.longitude', array(
                'label' => '經度',
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