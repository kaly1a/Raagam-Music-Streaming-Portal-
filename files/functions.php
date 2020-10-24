<?php 
$conn = new mysqli("localhost","root","","raagam");

function get_user_by_username($conn,$username){
	$sql = "SELECT * FROM users WHERE username = '{$username}'";
 	$res = $conn->query($sql);
 	$data = $res->fetch_assoc();
 	if($data==null){
 		return array(); 
 	}else{
 		return $data;
 	}
}



// get top 10 songs
function get_latest_songs($conn){
	$songs = get_all_songs($conn);
	$_songs = array( );
 
	foreach ($songs as $key => $song) {
		$song['view_count'] = get_song_views($conn,$song['song_id']);
		$song['download_count'] = get_song_downloads($conn,$song['song_id']);
		array_push($_songs, $song);
	}

	$i  = 0;
	$j  = 0;

	for($j = 0; $j < (count($_songs) - 1);$j++) {
		for($i = 0; $i < (count($_songs) - 1);$i++) {
			if($_songs[$i]['song_id'] < $_songs[$i+1]['song_id'] ){
				$temp = $_songs[$i];
				$_songs[$i] = $_songs[$i+1];
				$_songs[$i+1] = $temp;
			}
		}
	}

 
 
  
 	return $_songs;
}
    

// get top 10 songs
function get_by_artist_id($conn,$artist_id){
	$songs = get_all_songs($conn);
	$_songs = array( );
 
	foreach ($songs as $key => $song) {
		$song['view_count'] = get_song_views($conn,$song['song_id']);
		$song['download_count'] = get_song_downloads($conn,$song['song_id']);
		if($artist_id == $song['artist_id']){
			array_push($_songs, $song);
		}
	}

	$i  = 0;
	$j  = 0;

	for($j = 0; $j < (count($_songs) - 1);$j++) {
		for($i = 0; $i < (count($_songs) - 1);$i++) {
			if($_songs[$i]['view_count'] < $_songs[$i+1]['view_count']){
				$temp = $_songs[$i];
				$_songs[$i] = $_songs[$i+1];
				$_songs[$i+1] = $temp;
			}
		}
	} 
 	return $_songs;
}




// get top 10 songs
function get_top_songs($conn){
	$songs = get_all_songs($conn);
	$_songs = array( );
 
	foreach ($songs as $key => $song) {
		$song['view_count'] = get_song_views($conn,$song['song_id']);
		$song['download_count'] = get_song_downloads($conn,$song['song_id']);
		array_push($_songs, $song);
	}

	$i  = 0;
	$j  = 0;

	for($j = 0; $j < (count($_songs) - 1);$j++) {
		for($i = 0; $i < (count($_songs) - 1);$i++) {
			if($_songs[$i]['view_count'] < $_songs[$i+1]['view_count']){
				$temp = $_songs[$i];
				$_songs[$i] = $_songs[$i+1];
				$_songs[$i+1] = $temp;
			}
		}
	} 
 	return $_songs;
}


//song view count
function get_song_downloads($conn,$song_id){
	$sql = "SELECT count(download_id) AS download  FROM downloads WHERE song_id = {$song_id}";
 	$res = $conn->query($sql);
 	$views = array();  
  	$data = $res->fetch_assoc(); 
  	return $data['download'];
}



//song view count
function get_song_views($conn,$song_id){
	$sql = "SELECT count(view_id) AS view_count  FROM views WHERE song_id = {$song_id}";
 	$res = $conn->query($sql);
 	$views = array();  
  	$data = $res->fetch_assoc(); 
  	return $data['view_count'];
}


function record_view($conn,$song_id,$user_id){
	$view_time = time();
	$sql = "INSERT INTO `views` 
			(song_id,user_id,view_time)
			VALUES 
			(
				{$song_id},{$user_id},'{$view_time}'
			)
	";

 	if($conn->query($sql)){

 	}else{

 	}
 	
}




function record_dowload($conn,$song_id,$user_id){
	$download_time = time();
	$sql = "INSERT INTO `downloads` 
			(song_id,user_id,download_time)
			VALUES 
			(
				{$song_id},{$user_id},'{$download_time}'
			)
	";

 	if($conn->query($sql)){

 	}else{

 	}
 	
}




function get_artist_by_artist_id($conn,$artist_id){
	$sql = "SELECT name FROM artists WHERE id = {$artist_id};";
 	$res = $conn->query($sql);
 	$data = $res->fetch_assoc(); 
 	return $data['name'];
}


function message($body,$type){
	$_SESSION['message']['body'] = $body;
	$_SESSION['message']['type'] = $type;
}

function get_all_songs($conn){
    //working
	$sql = "SELECT id,title,album,artist,genre FROM songs
            ORDER BY id ASC";
    /*$sql="select id,title,album,artist,genre
            from artists a inner join songs s on
            a.id =s.artist inner join genres g on 
            g.id = s.genre";
    $sql="select id,title,album,artist,genre 
 from songs s, 
artists a, genres g where a.id=s.artist  and 
s.genre = g.id";*/
    /*$sql="SELECT * FROM artists INNER JOIN songs ON artists.id = songs.artist INNER JOIN genres ON genres.id = songs.genre";*/
 	$res = $conn->query($sql);
 	$songs = array();  
  	while ($data = $res->fetch_assoc()) {
  		array_push($songs, $data);
 	}
 	return $songs;
}

function get_all_artists($conn){
    //working
	$sql = "SELECT * FROM artists ORDER BY id ASC";
 	$res = $conn->query($sql);
 	$artists = array();  
  	while ($data = $res->fetch_assoc()) {
  		array_push($artists, $data);
 	}
 	return $artists;
}

function get_all_albums($conn){
    //working
	$sql = "SELECT * FROM albums ORDER BY id ASC";
 	$res = $conn->query($sql);
 	$albums = array();  
  	while ($data = $res->fetch_assoc()) {
  		array_push($albums, $data);
 	}
 	return $albums;
}

function get_all_genre($conn){
    //working
	$sql = "SELECT * FROM genres ORDER BY id ASC";
 	$res = $conn->query($sql);
 	$genre = array();  
  	while ($data = $res->fetch_assoc()) {
  		array_push($genre, $data);
 	}
 	return $genre;
}

function get_all_users($conn){
    //working
	$sql = "SELECT * FROM users ORDER BY id ASC";
 	$res = $conn->query($sql);
 	$users = array();  
  	while ($data = $res->fetch_assoc()) {
  		array_push($users, $data);
 	}
 	return $users;
}

function get_all_feedbacks($conn){
    //working
	$sql = "SELECT * FROM feedback";
 	$res = $conn->query($sql);
 	$feedbacks = array();  
  	while ($data = $res->fetch_assoc()) {
  		array_push($feedbacks, $data);
 	}
 	return $feedbacks;
}

function submit_feedback($conn, $feedback, $usrID)
{
	$sql = "INSERT INTO `feedback` (user_id, feedback) VALUES ( {$usrID},'{$feedback}')";
 	$res = $conn->query($sql);
}

 // function get_top_song_by_song_id($conn,$song_id){
    
 //     //not working
 // 	$sql = "SELECT * FROM songs
// 			WHERE id = '{$song_id}'";
//  	$res = $conn->query($sql);
//     $_song = $res->fetch_assoc();
//  	return $_song;
// }

// function get_top_song_by_song_id($conn,$song_id){

// 	$sql = "SELECT * FROM artists,songs
// 			WHERE
// 				songs.id = {$song_id}	AND
// 				artists.id= songs.artist	
// 			ORDER BY artists.name ASC";
//  	$res = $conn->query($sql);
//  	$song = $res->fetch_assoc();
//  	return $song;
// }

function get_top_song_by_song_id($conn,$song_id){

	$sql = "SELECT * FROM songs
			WHERE
				songs.id = {$song_id}";	
 	$res = $conn->query($sql);
 	$song = $res->fetch_assoc();
 	return $song;
}
function get_album_by_id($conn,$album_id){

	$sql = "SELECT * FROM albums
			WHERE
				albums.id = {$album_id}";	
 	$res = $conn->query($sql);
 	$alb = $res->fetch_assoc();
 	return $alb;
}

function get_artist_from_album($conn,$album_id){

	$sql = "SELECT artist FROM albums
			WHERE
				albums.id = {$album_id}";	
 	$res = $conn->query($sql);
 	$art = $res->fetch_assoc();
 	return $art['artist'];
}

function get_genre_from_album($conn, $album_id){

	$sql = "SELECT genre FROM albums
			WHERE
				id = {$album_id}";	
 	$res = $conn->query($sql);
 	$gen = $res->fetch_assoc();
 	return $gen['genre'];
}

function get_genre_from_id($conn, $genre_id){

	$sql = "SELECT name FROM genres
			WHERE
				id = {$genre_id}";	
 	$res = $conn->query($sql);
 	$gen = $res->fetch_assoc();
 	return $gen['name'];
}
function get_album_from_id($conn, $album_id){

	$sql = "SELECT title FROM albums
			WHERE
				id = {$album_id}";	
 	$res = $conn->query($sql);
 	$alb = $res->fetch_assoc();
 	return $alb['title'];
}
