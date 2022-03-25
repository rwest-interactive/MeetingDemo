#!/usr/bin/env bash

# This file is configured in .lando.yml. Run: lando env-search-reindex.
# It will reindex search on a remote Pantheon environment.

NORMAL="\033[0m"
RED="\033[31m"
YELLOW="\033[32m"
ORANGE="\033[33m"
PINK="\033[35m"
BLUE="\033[34m"

echo
echo -e "${RED}WARNING: This will affect a remote Pantheon environment."
echo
echo -e "${ORANGE}Are you sure you want to reindex search on a remote Pantheon environment? (y/n):${BLUE}"
echo
read REPLY
if [[ ! "$REPLY" =~ ^[Yy]$ ]]
then
  exit 1
fi

echo
echo -e "${ORANGE}Enter the environment to reindex (dev/test/live)."
echo -e "You can also enter a multidev environment (e.g. pr-24):${BLUE}"
echo
read REPLY_ENV
if [ "$REPLY_ENV" = "live" ];
then
  echo
  echo -e "${ORANGE}Are you sure you want to reindex search on prod? (y/n):${BLUE}"
  echo
  read REPLY_CONFIRM
  if [[ ! "$REPLY_CONFIRM" =~ ^[Yy]$ ]]
  then
    exit 1
  fi
fi

echo
echo -e "${YELLOW}Reindexing search...${NORMAL}"
echo
terminus remote:drush teachersfcu."$REPLY_ENV" search-api-clear main
terminus remote:drush teachersfcu."$REPLY_ENV" search-api-index main
echo
echo -e "${YELLOW}Clearing caches...${NORMAL}"
echo
terminus remote:drush teachersfcu."$REPLY_ENV" cr
echo
