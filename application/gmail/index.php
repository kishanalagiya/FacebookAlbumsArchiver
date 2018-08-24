<?php
session_start();
include_once '../gmail/src/Google_Client.php';
include_once '../gmail/src/contrib/Google_Oauth2Service.php';
require_once '../gmail/src/contrib/Google_DriveService.php';

$client = new Google_Client();
$client->setClientId('464708382044-7612avfohlotm5ck11ealmbr6q74bdrd.apps.googleusercontent.com');
$client->setClientSecret('wWOj5J_Y_MDs104uCeUnaIgL');
$client->setRedirectUri('http://localhost/gmail/index.php');
$client->setScopes(array('https://www.googleapis.com/auth/drive.file'));


if (isset($_GET['code']) || (isset($_SESSION['access_token']))) {
	
	
	$service = new Google_DriveService($client);
    if (isset($_GET['code'])) {
		$client->authenticate($_GET['code']);
		$_SESSION['access_token'] = $client->getAccessToken();		
    } else
        $client->setAccessToken($_SESSION['access_token']);
	
    
    //Insert a file
    $fileName="A.zip";
	$file = new Google_DriveFile();
    $file->setTitle($fileName);
    $file->setMimeType('application/zip');
    $file->setDescription('A User Details is uploading in json format');
	//print_r($file);
    //exit;
   
    $createdFile = $service->files->insert($file, array(
          'data' =>file_get_contents('A.zip'),
          'mimeType' => 'application/zip',
		  'uploadType'=>'multipart'
        ));
		
	//unlink($fileName);
    header('location:index22.php?fileName=user');
	//print_r($createdFile);

} else {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . $authUrl);
    exit();
}

?>