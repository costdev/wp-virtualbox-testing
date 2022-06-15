#!/bin/sh

# Name:        WP Clear Cache
# Description: Frees reclaimable slab objects (includes dentries and inodes) when WordPress updates a plugin or theme.
# Author:      WordPress Core Contributors
# Author URI:  https://make.wordpress.org/core
# License:     GPLv2 or later
# Version:     1.0.0

while :
do
  if [ -f "/tmp/.wpclearcache" ]; then
    sudo sh -c 'echo 2 > /proc/sys/vm/drop_caches'
  fi

  # Wait 200ms.
  sleep 0.2s
done