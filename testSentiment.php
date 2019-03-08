<?php
    # Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\Language\LanguageClient;

# Your Google Cloud Platform project ID
$projectId = 'project_sentiment';

# Instantiates a client
$language = new LanguageClient([
    'projectId' => $projectId
]);

set_time_limit(0);
ini_set('memory_limit', '-1');
# Detects the sentiment of the text

$filename = "test2";

$aphabet = array('Tropische','vakantie','Bagi Kalian Pecinta','ايش_محتاجه_النفسيه','Selamat Malam!Marching Band Madah Bahana Universitas','ang laki na. Sobrang sulit!','RT','suka merapikan rambut','ต','ก', 'ข','ฃ', 'ค', 'ฅ', 'ง', 'จ', 'ฉ', 'ซ', 'ฉ', 'ญ', 'ฎ', 'ฏ', 'ฐ', 'ฑ', 'ฒ', 'ณ', 'ด', 'ท', 'ธ', 'น', 'บ', 'ป', 'ร', 'ล', 'ว', 'พ', 'ฟ', 'ม', 'ย', 'ภ', 'ฦ', 'ฝ', 'ฬ', 'ใ', '์', 'ื','ิ','ฮ','อ','แ','ผ','ฤ','ห','โ','เ','่','้','็','๋','ษ','า','ส','ศ','ว','ย','ฯ','๊','ี','ั','ะ','ำ','ไ','ๆ','ถ','ุ','ู','ึ');


// $count = 1;
// $_SESSION['positive'] = 0;
// $_SESSION['netural'] = 0;
// $_SESSION['negative'] = 0;
// if (($handle2 = fopen('.\data\\' . $filename . '.csv', "r")) !== false) {
//     while (!feof($handle2)) {
//         $x = fgetcsv($handle2, ',');
//         $word2 = $x[0];
//         for ($q = 0; $q < sizeof($aphabet); $q++) {
//             $word2 = str_replace("$aphabet[$q]", " ", $word2);
//         }
        $annotation = $language->analyzeSentiment("I Hate thailand.");
        $sentiment = $annotation->sentiment();

        echo $sentiment['score'];

//         if($sentiment['score']>=0.25){
//             $result = "positive";
//             $_SESSION['positive']++;
//         }
//         elseif($sentiment['score']> -0.25){
//             $result = "netrural";
//             $_SESSION['netural']++;
//         }
//         elseif($sentiment['score'] <= -0.25){
//             $result = "negative";
//             $_SESSION['natrural']++;
//         }

       
//     }
// }
?>