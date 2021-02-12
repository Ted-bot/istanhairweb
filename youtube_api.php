<?php
if (isset($_POST["search"])){
    $search = $_POST["search"];

    function youtubeSearch ($search) {
        require __DIR__ . '/vendor/autoload.php';
        // Loads .env file token

        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $API_key  = $_ENV['YOUTUBE_TOKEN'];
        $channelID  = 'UCSX8u8oui51cdUj3pQxszhA';
        $maxResults = 10;

        header('Content-type: application/json');
        $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&q='.$search.'&key='.$API_key.''));
                    
            foreach($videoList->items as $item){

                    $search = <<<DELIMETER
                        <div>
                            <div class="youtube-video" 
                                style="display: inline-flex; position: relative;  aspect-ratio: 16/9; width:300px; max-height: 250px; border:solid 1px lightgrey;"
                                >
                                <iframe width="280" height="150" src="https://www.youtube.com/embed/{$item->id->videoId}" frameborder="0" allowfullscreen></iframe>
                                <h2> {$item->snippet->title} </h2>
                            </div>
                            <a href="youtube-upload.php?select-videoId={$item->id->videoId}&video-title={$item->snippet->title}" id="getSelectedYoutubeId" style="position: absolute; z-index: 30; border-radius: 2px; border: none; background-color:blue; opacity:85%; margin-top: 5px;">
                                <i class="fas fa-check-circle"></i>
                            </a>
                        </div>
DELIMETER;
                }
                echo $search;
            }

    youtubeSearch($search);
}
?>