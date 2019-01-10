#!/bin/bash

source ./.env

# Deploy Theme Files to the Production Domain on Kinsta
scp -P $KINSTA_PRODUCTION_PORT -r ./wp-content/themes/custom $KINSTA_PRODUCTION_USER@$KINSTA_PRODUCTION_IP:./public/wp-content/themes

# Deploy Plugin Files to the Production Domain on Kinsta
scp -P $KINSTA_PRODUCTION_PORT -r ./wp-content/plugins $KINSTA_PRODUCTION_USER@$KINSTA_PRODUCTION_IP:./public/wp-content/

# Deploy Must Use Plugin Files to the Production Domain on Kinsta
scp -P $KINSTA_PRODUCTION_PORT -r ./wp-content/themes/custom $KINSTA_PRODUCTION_USER@$KINSTA_PRODUCTION_IP:./public/wp-content/themes


curl -L http://$KINSTA_PRODUCTION_DOMAIN/kinsta-clear-cache-all/
