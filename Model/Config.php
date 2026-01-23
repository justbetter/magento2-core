<?php

declare(strict_types=1);

namespace JustBetter\Core\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    public const CONFIG_PATH_MENU_ENABLE = 'justbetter_general/settings/enable_menu';

    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig
    ) {
    }

    public function isMenuEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::CONFIG_PATH_MENU_ENABLE);
    }
}
