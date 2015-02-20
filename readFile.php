<html>
<head>
    <title>Great Quotes from Great People</title>
</head>
<body>
<?php
    $fileName = "message.txt";
    $file = fopen($fileName,'a+');
    $text = fread($file,filesize($fileName));
    $betterText = file_get_contents($fileName);
    echo $text . '<br /><br />';
    echo $betterText . '<br /><br />';
    $differentText = file($fileName);
    foreach($differentText as $line) echo $line . '<br /><br />';
    fwrite($file, '1');
    fclose($file);
?>

</body>
</html>
