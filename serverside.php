<?php
 
// Define the SQL query parameters pending on which type of search term is used
// e.g. an SNP name (rs123456) or CpG name (cg12345) etc.

// $columns = array(
//     array( 'db' => 'timepoint', 'dt' => 0 ),
//     array( 'db' => 'snp',  'dt' => 1 ),
//     array( 'db' => 'snp_chr',   'dt' => 2 ),
//     array( 'db' => 'snp_pos',     'dt' => 3 ),
//     array( 'db' => 'a1',     'dt' => 4 ),
//     array( 'db' => 'a2',     'dt' => 5 ),
//     array( 'db' => 'maf',     'dt' => 6 ),
//     array( 'db' => 'cpg',     'dt' => 7 ),
//     array( 'db' => 'cpg_chr',     'dt' => 8 ),
//     array( 'db' => 'cpg_pos',     'dt' => 9 ),
//     array( 'db' => 'beta',     'dt' => 10 ),
//     array( 'db' => 't_stat',     'dt' => 11 ),
//     array( 'db' => 'effect_size',     'dt' => 12 ),
//     array( 'db' => 'p_value',     'dt' => 13 ),
//     array( 'db' => 'trans',     'dt' => 14 ),

// );

if (isset($_GET['query']) && $_GET['query'] != '') {
    $wherequery = '';

    $query = $_GET['query'];

    if (preg_match("/^rs\d+$/", $query, $output)) {
        $wherequery = "snp='".$output[0]."'";
        $table = 'records';
        $table2 = 'records2';
        $columns = array(
            //array( 'db' => 'timepoint', 'dt' => 0 ),
            array(
                'db'        => 'timepoint',
                'dt'        => 0,
                'formatter' => function( $d, $row ) {
                    return '<a class="daliance" href="">'.$d.'</span>';
                }
            ),
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
            //array( 'db' => 'timepoint2', 'dt' => 15 ),
        );
    } elseif (preg_match("/^cg\d+$/", $query, $output)) {
        $wherequery = "cpg='".$output[0]."'";
        $table = 'records';
        $table2 = 'records2';
        $columns = array(
            //array( 'db' => 'timepoint', 'dt' => 0 ),
            array(
                'db'        => 'timepoint',
                'dt'        => 0,
                'formatter' => function( $d, $row ) {
                    return '<a class="daliance" href="">'.$d.'</span>';
                }
            ),
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
            //array( 'db' => 'timepoint2', 'dt' => 15 ),
        );
    } elseif (preg_match("/^(\d+)\:(\d+)$/", $query, $output)) {
        $wherequery = "snp='rs7104570' AND id=id2";
        $table = 'records';
        $table2 = 'records2';
        $columns = array(
            //array( 'db' => 'timepoint', 'dt' => 0 ),
            array(
                'db'        => 'timepoint',
                'dt'        => 0,
                'formatter' => function( $d, $row ) {
                    return '<a class="daliance" href="">'.$d.'</span>';
                }
            ),
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
            //array( 'db' => 'timepoint2', 'dt' => 15 ),
        );
    } elseif (preg_match("/^(\d+)\:(\d+)\-(\d+)$/", $query, $output)) {
        //$wherequery = "cpg_pos='".$out."'";
        $wherequery = '';
        $table = 'records';
    }

} else {
    $wherequery = '';
    $table = 'records';
    $columns = array(
        //array( 'db' => 'timepoint', 'dt' => 0 ),
        array(
            'db'        => 'timepoint',
            'dt'        => 0,
            'formatter' => function( $d, $row ) {
                return '<a class="daliance" href="">'.$d.'</span>';
            }
        ),
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
        //array( 'db' => 'timepoint2', 'dt' => 15 ),
    );
}


 
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

// $columns = array(
//     array( 'db' => 'timepoint', 'dt' => 0 ),
//     array( 'db' => 'snp',  'dt' => 1 ),
//     array( 'db' => 'snp_chr',   'dt' => 2 ),
//     array( 'db' => 'snp_pos',     'dt' => 3 ),
//     array( 'db' => 'a1',     'dt' => 4 ),
//     array( 'db' => 'a2',     'dt' => 5 ),
//     array( 'db' => 'maf',     'dt' => 6 ),
//     array( 'db' => 'cpg',     'dt' => 7 ),
//     array( 'db' => 'cpg_chr',     'dt' => 8 ),
//     array( 'db' => 'cpg_pos',     'dt' => 9 ),
//     array( 'db' => 'beta',     'dt' => 10 ),
//     array( 'db' => 't_stat',     'dt' => 11 ),
//     array( 'db' => 'effect_size',     'dt' => 12 ),
//     array( 'db' => 'p_value',     'dt' => 13 ),
//     array( 'db' => 'trans',     'dt' => 14 ),

// );
 
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
 
echo json_encode(
    //SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    SSP::complex ( $_GET, $sql_details, $table, $primaryKey, $columns, $whereResult=null, $whereAll=$wherequery )
    //SSP::custom ( $_POST, $sql_details, $table, $table2, $primaryKey, $columns, $whereResult=null, $whereAll=$wherequery )
);