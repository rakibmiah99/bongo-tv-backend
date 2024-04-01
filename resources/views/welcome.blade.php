<html>
    <head>
        <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
    </head>
    <body>
    <video
        id="my-video"
        class="video-js"
        controls
        preload="auto"
        width="640"
        height="264"
        poster="MY_VIDEO_POSTER.jpg"
        data-setup="{}"
    >
        <source src="MY_VIDEO.mp4" type="video/mp4" />
        <source src="MY_VIDEO.webm" type="video/webm" />
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank"
            >supports HTML5 video</a
            >
        </p>
    </video>

    <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>
    <script src="'https://unpkg.com/browse/@videojs/http-streaming@3.10.0/dist/videojs-http-streaming.js'"></script>
    <script>
        const player = videojs('my-video');
        player.src({
            src: 'https://bitdash-a.akamaihd.net/content/sintel/hls/playlist.m3u8',
            // src: 'http://127.0.0.1:8000/secrets/video.m3u8',
            type: 'application/x-mpegURL',
            // withCredentials: true
        })
    </script>
    </body>
</html>
