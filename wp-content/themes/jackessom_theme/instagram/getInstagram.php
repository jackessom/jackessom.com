<?php

function getJson($url) {
    $instagramUrl = 'https://api.instagram.com/v1/users/22722329/media/recent/?access_token=22722329.f6a3d2c.d7c207f671ac4b6f8b15e58276f7f6f2';
    $cacheFile =  get_template_directory() . '/instagram/cache.json';
    $time = time();
    $last_modified = filemtime($cacheFile);
    
    //14400 - 4 Hours (900 = 15 mins)
    if ($time - $last_modified > 900 || !file_exists($cacheFile)){
        
        $feed = file_get_contents($instagramUrl);
        file_put_contents($cacheFile, $feed);
    }
    
    $fh = file_get_contents($cacheFile);
   
    $instagram_feed = json_decode($fh, true);
    return $instagram_feed;
}

function getFeed($url) {
    $feed = getJson();
    $images = array();
    $count = 0;
    foreach( $feed['data'] as $item ) {
        $images[] = array (
            'title' => $item['caption']['text'],
            'link' => $item['link'],
            'image' => $item['images']['standard_resolution']['url'],
            'width' => $item['images']['standard_resolution']['width']
        );
        if($count > 8) {
            break;
        }
        $count++;
    }

    return $images;
}

function getLocation($url) {
    $feed = getJson();

    foreach( $feed['data'] as $item ) {
        if ($location = $item['location']['name']) {
            $location = $item['location']['name'];
            break;
        }   
    }

    return $location;
}





