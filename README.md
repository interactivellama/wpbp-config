wpbp-config
===========

Dynamic WordPress configuration file to be used with three-tier server scheme: Development, Staging, and Production

The best way to develop especially within a team is to have a three-tier server scheme. This allows the ease of local development, allows for a shared staging server, and then production will only be deployed to if no issues are found on the staging server.

This config file accomplishes this by setting a constant if the current $_SERVER['SERVER_NAME'] is the staging server or the local machine. This overrides the domain located in the wp_options table of WordPress which should be the production server.

In a perfect world, WordPress would be a git submodule inside your versioned theme, but that's difficult to pull off and takes a lot of redirecting folders. I recommend versioning your theme only, since plugins and the WordPress Core could be updated by your client at any time.


Database/domain independence
------------
Leave find and replace back in the aughts! Databases should be domain agnostic from the start. This allows the same database to work from any of the three tiers. In order to make your databases domain agnostic, you will want to make all URLs "root relative" when they are entered by replacing the domain from the beginning the URL with '/'.


xip.io
------------
Ever wanted to look at a site on your local machine from a virtual machine (say for IE testing) or from a mobile device? Like every day, right? This free service allows this with zero configuration. xip.io is from the guys at 37signals and allows you to view any site from your local machine on any other device on your local network. I recommend a static IP address when hard wired and dynamic when on WiFi. Their dynamic nameservers detect your local machine's IP address and roundtrips it back to your network.