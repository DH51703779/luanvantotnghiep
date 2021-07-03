<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="{{asset('public/frontend/plugins/fullcalendar/css/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/style1.css')}}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
   
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
     
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
       
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

        
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Calendar</h4>
                                </div>
                                <div class="row">
                            
                                    <div class="col-md-12">
                                        <div class="card-box m-b-50">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>

                                    <!-- end col -->
                                    <!-- BEGIN MODAL -->
                                    <div class="modal fade none-border" id="event-modal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><strong>Add New Event</strong></h4>
                                                </div>
                                                <div class="modal-body"></div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Add Category -->
                                    <div class="modal fade none-border" id="add-category">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><strong>Add a category</strong></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="control-label">Category Name</label>
                                                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="control-label">Choose Category Color</label>
                                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                                    <option value="success">Success</option>
                                                                    <option value="danger">Danger</option>
                                                                    <option value="info">Info</option>
                                                                    <option value="pink">Pink</option>
                                                                    <option value="primary">Primary</option>
                                                                    <option value="warning">Warning</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END MODAL -->
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
  
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('public/frontend/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('public/frontend/js1/custom.min.js')}}"></script>
    <script src="{{asset('public/frontend/js1/settings.js')}}"></script>
    <script src="{{asset('public/frontend/js1/gleek.js')}}"></script>
    <script src="{{asset('public/frontend/js1/styleSwitcher.js')}}"></script>

    
    <script src="{{asset('public/frontend/plugins/jqueryui/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('public/frontend/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('public/frontend/plugins/fullcalendar/js/fullcalendar.min.js')}}"></script>
    <script src="{{asset('public/frontend/js1/plugins-init/fullcalendar-init.js')}}"></script>

</body>

</html>