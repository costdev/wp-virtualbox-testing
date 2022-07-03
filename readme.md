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

To set up the watcher script as a service, run the following commands as a one-time setup:
```sh
sudo curl -o /usr/local/bin/wpclearcache https://raw.githubusercontent.com/costdev/wp-virtualbox-testing/main/wpclearcache.sh
sudo sed -i 's/\r$//' /usr/local/bin/wpclearcache
sudo chmod 500 /usr/local/bin/wpclearcache
sudo curl -o /etc/systemd/system/wpclearcache.service https://raw.githubusercontent.com/costdev/wp-virtualbox-testing/main/wpclearcache.service
sudo systemctl daemon-reload
sudo systemctl enable wpclearcache.service
sudo systemctl start wpclearcache.service
```

The `wpclearcache` service should now be running and will be running when your environment is rebooted.

To install the mu-plugin for your site, run the following commands (should be done for each site):
```sh
cd /path/to/your/site/wp-content (Chassis uses content instead of wp-content)
mkdir -p mu-plugins && curl -o mu-plugins/wpclearcache.php https://raw.githubusercontent.com/costdev/wp-virtualbox-testing/main/wpclearcache.php
```

## Reporting issues

Please report issues in the comments on the [Rollback Feature: Testing Call to Action](https://make.wordpress.org/core/?p=96920) post.