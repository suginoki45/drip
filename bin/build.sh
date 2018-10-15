#!/usr/bin/env bash

set -e

nvm install 8
npm install
npm run build
