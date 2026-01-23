<?php

declare(strict_types=1);

namespace JustBetter\Core\Plugin\Backend\Model\Menu;

use JustBetter\Core\Model\Config;
use Magento\Backend\Model\Menu;
use Magento\Backend\Model\Menu\Builder as MenuBuilder;

class Builder
{
    public const JUSTBETTER_MENU = 'JustBetter_Core::menu';

    public function __construct(
        private readonly Config $config
    ) {
    }

    public function afterGetResult(MenuBuilder $subject, Menu $menu): Menu
    {
        if (!$menu->get(self::JUSTBETTER_MENU)) {
            return $menu;
        }

        if (!$this->config->isMenuEnabled()) {
            $menu->remove(self::JUSTBETTER_MENU);
        }

        return $menu;
    }
}
