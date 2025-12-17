<?php

declare(strict_types=1);

namespace JustBetter\Core\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Support extends Field
{
    private const WEBSITE_URL = 'https://justbetter.nl';
    private const CONTACT_URL = 'https://justbetter.nl/contact';
    private const GITHUB_URL = 'https://github.com/justbetter';
    private const LOGO_URL = 'https://opensource.justbetter.nl/justbetter-logo-black.svg';

    /** 
     * @var string
     */
    protected $_template = 'JustBetter_Core::system/config/support.phtml';

    public function render(AbstractElement $element): string
    {
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();

        return parent::render($element);
    }

    protected function _getElementHtml(AbstractElement $element): string
    {
        return $this->toHtml();
    }

    public function getWebsiteUrl(): string
    {
        return self::WEBSITE_URL;
    }

    public function getContactUrl(): string
    {
        return self::CONTACT_URL;
    }

    public function getGithubUrl(): string
    {
        return self::GITHUB_URL;
    }

    public function getLogoUrl(): string
    {
        return self::LOGO_URL;
    }
}
