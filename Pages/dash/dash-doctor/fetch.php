<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "pet_store_db");
$columns = array('d_name', 'd_contact', 'd_location', 'd_email');

$query = "SELECT * FROM doctor ";

if(isset($_POST["search"]["value"]))
{
    $query .= '
 WHERE d_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR d_contact LIKE "%'.$_POST["search"]["value"].'%" 
 OR d_location LIKE "%'.$_POST["search"]["value"].'%"
 OR d_email LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
    $query .= 'ORDER BY d_id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
    $sub_array = array();
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["d_id"].'" data-column="d_name">' . $row["d_name"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["d_id"].'" data-column="d_contact">' . $row["d_contact"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["d_id"].'" data-column="d_location">' . $row["d_location"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["d_id"].'" data-column="d_email">' . $row["d_email"] . '</div>';
    $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["d_id"].'">Delete</button>';
    $data[] = $sub_array;
}

function get_all_data($connect)
{
    $query = "SELECT * FROM doctor";
    $result = mysqli_query($connect, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  get_all_data($connect),
    "recordsFiltered" => $number_filter_row,
    "data"    => $data
);

echo json_encode($output);
