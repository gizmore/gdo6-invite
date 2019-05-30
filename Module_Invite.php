<?php
namespace GDO\Invite;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Bar;
use GDO\DB\GDT_Int;
use GDO\User\GDO_User;

/**
 * Invite users via email. @see \GDO\Invite\Method\Form
 * 
 * Configure max pending requests.
 * 
 * @author gizmore
 * @since 6.09
 */
final class Module_Invite extends GDO_Module
{
	public function onLoadLanguage() { return $this->loadLanguage('lang/invite'); }

	public function getClasses()
	{
		return array(
			'GDO\\Invite\\GDO_Invitation',
		);
	}
	
	
	public function getConfig()
	{
		return array(
			GDT_Int::make('invite_max_pending')->notNull()->initial('3'),
		);
	}
	
	public function cfgMaxPending() { return $this->getConfigValue('invite_max_pending'); }
	
	#############
	### Hooks ###
	#############
	public function hookUserActivated(GDO_User $user)
	{
		GDO_Invitation::hookUserActivated($user);
	}
	
	public function hookRightBar(GDT_Bar $bar)
	{
		return $this->templatePHP('bar/right_bar.php', ['bar' => $bar]);
	}

}
