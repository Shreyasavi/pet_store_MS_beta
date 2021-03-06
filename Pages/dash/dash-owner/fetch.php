<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "pet_store_db");
$columns = array('o_name', 'o_contact', 'o_location', 'e_id');

$query = "SELECT * FROM owner ";

if(isset($_POST["search"]["value"]))
{
    $query .= '
 WHERE o_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR o_contact LIKE "%'.$_POST["search"]["value"].'%" 
 OR o_location LIKE "%'.$_POST["search"]["value"].'%"
 OR e_id LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
    $query .= 'ORDER BY o_id DESC ';
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
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["o_id"].'" data-column="o_name">' . $row["o_name"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["o_id"].'" data-column="o_contact">' . $row["o_contact"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["o_id"].'" data-column="o_location">' . $row["o_location"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["o_id"].'" data-column="e_id">' . $row["e_id"] . '</div>';
    $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["o_id"].'">Delete</button>';
    $data[] = $sub_array;
}

function get_all_data($connect)
{
    $query = "SELECT * FROM owner";
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
