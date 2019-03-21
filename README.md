Installation
------------

```bash
$ wget http://getcomposer.org/composer.phar
$ php composer.phar create-project sylius/sylius-standard project
$ cd project
$ yarn install
$ yarn build
$ php bin/console sylius:install
$ php bin/console server:start
$ open http://localhost:8000/
```

CustomEmails
------------

1. Creating an EmailConfiguration model

2. Adding a menu item under configurations.

3. Linking the menu item to a custom controller.

4. Customize the `order_confirmation` sylius email Manager and template to read from the model settings.

 
