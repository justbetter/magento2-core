<?php

declare(strict_types=1);

namespace JustBetter\Core\Model\Config\Backend;

use Magento\Framework\App\Cache\Type\Block;
use Magento\Framework\App\Config\Value;

class Menu extends Value
{
    public function afterSave(): self
    {
        if ($this->isValueChanged()) {
            $this->cacheTypeList->invalidate(Block::TYPE_IDENTIFIER);
        }

        return parent::afterSave();
    }
}
