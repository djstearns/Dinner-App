<div id="main" ui-background-style="striped" ui-navigation-status="current">
    <div class="navbar">
        <h1 ui-bar-alignment="center">Dinnertime &raquo; Moble</h1>
        <?php echo $html->link($html->image('logos/logo.png'), array('controller'=>'pages', 'action'=>'home'), array('escape'=>false)); ?>
    </div>
	<div id="content" class="withNavbar withBottomToolbar" ui-associations="withNavbar withBottomToolbar">
		<div id="scroller">
			
            <ul class="table-view grouped">
		    	<li><?php echo $this->Html->link('Scan item', 'http://zxing.appspot.com/scan?ret=http://derekstearns.com/dinnertime/m/items/add/code:{CODE}'); ?></li>
            	<li><?php echo $this->Html->link('Scan item (iOS)', 'zxing://scan/?ret=http://derekstearns.com/dinnertime/m/items/add/code:{CODE}'); ?> </li>
            </ul>
            <div class="items form">
			<?php echo $this->Form->create('Item');?>
                <fieldset>
                    <legend><?php __('Add Item'); ?></legend>
                <?php
                if(!empty($data)){
                    echo $this->Form->input('name', array('value'=>$data['name']));
                    echo $this->Form->input('descr', array('value'=>$data['descr']));
                    echo $this->Form->input('upc', array('value'=>$data['upc']));
                    echo $this->Form->input('price', array('value'=>$data['price']));
                    echo $this->Form->input('Recipe');
                    echo $this->Form->input('User', array('value'=>$user, 'type'=>'hidden'));
                }else{
                    echo $this->Form->input('name');
                    echo $this->Form->input('descr');
                    echo $this->Form->input('upc');
                    echo $this->Form->input('price');
                    echo $this->Form->input('Recipe');
                    echo $this->Form->input('User', array('value'=>$user, 'type'=>'hidden'));
                }
                ?>
                </fieldset>
            <?php echo $this->Form->end(__('Submit', true));?>
            </div>
       		<ul class="table-view grouped">
				<li><?php echo $this->Html->link(__('List Items', true), array('action' => 'index'));?></li>
				<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
			</ul>
            <br  />
             Copyright &copy; 2011, Dinnertime. All rights reserved.
        </div>
	</div>
	<div class="toolbar placement-bottom">
		<div class="button"><?php echo $this->Html->link('My Account', array('controller'=>'users','action'=>'dashboard'));?></div>
        	<?php echo $this->Html->link('Desktop version', array('http://deals.blabinc.com/dailymav/home','mobile'=>false));?>
		<div class="button"><?php echo $this->Html->link('Buy!', array('controller'=>'users','action'=>'dashboard'));?></div>
	</div>
</div>