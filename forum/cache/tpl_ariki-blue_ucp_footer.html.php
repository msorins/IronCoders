<?php if (!defined('IN_PHPBB')) exit; ?></div>
<div class="clear"></div>

<?php if ($this->_rootref['S_COMPOSE_PM']) {  ?>

<div><?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?></div>
</form>
<?php } $this->_tpl_include('jumpbox.html'); ?>


</div>

<?php $this->_tpl_include('overall_footer.html'); ?>