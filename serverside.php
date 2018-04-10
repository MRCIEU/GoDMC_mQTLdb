<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */


if (isset($_GET['query'])) {
    $wherequery = '';

    $query = $_GET['query'];


    if (preg_match("/^rs\d+$/", $query, $output)) {
        $wherequery = "snp='".$query."'";
    } elseif (preg_match("/^cg\d+$/", $query, $output)) {
        $wherequery = "cpg='".$query."'";
    } elseif (preg_match("/^(\d+)\:(\d+)$/", $query, $output)) {
        $wherequery = '';
    } elseif (preg_match("/^(\d+)\:(\d+)\-(\d+)$/", $query, $output)) {
        //$wherequery = "cpg_pos='".$out."'";
        $wherequery = '';
    }
error_log(print_r($output,true));







}


















 
// DB table to use
$table = 'records';
//$table2 = 'records2';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$columns = array(
    array( 'db' => 'timepoint', 'dt' => 0 ),
    array( 'db' => 'snp',  'dt' => 1 ),
    array( 'db' => 'snp_chr',   'dt' => 2 ),
    array( 'db' => 'snp_pos',     'dt' => 3 ),
    array( 'db' => 'a1',     'dt' => 4 ),
    array( 'db' => 'a2',     'dt' => 5 ),
    array( 'db' => 'maf',     'dt' => 6 ),
    array( 'db' => 'cpg',     'dt' => 7 ),
    array( 'db' => 'cpg_chr',     'dt' => 8 ),
    array( 'db' => 'cpg_pos',     'dt' => 9 ),
    array( 'db' => 'beta',     'dt' => 10 ),
    array( 'db' => 't_stat',     'dt' => 11 ),
    array( 'db' => 'effect_size',     'dt' => 12 ),
    array( 'db' => 'p_value',     'dt' => 13 ),
    array( 'db' => 'trans',     'dt' => 14 ),

    // array( 'db' => 'timepoint2', 'dt' => 15 ),
    // array( 'db' => 'snp2',  'dt' => 16 ),
    // array( 'db' => 'snp_chr2',   'dt' => 17 ),
    // array( 'db' => 'snp_pos2',     'dt' => 18 ),
    // array( 'db' => 'timepoint2', 'dt' => 4 ),
    // array( 'db' => 'snp2',  'dt' => 5 ),
    // array( 'db' => 'snp_chr2',   'dt' => 6 ),
    // array( 'db' => 'snp_pos2',     'dt' => 7 ),
    // // array( 'db' => 'a12',     'dt' => 19 ),
    // array( 'db' => 'a22',     'dt' => 20 ),
    // array( 'db' => 'maf2',     'dt' => 21 ),
    // array( 'db' => 'cpg2',     'dt' => 22 ),
    // array( 'db' => 'cpg_chr2',     'dt' => 23 ),
    // array( 'db' => 'cpg_pos2',     'dt' => 24 ),
    // array( 'db' => 'beta2',     'dt' => 25 ),
    // array( 'db' => 't_stat2',     'dt' => 26 ),
    // array( 'db' => 'effect_size2',     'dt' => 27 ),
    // array( 'db' => 'p_value2',     'dt' => 28 ),
    // array( 'db' => 'trans2',     'dt' => 29 ),

    
    


    // array(
    //     'db'        => 'start_date',
    //     'dt'        => 4,
    //     'formatter' => function( $d, $row ) {
    //         return date( 'jS M y', strtotime($d));
    //     }
    // ),
    // array(
    //     'db'        => 'salary',
    //     'dt'        => 5,
    //     'formatter' => function( $d, $row ) {
    //         return '$'.number_format($d);
    //     }
    // )
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => 'root',
    'db'   => 'mqtldb-test',
    'host' => 'localhost'
);
 


 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
//$wherequery = 'snp_pos=66269714';

//$wherequery = '';

echo json_encode(
    //SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    SSP::complex ( $_GET, $sql_details, $table, $primaryKey, $columns, $whereResult=null, $whereAll=$wherequery )
    //SSP::custom ( $_POST, $sql_details, $table, $table2, $primaryKey, $columns, $whereResult=null, $whereAll=$wherequery )
);