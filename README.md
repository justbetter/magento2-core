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
    <li><a href="#getting-started">Getting Started</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

## About The Module

This module by [JustBetter](https://justbetter.nl) provides core infrastructure and shared functionality that other JustBetter Magento 2 modules depend on. It is not meant to be used as a standalone module, but rather as a foundational dependency.

### Built With

* [![PHP][PHP-badge]][PHP-url]
* [![Magento][Magento-badge]][Magento-url]

### Contributors

Thanks to all the people who have contributed to this project:

<a href="https://github.com/justbetter/magento2-core/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=justbetter/magento2-core" alt="Contributors" />
</a>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Getting Started

This module is automatically installed as a dependency when installing other JustBetter modules.

If you need to enable it manually:

```bash
bin/magento module:enable JustBetter_Core
bin/magento setup:upgrade && bin/magento cache:flush
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

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

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## License

Distributed under the GPL-3.0 License. See `LICENSE` for more information. Please see [License File](LICENSE) for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Contact

[JustBetter B.V.](https://justbetter.nl/contact)

<p align="right">(<a href="#readme-top">back to top</a>)</p>


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
