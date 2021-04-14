<?php
$ch = curl_init(); 
$postRequest = array(
    'image1' => 'https://s3-id-jkt-1.kilatstorage.id/haxors-bucket/pic_putri/editan_1.jpg',
    'image2' => 'https://s3-id-jkt-1.kilatstorage.id/haxors-bucket/pic_putri/editan_1.jpg'
);

$postRequestLocal = array(
    'image1' => '../ladun/foto_uji/editan_1.jpg',
    'image2' => '../ladun/foto_uji/editan_1.jpg',
);

curl_setopt_array($ch, array(
    CURLOPT_URL => "https://api.deepai.org/api/image-similarity",
    CURLOPT_HTTPHEADER => array('api-key: quickstart-QUdJIGlzIGNvbWluZy4uLi4K'),
    CURLOPT_POSTFIELDS => $postRequestLocal
));

$phoneList = curl_exec($ch);
curl_close($ch);


?>
<div class="container" id="divPengujianAwal">

<?php json_encode($phoneList); ?>

</div>