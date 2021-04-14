<?php
require '../vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
class dr{}
$dr = new dr();
$ch = curl_init(); 

$s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'id-jkt-1',
    'visibility' => 'public',
    'credentials' => [
        'key'    => '00e0b1ce987c2d8ea3b3',
        'secret' => 'vFqdslMJjOcmAHZnPE7C2lMcLmoMUkaKBwtK1A4P',
    ],
    'ACL' => 'public-read',
    'endpoint' => 'http://s3-id-jkt-1.kilatstorage.id/'
]);

$bucket = 'ebunga';

$bahan = "1234567890qwertyuioplkjhgfdsazxcvbnm";
$acak = str_shuffle($bahan);
$kdPengujian = substr($acak, 0, 10);

$img1 = $_POST['img1'];
$img2 = $_POST['img2'];

$image_array_1_1 = explode(";", $img1);
$image_array_1_2 = explode(",", $image_array_1_1[1]);
$data1 = base64_decode($image_array_1_2[1]);

$image_array_2_1 = explode(";", $img2);
$image_array_2_2 = explode(",", $image_array_2_1[1]);
$data2 = base64_decode($image_array_2_2[1]);

$namaFile1 = $kdPengujian."_1_.png";
$namaFile2 = $kdPengujian."_2_.png";

file_put_contents("img_upload/".$namaFile1, $data1);
file_put_contents("img_upload/".$namaFile2, $data2);

$file_Path1 = "img_upload/".$namaFile1;
$key1 = "foto_pu/".basename($file_Path1);

try {
    $result = $s3->putObject([
        'Bucket'     => $bucket,
        'Key'        => $key1,
        'SourceFile' => $file_Path1,
    ]);
} catch (S3Exception $e) {
    echo $e->getMessage();
}

// $postRequestLocal = array(
//     'image1' => 'https://s3-id-jkt-1.kilatstorage.id/haxors-bucket/foto_pu/4o9qlfgnh7_1_.png',
//     'image2' => 'https://s3-id-jkt-1.kilatstorage.id/haxors-bucket/foto_pu/4o9qlfgnh7_1_.png',
// );

// curl_setopt_array($ch, array(
//     CURLOPT_URL => "https://api.deepai.org/api/image-similarity",
//     CURLOPT_HTTPHEADER => array('api-key: quickstart-QUdJIGlzIGNvbWluZy4uLi4K'),
//     CURLOPT_POSTFIELDS => $postRequestLocal
// ));

// $dataAnalisa = curl_exec($ch);

$dr -> status = 'sukses';
// $dr -> data_analisa = $dataAnalisa;
// $dr -> key_1 = $key1;

echo json_encode($dr);

?>