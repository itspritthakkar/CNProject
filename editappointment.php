<?php include "includes/header.php"; ?>
<?php
$user_id= !empty($_SESSION['uid'])?$_SESSION['uid']:'';
$user_name= !empty($_SESSION['uname'])?$_SESSION['uname']:'';
$user_email= !empty($_SESSION['email'])?$_SESSION['email']:'';
if(!$user_id || !$user_name || !$user_email){header("location:login.php");}
$ui_query=$conn->prepare("SELECT * from `patients` WHERE `id` = :id");
$ui_execution=$ui_query->execute([
    'id' => $user_id
]);
$user = $ui_query->fetch();
?>

<section class="bg-hero">
    <div class="container">
        <div class="row mt-lg-5">
        <div class="col-lg-12 col-md-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card border-0 shadow overflow-hidden">
                    <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded-0 shadow overflow-hidden bg-light mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link rounded-0 active" id="overview-tab" data-bs-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="false">
                                <div class="text-center pt-1 pb-1">
                                    <h4 class="title fw-normal mb-0">Edit Appointment</h4>
                                </div>
                            </a><!--end nav link-->
                        </li><!--end nav item-->
                    </ul>

                    <div class="tab-content p-4" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="overview-tab">
                        
                            <div class="row">
                                <div class="col-lg-12 col-12 mt-4">
                                <div class="custom-form">
                                <form action = "backend/editappointment.php" method="POST">
                                    <div class="row">

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Doctor <span class="text-danger">*</span></label>
                                                    <select name="doctor" class="form-control doctor-name select2input" required>
                                                    <?php 
                                                    $di_query=$conn->prepare("SELECT * from `doctors`");
                                                    $di_execution=$di_query->execute([
                                                        'id' => $_GET['ap_id']
                                                    ]);
                                                    $doctors= $di_query->fetchAll();
                                                    // print_r($appointments_check);
                                                    foreach ($doctors as $doctor) {
                                                    ?>
                                                        <option value="<?php echo $doctor['id'] ?>"><?php echo $doctor['name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label"> Date <span class="text-danger">*</span></label>
                                                        <input type="hidden" name="ap_id" value="<?php echo $_GET['ap_id'] ?>">
                                                        <input name="date" type="text" class="flatpickr flatpickr-input form-control" id="checkin-date" required>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="input-time">Time <span class="text-danger">*</span></label>
                                                        <input name="time" type="text" class="form-control timepicker" id="input-time" placeholder="03:30 PM" required>
                                                    </div> 
                                                </div><!--end col-->
                                            </div>
                                            <p id="successMsg" class="text-success"></p>
                                            <div class="col-lg-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Book An Appointment</button>
                                                </div>
                                            </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>                     
                </div>
            </div><!--end col-->
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>