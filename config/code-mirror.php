<?php

// Fixes CodeMirror not initializaing itself when not on the first tab
// see https://github.com/luwes/craft3-codemirror/issues/10
return [
    'jsOptions' => [
        'autoRefresh' => true,
        'lineNumbers' => true,
    ],
    'addons' => [
        'display/autorefresh',
    ],
];
