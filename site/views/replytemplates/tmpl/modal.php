<?phpdefined('_JEXEC') or die;JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');JHtml::_('behavior.tooltip');$field		= JRequest::getCmd('field');$function	= 'jSelectTpl_'.$field;$listOrder	= $this->escape($this->state->get('list.ordering'));$listDirn	= $this->escape($this->state->get('list.direction'));?><style>.obhd_template_details .full{	display:none;}.obhd_template_details .intro{	display:block;}.obhd_template_details.show .full{	display:block;}.obhd_template_details.show .intro{	display:none;}</style><div id="foobla"><form action="<?php echo JRoute::_('index.php?option=com_obhelpdesk&view=replytemplates&tmpl=component');?>" method="post" name="adminForm" id="adminForm">	<table class="table">		<tr>			<td>				<div class="form-inline">					<div class="input-append">						<input type="text" class="span3" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" size="40" title="<?php echo JText::_('OBHELPDESK_SEARCH_IN_NAME'); ?>" />						<button type="submit" class="btn"><?php echo JText::_('OBHELPDESK_FILTER_SUBMIT'); ?></button>						<button type="button" class="btn" onclick="document.getElementById('filter_search').value=''; this.form.submit();"><?php echo JText::_('OBHELPDESK_FILTER_CLEAR'); ?></button>					</div>				</div>			</td>		</tr>	</table>	<table class="table table-striped">		<thead>			<tr>				<th>					<?php echo JHtml::_('grid.sort', 'COM_OBHELPDESK_SUBJECT', 'a.subject', $listDirn, $listOrder); ?>				</th>				<th class="nowrap" width="60%">					<?php echo JHtml::_('grid.sort', 'COM_OBHELPDESK_CONTENT', 'a.content', $listDirn, $listOrder); ?>				</th>			</tr>		</thead>		<tfoot>			<tr>				<td colspan="2">					<?php echo $this->pagination->getListFooter(); ?>				</td>			</tr>		</tfoot>		<tbody>		<?php			$i = 0;			foreach ($this->items as $item) : ?>			<tr class="row<?php echo $i % 2; ?>">				<td><?php/* 										$reply_tpl = obHelpDeskTicketHelper::getReplyTemplate($item->content); 					$reply_tpl = obHelpDeskTicketHelper::getReplyTemplate($item->content, $this->ticket->customer_id, $this->ticket->customer_email);  					$content = base64_encode(obHelpDeskHelper::bbcodetoHTML(obHelpDeskHelper::html2bbcode($reply_tpl)));					echo '<a class="pointer" title="'.JText::_('COM_OBHELPDESK_APPLY_THIS_TEMPLATE').'" onclick="if (window.parent) window.parent.'.$this->escape($function).'(\''.$item->id.'\', \''.$content.'\');">'; */?>					<a class="pointer" title="<?php echo JText::_('COM_OBHELPDESK_APPLY_THIS_TEMPLATE')?>" onclick="if (window.parent) window.parent.getReplyTemplate(<?php echo $item->id; ?>);">						<?php echo $item->subject; ?></a>				</td>				<td align="center">					<div class="obhd_template_details" onclick="this.toggleClass('show');">						<div class="intro"><?php echo substr(obHelpDeskHelper::html2bbcode($item->content), 0, 80); ?></div>						<div class="full">						<?php echo obHelpDeskHelper::bbcodeToHtml(obHelpDeskHelper::html2bbcode($item->content));?>						</div>					</div>				</td>			</tr>		<?php endforeach; ?>		</tbody>	</table>	<div>		<input type="hidden" name="task" value="" />		<input type="hidden" name="layout" value="modal" />		<input type="hidden" name="field" value="<?php echo $this->escape($field); ?>" />		<input type="hidden" name="boxchecked" value="0" />		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />		<?php echo JHtml::_('form.token'); ?>	</div></form></div>