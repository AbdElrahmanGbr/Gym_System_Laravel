window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {}

/**
<<<<<<< HEAD
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
=======
 We'll load jQuery and the Bootstrap jQuery plugin which provides support
>>>>>>> d327182f648f8d48c4f933b4a1d42f2c5853cdf4
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

 try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
