# WordPress Project Boilerplate

WordPress project boilerplate for developing locally or deploying your WordPress project to the Sitepilot managed hosting platform.

## Quickstart

Run the following commands to create and start a new WordPress project locally.

```bash
# Create a new project
composer create-project sitepilot/project-wordpress my-site

# Start containers
docker-compose up -d
```

Navigate to http://localhost:8080 to access your WordPress installation.

## WordPress Configuration

Composer is used to manage dependencies like WordPress version and which plugins / themes are installed.

### Install a plugin 

[WordPress Packagist](https://wpackagist.org/) is already registered in the composer.json file so any plugin from the WordPress Plugin Directory can easily be required. 

To add a plugin, add it under the require directive or use composer require `<namespace>/<packagename>` from the command line. If it's from WordPress Packagist then the namespace is always `wpackagist-plugin`.

### Install a theme

Themes can also be managed by Composer but should only be done so under two conditions:

1. You're using a parent theme that won't be modified at all.
2. You want to separate out your main theme and use that as a standalone package.

Under most circumstances, we recommend NOT doing #2 and instead keeping your main theme as part of your app's repository.

Just like plugins, [WordPress Packagist](https://wpackagist.org/) maintains a Composer mirror of the WordPress theme directory. To require a theme, just use the `wpackagist-theme` namespace.

### Update

Updating your WordPress version (or any plugin) is just a matter of changing the version number in the `composer.json` file. Then running `composer update` will pull down the new version.

[Dependabot](https://github.blog/2020-06-01-keep-all-your-packages-up-to-date-with-dependabot/) can be used to automate updates of your Composer dependencies in your project, including WordPress itself.

## Runtime Configuration

### Environment

You can change your project's runtime configuration by modifying the environment variables in `.sitepilot/environment`.

### PHP configuration

You can change your project's PHP-configuration by modifying `.sitepilot/config/php/php.ini`. You can find a list of available options [here](https://www.php.net/manual/en/ini.list.php).

### Nginx configuration

You can extend your project's Nginx-configuration by adding files to the appropriate `.sitepilot/config/nginx/*.d` folder. 

* `vhost-pre.d` - included before the default vhost configuration.
* `vhost-post.d` - included after the default vhost configuration.
* `php-allowed-list.d` - allow direct access to PHP-files.

### Document root files

Your WordPress installation is managed by Composer and lives in the `public` folder. Every modification / addition to the `public` folder will be overwritten after a Composer install or update. Add files which need to live in the document root to the `root` folder.

## Deploy 🚀 

This stack is optimized for automagically deploying your project to the Sitepilot managed hosting platform. You can request access to our fast and developer-friendly  platform through our [support department](mailto:support@sitepilot.io).


## Credits

This project is based on the the [Bedrock](https://github.com/roots/bedrock) WordPress boilerplate by [Roots](https://roots.io).