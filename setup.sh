#!/bin/bash
set -e

echo 'Boostrapping your computer...'

# Install xcode command line tools
if [[ ! -x `xcode-select -p 2>/dev/null` ]]; then
  xcode-select --install
  echo 'Press any key when the installation has completed.'
  read -n 1
fi
# Install homebrew
if [[ ! -x /usr/local/bin/brew ]]; then
  echo 'Installing homebrew...'
  ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
fi

# setup casks/taps
brew tap homebrew/dupes
brew install homebrew/dupes/grep
brew install caskroom/cask/brew-cask
brew tap caskroom/versions

# terminal utils
binaries=(
  coreutils # Install GNU core utilities (those that come with OS X are outdated)
  findutils # Install GNU `find`, `locate`, `updatedb`, and `xargs`, g-prefixed
  bash # Install Bash 4
  git # git, cus it should exist anyways
)

# "installing binaries..."
brew install ${binaries[@]}

# Apps
apps=(
  Caskroom/cask/mamp
)

# Install apps to /Applications
# Default is: /Users/$user/Applications
# "installing apps..."
brew cask install --appdir="/Applications" ${apps[@]}
brew cleanup

cd ~/Downloads
curl http://download.dokuwiki.org/src/dokuwiki/dokuwiki-stable.tgz > ./doku.tgz
mkdir doku
tar -xvf doku.tgz -C doku --strip-components=1
rm -rf /Applications/MAMP/htdocs
mv -fv ./doku /Applications/MAMP/htdocs
open /Applications/MAMP/MAMP.app
open http://localhost:8888/install.php
git clone git@github.com:theironyard/wiki-template.git /Applications/MAMP/htdocs/lib/tpl/ironwiki

echo '
 ______________
< instructions >
 --------------
        \   ^__^
         \  (oo)\_______
            (__)\       )\/\
                ||----w |
                ||     ||

-------------------
1. START THE MAMP SERVER (not PRO), and refresh the browser at http://localhost:8888/install.php
2. RUN THE INSTALLER
3. START CODING on files at /Applications/MAMP/htdocs/lib/tpl/ironwiki
-------------------'