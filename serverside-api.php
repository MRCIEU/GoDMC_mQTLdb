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
$info = false;

if (isset($_GET['query']) && $_GET['query'] != '') { 
    $query = $_GET['query'];

    if (isset($_GET['pval']) && $_GET['pval'] != '') { 
        $pval = $_GET['pval'];
        $all_data['pval'] = array();
        array_push($all_data['pval'], $pval);
    }
    
    if (isset($_GET['cistrans']) && $_GET['cistrans'] != '') { 
        $cistrans = $_GET['cistrans'];
        $all_data['cistrans'] = array();
        array_push($all_data['cistrans'], $cistrans);
    }

    if (isset($_GET['clumped']) && $_GET['clumped'] != '') { 
        $clumped = $_GET['clumped'];
        $all_data['clumped'] = array();
        array_push($all_data['clumped'], $clumped);
    }

    if (isset($_GET['columnschoice']) && $_GET['columnschoice'] != '') { 
        $columns = $_GET['columnschoice'];
        $all_data['columns'] = array();
        $values = array_values($columns);
        $output = join(',', $values);
        $all_data['columns'] = $output;
    }



    //$querylines = explode("\n", str_replace("\r", "", $query));
    $querylines = preg_split( "/(\r\n|\n|\r|,)/", $query );
    $method = '';
    $key = '';
    $url = '';
    
    // Initialise arrays as needed
    foreach( $querylines as $entry ){
        if (preg_match("/^cg\d+$/", $entry, $output)) {
            $all_data['cpgs'] = array();
        }
        if (preg_match("/^rs\d+$/", $entry, $output) || preg_match("/^chr\d+:\d+:\w$/", $entry, $output)) {
            $all_data['rsids'] = array();
        }
        if (preg_match("/^chr(\d.*)\:(\d.*)\:(\w{2,})$/", $entry, $output)) {
            $all_data['snps'] = array();
        }
        if (preg_match("/^(cpg|snp)\:((\d+)\:(\d+)\-(\d+))$/", $entry, $output)) {
            $all_data = array();
        }
        // Gene name search
        if (preg_match("/^(cpg|snp)\:((?![rs|cg|chr\d:|\d:]).*)$/", $entry, $output)) {
            $all_data = array();
        }
    }
    

    // Add values to arrays for conversion to JSON to be submitted to API
    foreach( $querylines as $entry ){    
        
        // CPG
        if (preg_match("/^cg\d+$/", $entry, $output)) {
            $value = $output[0];
            array_push($all_data['cpgs'],$value); 
          
        }
        // RSID
        if (preg_match("/^rs\d+$/", $entry, $output) || preg_match("/^chr\d+:\d+:\w$/", $entry, $output)) {
             $value = $output[0];
             array_push($all_data['rsids'],$value); 
        }
        // SNP
        if (preg_match("/^chr(\d.*)\:(\d.*)\:(\w{2,})$/", $entry, $output)) {
            $value = $output[0];
            array_push($all_data['snps'],$value);                                                                    
        }
        // CPG/SNP Range
        if (preg_match("/^(cpg|snp)\:((\d+)\:(\d+)\-(\d+))$/", $entry, $output)) {
            $prefix = 'cpgs';
            $attr = $output[1];
            $value = $output[2];    
            $url = 'http://api.godmc.org.uk/v0.1/assoc_meta/range/'.$attr.'/'.$value;
            $assoc_meta = true;
        }
        // Gene name
        if (preg_match("/^(cpg|snp)\:((?![rs|cg|chr\d:|\d:]).*)$/", $entry, $output)) {
            $prefix = 'cpgs';
            $attr = $output[1];
            $value = $output[2];
            $url = 'http://api.godmc.org.uk/v0.1/assoc_meta/gene/'.$attr.'/'.$value;
            $assoc_meta = true;
        }

    }
    
    $data_string = json_encode($all_data);    

    if ( $assoc_meta == true ) {
        $qdata =  json_decode(CallApi('GET', $url),true);    
        $json_data = $qdata['assoc_meta'];    
    } elseif ( $info == true) {
        $qdata =  json_decode(CallApi('GET', $url),true);    
        $json_data = $qdata;    
    } else {
        $qdata =  json_decode(CallApi('POST', 'http://api.godmc.org.uk/v0.1/query', $data_string),true);    
        $json_data = $qdata;
    }

    $returned_records = sizeof($json_data);
    $returned_json = json_encode(array( 'draw' => '1', 'recordsTotal' => $returned_records, 'recordsFiltered' => $returned_records, 'data' => $json_data));

} else {
    // No search term supplied
    $returned_json = json_encode(array( 'draw' => '1', 'recordsTotal' => 0, 'recordsFiltered' => 0, 'data' => []));
}

print_r($returned_json);

?>
