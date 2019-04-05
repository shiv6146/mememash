<?php
$geek_data = [];
$page = file_get_contents('/home/stumper/ids/mememash/checkpoint');
$geek_terms = ["linux", "windows", "stackoverflow", "github", "test", "java", "python", "vim", "emacs", "mac", "jar", "bug"];

# Use the Curl extension to query Google and get back a page of results
foreach ($geek_terms as $term) {
    $geek_data[$term] = [];
    $url = "http://devhumor.com/?search=" . $term . "&page=" . $page;
    echo $url . "\n";
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $html = curl_exec($ch);
    curl_close($ch);

    # Create a DOM parser object
    $dom = new DOMDocument();

    @$dom->loadHTML($html);

    
    foreach($dom->getElementsByTagName('img') as $link) {
            
        if ($link->getAttribute('class') == "single-media") {
            $url = $link->getAttribute('src');
            $title = $link->getAttribute('alt');
            echo $url . "\n";
            $geek_data[$term][] = [
                "url" => $url,
                "title" => $title,
                "category" => $term
            ];
        }

    }
}

$data = array("data" => $geek_data);
$data_string = json_encode($data);
$ch = curl_init('http://localhost/api/add_memes');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);
$result = curl_exec($ch);
print_r($result);

$page++;
file_put_contents('/home/stumper/ids/mememash/checkpoint', '');
file_put_contents('/home/stumper/ids/mememash/checkpoint', $page);
?>