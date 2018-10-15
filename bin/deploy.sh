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

git clone -b release --quiet "https://github.com/${TRAVIS_REPO_SLUG}.git" release
gulp build --env production
cd release
git add -A
git commit -m "Update from travis $TRAVIS_COMMIT"
git push --quiet "https://${GH_TOKEN}@github.com/${TRAVIS_REPO_SLUG}.git" master:release > /dev/null 2>&1
