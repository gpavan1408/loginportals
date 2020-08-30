<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="md-form md-outline">
                    
                    <input type="text" id="sid" class="form-control">
                    <label for="sid">Student ID</label>
                </div>
            </div>
            <div class="col-lg-2">
                <button type="button" id="getdetails" class="btn btn-primary">Get Details</button>
            </div>
            <div class="col-lg-2">
                <a href="logout.php" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>

  

  <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 d-none" id="studata">
                <div class="card">

                    <h5 class="card-header info-color white-text text-center py-4">
                        <strong id="id"></strong>
                    </h5>
                
                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0">
                
                        <!-- Form -->
                        <form class="text-center" style="color: #757575;" action="updatesd.php" method="post">
                
                            <div class="form-row">
                                <div class="col">
                                    <!-- First name -->
                                    <div class="md-form">
                                        <input type="text" id="firstname" name="firstname" class="form-control">
                                        <label for="firstname">First name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Last name -->
                                    <div class="md-form">
                                        <input type="text" id="lastname" name="lastname" class="form-control">
                                        <label for="lastname">Last name</label>
                                    </div>
                                </div>
                            </div>
                
                            <!-- E-mail -->
                            <div class="md-form mt-0">
                                <input type="email" id="email" name="email" class="form-control">
                                <label for="email">E-mail</label>
                            </div>
                
                
                            <!-- Phone number -->
                            <div class="md-form">
                                <input type="text" id="phone" name="phone" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                                <label for="phone">Phone number</label>
                                
                            </div>
                            
                            <!--Department-->
                            <select class="mdb-select md-form" name="department" id="department">
                                <option value="" disabled selected>Choose Department</option>
                                <option value="CSE">CSE</option>
                                <option value="IT">IT</option>
                                <option value="ECE">ECE</option>
                                <option value="EEE">EEE</option>
                                <option value="MECHANICAL">MECHANICAL</option>
                                <option value="CIVIL">CIVIL</option>
                            </select>
                           
                            <!--Year-->
                            <select class="mdb-select md-form" name="year" id="year">
                                <option value="" disabled selected>Choose Studying Year</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                               
                            </select>
                

                            <!--Percentage-->
                            <h3 class="indigo-text mt-4"><strong>Set Percentage</strong></h3>
                            <div class="range-field my-4 w-100">
                                
                                <input type="range" name="percentage" id="percentage" min="0" max="100" />
                                
                            </div>
                            <!-- Sign up button -->
                            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Apply</button>
                
                            
                        </form>
                        <!-- Form -->
                
                    </div>
                
                </div>
                
            </div>
            
        </div>
        
    </div>
  <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/mdb.min.js"></script>
  <script>
       $('#getdetails').click(function() {
            var sid = $('#sid').val();
            $('#sid').val('');
            $.post("getstudentdetails.php",
                {
                    sid: sid
                    
                },
                function(data, status){
                    data = JSON.parse(data);
                    if(data.valid=="0")
                    {
                        $('body').prepend(`
                            <div id="resalert" class="alert alert-danger" role="alert">
                                Invalid  Credentials
                            </div>
                        `)
                    }
                    else if(data.valid=="2")
                    {
                        $('body').prepend(`
                        <div id="resalert" class="alert alert-warning" role="alert">
                            Please login first!
                        </div>
                        `)
                    }
                    else if(data.valid=="1")
                    {
                        studata = data.data;
                        if($('#std'))
                        {
                            $('#std').remove();
                        }
                        
                        console.log(studata)
                        $('#id').val(studata.id);
                        $('#firstname').val(studata.first_name);
                        $('#lastname').val(studata.last_name);
                        $('#email').val(studata.email);
                        $('#phone').val(studata.phone);
                        $('#department').val(studata.department);
                        $('#year').val(studata.year);
                        $('#percentage').val(studata.percentage);

                        $('#studata').removeClass('d-none');
                    }
                    setTimeout(() => {
                        $('#resalert').remove();
                    }, 3000);
                });
            });
  </script>
</body>
</html>