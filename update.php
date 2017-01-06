<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'production'; //localhost

include_once('config.inc.php'); // for db login credentials

if($host == 'localhost'){
	$servername = $config['local']['servername'];
	$username = $config['local']['username'];
	$password = $config['local']['password'];
	$db = $config['local']['db'];
}
else {
	$servername = $config['pro']['servername'];
	$username = $config['pro']['username'];
	$password = $config['pro']['password'];
	$db = $config['pro']['db'];	
}


// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$ch = curl_init();
 if (FALSE === $ch)
        throw new Exception('failed to initialize');
	

// Get all 4 usernames here
$data = getDetailedStats($ch, 'jbmtk', $config['api-key']);
storeStats($data,0, $conn);
$data = getDetailedStats($ch, 'tulsarob', $config['api-key']);
storeStats($data,1, $conn);
$data = getDetailedStats($ch, 'I%20have%202%20ears', $config['api-key']);
storeStats($data,2, $conn);

storeStats($data,3, $conn);

//print_r($data); die;
//echo $data->basicStats->kills;



	
curl_close($ch);


echo 'Update Success!';


//$result = mysqli_query($db, $query);
//$row = mysqli_fetch_array($result);


function storeStats($data, $userId, $conn){
	// 0 = jbmtk 1 = tulsarob 2 = i have 2 ears 3 = gnarama
	$query = 'UPDATE stats SET kills = '.$data->basicStats->kills.'
			, kpm = '.$data->basicStats->kpm.'
			, wins = '.$data->basicStats->wins.'
			, losses = '.$data->basicStats->losses.'
			, timePlayed = '.$data->basicStats->timePlayed.'
			, kills = '.$data->basicStats->kills.'
			, deaths = '.$data->basicStats->deaths.'
			
			, heals = '.$data->heals.'
			, revives = '.$data->revives.'
			, highestKillStreak = '.$data->highestKillStreak.'
			, squadScore = '.$data->squadScore.'
			, roundsPlayed = '.$data->roundsPlayed.'
			, accuracy = '.$data->accuracyRatio.'
			, headShots = '.$data->headShots.'
			, kdr = '.$data->kdr.'


		WHERE id='.$userId;
		
	$success = mysqli_query($conn, $query);
	if(!$success){
		printf("Errormessage: %s\n", mysqli_error($conn));
	}
	
}


function getDetailedStats($ch, $userName, $key){
	$request_headers = array();
	$request_headers[] = 'TRN-Api-Key: '. $key;

	curl_setopt($ch, CURLOPT_URL, 'https://battlefieldtracker.com/bf1/api/Stats/DetailedStats?platform=1&displayName='.$userName);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

	$content = curl_exec($ch);
	if (FALSE === $content)
			throw new Exception(curl_error($ch), curl_errno($ch));
		
	$data = json_decode($content,false);
	return $data->result;
}





function is_connected()
{
    $connected = @fsockopen("www.example.com", 80); 
                                        //website, port  (try 80 or 443)
    if ($connected){
		echo "yes";
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
		echo "no";
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

}

?>