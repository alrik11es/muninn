
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('agent-selector', require('./components/AgentSelectorComponent.vue'));
Vue.component('tags', require('./components/TagsComponent.vue'));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

// Vue.component('editor', {
//     components: {
//         editor: require('vue2-ace-editor'),
//     },
//     methods: {
//         editorInit: function () {
//             require('brace/ext/language_tools');
//             require('brace/mode/html');
//             require('brace/mode/javascript');
//             require('brace/mode/less');
//             require('brace/theme/chrome');
//             require('brace/snippets/javascript');
//         }
//     },
// });
//
// Vue.component(
//     'editor',
//     require('vue2-ace-editor')
// );


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

import 'ace-builds/src-min-noconflict/ace' // Load Ace Editor

// Import initial theme and mode so we don't have to wait for 2 extra HTTP requests
import 'ace-builds/src-min-noconflict/theme-chrome'
import 'ace-builds/src-min-noconflict/mode-php'

// cdnjs didn't have a "no-conflict" version, so we'll use jsdelivr
const CDN = 'https://cdn.jsdelivr.net/npm/ace-builds@1.3.3/src-min-noconflict';

// Now we tell ace to use the CDN locations to look for files
ace.config.set('basePath', CDN);
ace.config.set('modePath', CDN);
ace.config.set('themePath', CDN);
ace.config.set('workerPath', CDN);

// Create Editor
const editor = ace.edit('editor');

// Set Editor Theme and Mode
editor.setTheme('ace/theme/chrome');
editor.session.setMode('ace/mode/php');
