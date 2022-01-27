<?php
session_start();

if(!$_SESSION['eid'])
{

    header("Location: index.php");//redirect to the login page to secure the welcome page without login access.
}

?>

<html>
<head>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="../CSS/style-table.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>
        Dashboard
    </title>
</head>

<body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">

    <div class="top_navbar">
        <div class="hamburger">
            <a href="home.php">
                <i class="fas fa-arrow-left" title="Go back" style="font-size: 20px"></i>
            </a>
        </div>
        <div class="top_menu">
            <div class="logo">
                Dashboard
            </div>
        </div>
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="dashboard.php" class="active">
                    <span class="icon"><i class="fas fa-paw"></i></span>
                    <span class="title">Pets</span>
                </a></li>
            <li><a href="dash/owner-dash.php">
                    <span class="icon"><i class="fas fa-user-tie"></i></span>
                    <span class="title">Pet Owner</span>
                </a></li>
            <li><a href="dash/product-dash.php">
                    <span class="icon"><i class="fas fa-store"></i></span>
                    <span class="title">Product</span>
                </a></li>
            <li><a href="dash/doctor-dash.php">
                    <span class="icon"><i class="fas fa-user-md"></i></span>
                    <span class="title">Doctor</span>
                </a></li>
            <li><a href="dash/employee-dash.php">
                    <span class="icon"><i class="fas fa-user-cog"></i></span>
                    <span class="title">Employee</span>
                </a></li>
        </ul>
    </div>

    <div class="main_container">
        <div class="container box">
            <div class="table-responsive">
                <div align="right">
                    <button type="button" name="add" id="add" title="Add tuple" class="btn btn-info">Add</button>
                </div>
                <br />
                <div id="alert_message"></div>
                <table id="user_data" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Pet Name</th>
                        <th>Breed</th>
                        <th>DID</th>
                        <th>OID</th>
                        <th></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(".hamburger").click(function(){
        $(".wrapper").toggleClass("collapse");
    });

    $(document).ready(function() {

        fetch_data();

        function fetch_data() {
            var dataTable = $('#user_data').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "dash/dash-pet/fetch.php",
                    type: "POST"
                }
            });
        }

        function update_data(id, column_name, value) {
            $.ajax({
                url: "dash/dash-pet/update.php",
                method: "POST",
                data: {
                    id: id,
                    column_name: column_name,
                    value: value
                },
                success: function(data) {
                    $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                    $('#user_data').DataTable().destroy();
                    fetch_data();
                }
            });
            setInterval(function() {
                $('#alert_message').html('');
            }, 5000);
        }

        $(document).on('blur', '.update', function() {
            var id = $(this).data("id");
            var column_name = $(this).data("column");
            var value = $(this).text();
            update_data(id, column_name, value);
        });

        $('#add').click(function() {
            var html = '<tr>';
            html += '<td contenteditable id="data1"></td>';
            html += '<td contenteditable id="data2"></td>';
            html += '<td contenteditable id="data3"></td>';
            html += '<td contenteditable id="data4"></td>';
            html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
            html += '</tr>';
            $('#user_data tbody').prepend(html);
        });

        $(document).on('click', '#insert', function() {
            var p_name = $('#data1').text();
            var breed = $('#data2').text();
            var d_id = $('#data3').text();
            var o_id = $('#data4').text();
            if (p_name != '' && breed != '' && d_id != '' && o_id != '') {
                $.ajax({
                    url: "dash/dash-pet/insert.php",
                    method: "POST",
                    data: {
                        p_name: p_name,
                        breed: breed,
                        d_id: d_id,
                        o_id: o_id,
                    },
                    success: function(data) {
                        $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                        $('#user_data').DataTable().destroy();
                        fetch_data();
                    }
                });
                setInterval(function() {
                    $('#alert_message').html('');
                }, 5000);
            } else {
                alert("All Fields is required");
            }
        });

        $(document).on('click', '.delete', function() {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to remove this?")) {
                $.ajax({
                    url: "dash/dash-pet/delete.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                        $('#user_data').DataTable().destroy();
                        fetch_data();
                    }
                });
                setInterval(function() {
                    $('#alert_message').html('');
                }, 5000);
            }
        });
    });
</script>

</body>

</html>