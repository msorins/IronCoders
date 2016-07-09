<?php if (!defined('IN_PHPBB')) exit; ?></main>

<?php if ($this->_tpldata['DEFINE']['.']['CUSTOM_FOOTER'] == (1)) {  $this->_tpl_include('custom_footer_first.html'); } else if ($this->_tpldata['DEFINE']['.']['CUSTOM_FOOTER'] == (2)) {  $this->_tpl_include('custom_footer_second.html'); } else if ($this->_tpldata['DEFINE']['.']['CUSTOM_FOOTER'] == (3)) {  $this->_tpl_include('custom_footer_third.html'); } ?>


</body>
</html>