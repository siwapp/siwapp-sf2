Siwapp
======

To start coding run the following commands:

    cp app/config/parameters.ini.dist app/config/parameters.ini
    php bin/vendors install
    mkdir app/cache app/logs
    chmod 777 app/cache app/logs

## Issues with the cache

The following instructions come from the Symfony2 webpage.

One common issue is that the app/cache and app/logs directories must be writable both by the web server and the command line user. On a UNIX system, if your web server user is different from your command line user, you can run the following commands just once in your project to ensure that permissions will be setup properly. Change www-data to the web server user and yourname to your command line user:

### 1. Using ACL on a system that supports chmod +a

Many systems allow you to use the chmod +a command. Try this first, and if you get an error - try the next method:

    $ rm -rf app/cache/*
    $ rm -rf app/logs/*
    
    $ sudo chmod +a "www-data allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs
    $ sudo chmod +a "yourname allow delete,write,append,file_inherit,directory_inherit" app/cache app/logs

### 2. Using Acl on a system that does not support chmod +a

Some systems don't support chmod +a, but do support another utility called setfacl. You may need to enable ACL support on your partition and install setfacl before using it (as is the case with Ubuntu), like so:

    $ sudo setfacl -R -m u:www-data:rwx -m u:yourname:rwx app/cache app/logs
    $ sudo setfacl -dR -m u:www-data:rwx -m u:yourname:rwx app/cache app/logs

### 3. Without using ACL

If you don't have access to changing the ACL of the directories, you will need to change the umask so that the cache and log directories will be group-writable or world-writable (depending if the web server user and the command line user are in the same group or not). To achieve this, put the following line at the beginning of the app/console, web/app.php and web/app_dev.php files:

    umask(0002); // This will let the permissions be 0775
    
    // or
    
    umask(0000); // This will let the permissions be 0777

Note that using the ACL is recommended when you have access to them on your server because changing the umask is not thread-safe.

## Issues with assets

If you cannot see the app styled in production environment read [this](http://symfony.com/doc/2.0/cookbook/assetic/asset_management.html#dumping-asset-files-in-the-prod-environment).

For the impatient, run this symfony command:

    php app/console assetic:dump --env=prod --no-debug

As the doc says:

> This will physically generate and write each file that you need (e.g. /js/abcd123.js). If you update any of your assets, you'll need to run this again to regenerate the file.

