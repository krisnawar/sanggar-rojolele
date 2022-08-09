<?php

namespace App\Controllers;

class Video extends FrontPage
{
    protected $API_KEY;
    protected $urlAllVids;
    protected $urlPerVid;
    protected $channelId;
    protected $maxRes;

    public function __construct()
    {
        parent::__construct();
        // $this->API_KEY = 'AIzaSyA5X7w0X16t-WNf5qqUIxeC2rID8Hys4Zg';
        $this->API_KEY = 'AIzaSyA7Ro5BOdpOK9kRvLNy16C9EY-CfCDnw9k';
        $this->urlAllVids = 'https://www.googleapis.com/youtube/v3/';
        $this->urlPerVid = 'https://www.googleapis.com/youtube/v3/videos';
        $this->channelId = 'UC2-9Y4ahfd_Ef3_0OQ8o1CQ';
        $this->maxRes = '9';
    }

    public function getIndex()
    {
        // ini_set('max_execution_time', 0);
        // ini_set('memory_limit', '2048M');
        $this->data['subtitle']             = 'Video';
        $this->data['breadcrumbs']          = array('Beranda', 'Media', 'Video');

        // $vidId = 'Dp8qGyx6aJc';

        if (!$this->request->getVar('page')) {
            $API_URL = $this->urlAllVids . "search?order=date&part=snippet&channelId=" . $this->channelId . "&maxResults=" . $this->maxRes . "&key=" . $this->API_KEY;
        } else {
            $API_URL = $this->urlAllVids . "search?order=date&pageToken=" . $this->request->getVar('page') . "&part=snippet&channelId=" . $this->channelId . "&maxResults=" . $this->maxRes . "&key=" . $this->API_KEY;
        }

        $hasil = json_decode($this->url_get_contents($API_URL));

        // $hasil = json_decode(file_get_contents('assets\admin\json\listVid.json'));

        if (isset($hasil->prevPageToken)) {
            $this->data['prevPageToken']    = $hasil->prevPageToken;
        }
        if (isset($hasil->nextPageToken)) {
            $this->data['nextPageToken']    = $hasil->nextPageToken;
        }

        $this->data['listVid']              = $hasil;

        // $API_VID = $urlPerVid . "?part=snippet&id=" . $vidId . "&key=" . $key;

        // echo 'URL video: ' . $API_VID;

        $this->data['description']  = 'Sanggar Rojolele merupakan kelompok kolektif yang dikelola pemuda desa Kaibon, Delanggu, Klaten, berfokus pada Seni Budaya kerakyatan, literasi, kreatifitas daur ulang dan kegiatan dunia anak-anak';
        $this->data['keywords']     = 'organisasi kebudayaan, petani milenial, festival mbok sri mulih, delanggu, klaten, rojolele, non profit organization';

        return view('front/video', $this->data);
    }

    public function getView($videoId)
    {
        $this->data['subtitle']             = 'Video';
        $this->data['breadcrumbs']          = array('Beranda', 'Media', 'Video', 'View Video');

        // $hasil = json_decode(file_get_contents('assets\admin\json\listVid.json'));

        $API_VID = $this->urlPerVid . "?part=snippet&id=" . $videoId . "&key=" . $this->API_KEY;
        $hasil = json_decode($this->url_get_contents($API_VID));

        $this->data['infoVid']              = $hasil->items[0];

        $this->data['description']  = 'Sanggar Rojolele merupakan kelompok kolektif yang dikelola pemuda desa Kaibon, Delanggu, Klaten, berfokus pada Seni Budaya kerakyatan, literasi, kreatifitas daur ulang dan kegiatan dunia anak-anak';
        $this->data['keywords']     = 'organisasi kebudayaan, petani milenial, festival mbok sri mulih, delanggu, klaten, rojolele, non profit organization';

        // dd($hasil);
        return view('front/viewvideo', $this->data);
    }

    function url_get_contents($url)
    {
        if (!function_exists('curl_init')) {
            die('CURL is not installed!');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
