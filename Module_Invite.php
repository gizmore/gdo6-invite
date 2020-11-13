<?php
namespace GDO\Invite;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Link;
use GDO\DB\GDT_Int;
use GDO\User\GDO_User;
use GDO\DB\GDT_Checkbox;
use GDO\UI\GDT_Page;

/**
 * Invite users via email. @see \GDO\Invite\Method\Form
 * 
 * Configure max pending requests.
 * 
 * @author gizmore
 * @version 6.10
 * @since 6.09
 */
final class Module_Invite extends GDO_Module
{
	public function onLoadLanguage() { return $this->loadLanguage('lang/invite'); }

	public function getClasses()
	{
	    return [
	        GDO_Invitation::class,
	    ];
	}
	
	
	public function getConfig()
	{
		return [
			GDT_Int::make('invite_max_pending')->notNull()->initial('3'),
		    GDT_Checkbox::make('hook_right_bar')->initial('1'),
		];
	}
	public function cfgMaxPending() { return $this->getConfigValue('invite_max_pending'); }
	public function cfgRightBar() { return $this->getConfigValue('hook_right_bar'); }
	
	#############
	### Hooks ###
	#############
	public function hookUserActivated(GDO_User $user)
	{
		GDO_Invitation::hookUserActivated($user);
	}
	
	public function onInitSidebar()
	{
// 	    if ($this->cfgRightBar())
	    {
	        if (GDO_User::current()->isAuthenticated())
	        {
	            $bar = GDT_Page::$INSTANCE->rightNav;
	            $bar->addField(GDT_Link::make('link_invite')->href(href('Invite', 'Form')));
	        }
	    }
	}

}
