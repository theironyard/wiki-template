TIY template built off of the Bootstrap3 template for DokuWiki
================================

# Installing your development environment

> (for developing this template / PHP locally on your machine)

First, you'll need read access via Git CLI and SSH. Chances are, if you are reading this README, you already have it.

1. open your terminal;
2. follow these steps

    ```sh
    cd ~/Downloads
    curl https://raw.githubusercontent.com/theironyard/wiki-template/master/setup.sh > setup.sh
    sh setup.sh
    # 1. this script will attempt to install homebrew and some CLI tools,
    # 2. then it will install MAMP (Mac, MySQL, Apache, PHP) – a PHP development tool
    # 3. then it will download doku and set it up within MAMP's folders
    # 4. then it will clone a copy of the wiki repo and place it as `bootstrap3` in the template directory inside doku (inside MAMP's folders)
    # 5. then it will open MAMP, and open your browser to the `install` page for doku (run this installation)
    # 6. finally it will spit out some directions for you to follow
    ```

3. open http://localhost:8888/install.php in your browser after opening and starting your MAMP server
4. create your superuser on that page, save, then at the top of the page click "Admin"
5. on the admin page, go to the wiki settings, and from the template dropdown, select "ironwiki", then scroll to the bottom and save
6. in your terminal, navigate to the template folder cloned from the GitHub repo, and open with your favorite editor

    ```sh
    cd /Applications/MAMP/htdocs/doku/lib/tpl/ironwiki
    sublime .
    ```

7. Use your favorite editor to open `/Applications/MAMP/htdocs/doku/lib/tpl/bootstrap3` (i.e. `atom` or `sublime`), make edits, commit/push to GitHub

# Doku Templates

Read about templates in doku [here](https://www.dokuwiki.org/devel:templates)

