<?php

declare(strict_types=1);

namespace JustBetter\Core\Block\Adminhtml\System\Config;

use Composer\InstalledVersions;
use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Filesystem\Io\File;
use Magento\Framework\Serialize\Serializer\Json;

class Extensions extends Field
{
    /** 
     * @var string
     */
    protected $_template = 'JustBetter_Core::system/config/extensions.phtml';

    /** 
     * @param array<string, mixed> $data 
     */
    public function __construct(
        Context $context,
        private readonly DeploymentConfig $deploymentConfig,
        private readonly DirectoryList $directoryList,
        private readonly File $fileIo,
        private readonly Json $json,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    protected function _getElementHtml(AbstractElement $element): string
    {
        return $this->toHtml();
    }

    /**
     * @return array<string, array{name: string, package: string, version: string, url: string|null, enabled: bool}> 
     */
    public function getExtensions(): array
    {
        $extensions = [];
        $enabledModules = $this->getEnabledModules();
        $composerLockData = $this->getComposerLockPackages();

        foreach ($composerLockData as $packageName => $packageData) {
            if (!str_starts_with($packageName, 'justbetter/')) {
                continue;
            }

            $moduleName = $this->getModuleNameFromPackage($packageName);

            if ($moduleName === null) {
                continue;
            }

            $extensions[$packageName] = [
                'name' => $moduleName,
                'package' => $packageName,
                'version' => $packageData['version'],
                'url' => $packageData['url'],
                'enabled' => in_array($moduleName, $enabledModules, true),
            ];
        }

        ksort($extensions);

        return $extensions;
    }

    /** 
     * @return array<string, array{version: string, url: string|null}> 
     */
    private function getComposerLockPackages(): array
    {
        try {
            $composerLockPath = $this->directoryList->getRoot() . '/composer.lock';

            if (!$this->fileIo->fileExists($composerLockPath)) {
                return [];
            }

            $content = $this->fileIo->read($composerLockPath);

            if (!is_string($content) || $content === '') {
                return [];
            }

            $data = $this->json->unserialize($content);
            $packages = array_merge($data['packages'] ?? [], $data['packages-dev'] ?? []);

            $result = [];
            foreach ($packages as $package) {
                $name = $package['name'] ?? '';
                $result[$name] = [
                    'version' => $package['version'] ?? '-',
                    'url' => $this->getGitHubUrl($package),
                ];
            }

            return $result;
        } catch (\Exception) {
            return [];
        }
    }

    /** 
     * @param array<string, mixed> $package 
     */
    private function getGitHubUrl(array $package): ?string
    {
        $sourceUrl = $package['source']['url'] ?? null;

        if (!is_string($sourceUrl)) {
            return null;
        }

        if (!str_contains($sourceUrl, 'github.com')) {
            return null;
        }

        $url = str_replace('.git', '', $sourceUrl);
        $url = str_replace('git@github.com:', 'https://github.com/', $url);

        return $url;
    }

    private function getModuleNameFromPackage(string $packageName): ?string
    {
        try {
            $installPath = InstalledVersions::getInstallPath($packageName);

            if ($installPath === null) {
                return null;
            }

            $registrationFile = $installPath . '/registration.php';

            if (!file_exists($registrationFile)) {
                return null;
            }

            $content = file_get_contents($registrationFile);

            if ($content === false) {
                return null;
            }

            $pattern = '/ComponentRegistrar::register\s*\(\s*ComponentRegistrar::MODULE\s*,\s*[\'"]([^\'"]+)[\'"]/i';

            if (preg_match($pattern, $content, $matches)) {
                return $matches[1];
            }

            return null;
        } catch (\Exception) {
            return null;
        }
    }

    /** 
     * @return array<int, string> 
     */
    private function getEnabledModules(): array
    {
        $modules = $this->deploymentConfig->get('modules', []);

        return array_keys(array_filter($modules, static fn(int $enabled): bool => $enabled === 1));
    }
}
