<?php


// Include configuration file 
require_once 'dbConfig.php';
require_once __DIR__.'/api.php';



define('customer_key', '7c2268');



function screenshoot($id, $name, $url, $dimension = '1920x1080')
{
    $machine = new ScreenshotMachine(customer_key, null);
    $options['url'] = $url;
    $options['dimension'] = $dimension;
    $options['device'] = "desktop";
    $options['format'] = "jpg";
    $options['cacheLimit'] = "0";
    $options['delay'] = "100";
    $options['zoom'] = "100";
    $api_url = $machine->generate_screenshot_api_url($options);

    $file = $id + 1 . '_' . $name . '.jpg';
    
    // If successful 
    if (!file_exists($file)) touch($file);
    
    file_put_contents('uploads/'.$file, file_get_contents($api_url));
  
    return ['id' => $id, 'filename' => $file, 'img' => $api_url];
    
    
}

// Websites that will scan 

$webSites = [
    [
        'name' => 'iFunded',
        'url' => 'https://ifunded.de/en/'
    ],
    [
        'name' => 'Property Partner',
        'url' => 'https://www.propertypartner.co'
    ],
    [
        'name' => 'Property Moose',
        'url' => 'https://propertymoose.co.uk'
    ],
    [
        'name' => 'Homegrown',
        'url' => 'https://www.homegrown.co.uk'
    ],
    [
        'name' => 'Realty Mogul',
        'url' => 'https://www.realtymogul.com'
    ]
];


// Array that will contain file id's
$file_ids = [];
// loop for download and insert to database
foreach ($webSites as $no => $site) {

    $result = screenshoot($no, $site['name'], $site['url'], '1920x1080');

  /*  echo '<p>' . $result['filename'] . '</p>';
    echo '<img src="' . $result['img'] . '" width="320" height="180">' . PHP_EOL;*/
   

    $sqlQ = "INSERT INTO `drive_files` (`file_name`,`created`) VALUES (?,NOW())"; 
            $stmt = $db->prepare($sqlQ); 
            $stmt->bind_param("s", $result['filename']); 
            $db_file_name = $file; 
            $insert = $stmt->execute(); 
    if($insert){ 
                $file_id = $stmt->insert_id; 
                $file_ids[] = $file_id;
            
        }
        
}
  $_SESSION['last_file_ids'] = $file_ids; 
                 
header("Location: $googleOauthURL"); 



 
/*
//1 iFunded https://ifunded.de/en/
//2 Property Partner https://www.propertypartner.co
//3 Property Moose https://propertymoose.co.uk
//4 Homegrown https://www.homegrown.co.uk
//5 Realty Mogul https://www.realtymogul.com*/
 ?>