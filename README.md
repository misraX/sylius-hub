Installation
------------

```bash
$ git clone git@github.com:misraX/sylius-hub.git
$ cd sylius-hub
$ docker-compose up --build -d
$ docker-compose exec php bin/console sylius:fixtures:load

```
open http://localhost/admin login with user:sylius@example.com pass:sylius

Custom Emails
------------

1. Creating an `EmailConfig` model.

2. Adding the model to `sylius_resource`

3. Adding an `Email` menu item under the admin main `configurations` menu item.

4. Adding `app_admin_emailConfig` route to `sylius_admin.yaml` routes.

5. Creating EmailConfigType with custom RichText with (CKEditor) and choices with all the available sylius Emails.

6. Adding `EmailConfigType` form type `app_admin_emailConfig.formtype` to `services.yaml`.

7. Overriding  `OrderEmailManager` and register `sylius.email_manager.order` service to replace the default manager.

8. Customize a grid field to render the `body` in index view.

8. Overriding `orderConfirmation.html` to add the new twig context.

9. Customize `sylius_grid` to add `app_admin_emailConfig` route, fields mapping and actions.

10. Adding the ability to custom any emails from the base sylius `Sylius\Bundle\CoreBundle\Mailer\Emails`. 

List index View, with actions (Edit, Delete, Create).
![ListView](https://raw.githubusercontent.com/misraX/sylius-hub/master/screenshots/admin-index-listView.png)
Create View
![createView](https://raw.githubusercontent.com/misraX/sylius-hub/master/screenshots/admin-create-createView.png)
Edit View
![updateView](https://raw.githubusercontent.com/misraX/sylius-hub/master/screenshots/admin-edit-editView.png)

NOTES
-----

- This feature is not restricted to order_confirmation email, it can override any of the sylius emails,
but with the prober Email Manager.
