<?php

namespace App\Menu\EmailConfig;


use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

/**
 * Class EmailConfigMenuListener
 * @package App\Menu\Email
 */
final class EmailConfigMenuListener
{

    /**
     * Adding a custom email sub menu to configuration main menu.
     * This function will run only if the menu is instanceof `ItemInterface`
     *
     * @param MenuBuilderEvent $event
     */
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();
        $configurationSubmenu = $menu->getChild('configuration');
        if (!$configurationSubmenu instanceof ItemInterface) {
            return;
        }

        $configurationSubmenu
            ->addChild('new-subitem', [
                'route' => 'app_admin_emailConfig_index',
            ])
            ->setLabel('admin_email_configuration.menu.admin.main.configurations.emails')
            ->setLabelAttributes([
                'icon' => 'inbox ',
            ]);

    }
}
