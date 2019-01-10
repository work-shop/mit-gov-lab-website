'use strict';

// global.$ = require('jquery');
// global.jQuery = global.$;
// window.$ = global.$;

import { config } from './config.js';
import { loading } from './loading.js';
import { viewportLabel } from './viewport-label.js';
import { livereload } from './livereload-client.js';

livereload();

viewportLabel();

loading(config.loading);
