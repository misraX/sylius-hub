Installation
------------

```bash
$ git clone git@github.com:misraX/sylius-hub.git
$ cd sylius-hub
$ docker-compose up --build -d
$ docker-compose exec php bin/console sylius:fixtures:load

```
open http://localhost/admin login with user:sylius@example.com pass:sylius

CustomEmails
------------

1. Creating an EmailConfig model, Linking the model to `sylius_resource`.

2. Adding an `Email` menu item under configurations.

3. Adding `app_admin_emailCofnig` route to `sylius_admin.yaml` routes.
 
4. Customize `sylius_grid` to add `app_admin_emailCofnig` route, fields mapping and actions.
 
5. Customize the `order_confirmation` sylius email Manager and template to read from the model settings.

 
