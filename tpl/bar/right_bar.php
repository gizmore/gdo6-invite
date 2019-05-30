<?php

use GDO\UI\GDT_Link;
use GDO\User\GDO_User;

/**
 * @var $bar \GDO\UI\GDT_Bar
 */

if (GDO_User::current()->isAuthenticated())
{
	$bar->addField(GDT_Link::make('link_invite')->href(href('Invite', 'Form')));
}
