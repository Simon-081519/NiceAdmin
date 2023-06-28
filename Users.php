<?php 
    session_start();
	if (!isset($_SESSION['username'])) {
		header("location:login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Users - E-Reserve</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        table {
            counter-reset: tableCount;
        }
        .counterCell:before {
            font-weight: bold;
            content: counter(tableCount);
            counter-increment: tableCount;
        }
    </style>
</head>

<body>

    <?php include('Components/Navbar.php') ?>
    <?php include('Components/Sidebar.php') ?>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Users</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
        <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Clients</h5>
              <!-- Table with hoverable rows -->
              <table id='record_table' class='table table-hover'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>#</th>
                                                    <th scope='col'>Name</th>
                                                    <th scope='col'>Email</th>
                                                    <th scope='col'>Address</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dataTable">
                             <?php 
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = '';
                                        $dbname = "db_emedrec_final";
                                    
                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                    
                                        $sql = "SELECT id, f_name, m_name, last_name, id_number, position FROM tbl_user";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                          
                                            while($row = $result->fetch_assoc()) {
                                                echo "
                                                <tr>
                                                    <td class='counterCell'></td>
                                                    <td>
                                                        " . $row["f_name"]. " " . $row["m_name"]. " " . $row["last_name"]. "
                                                    </td>
                                                    <td>
                                                        " . $row["id_number"] . "
                                                    </td>
                                                    <td>
                                                        " . $row["position"] . "
                                                    </td>
                                                </tr>";
                                            }
                                            // echo "</table>";
                                        } else {
                                            echo "0 results";
                                        }

                                        $conn->close();
                                ?>
                                </tbody>
                                <!-- Table with hoverable rows -->

                            </table>
              <!-- End Table with hoverable rows -->

            </div>
          </div>
        </div><!-- End Table Card -->

            

        </div><!-- End Right side columns -->

      </div>
<!-- END OF CLIENTS -->

      <!-- OWNERS -->
            <div class="row">
                <!-- Table Card -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Hotel Owners</h5>
                            <table id='record_table' class='table table-hover'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>#</th>
                                                    <th scope='col'>Name</th>
                                                    <th scope='col'>Email</th>
                                                    <th scope='col'>Address</th>
                                                    <th scope='col'>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dataTable">
                                <?php 
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = '';
                                        $dbname = "db_emedrec_final";
                                    
                                        // Create connection
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                    
                                        $sql = "SELECT id, medicine_name, description, qty, vaccine_brand FROM tbl_medicine";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                         
                                            while($row = $result->fetch_assoc()) {
                                                echo "
                                                <tr>
                                                    <td class='counterCell'></td>
                                                    <td>
                                                        " . $row["medicine_name"] . "
                                                    </td>
                                                    <td>
                                                        " . $row["description"] . "
                                                    </td>
                                                    <td>
                                                        " . $row["qty"] . "
                                                    </td>
                                                    <td>
                                                    <button id=".$row['id'] ." class='btn btn-warning' onclick='#add(".$row['id'].")' data-bs-toggle='modal'
                                                    data-bs-target='#ASSIGN'>ASSIGN</button>
                                                    <button id=".$row['id'] ." class='btn btn-success' onclick='#VIEW(".$row['id'].")' data-bs-toggle='modal'
                                                    data-bs-target='#VIEW'>VIEW</button>
                                                    <a class='btn btn-danger' href='functions/delete_med.php?id=".$row['id']."'>DELETE</a>
                                                    </td>
                                                </tr>

                                            ";
                                            }
                                            // echo "</table>";
                                        } else {
                                            echo "0 results";
                                        }

                                        $conn->close();
                                ?>
                                <!-- Table with hoverable rows -->
                                </tbody>
                            </table>


                                <!-- Add Student Record Button-->
                                <div class="row">
                                    <div class="col p-3 bg-white text-white"></div>
                                    <div class="col p-3 bg-white text-white"></div>
                                    <div class="col p-3 bg-white text-white"></div>
                                    <div class="col p-3 bg-pwhite text-white">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#ADD">
                                            Add Owner
                                        </button>
                                    </div>

                                </div>
                                <!-- End of Student Record Button -->



                                <!-- ADD  -->
                                <div class="modal fade" id="ADD" tabindex="-1">
                                    <!-- <form id="add_student"> -->
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">TANGA</h5>
                                                <button name='ADD' type="button" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- <form id="add_student"> -->
                                            <div class="modal-body">
                                                <form action="functions/add_medicine.php" method="POST">
                                                    <!--Add Record Inputs-->

                                                    <!-- No Labels Form -->
                                                    <div class="row g-3">

                                                        <div class="col-md-12">
                                                            <input name="medicine_name" type="text" class="form-control"
                                                                placeholder="First Name">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input name="medicine_name" type="text" class="form-control"
                                                                placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input name="medicine_name" type="text" class="form-control"
                                                                placeholder="Last Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input name="medicine_name" type="text" class="form-control"
                                                                placeholder="Birthdate">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input name="medicine_name" type="text" class="form-control"
                                                                placeholder="Last Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input name="description" type="text" class="form-control"
                                                                placeholder="Student Number">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select name="qty" id="qty" id="inputState" class="form-select">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="IRREG">IRREG</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <input name="vaccine_brand" id="vaccine_brand" type="text" class="form-control"
                                                                placeholder="Vaccine">
                                                        </div>

                                                       
                                                        <!-- <hr> -->

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /// -->
                                            <!-- End No Labels Form -->

                                            <!-- </form> -->
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                </div>
                                <!--ADD-->

                                <!-- VIEW MODAL -->
                                <div class="modal fade" id="VIEW" tabindex="-1">
                                    <!-- <form id="add_student"> -->
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">View Information</h5>
                                                <button name='VIEW' type="button" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- <form id="add_student"> -->
                                            <div class="modal-body">
                                                <form action="functions/add_medicine.php" method="POST">
                                                    <!--Add Record Inputs-->

                                                    <!-- No Labels Form -->
                                                    <div class="row g-3">

                                                        <div class="col-md-4">
                                                            <input name="medicine_name" type="text" class="form-control"
                                                                placeholder="Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input name="description" type="text" class="form-control"
                                                                placeholder="Student Number">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select name="qty" id="qty" id="inputState" class="form-select">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="IRREG">IRREG</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <input name="vaccine_brand" id="vaccine_brand" type="text" class="form-control"
                                                                placeholder="Vaccine">
                                                        </div>

                                                       
                                                        <!-- <hr> -->

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /// -->
                                            <!-- End No Labels Form -->

                                            <!-- </form> -->
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                </div>
                                <!-- END OF VIEW MODAL -->

                                <!-- ASSIGN MODAL -->
                                <div class="modal fade" id="ASSIGN" tabindex="-1">
                                    <!-- <form id="add_student"> -->
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Assign Business</h5>
                                                <button name='ADD' type="button" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- <form id="add_student"> -->
                                            <div class="modal-body">
                                                <form action="functions/add_medicine.php" method="POST">
                                                    <!--Add Record Inputs-->

                                                    <!-- No Labels Form -->
                                                    <div class="row g-3">
                                                        
                                                        <div class="col-md-12">
                                                            <input name="medicine_name" type="text" class="form-control"
                                                                placeholder="First Name">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input name="medicine_name" type="text" class="form-control"
                                                                placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input name="medicine_name" type="text" class="form-control"
                                                                placeholder="Last Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input name="medicine_name" type="text" class="form-control"
                                                                placeholder="Birthdate">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input name="medicine_name" type="text" class="form-control"
                                                                placeholder="Last Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input name="description" type="text" class="form-control"
                                                                placeholder="Student Number">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select name="qty" id="qty" id="inputState" class="form-select">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="IRREG">IRREG</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <input name="vaccine_brand" id="vaccine_brand" type="text" class="form-control"
                                                                placeholder="Vaccine">
                                                        </div>

                                                       
                                                        <!-- <hr> -->

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /// -->
                                            <!-- End No Labels Form -->

                                            <!-- </form> -->
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                </div>
                                <!-- END OF ASSIGN MODAL -->

                                <!-- </form> -->
                            </div><!-- End Vertically centered Modal-->
                            <!-- End Table with hoverable rows -->

                        </div>

                    </div>
                </div><!-- End Table Card -->



            </div><!-- End Right side columns -->

            </div>
        </section>

    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <!-- BUTTONS -->
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>  
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <!-- BUTTONS -->
    
    <script src="datatable.js"></script>

    <script>
        function med_edit(_id){
            $('.modal-title').html('Update Medicine');
            $('#MedEdit').modal('show');
            console.log(_id);
            $.ajax({
                type: "POST",
                url: "functions/get_med.php",
                data: {get_id: _id},
                dataType: 'json',
                success: function(response){
                    if (response.status === true){
                        console.log(response);
                        $('#id').val(response.data[0].id);
                        $('#medicine_name').val(response.data[0].medicine_name);
                        $('#description').val(response.data[0].description);
                        $('#qty').val(response.data[0].qty);
                        $('#vaccine_brand').val(response.data[0].vaccine_brand);

                    }
                }
                
            })
        }
    </script>
</body>
</html>