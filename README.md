<h1>JustBetter - Magento 2 Core</h1>
<a id="readme-top"></a>

[![Latest Version on Packagist][packagist-version-shield]][packagist-version-url]
[![GPL-3.0 License][license-shield]][license-url]
[![Total Downloads][packagist-downloads-shield]][packagist-downloads-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]

<br />
<div align="center">
  <a href="https://justbetter.nl">
    <img src="https://raw.githubusercontent.com/justbetter/art/master/justbetter-logo.png" alt="JustBetter Logo" width="200">
  </a>

  <h3 align="center">JustBetter - Magento 2 Core</h3>

  <p align="center">
    Core module providing base infrastructure and foundation for all JustBetter Magento 2 modules.
    <br />
    <a href="https://github.com/justbetter/magento2-core/issues">Report Bug</a>
    ·
    <a href="https://github.com/justbetter/magento2-core/issues">Request Feature</a>
  </p>
</div>

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li><a href="#about-the-module">About The Module</a></li>
    <li><a href="#features">Features</a></li>
    <li><a href="#getting-started">Getting Started</a></li>
    <li><a href="#integration-guide">Integration Guide</a>
      <ul>
        <li><a href="#adding-as-a-dependency">Adding as a Dependency</a></li>
        <li><a href="#automatic-extensions-list">Automatic Extensions List</a></li>
        <li><a href="#adding-menu-items">Adding Menu Items</a></li>
        <li><a href="#using-the-configuration-tab">Using the Configuration Tab</a></li>
      </ul>
    </li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

## About The Module

This module by [JustBetter](https://justbetter.nl) provides core infrastructure and shared functionality that other JustBetter Magento 2 modules depend on. It serves as the foundational layer for all JustBetter extensions, providing a unified admin experience and centralized management.

### Built With

* [![PHP][PHP-badge]][PHP-url]
* [![Magento][Magento-badge]][Magento-url]

### Contributors

Thanks to all the people who have contributed to this project:

<a href="https://github.com/justbetter/magento2-core/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=justbetter/magento2-core" alt="Contributors" />
</a>

## Features

This module provides the following features for JustBetter extensions:

- **Unified Admin Menu**: A centralized "JustBetter" menu item in the Magento admin panel for quick access to all JustBetter extension configurations
- **Configuration Tab**: A dedicated "JustBetter Extensions" tab in System Configuration to group all extension settings
- **Extensions Overview**: An admin panel displaying all installed JustBetter extensions with version information and GitHub links

## Getting Started

This module is automatically installed as a dependency when installing any JustBetter module that depends on it.

After installation, enable the module:

```bash
bin/magento module:enable JustBetter_Core
bin/magento setup:upgrade && bin/magento cache:flush
```

## Integration Guide

This section describes how other JustBetter extensions can integrate with the Core module to provide a consistent user experience across all JustBetter modules.

### Adding as a Dependency

Add the Core module as a dependency in your extension's `composer.json`:

```json
{
    "require": {
        "justbetter/magento2-core": "^1.0"
    }
}
```

Define the module sequence in `etc/module.xml` to ensure proper loading order:

```xml
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"  xsi:noNamespaceSchemaLocation="urn:magento:framework:Module/etc/module.xsd">
    <module name="JustBetter_YourModule">
        <sequence>
            <module name="JustBetter_Core"/>
        </sequence>
    </module>
</config>
```

### Automatic Extensions List

All packages with the `justbetter/*` vendor prefix are automatically detected and displayed in the Extensions overview within the admin panel. No additional configuration is required for your extension to appear in this list.

The extensions list displays:
- Package name with link to GitHub repository
- Installed version (from `composer.lock`)

### Adding Menu Items

To add your extension to the centralized JustBetter admin menu, create `etc/adminhtml/menu.xml`. The menu uses a section header with submenu items structure:

```xml
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Backend:etc/menu.xsd">
    <menu>
        <add id="JustBetter_YourModule::section"
             title="Your Module"
             module="JustBetter_YourModule"
             translate="title"
             sortOrder="40"
             parent="JustBetter_Core::menu"
             resource="JustBetter_YourModule::menu"/>
        <add id="JustBetter_YourModule::config"
             title="Configuration"
             module="JustBetter_YourModule"
             translate="title"
             sortOrder="10"
             action="adminhtml/system_config/edit/section/yourmodule_settings"
             parent="JustBetter_YourModule::section"
             resource="JustBetter_YourModule::config"/>
    </menu>
</config>
```

### Using the Configuration Tab

To place your extension's configuration under the "JustBetter Extensions" tab in System Configuration, create `etc/adminhtml/system.xml`:

```xml
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Config:etc/system_file.xsd">
    <system>
        <section id="yourmodule_settings" translate="label" sortOrder="20" showInDefault="1" showInWebsite="1" showInStore="1">
            <label>Your Module</label>
            <tab>justbetter</tab>
            <resource>JustBetter_YourModule::config</resource>
            <group id="general" translate="label" type="text" sortOrder="10" showInDefault="1" showInWebsite="1" showInStore="1">
                <label>General Settings</label>
                <!-- Add your configuration fields here -->
            </group>
        </section>
    </system>
</config>
```

## Contributing

Please read our [Contributing Guide](.github/CONTRIBUTING.md) for details on our code of conduct and the process for submitting pull requests.

**Development:**

```bash
# Run quality checks (PHPStan)
composer analyse

# Run GrumPHP tasks manually
composer grumphp
```

Note: GrumPHP runs automatically on git commit.

For security vulnerabilities, please see our [Security Policy](.github/SECURITY.md).

## License

Distributed under the GPL-3.0 License. See `LICENSE` for more information. Please see [License File](LICENSE) for more information.

## Contact

[JustBetter B.V.](https://justbetter.nl/contact)

<a href="https://justbetter.nl" title="JustBetter - Innovative Magento Development Agency">
    <img src="./.github/assets/footer.svg" alt="JustBetter - We're an innovative development agency from The Netherlands building better Magento solutions">
</a>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
[packagist-version-shield]: https://img.shields.io/packagist/v/justbetter/magento2-core.svg?style=for-the-badge
[packagist-version-url]: https://packagist.org/packages/justbetter/magento2-core
[packagist-downloads-shield]: https://img.shields.io/packagist/dt/justbetter/magento2-core.svg?style=for-the-badge
[packagist-downloads-url]: https://packagist.org/packages/justbetter/magento2-core
[contributors-shield]: https://img.shields.io/github/contributors/justbetter/magento2-core.svg?style=for-the-badge
[contributors-url]: https://github.com/justbetter/magento2-core/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/justbetter/magento2-core.svg?style=for-the-badge
[forks-url]: https://github.com/justbetter/magento2-core/network/members
[stars-shield]: https://img.shields.io/github/stars/justbetter/magento2-core.svg?style=for-the-badge
[stars-url]: https://github.com/justbetter/magento2-core/stargazers
[issues-shield]: https://img.shields.io/github/issues/justbetter/magento2-core.svg?style=for-the-badge
[issues-url]: https://github.com/justbetter/magento2-core/issues
[license-shield]: https://img.shields.io/github/license/justbetter/magento2-core.svg?style=for-the-badge
[license-url]: https://github.com/justbetter/magento2-core/blob/master/LICENSE

[PHP-badge]: https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white
[PHP-url]: https://www.php.net/
[Magento-badge]: https://img.shields.io/badge/Magento-EE672F?style=for-the-badge&logo=magento&logoColor=white
[Magento-url]: https://business.adobe.com/products/magento/magento-commerce.html
