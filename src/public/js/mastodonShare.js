function mastodonShareButtonClick(e) {
    console.log('pressed the button');
    const btn = e.target;
    let href = document.URL;
    let title = document.title;
    if ('data-title' in btn.attributes && 'data-href' in btn.attributes) {
        href = btn.attributes['data-href'].value;
        title = btn.attributes['data-title'].value;
    }
    const mastodonInstance = prompt(`Sharing "${href}"\nPlease enter your Mastodon instance (e.g. mastodon.social) for sharing`);
    if (mastodonInstance == null) {
        return;
    }
    if (mastodonInstance.indexOf('/') === -1) {
        window.open('https://' + mastodonInstance + '/share?text=' + encodeURIComponent(title) + ' ' + encodeURIComponent(href), "_blank");
    } else {
        alert("Please enter your instance without https:// or other paths!");
    }
}

addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('button.mastodon-share');
    buttons.forEach((btn) => {
        btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="mastodon-share-logo" aria-hidden="true"><path d="M480,173.59c0-104.13-68.26-134.65-68.26-134.65C377.3,23.15,318.2,16.5,256.8,16h-1.51c-61.4.5-120.46,7.15-154.88,22.94,0,0-68.27,30.52-68.27,134.65,0,23.85-.46,52.35.29,82.59C34.91,358,51.11,458.37,145.32,483.29c43.43,11.49,80.73,13.89,110.76,12.24,54.47-3,85-19.42,85-19.42l-1.79-39.5s-38.93,12.27-82.64,10.77c-43.31-1.48-89-4.67-96-57.81a108.44,108.44,0,0,1-1-14.9,558.91,558.91,0,0,0,96.39,12.85c32.95,1.51,63.84-1.93,95.22-5.67,60.18-7.18,112.58-44.24,119.16-78.09C480.84,250.42,480,173.59,480,173.59ZM399.46,307.75h-50V185.38c0-25.8-10.86-38.89-32.58-38.89-24,0-36.06,15.53-36.06,46.24v67H231.16v-67c0-30.71-12-46.24-36.06-46.24-21.72,0-32.58,13.09-32.58,38.89V307.75h-50V181.67q0-38.65,19.75-61.39c13.6-15.15,31.4-22.92,53.51-22.92,25.58,0,44.95,9.82,57.75,29.48L256,147.69l12.45-20.85c12.81-19.66,32.17-29.48,57.75-29.48,22.11,0,39.91,7.77,53.51,22.92Q399.5,143,399.46,181.67Z" fill="white"></path></svg>';
        btn.addEventListener('click', mastodonShareButtonClick);
    })
})