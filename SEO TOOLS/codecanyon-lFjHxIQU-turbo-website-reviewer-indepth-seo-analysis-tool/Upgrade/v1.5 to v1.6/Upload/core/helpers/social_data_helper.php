<?php

/*
* @author Balaji
* @name Turbo Website Reviewer - PHP Script
* @copyright 2018 ProThemes.Biz
*
*/

function clearSocialData($data){
    $data = str_replace(array(',','.','-','+','_', ' ', '$', '%', '<', '>','<br>','?','/','!','@','#','~',"'",'"'), '', $data);
    return intval(trim($data));
}

function getSocialData($source){
    $matches = array();
    $fbCount = $twitCount = $plusCount = 0;
    $fbMatch = '#https?\://(?:www\.)?facebook\.com/(\d+|[A-Za-z0-9\.]+)/?#';
    $twiMatch = '#https?\://(?:www\.)?twitter\.com/(\d+|[A-Za-z0-9\.]+)/?#';
    $plusMatch = '#https?\://plus\.google\.com/(\d+|[A-Za-z0-9\.\+]+)/?#';
    $plusMatch2 = '/plus\.google\.com\/.?\/?.?\/?([0-9]*)/i';

    preg_match($fbMatch,$source,$matches);

    if(isset($matches[1])){
        if($matches[1] != ''){
            $fdata = curlGET($matches[0]);
            if($fdata != '') {
                if (preg_match_all('/>([0-9,]+) people like this</i', $fdata, $matches))
                    $fbCount = clearSocialData($matches[1][0]);
                else
                    $fbCount = clearSocialData(getCenterText('_4bl9"><div>', ' ', $fdata));
            }
        }
    }

    preg_match($twiMatch,$source,$matches);

    if(isset($matches[1])){
        if($matches[1] != '' && $matches[1] != 'share'){
            $tdata = simpleCurlGET($matches[0]);
            if($tdata != '') {
                $followers = getCenterText('<span class="u-hiddenVisually">Followers</span>', '</span>', $tdata);
                $twitCount = clearSocialData(getCenterText('data-count=', ' ', $followers));
            }
        }
    }

    preg_match($plusMatch,$source,$matches);

    if(isset($matches[1])){
        if($matches[1] === 'u'){
            preg_match($plusMatch2,$source,$matches);

            if(isset($matches[0])){
                if($matches[0] != ''){
                    $gdata = curlGET('https://'.$matches[0]);

                    if($gdata != '') {
                        if (preg_match_all('/>([0-9,]+) followers</i', $gdata, $matches))
                            $plusCount = clearSocialData($matches[1][0]);
                    }
                }
            }
        }elseif($matches[1] != ''){
            $gdata = curlGET($matches[0]);
            if($gdata != '') {
                if (preg_match_all('/>([0-9,]+) followers</i', $gdata, $matches))
                    $plusCount = clearSocialData($matches[1][0]);
            }
        }
    }
    return array('fb' => $fbCount, 'twit' => $twitCount, 'gplus' => $plusCount);
}