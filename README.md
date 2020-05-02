easy-admin-import
=================


composer create-project symfony/website-skeleton my_project ^4.4.0

sudo apt-get install php-mysql php7.2-mysql

in .env
DATABASE_URL=mysql://:@127.0.0.1:3306/easy_admin_import?serverVersion=5.7

php bin/console list doctrine
php bin/console doctrine:schema:validate
php bin/console doctrine:database:create


User
--------------------
- id
- firstname
- lastname
- email

Role
--------------------
- id
- name

UserRole
--------------------
- id
- user_id
- role_id
- import_id

FileImport
--------------------
- id
- created_at
- file_name

ImportData
--------------------
- id
- import_id
- user_id
- role_id


php bin/console make:entity
User
php bin/console make:migration
php bin/console doctrine:migrations:status
php bin/console doctrine:migrations:migrate

composer require orm-fixtures --dev
php bin/console make:fixtures
php bin/console doctrine:fixtures:load --append

composer require easycorp/easyadmin-bundle:2.3.5

php bin/console make:subscriber
> PostFileSubscriber
> easy_admin.pre_persist

doctrine:database:import

$ git remote add origin https://github.com/abedo/easy-admin-import.git
git push origin master
git push -u origin master

composer require phpoffice/phpspreadsheet