let script_axios = document.createElement('script'),
    host = window.location.host,
    url = window.location.href,
    tracking_id = script.getAttribute('id');

script_axios.src='https://unpkg.com/axios/dist/axios.min.js';
document.getElementsByTagName('head')[0].appendChild(script_axios);
script_axios.onload = function() {
    let tracking_url;
    if (host=='webfoco.app')
         tracking_url = 'https://webfoco.app/tracking/';
    else tracking_url = 'https://tracker.lucasmoreira.com.br/tracking/';
    axios.get(tracking_url + tracking_id + '/' + btoa(url));
};