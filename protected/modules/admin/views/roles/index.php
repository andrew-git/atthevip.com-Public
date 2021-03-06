<?php $this->beginClip('sub_nav'); ?>
	<?php echo $this->renderPartial('/subnavs/management', array(), true); ?>
<?php $this->endClip('sub_nav'); ?>

<?php $this->beginClip('page_buttons'); ?>
	<?php echo CHtml::link(Yii::t('roles', 'Add Auth Item'), array('roles/addauthitem'), array( 'class' => 'button medium' )); ?>
<?php $this->endClip('page_buttons'); ?>

<div class="container_4">

	<div class="grid_4">
		<div class="panel">
			<h2 class="cap"><?php echo Yii::t('roles', 'Auth Items'); ?></h2>
			<div class="content">
				<table id="settings-table" class="tablesorter styled">
					<thead>
						<tr>
						   <th style='width: 20%'><?php echo Yii::t('roles', 'Title'); ?></th>
						   <th style='width: 50%'><?php echo Yii::t('roles', 'Description'); ?></th>
						   <th style='width: 10%'><?php echo Yii::t('roles', 'Type'); ?></th>
						   <th style='width: 5%'><?php echo Yii::t('roles', 'Children'); ?></th>
						   <th style='width: 15%'><?php echo Yii::t('roles', 'Options'); ?></th>
						</tr>
					</thead>
					<tbody>
					<?php if ( count($rows) ): ?>
						
						<?php foreach ($rows as $row): ?>
							<tr>
								<td><a href="<?php echo $this->createUrl('roles/viewauthitem', array( 'parent' => $row->name )); ?>" title="<?php echo Yii::t('roles', 'View Auth Item'); ?>" class='tooltip'><?php echo CHtml::encode($row->name); ?></a></td>
								<td><?php echo CHtml::encode($row->description); ?></td>
								<td><?php echo Yii::t('roles', AuthItem::model()->types[ $row->type ]); ?></td>
								<td class='tooltip' title='<?php echo Yii::t('roles', 'Item Children'); ?>'><?php echo count(Yii::app()->authManager->getItemChildren($row->name)); ?></td>
								<td>
									<!-- Icons -->
									<a href="<?php echo $this->createUrl('roles/addauthitemchild', array( 'parent' => $row->name )); ?>" title="<?php echo Yii::t('roles', 'Add auth child item'); ?>" class='icon-button add tooltip'><?php echo Yii::t('roles', 'Add'); ?></a>
									 <a href="<?php echo $this->createUrl('roles/editauthitem', array( 'id' => $row->name )); ?>" title="<?php echo Yii::t('roles', 'Edit this auth item'); ?>" class='icon-button edit tooltip'><?php echo Yii::t('roles', 'Edit'); ?></a>
									 <a href="<?php echo $this->createUrl('roles/deleteauthitem', array( 'id' => $row->name )); ?>" title="<?php echo Yii::t('roles', 'Delete this auth item!'); ?> "class='icon-button delete tooltip deletelink'><?php echo Yii::t('roles', 'Delete'); ?></a>
								</td>
							</tr>
						<?php endforeach ?>
		
					<?php else: ?>	
						<tr>
							<td colspan='5' style='text-align:center;'><?php echo Yii::t('roles', 'No roles found.'); ?></td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
				
				<div id="table-pager" class="pager">
					<form>
						<select class="pagesize">
							<option selected="selected" value="100">100</option>
							<option value="200">200</option>
							<option value="300">300</option>
							<option value="400">400</option>
						</select>
						<a class="button small green first"><img src="<?php echo themeUrl(); ?>/images/table_pager_first.png" alt="First" /></a>
						<a class="button small green prev"><img src="<?php echo themeUrl(); ?>/images/table_pager_previous.png" alt="Previous" /></a>
						<input type="text" class="pagedisplay" disabled="disabled" />
						<a class="button small green next"><img src="<?php echo themeUrl(); ?>/images/table_pager_next.png" alt="Next" /></a>
						<a class="button small green last"><img src="<?php echo themeUrl(); ?>/images/table_pager_last.png" alt="Last" /></a>
					</form>
				</div>
				
			</div>
		</div>
	</div>
	
</div>

<?php JSFile( themeUrl() . '/js/modules/roles.js' ); ?>
