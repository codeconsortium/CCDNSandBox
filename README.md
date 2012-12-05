CodeConsortium Sandbox
========================

Welcome to the CodeConsortium sandbox - a fully-functional CodeConsortium
application that demonstrates the CCDN bundles in action.

This document contains information on how to download and start using Symfony.
For a more detailed explanation, see the
[Installation chapter](http://symfony.com/doc/current/book/installation.html)
of the Symfony Documentation.

1) Download the Standard Edition
--------------------------------

If you've already downloaded the standard edition, and unpacked it somewhere
within your web root directory, then move on to the "Installation" section.

To download the standard edition, you have two options:

### Download an archive file (*recommended*)

The easiest way to get started is to download an archive of the standard edition
(http://symfony.com/download). Unpack it somewhere under your web server root
directory and you're done. The web root is wherever your web server (e.g. Apache)
looks when you access `http://localhost` in a browser.

### Clone the git Repository

We highly recommend that you download the packaged version of this distribution.
But if you still want to use Git, you are on your own.

Run the following commands:

    git clone http://github.com/codeconsortium/CCDNSandBox.git

2) Installation
---------------

Once you've downloaded the standard edition, installation is easy, and basically
involves making sure your system is ready for Symfony.

### a) Check your System Configuration

Before you begin, make sure that your local system is properly configured
for Symfony. To do this, execute the following:

    php app/check.php

If you get any warnings or recommendations, fix these now before moving on.

### b) Install the Vendor Libraries

You need to download all of the necessary vendor libraries. Run the following:

    php bin/vendors install

Note that you **must** have git installed and be able to execute the `git`
command to execute this script. If you don't have git available, either install
it or download Symfony with the vendor libraries already included.

### c) Add your Database Credentials.

Copy app/config/parameters.ini.dist to app/config/parameters.ini and add you database login credentials there. You will need to make sure you have already created a database.

### d) Setup your Database.

Run the following:

	php app/console doctrine:schema:update --dump-sql

Note: We dump the SQL so that you can add it manually when applying an update. Assuming that the SQL looks good and you do not have any issues you can use --force in place of --dump-sql and your database will be setup for you.

### e) Symlink your Assets.

Run the following:

	php app/console assets:install --symlink web/

### f) Warm up the Cache.

Run the following:

    php app/console cache:warmup

### c) Access the Application via the Browser

Congratulations! You're now ready to use Symfony. If you've unzipped Symfony
in the web root of your computer, then you should be able to access the
web version of the Symfony requirements check via:

    http://localhost/CCDNSandbox/web/config.php

If everything looks good, click the "Bypass configuration and go to the Welcome page"
link to load up your first Symfony page.

You can also use a web-based configurator by clicking on the "Configure your
Symfony Application online" link of the ``config.php`` page.

3) Learn about Symfony!
-----------------------

This distribution is meant to be the starting point for your application,
but it also contains some sample code that you can learn from and play with.

Using this Edition as the Base of your Application
--------------------------------------------------

The distribution is configured with the following defaults:

* Twig is the only configured template engine;
* Doctrine ORM/DBAL is configured;
* Swiftmailer is configured;
* Annotations for everything are enabled.

What's inside?
---------------
The Symfony Standard Edition comes pre-configured with the following bundles:

* **FrameworkBundle** - The core Symfony framework bundle
* **SensioFrameworkExtraBundle** - Adds several enhancements, including template
  and routing annotation capability ([documentation](http://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html))
* **DoctrineBundle** - Adds support for the Doctrine ORM
  ([documentation](http://symfony.com/doc/current/book/doctrine.html))
* **TwigBundle** - Adds support for the Twig templating engine
  ([documentation](http://symfony.com/doc/current/book/templating.html))
* **SecurityBundle** - Adds security by integrating Symfony's security component
  ([documentation](http://symfony.com/doc/current/book/security.html))
* **SwiftmailerBundle** - Adds support for Swiftmailer, a library for sending emails
  ([documentation](http://symfony.com/doc/2.0/cookbook/email.html))
* **MonologBundle** - Adds support for Monolog, a logging library
  ([documentation](http://symfony.com/doc/2.0/cookbook/logging/monolog.html))
* **AsseticBundle** - Adds support for Assetic, an asset processing library
  ([documentation](http://symfony.com/doc/2.0/cookbook/assetic/asset_management.html))
* **JMSSecurityExtraBundle** - Allows security to be added via annotations
  ([documentation](http://symfony.com/doc/current/bundles/JMSSecurityExtraBundle/index.html))
* **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
  the web debug toolbar
* **SensioDistributionBundle** (in dev/test env) - Adds functionality for configuring
  and working with Symfony distributions
* **SensioGeneratorBundle** (in dev/test env) - Adds code generation capabilities
  ([documentation](http://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html))
* **AcmeDemoBundle** (in dev/test env) - A demo bundle with some example code

Enjoy!
