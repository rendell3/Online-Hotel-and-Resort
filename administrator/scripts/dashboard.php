<?php 
include '../../connection.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];

$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Custom Field value
$pricefrom = $_POST['pricefrom'];
$priceto = $_POST['priceto'];
$searchByCategory = $_POST['searchByCategory'];

## Search 
$searchQuery = " ";
if($pricefrom != '' || $priceto != ''){
   $searchQuery .= " and fldProductPrice BETWEEN '".$pricefrom."' AND '".$priceto."' ";
}
if($searchByCategory != ''){
   $searchQuery .= " and (tblCategories_fldCategoryId='".$searchByCategory."') AND fldProductDeleted <> 1";
}
if($searchValue != ''){
   $searchQuery .= " and (tblCategories_fldCategoryId like '%".$searchValue."%' or 
      tblCategories_fldCategoryId like '%".$searchValue."%') AND fldProductDeleted <> 1";
}

## Total number of records without filtering
$sel = mysqli_query($connection,"select count(*) as allcount from tblproducts WHERE fldProductDeleted <> 1");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($connection,"select count(*) as allcount from tblproducts WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from tblproducts WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($connection, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array(
     "fldProductName"=>$row['fldProductName'],
     "fldProductUnit"=>$row['fldProductUnit'],
     "fldProductPrice"=>$row['fldProductPrice'],
     "tblCategories_fldCategoryId"=>$row['tblCategories_fldCategoryId'],
     "fldProductCode"=>$row['fldProductCode']
   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);
?>
