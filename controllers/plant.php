<?php 
require_once 'config/api_trefle.php';
require_once 'config/calendar/vendor/autoload.php';
$title = 'The Green Thumb - Plant';

if(empty($_SESSION['login'])){
    header('Location: signup');
    exit;
}

/**
* API trefle.io (to get the plant's informations)
* >> REST API
*/
//Get q param
$id = basename($_GET['q']);

// Create URL
$url = 'https://trefle.io/api/plants/'.$id.'?token='.TOKEN_TREFLE;
// Make request to API if the id exist
// Cache info
$cacheKey = md5($url);
$cachePath = 'cache/'.$cacheKey;
//If Request has been done before and younger than a week
if(file_exists($cachePath) && time() - filemtime($cachePath) < 604800)
{
    $result = file_get_contents($cachePath);
    $result = json_decode($result, true);
}else{
    if(get_headers($url)[0]=='HTTP/1.1 200 OK')
    {
        $result = file_get_contents($url);
        // Decode JSON
        $result = json_decode($result);
        //Saving important informations in an array
        $result = [
            'name' => $result->common_name,
            'scientific_name' => $result->scientific_name,
            'shape_and_orientation' => $result->main_species->specifications->shape_and_orientation,
            'mature_height' => $result->main_species->specifications->mature_height->cm,
            'lifespan' => $result->main_species->specifications->lifespan,
            'growth_period' => $result->main_species->specifications->growth_period,
            'growth_habit' => $result->main_species->specifications->growth_habit,
            'images' => $result->images,
            'temperature_minimum' => $result->main_species->growth->temperature_minimum->deg_c,
            'precipitation_minimum' => $result->main_species->growth->precipitation_minimum->cm,
            'precipitation_maximum' => $result->main_species->growth->precipitation_maximum->cm,
            'flower_color' => $result->main_species->flower->color,
            'duration' => $result->duration
        ];
        $result = json_encode($result);
        file_put_contents($cachePath, $result);
        $result = json_decode($result,true);
    }else
    {
        //If the plant is not found
        $result = 'NOT FOUND'; 
    }
}

/**
 * Favorites infos
 */
$favorites = [];
$export = new SplFixedArray(3);
$data = [];

//Get saved fav
$temp = $pdo->query('SELECT * FROM plants WHERE idplant = '.$id.' AND mailuser = \''.$_SESSION['login'].'\'');
$temp = $temp->fetch();
//If datas found
if($temp)
{
    //get data to prepare pdo
    if(isset($_POST['add'])){
        if(!empty($_POST['PHP_favBox'])) {
        // Counting number of checked checkboxes.
            $checked_count = count($_POST['PHP_favBox']);
            // Loop to store values of individual checked checkbox.
            for ($i=0; $i < count($_POST['PHP_favBox']); $i++) { 
                $export[$i] = $_POST['PHP_favBox'][$i];
            }
            for ($i=count($_POST['PHP_favBox']); $i < 3; $i++) { 
                $export[$i] = '';
            }
            //Save fav of this plant to database
            //What we want to insert
            $data = [
                'idplant' => basename($_GET['q']),
                'mailuser' => $_SESSION['login'],
                'plantinfoa' => $export[0],
                'plantinfob' => $export[1],
                'plantinfoc' => $export[2],
            ];
            //Add to fav
            if ($data) {
                //Update dont work
                $prepare = $pdo->prepare('UPDATE plants SET plantinfoa = :plantinfoa, plantinfob = :plantinfob, plantinfoc = :plantinfoc WHERE (idplant = :idplant AND mailuser = :mailuser)');
                // Injection
                $execute = $prepare->execute($data);
                
                //Get all fav
                $temp = $pdo->query('SELECT * FROM plants WHERE idplant = '.$id.' AND mailuser = \''.$_SESSION['login'].'\'');
                $temp = $temp->fetch();
            }
        }
    }
}else{
    //get data to prepare pdo
    if(isset($_POST['add'])){
        if(!empty($_POST['PHP_favBox'])) {
        // Counting number of checked checkboxes.
            $checked_count = count($_POST['PHP_favBox']);
            // Loop to store values of individual checked checkbox
            for ($i=0; $i < count($_POST['PHP_favBox']); $i++) { 
                $export[$i] = $_POST['PHP_favBox'][$i];
            }
            for ($i=count($_POST['PHP_favBox']); $i <= 2; $i++) { 
                $export[$i] = '';
            }
            //Save fav of this plant to database
            //What we want to insert
            $data = [
                'mailuser' => $_SESSION['login'],
                'idplant' => basename($_GET['q']),
                'plantinfoa' => $export[0],
                'plantinfob' => $export[1],
                'plantinfoc' => $export[2]
            ];
        }
    }
    if ($data) {
        $prepare = $pdo->prepare('INSERT INTO plants (mailuser, idplant, plantinfoa, plantinfob, plantinfoc) VALUES (:mailuser, :idplant, :plantinfoa, :plantinfob, :plantinfoc)');
        // Injection
        $execute = $prepare->execute($data);

        //Get all fav
        $temp = $pdo->query('SELECT * FROM plants WHERE idplant = '.$id.' AND mailuser = \''.$_SESSION['login'].'\'');
        $temp = $temp->fetch();
    }
}

//Remove from fav

//Update dont work
for ($i=0; $i <= 2; $i++) { 
    if(isset($_POST[$i])){
        ($i==0 ? $value = 'plantinfoa' :($i==1 ? $value = 'plantinfob' : $value ='plantinfoc'));
        $data = [
            'mailuser' => $_SESSION['login'],
            'idplant' => basename($_GET['q']),
            'newvalue' => '',
        ];
        

        $prepare = $pdo->prepare('UPDATE plants SET '.$value.' = :newvalue WHERE (idplant = :idplant AND mailuser = :mailuser)');
        $execute = $prepare->execute($data);

        //Get all fav
        $temp = $pdo->query('SELECT * FROM plants WHERE idplant = '.$id.' AND mailuser = \''.$_SESSION['login'].'\'');
        $temp = $temp->fetch();
    }
}

$favorites = [
    $temp->plantinfoa,
    $temp->plantinfob,
    $temp->plantinfoc,
];

//L'enfer a un nom
/**
 * GOOGLE CALENDAR
 */

// //Begin the auth
// $client = new Google_Client();
// //Get the auth file
// $application_creds = 'credentials.json';
// $credentials_file = file_exists($application_creds) ? $application_creds : false;
// //Define the scope => View, edit and delete == calendar
// define("SCOPE",Google_Service_Calendar::CALENDAR);
// //Name of the project (create with Google)
// define("APP_NAME","ProjectH2T2");

// //Auth
// $client->setAuthConfig($credentials_file);
// $client->setApplicationName(APP_NAME);
// $client->setScopes([SCOPE]);
// $service = new Google_Service_Calendar($client);
// $id = 'event-id';
// $event = $service->events->get('primary',$id);

// //Make the new user
// $attendeeNew = new Google_Service_Calendar_EventAttendee();

// //His mail
// $attendeeNew->setEmail('mail@test.com');
// $attendeeNew->setResponseStatus('accepted');
// $attendeeNew->setOrganizer(true);
// $attedess = $event->getAttendees();
// array_push($attedess,$attendeeNew);
// $event->setAttendees($attedess);
// $updatedEvent = $service->events->update('primary', $id, $event);
// var_dump($updatedEvent->getAttendees());


//Event creation
// $client = new Google_Client();
// $application_creds = '../credentials.json';
// $credentials_file = file_exists($application_creds) ? $application_creds : false;
// define("SCOPE",Google_Service_Calendar::CALENDAR);
// define("APP_NAME","ProjectH2T2");
// $client->setAuthConfig($credentials_file);
// $client->setApplicationName(APP_NAME);
// $client->setScopes([SCOPE]);
// $service = new Google_Service_Calendar($client);
// $event = new Google_Service_Calendar_Event(array(
// 	'summary' => 'Test',
//   	'location' => '27 bis rue du progrès',
//   	'description' => 'Je galère sa mère',
//   	'start' => array(
//     	'dateTime' => '2019-01-01T10:00:00.000-05:00',
//     	'timeZone' => 'America/Los_Angeles',
//   	),
//   	'end' => array(
//     	'dateTime' => '2019-01-01T10:00:00.000-05:00',
//     	'timeZone' => 'America/Los_Angeles',
//   	),
//   	"creator"=> array(
//     	"email" => "lissandre.pasdeloup@gmail.com",
//     	"displayName" => "Lissandre",
//     	"self"=> true
//   	),
// ));
// $calendarId = 'primary';
// $event = $service->events->insert($calendarId, $event);
// printf('Event created: %s', $event->htmlLink);


include 'views/pages/plant.php';
