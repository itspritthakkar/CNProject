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
        <!-- Start -->
        <section class="bg-hero">
            <div class="container">
                <div class="row mt-lg-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="rounded shadow overflow-hidden sticky-bar">
                            <div class="card border-0">
                                <img src="assets/images/bg/bg-profile.jpg" class="img-fluid" alt="">
                            </div>

                            <div class="text-center avatar-profile margin-nagative mt-n5 position-relative pb-4 border-bottom">
                                <img src="assets/images/client/09.jpg" class="rounded-circle shadow-md avatar avatar-md-md" alt="">
                                <h5 class="mt-3 mb-1"><?php echo $user['name'] ?></h5>
                            </div>

                            <div class="list-unstyled p-4">
                                <div class="progress-box mb-4">
                                    <h6 class="title">Complete your profile</h6>
                                    <div class="progress">
                                        <div class="progress-bar position-relative bg-primary" style="width:100%;">
                                            <div class="progress-value d-block text-muted h6">100%</div>
                                        </div>
                                    </div>
                                </div><!--end process box-->

                                <div class="d-flex align-items-center mt-2">
                                    <i class="uil uil-user align-text-bottom text-primary h5 mb-0 me-2"></i>
                                    <h6 class="mb-0">Email</h6>
                                    <p class="text-muted mb-0 ms-2"><?php echo $user['email'] ?></p>
                                </div>
                                
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-8 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card border-0 shadow overflow-hidden">
                            <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded-0 shadow overflow-hidden bg-light mb-0" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 active" id="overview-tab" data-bs-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="false">
                                        <div class="text-center pt-1 pb-1">
                                            <h4 class="title fw-normal mb-0">Profile</h4>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->
                            </ul>

                            <div class="tab-content p-4" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="overview-tab">
                                
                                    <div class="row">
                                        <div class="col-lg-12 col-12 mt-4">
                                            <h5>Appointment List</h5>
                                            <?php 
                                            $ai_query=$conn->prepare("SELECT ap.*, dr.name, dr.specialization from `appointments` ap INNER JOIN `doctors` dr ON ap.doctor=dr.id WHERE `patient` = :id");
                                            $ai_execution=$ai_query->execute([
                                                'id' => $user['id']
                                            ]);
                                            $appointments= $ai_query->fetchAll();
                                            // print_r($appointments_check);
                                            foreach ($appointments as $appointment) {
                                            ?>
                                            <div class="d-flex justify-content-between align-items-center rounded p-3 shadow mt-3">
                                                <i class="ri-heart-pulse-line h3 fw-normal text-primary mb-0"></i>
                                                <div class="flex-1 overflow-hidden ms-2">
                                                    <h6 class="mb-0"><?php echo $appointment['specialization'] ?></h6>
                                                    <p class="text-muted mb-0 text-truncate small"><?php echo $appointment['name'] ?></p>
                                                </div>
                                                <a href="editappointment.php?ap_id=<?php echo $appointment['id'] ?>" class="btn btn-icon btn-primary"><i class="uil uil-edit icons"></i></a>
                                                &nbsp;
                                                <a href="backend/deleteappointment.php?ap_id=<?php echo $appointment['id'] ?>" class="btn btn-icon btn-primary"><i class="uil uil-trash icons"></i></a>
                                            </div>
                                            <?php } ?>
                                    </div>

                                    <h5 class="mb-0 mt-4 pt-2">Contact us</h5>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6 mt-4">
                                            <div class="card features feature-primary text-center border-0 p-4 rounded shadow">
                                                <div class="icon text-center rounded-lg mx-auto">
                                                    <i class="uil uil-message align-middle h3"></i>
                                                </div>
                                                <div class="card-body p-0 mt-3">
                                                    <a href="#" class="title text-dark h6 d-block">New Messages</a>
                                                    <a href="#" class="link">Read more <i class="ri-arrow-right-line align-middle"></i></a>
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                        
                                        <div class="col-md-12 col-lg-6 mt-4">
                                            <div class="card features feature-primary text-center border-0 p-4 rounded shadow">
                                                <div class="icon text-center rounded-lg mx-auto">
                                                    <i class="uil uil-envelope-star align-middle h3"></i>
                                                </div>
                                                <div class="card-body p-0 mt-3">
                                                    <a href="#" class="title text-dark h6 d-block">Latest Proposals</a>
                                                    <a href="#" class="link">View more <i class="ri-arrow-right-line align-middle"></i></a>
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div>
                            </div>                     
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->
        <?php include "includes/footer.php"; ?>