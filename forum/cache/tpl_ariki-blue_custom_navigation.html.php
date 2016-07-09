<?php if (!defined('IN_PHPBB')) exit; ?><li>
<a style="font-size:25px;" href="/" title="<?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?>"><b>IronCoders</b></a>
</li>
<li>
	<a  href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?>">Algoritmica</a>
	<ul>
		<li>
			<a href="/arhiva.php" title="<?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?>">Arhiva probleme</a>
		</li>
		<li>
			<a href=/arhiva-educationala" title="<?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?>">Arhiva educationala</a>
		</li>
		<li>
			<a href="/clase.php" title="<?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?>">Clase virtuale</a>
		</li>
                <li>
			<a href="/monitor.php" title="<?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?>">Monitorul de evaluare</a>
		</li>
	</ul>
</li>
<li>
    <a href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?>">Competitii</a>
  <ul>
    <li><a href="/competitii.php">Listă</a></li>
     <li><a href="/competitii.php?type=clasament">Clasament</a></li>
  </ul>
</li>
<li>
<a href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?>">Cursuri</a>
  <ul>
    <li><a href="/cursuri.php">Listă</a></li>
  </ul>
</li>
<li>
<a href="/blog" title="<?php echo ((isset($this->_rootref['L_INDEX'])) ? $this->_rootref['L_INDEX'] : ((isset($user->lang['INDEX'])) ? $user->lang['INDEX'] : '{ INDEX }')); ?>">Blog</a>
</li>