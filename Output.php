<?php
$client = curl_init('http://referenceboss.boss/apiHandler.php?action=outputData');
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
$result = json_decode($response);

$output = '';

if(count($result) > 0){
    foreach($result as $row){
        $output .= '
        <tr>
            <td>'.$row->id.'</td>
            <td>'.$row->refnum.'</td>
            <td>'.$row->author.'</td>
            <td>'.$row->title.'</td>
            <td>'.$row->publication_date.'</td>
            <td>'.$row->publisher.'</td>
            <td>'.$row->place_of_publication.'</td>
            <td>'.$row->isbn.'</td>
        </tr>
        ';
    }
}else{
    $output .= '<tr><td colspan="6" align=center>Not found!</td></tr>';
}

echo $output;
?>