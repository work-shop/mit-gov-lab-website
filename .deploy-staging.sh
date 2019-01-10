#!/bin/bash

source ./.env

# Deploy Theme Files to the Production Domain on Kinsta
scp -P $KINSTA_STAGING_PORT -r ./wp-content/themes/custom $KINSTA_STAGING_USER@$KINSTA_STAGING_IP:./public/wp-content/themes

# Deploy Plugin Files to the Production Domain on Kinsta
scp -P $KINSTA_STAGING_PORT -r ./wp-content/plugins $KINSTA_STAGING_USER@$KINSTA_STAGING_IP:./public/wp-content/

# Deploy Must Use Plugin Files to the Production Domain on Kinsta
scp -P $KINSTA_STAGING_PORT -r ./wp-content/themes/custom $KINSTA_STAGING_USER@$KINSTA_STAGING_IP:./public/wp-content/themes


curl -L http://$KINSTA_STAGING_DOMAIN/kinsta-clear-cache-all/
