<?php
include '../apiLe/defines.php';
// $eventsSheetUtl
// todo insert above variable as parameter in below function when things are ok.
$csvContents = file_get_contents();
$csvContents  = explode("\n",$csvContents);

#fill different category IDs here
$eveCatID = [
        "Build IT!"=>"01",
        "Treasure Hunt"=>"02",
        "Non Tech"=>"03",
        "Coding and Design"=>"04",
        "Management"=>"05",
        "Quiz"=>"06",
        "Special Robotics"=>"07"
        // etc
];

// $eligible = [
//     "School level" => 0,
//     "College level" => 1,
//     "Open to all" => 2
// ];

$attr = ["","name","about","venue","organised","contact","time","img","rules","eligibile","","date","catagory"];
foreach ($csvContents as $key => $value) {
    if ($key == 0)
        continue;
    echo $key."> ";
    $row = str_getcsv($value);
    $jsonDataOut = [];
    for ($i=0; $i < 13; $i++) { 
        if ($row[$i] && $row[$i]!="")
            $jsonDataOut[$attr[$i]] = $row[$i];
    }
    unset($jsonDataOut[""]);
    $fileName = "1".str_pad($eveCatID[$row[12]], 2, "0",STR_PAD_LEFT).str_pad($key, 2, "0",STR_PAD_LEFT).".json";
    print($fileName);
    // $fp = fopen( $fileName, 'w');
    // fwrite($fp, json_encode($jsonDataOut));
    // fclose($fp);
}

?>
