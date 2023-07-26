<?php if (!empty($this->list_components)) : ?>
    <div class="row-fluid">
<div class="span8">
    <h3><?php echo JText::_('COM_EXTENSIONCHECK_J2STORE_COMPONENT');?> </h3>
</div>
<div class="span1">
    <h3>Status :</h3>
</div>
<div class="span3">
    <?php $alert_class =  ($this->components_status == 'Ready to install' )? 'alert-success' : 'alert-danger' ; ?>
    <div class="alert <?php echo $alert_class; ?> center">
        <h4 class="alert-heading"><?php echo $this->components_status; ?></h4>
    </div>
</div>
</div>
<table class="table table-striped table-hover" id="component">
            <thead>
            <tr>
                <th >
                    <?php echo JHtml::_('grid.checkall','component-checkbox-table1'); ?>
                </th>
                <th >
                    <?php echo JText::_('COM_EXTENSIONCHECK_COMPONENT_NAME') ;?>
                </th>
                <th >
                    <?php echo JText::_('COM_EXTENSIONCHECK_COMPONENT_TYPE'); ?>
                </th>
                <th >
                    <?php echo JText::_('COM_EXTENSIONCHECK_COMPONENT_ID'); ?>
                </th>

                <th >
                    <?php echo JText::_('COM_EXTENSIONCHECK_ENABLED'); ?>
                </th>

            </tr>
            </thead>
            <tbody>

                <?php foreach ($this->list_components as $i => $row) :
                    ?>
                    <tr>
                        <td>
                            <?php //echo JHtml::_('grid.id', $i, $row->extension_id); ?>
                        </td>
                        <td>
                            <?php echo $row->name; ?>
                        </td>
                        <td align="center">
                            <?php echo $row->type; ?>
                        </td>
                        <td align="center">
                            <?php echo $row->extension_id; ?>
                        </td>
                        <td style="display: flex;">
                            <?php // print_r($row->enabled) ; ?>
                            <?php $btn_class =  isset($row->enabled) && !empty($row->enabled ) ? 'btn-danger ' : 'btn-success '; ?>
                            <?php $unpublish_label =  isset($row->enabled) && !empty($row->enabled ) ? 'DO_UNPUBLISH' : 'UNPUBLISHED'; ?>
                            <?php $icon_class =  isset($row->enabled) && !empty($row->enabled ) ? 'icon-unpublish' : 'fa fa-thumbs-up'; ?>
                            <?php $disabled_link =  isset($row->enabled) && !empty($row->enabled ) ? '' : 'pointer-events: none'; ?>
                            <div class="btn-toolbar">
                                <div class="btn-wrapper">
                                    <a class="modal" style="<?php echo $disabled_link; ?>" href="<?php echo JRoute::_( "index.php?option=com_j2migrationchecker&view=cpanel&task=customunpublish&cid=$row->extension_id",false) ?>" >
                            <span class="btn btn-small <?php echo $btn_class; ?>" id="">
                                <i class="<?php echo $icon_class; ?>"></i>
                                    <?php echo JText::_($unpublish_label); ?>
                            </span>
                                    </a>
                                </div>
                            </div>
<!--                            --><?php //echo JHtml::_('jgrid.published', $row->enabled, $i, '',false, 'cb'); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
</table>
<?php endif; ?>