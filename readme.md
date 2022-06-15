# WP VirtualBox Testing

- Description: Frees reclaimable slab objects (includes dentries and inodes) when WordPress updates a plugin or theme.
- Author: WordPress Core Contributors
- Author URI: https://make.wordpress.org/core
- License: GPLv3 or later
- Version: 1.0.0

## Overview

Howdy!

This repository contains a watcher script that frees reclaimable slab objects (includes dentries and inodes) when WordPress updates a plugin or theme, and a Must-Use plugin to install in each of your sites in VirtualBox.

This repository was created by WordPress Core Contributors to resolve a filesystem issue within VirtualBox after using the PHP native `rename()` function.

More details on the VirtualBox issue:

- https://www.virtualbox.org/ticket/8761#comment:24
- https://www.virtualbox.org/ticket/17971

## Installation

To set up the watcher script, run the following commands as a one-time setup:
```sh
sudo curl -o /etc/init.d/wpclearcache.sh https://raw.githubusercontent.com/costdev/wp-virtualbox-testing/main/wpclearcache.sh
sudo sed -i 's/\r$//' /etc/init.d/wpclearcache.sh
sudo chmod 500 /etc/init.d/wpclearcache.sh
sudo update-rc.d wpclearcache.sh defaults
```

Restart the box. Once this is done, the watcher script should be running in your environment.

To install the mu-plugin for your site, run the following commands (should be done for each site):
```sh
cd /path/to/your/site/wp-content (Chassis uses content instead of wp-content)
mkdir -p mu-plugins && curl -o mu-plugins/wpclearcache.php https://raw.githubusercontent.com/costdev/wp-virtualbox-testing/main/wpclearcache.php
```

## Reporting issues

Please report issues in the comments on the [Rollback Feature: Testing Call to Action](https://make.wordpress.org/core/?p=96920) post.