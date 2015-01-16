<?php
/**
 * LOL Class
 * Author: Harings Rob
 * Homepage: http://harings.be
 *
 * League of legends api class
 */
namespace LOL\Base;

class LOL
{

    private $api_key;
    private $region;
    private $locale_code;

    /**
     * Set the config variables we might use later.
     * @param  [type] $api_key     [description]
     * @param  [type] $region      [description]
     */
    public function setconfig($api_key, $region, $locale_code = 'en_US')
    {
        $this->api_key = $api_key;
        $this->region = $region;
        $this->locale_code = $locale_code;
    }

    private function geturl($data, $apiv, $special = false, $ea = false)
    {
        if ($special == 'shardinfo') {
            return 'http://status.leagueoflegends.com/'.$data;
        } elseif ($special == 'static-data') {
            if ($ea) {
                return 'https://global.api.pvp.net/api/lol/static-data/'.$this->region.'/v'.$apiv.'/'.$data.'?api_key='.$this->api_key.$ea;
            } else {
                return 'https://global.api.pvp.net/api/lol/static-data/'.$this->region.'/v'.$apiv.'/'.$data.'?api_key='.$this->api_key;
            }
        } else {
            if ($ea) {
                return 'https://'.$this->region.'.api.pvp.net/api/lol/'.$this->region.'/v'.$apiv.'/'.$data.'?api_key='.$this->api_key.'&'.$ea;
            } else {
                return 'https://'.$this->region.'.api.pvp.net/api/lol/'.$this->region.'/v'.$apiv.'/'.$data.'?api_key='.$this->api_key;
            }
        }
    }

    /**
     * Get a specific summoner data by name
     * @param  [type] $summoner [description]
     * @return [type]           [description]
     */
    public function getsummoner($summoner)
    {
        // init array
        $summonerdata = array();
        // api version
        $apiv = '1.4';
        // Get the data
        $summonerdata = json_decode(
            $this->get_url_contents(
                $this->geturl('summoner/by-name/'.$summoner, $apiv)
            )
        );

        // return data
        return $summonerdata;
    }

    /**
     * Get a specific summoner data id
     * @param  [type] $id       [description]
     * @return [type]           [description]
     */
    public function getsummonerbyid($id)
    {
        // init array
        $summonerdata = array();
        // api version
        $apiv = '1.4';
        // Get the data
        $summonerdata = json_decode(
            $this->get_url_contents(
                $this->geturl('summoner/'.$id, $apiv)
            )
        );

        // return data
        return $summonerdata;
    }

    /**
     * Get extended profile data
     * @param  [type] $id       [description]
     * @param  string $datatype [description]
     * @return [type]           [description]
     */
    public function getsummonerdata($id, $datatype = 'masteries')
    {
        // init array
        $summonerdata = array();
        // api version
        $apiv = '1.4';
        // Get the data
        $summonerdata = json_decode(
            $this->get_url_contents(
                $this->geturl('summoner/'.$id.'/'.$datatype, $apiv)
            )
        );

        // return data
        return $summonerdata;
    }

    /**
     * Get ranked statistics
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function summoner_rankedstats($id)
    {
        // init array
        $summonerdata = array();
        // api version
        $apiv = '1.3';
        // Get the data
        $summonerdata = json_decode(
            $this->get_url_contents(
                $this->geturl('stats/by-summoner/'.$id.'/ranked', $apiv)
            )
        );

        // return data
        return $summonerdata;
    }

    /**
     * Get summoner summary
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function summoner_summary($id)
    {
        // init array
        $summonerdata = array();
        // api version
        $apiv = '1.3';
        // Get the data
        $summonerdata = json_decode(
            $this->get_url_contents(
                $this->geturl('stats/by-summoner/'.$id.'/summary', $apiv)
            )
        );

        // return data
        return $summonerdata;
    }

    /**
     * Get match h istory of a specific summoner
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function summoner_matchhistory($id)
    {
        // init array
        $summonerdata = array();
        // api version
        $apiv = '2.2';
        // Get the data
        $summonerdata = json_decode(
            $this->get_url_contents(
                $this->geturl('matchhistory/'.$id, $apiv)
            )
        );

        // return data
        return $summonerdata;
    }

    /**
     * Get recent matches
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function summoner_recentgames($id)
    {
        // init array
        $summonerdata = array();
        // api version
        $apiv = '1.3';
        // Get the data
        $summonerdata = json_decode(
            $this->get_url_contents(
                $this->geturl('game/by-summoner/'.$id.'/recent', $apiv)
            )
        );

        // return data
        return $summonerdata;
    }


    /**
     * Get a specific match
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function summoner_match($id)
    {
        // init array
        $summonerdata = array();
        // api version
        $apiv = '2.2';
        // Get the data
        $summonerdata = json_decode(
            $this->get_url_contents(
                $this->geturl('match/'.$id, $apiv)
            )
        );

        // return data
        return $summonerdata;
    }

    /**
     * Get a list of servers and status
     * @param  boolean $region [description]
     * @return [type]          [description]
     */
    public function shard_list($region = false)
    {
        // init array
        $summonerdata = array();
        // api version
        $apiv = '1.0';
        // Get the data
        if ($region) {
            $summonerdata = json_decode(
                $this->get_url_contents(
                    $this->geturl('shards/'.$region, $apiv, 'shardinfo')
                )
            );
        } else {
            $summonerdata = json_decode(
                $this->get_url_contents(
                    $this->geturl('shards', $apiv, 'shardinfo')
                )
            );
        }

        // return data
        return $summonerdata;
    }

    /**
     * Get champion data as list or specific item
     * @param  boolean $ftp [description]
     * @param  boolean $id  [description]
     * @return [type]       [description]
     */
    public function get_champions($ftp = false, $id = false)
    {
        if ($ftp) {
            $extraargument = 'freeToPlay=true';
        } else {
            $extraargument = false;
        }
        // init array
        $summonerdata = array();
        // api version
        $apiv = '1.2';
        // Get the data
        if ($id) {
            $summonerdata = json_decode(
                $this->get_url_contents(
                    $this->geturl('champion/'.$id, $apiv)
                )
            );
        } else {
            $summonerdata = json_decode(
                $this->get_url_contents(
                    $this->geturl('champion', $apiv, false, $extraargument)
                )
            );
        }

        // return data
        return $summonerdata;
    }


    public function get_game_data($type, $id = false, $extraargument = false)
    {
        // Append the argument
        if ($extraargument) {
            $adddata = '&'.$this->type_to_argument($type).'='.$extraargument;
        } else {
            $adddata = '';
        }

        // init array
        $summonerdata = array();
        // api version
        $apiv = '1.2';
        // Get the data
        if ($id) {
            $summonerdata = json_decode(
                $this->get_url_contents(
                    $this->geturl($type.'/'.$id, $apiv, 'static-data', $adddata)
                )
            );
        } else {
            $summonerdata = json_decode(
                $this->get_url_contents(
                    $this->geturl($type, $apiv, 'static-data', $adddata)
                )
            );
        }

        // return data
        return $summonerdata;
    }

    private function type_to_argument($type) {
        $array = array(
            'champion'  => 'champData',
            'item'      => 'itemData',
            'mastery'   => 'masteryData',
            'rune'      => 'runeData',
            'summoner-spell' => 'spellData'
        );

        return $array[$type];
    }

    /**
    * Function to get url contents
    * @param  [string] $url
    * @return [data]
    */
    private function get_url_contents($url, $token = false, $put = false)
    {
        $crl = curl_init();
        curl_setopt_array($crl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CONNECTTIMEOUT => 5
        ));

        if ($put!=false) {
            curl_setopt($crl, CURLOPT_CUSTOMREQUEST, "PUT");
        }

        if ($token!=false) {

            $headers = array(
                'Authorization: OAuth ' . $token,
                'Accept: application/vnd.twitchtv.v2+json'
            );

            if($put==true){
                $headers = array(
                    'Authorization: OAuth ' . $token,
                    'Accept: application/vnd.twitchtv.v2+json',
                    'Content-Length: 0'
                );
            }

            curl_setopt($crl, CURLOPT_HTTPHEADER, $headers);
        }

        $ret = curl_exec($crl);
        curl_close($crl);

        return $ret;
    }

    /**
    * Function to get post url contents
    * @param  [string] $url
    * @param  [array] $fields
    * @return [data]
    */
    private function post_url_contents($url, $fields)
    {

        foreach($fields as $key=>$value) { 
            $fields_string .= $key.'='.urlencode($value).'&'; 
        }

        rtrim($fields_string, '&');

        $crl = curl_init();
        $timeout = 5;

        curl_setopt($crl, CURLOPT_URL,$url);
        curl_setopt($crl,CURLOPT_POST, count($fields));
        curl_setopt($crl,CURLOPT_POSTFIELDS, $fields_string);

        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
    }
}
?>