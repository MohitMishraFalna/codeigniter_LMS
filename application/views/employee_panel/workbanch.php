<?php include_once(APPPATH.'views/header.php');?>
<style>
    a{
        color: #f6f9ff;
        /* border: none; */
    }
    a:hover{
        color: #f6f9ff;
        text-decoration: none;
    }
</style>
<h1>Workbanch</h1>
<div class="row">
    <!-- Book -->
        <div class="col-sm-4 card_shadow">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Book <span><a href="<?php echo base_url('/book/Books/editBookDetails'); ?>"><i class="fas fa-edit"></i></a></span></h5>
                </div>
                <a href="<?php echo base_url('/book/Books/editBookDetails'); ?>">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>145</h6>
                                <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    
    <!-- Author -->
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Author <span><a href="<?php echo base_url('/book/Books/edit_authorDetails'); ?>"><i class="fas fa-edit"></i></a></span></h5>                
                </div>
                <a href="<?php echo base_url('/book/Books/add_authorDetails'); ?>">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class=""></i>
                            </div>
                            <div class="ps-3">
                                <h6>145</h6>
                                <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    
    <!-- Publisher -->
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Publisher <span><a href="<?php echo base_url('/book/Books/edit_publisherDetails'); ?>"><i class="fas fa-edit"></i></a></span></h5>                
                </div>
                <a href="<?php echo base_url('/book/Books/add_publisherDetails'); ?>">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>145</h6>
                                <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    <!-- Employee -->
        <div class="col-sm-4 mt-4">
            <a href="<?php echo base_url('/LMS_Login/updateprofile/'); ?>">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Employee</h5>                
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>145</h6>
                                <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    <!-- Member -->
        <div class="col-sm-4 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Member <span><a href="<?php echo base_url('/controllerMember/member/memberedit'); ?>"><i class="fas fa-edit"></i></a></span></h5>                
                </div>
                <a href="<?php echo base_url('/controllerMember/member/memberedit'); ?>">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>145</h6>
                                <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    <!-- Order -->
        <div class="col-sm-4 mt-4">
            <a href="<?php echo base_url('/ordercontroller/orderbook/create_order/'); ?>">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Order</h5>                
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>145</h6>
                            <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

    <!-- Plan -->
        <div class="col-sm-4 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Plan <span><a href="<?php echo base_url('/Plancontroller/Plan/editDetails'); ?>"><i class="fas fa-edit"></i></a></span></h5>                
                </div>
                <a href="<?php echo base_url('/Plancontroller/Plan/'); ?>">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>145</h6>
                                <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    <!-- Plan Details-->
        <div class="col-sm-4 mt-4">
            <a href="<?php echo base_url('/Plancontroller/Plan/getPlanDetails'); ?>">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Plan Details</h5>                
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>145</h6>
                                <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    

</div>

<?php include_once(APPPATH.'views/footer.php');?>