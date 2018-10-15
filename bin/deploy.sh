#!/usr/bin/env bash

set -e

if [[ "false" != "$TRAVIS_PULL_REQUEST" ]]; then
	echo "Not deploying pull requests."
	exit
fi

if [[ "master" != "$TRAVIS_BRANCH" ]]; then
	echo "Not on the 'master' branch."
	exit
fi

rm -rf .git
rm -r .gitignore

echo ".editorconfig
.travis.yml
README.md
bin
gulpfile.js
node_modules
package.json
phpcs.ruleset.xml
src
tests
tmp
.vscode" > .gitignore

git init
git config user.name "suginoki45"
git config user.email "yuki.sugitani@glatchdesign.com"
git add -A
git commit --quiet -m "Deploy from travis"
git clean -fdx
git rm -fr .gitignore
git commit --quiet -m "Deploy from travis"
git push --force --quiet "https://${GH_TOKEN}@${GH_REF}" master:release > /dev/null 2>&1
