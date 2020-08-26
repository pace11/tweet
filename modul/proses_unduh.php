<?php
date_default_timezone_set('Asia/Jakarta');
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library 
 		$consumer_key        = "JLOryjo5q7xQmwcqi8Cx4tS5S";
        $consumer_secret     = "uO9gEDteTKq745QaURt6c8BVexZVotNEj0mLvA1hHGsXPaqhDS";
        $access_token        = "326552398-3p45KU8dDCWlbStGYSCeRlsBFAUaiGY0Uzl3Zo22";
        $access_token_secret = "OOKwoM8vexCae5cvHKkf2TO16tG2VrbrXshXg6fsDfKf0";
        $twitter             = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
       // $twitter->setTimeouts(10, 360000);
$key=$_GET["key"];
$keyname=$_GET["keyname"];

        $keywords = array($keyname);
        // $keywords = array('Ahok','Djarot');
//echo $keywords;
        foreach ($keywords as $value_keyword)
        {
			echo $value_keyword;
            $tweets = $twitter->get("search/tweets", ["q" => $value_keyword,"count"=>100,"result_type"=>"recent"]);
            if(!empty($tweets->statuses))
            {
                foreach ($tweets->statuses as $tweet)
                {
                   // $check_tweet = DB::table('tweets')->where('id_tweet' , $tweet->id_str)->count();
				   $check_tweet=0;
                    if($check_tweet == 0)
                    {

                        if(removeWord($tweet->text) != ''){   
                       
						 $id_tweet = $tweet->id_str;
	  $username = $tweet->user->screen_name;
	  $tweet = removeWord($tweet->text);
	 $date_tweet = date('Y-m-d H:i:s',strtotime($tweet->created_at));
						$query=$mysqli->query("INSERT INTO tweets (`id`,`id_tweet`,`username`,`tweet`,`date_tweet`,`id_keyword`,`status`) VALUES ('$id','$id_tweet','$username','$tweet','$date_tweet','$key','0')");
						//echo "INSERT INTO tweets (`id`,`id_tweet`,`username`,`tweet`,`date_tweet`,`id_keyword`,`status`) VALUES ('$id','$id_tweet','$username','$tweet','$date_tweet','$key','0')";
                        }
                    }
                }
            }
        }
 function removeWord($tweet){
        $tweet_split = explode(' ',$tweet);
        $tweet_new = '';
        foreach ($tweet_split as $key => $value) {
          if((substr($value, 0,4) == 'http') || (substr($value, 0,1) == '@') || (substr($value, 0,2) == 'RT')){
            continue;
          }else{
            $tweet_new .= $value.' ';
          }
        }
        return rtrim($tweet_new);
    }
	 echo "<script>document.location='?page=unduh';</script>";
		?>