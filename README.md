# Craft CSPS

The foundation of Craft CMS projects at CSPS-EFPC.

_Based on GCWeb v5.1 and WET-BOEW v4.0.31_

## Install Instructions

### Development Dependencies

- [Git](https://git-scm.com/)
- [Composer Dependency Manager for PHP](https://getcomposer.org/)
- [Node.js & NPM](https://nodejs.org/en/)

### Server Minimum Requirements

- [Server Requirements](https://docs.craftcms.com/v3/requirements.html)
- [Server Check Script](https://github.com/craftcms/server-check)

### Installation

1. Create a new database for your project.
2. Clone this repository in your server projects folder (we recommend using Laravel Valet).
3. Open your terminal in the cloned project folder.
4. Run the command `composer install && npm install`.
5. Run the command `npm run dev`.
6. Rename the file `.env.example` to `.env` and modify the values to match those of your own local environment.
7. Run the command `./craft setup` and follow the instructions.

## Development Workflow

To be continued...

## Deployment Workflow

To be continued...

## FAQs

**The NPM packages won't install properly, how can I fix this?**
Make sure Node.js and NPM is properly installated on your development environment. Remove the node_modules folder and try the npm install command again.

**How to reach Craft CMS control panel?**
The URL to access the admin area is `/admin` but you can modify this value to a custom name in the `config/general.php` file.

## Craft Links

- [Craft CMS Website](https://craftcms.com/)
- [Documentation](https://docs.craftcms.com/v3/)
- [Plugin Store](https://plugins.craftcms.com/)
- [Community](https://craftcms.com/discord)
- [Stack Exchange](http://craftcms.stackexchange.com/)
- [Craft Link List](http://craftlinklist.com/)
- [NYS107 Blog](https://nystudio107.com/blog)
- [Craft Shell Scripts](https://github.com/nystudio107/craft-scripts)
- [Craft CMS Premium Courses](https://craftquest.io/)
- [Craft Snippets](http://craftsnippets.com/)

## WET-BOEW Links

- [WET-BOEW Website](https://wet-boew.github.io/wet-boew/index.html)
- [GCWeb Theme](https://wet-boew.github.io/themes-dist/GCWeb/index-en.html)
- [GCWeb Template & Pattern Library](https://www.canada.ca/en/government/about/design-system/pattern-library.html)
- [Component Library](https://wet-boew.github.io/wet-boew-styleguide/index-en.html)

## Useful Links

- [Laravel Valet for MacOS](https://laravel.com/docs/6.x/valet)
- [Laravel Valet for Windows](https://github.com/cretueusebiu/valet-windows)
- [Laravel Valet for Linux](https://cpriego.github.io/valet-linux/)
- [Laravel Mix](https://laravel.com/docs/6.x/mix)
