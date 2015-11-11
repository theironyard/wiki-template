TIY template built off of the Bootstrap3 template for DokuWiki
================================

## Features

  * HTML5
  * Bootstrap 3.x based template
  * Glyphicons and FontAwesome icons
  * High customizable via the configuration manager
  * Many html hooks
  * Responsive
  * Sidebar support (**left** or **right** position)
  * Right Sidebar support
  * Left and Right sidebar size change
  * Many themes made from [Bootswatch](https://bootswatch.com)
  * Theme switcher for Bootswatch.com themes
  * Cookie Law Banner Notice

## DokuWiki Plugin Integration

  * Translation
  * Discussion
  * Tags
  * Tagging
  * Publish
  * Explain
  * Wrap - Tabs
  * DataTables
  * Rack
  * Diagram
  * Edittable
  * Bootstrap Wrapper
  * jOrg Chart
  * ... and more!

# The **NEW AND IMPROVED** installation

> (for developing this template / PHP locally on your machine)

First, you'll need read access via Git CLI and SSH. Chances are, if you are reading this README, you already have it.

1. open your terminal;
2. follow these steps

    ```sh
    cd ~/Downloads
    curl https://github.com/theironyard/wiki-template/raw/master/install-mamp-wiki-tpl.sh > ./install-mamp-wiki-tpl.sh
    chmod a+x ./install-mamp-wiki-tpl.sh
    # 1. this script will attempt to install homebrew and some CLI tools,
    # 2. then it will install MAMP (Mac, MySQL, Apache, PHP) – a PHP development tool
    # 3. then it will download doku and set it up within MAMP's folders
    # 4. then it will clone a copy of the wiki repo and place it as `bootstrap3` in the template directory inside doku (inside MAMP's folders)
    # 5. then it will open MAMP, and open your browser to the `install` page for doku (run this installation)
    # 6. finally it will spit out some directions for you to follow
    ./install-mamp-wiki-tpl.sh
    ```

3. navigate to the template folder cloned from the GitHub repo

    ```sh
    cd /Applications/MAMP/htdocs/doku/lib/tpl/bootstrap3
    ```

4. Use your favorite editor to open `/Applications/MAMP/htdocs/doku/lib/tpl/bootstrap3` (i.e. `atom` or `sublime`), make edits, commit thourhg GitHub

# Installation **(REDACTED)**

This template folder needs to be installed into a dokuwiki folder. To setup a local dokuwiki instance, it is recommended to follow the [installation instructions](https://www.dokuwiki.org/installer) of DokuWiki in a LAMP/MAMP/WAMP environment.

For Mac development, install [MAMP](https://www.mamp.info/en/downloads/) Free version, and then clone this repo/folder as the `lib/tpl/bootstrap3/` of your MAMP web folder. The package is configured to be named `bootstrap3` so keep the folder name as is until we figure out how to customize it. :-)

Here's an example folder tree so you can see this structure visually:

```
.
├── bin
├── conf
│   └── tpl
├── data
│   ├── attic
│   ├── cache
│   ├── index
│   ├── locks
│   ├── media
│   ├── media_attic
│   ├── media_meta
│   ├── meta
│   ├── pages
│   └── tmp
├── inc
│   ├── Form
│   ├── lang
│   ├── parser
│   └── phpseclib
├── lib
│   ├── exe
│   ├── images
│   ├── plugins
│   ├── scripts
│   ├── styles
│   └── tpl <<<<<<<<<<<<<<<< clone the repo as `bootstrap3` in here
└── vendor
    ├── composer
    ├── easybook
    └── splitbrain
```

Please refer to https://www.dokuwiki.org/template for additional info on how to install templates in DokuWiki.

# Deployment

Admins on the Digital Ocean server will be able to pull the latest updates from the Git repo.

----
Copyright (C) Giuseppe Di Terlizzi <giuseppe.diterlizzi@gmail.com>

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; version 2 of the License

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

See the LICENSE file in your DokuWiki folder for details

