<?php

function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json'
    ));

    
                                                                                                                         
    // $ch = curl_init('http://api.local/rest/users');                                                                      
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    //     'Content-Type: application/json',                                                                                
    //     'Content-Length: ' . strlen($data_string))                                                                       
    // );                                                                                                                   
                                                                                                                         
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
} // end function


$assoc_meta = false;

if (isset($_GET['query']) && $_GET['query'] != '') {
    $query = $_GET['query'];

    // CPG
    if (preg_match("/^cg\d+$/", $query, $output)) {
        $prefix = 'cpgs';
        $value = $output[0];
        $url = 'http://api.godmc.org.uk/v0.1/query';
        $data = array( "{$prefix}" => ["{$value}"]);                                                                    
        $data_string = json_encode($data);    
        $method = 'POST';
    }

    // RSID
    if (preg_match("/^rs\d+$/", $query, $output)) {
        $prefix = 'rsids';
        $value = $output[0];
        $url = 'http://api.godmc.org.uk/v0.1/query';
        $data = array( "{$prefix}" => ["{$value}"]);                                                                    
        $data_string = json_encode($data);    
        $method = 'POST';
    } elseif (preg_match("/^chr(\d.*)\:(\d.*)\:(\w)$/", $query, $output)) {
        // This doesn't currently work - search on API returns no match    
        $prefix = 'rsids';
        $value = $output[0];
        $url = 'http://api.godmc.org.uk/v0.1/query';
        $data = array( "{$prefix}" => ["{$value}"]);                                                                    
        $data_string = json_encode($data);    
        $method = 'POST';
    }

    // SNP
    if (preg_match("/^chr(\d.*)\:(\d.*)\:(\w.*)$/", $query, $output)) {
        $prefix = 'snps';
        $value = $output[0];
        $url = 'http://api.godmc.org.uk/v0.1/query';
        $data = array( "{$prefix}" => ["{$value}"]);                                                                    
        $data_string = json_encode($data);    
        $method = 'POST';
    }
    
    // CPG Range
    //http://api.godmc.org.uk/v0.1/assoc_meta/range/cpg/10:10000000-10100000
    if (preg_match("/^(cpg|snp)\:((\d+)\:(\d+)\-(\d+))$/", $query, $output)) {
        // $q1string = "/assoc_meta/range/".$output[1]."/".$output[2];
        // error_log($q1string);
        $prefix = 'cpgs';
        $attr = $output[1];
        $value = $output[2];    
        $url = 'http://api.godmc.org.uk/v0.1/assoc_meta/range/'.$attr.'/'.$value;
        $method = 'GET';
        $assoc_meta = true;
    }


}




//$q1data =  json_decode(CallApi('GET', 'http://api.godmc.org.uk/v0.1/'.$q1string),true);





if ( $assoc_meta == true ) {
    $qdata =  json_decode(CallApi($method, $url),true);    
    // $json_data = json_decode($q1data, true);    
    $json_data = $qdata['assoc_meta'];    
} else {
    $qdata =  json_decode(CallApi($method, $url, $data_string),true);    
    $json_data = $qdata;
}



$returned_records = sizeof($json_data);

$returned_json = json_encode(array( 'draw' => '1', 'recordsTotal' => $returned_records, 'recordsFiltered' => $returned_records, 'data' => $json_data));

print_r($returned_json);



?>