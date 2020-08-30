<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portals</title>
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
            <div class="col-lg-8">
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
                function(res, status){
                    var data = JSON.parse(res);
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
                        $('body').append(`
                        
                        <table id="std" style="width:100%" border=1>
                            <tr>
                                <th>Student Id</th>
                                <th>Firstname</th>
                                <th>Lastname</th> 
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Department</th>
                                <th>Year</th>
                                <th>Percentage</th>
                            </tr>
                            <tr>
                                <td>`+studata.id+`</td>
                                <td>`+studata.first_name+`</td>
                                <td>`+studata.last_name+`</td>
                                <td>`+studata.email+`</td>
                                <td>`+studata.phone+`</td>
                                <td>`+studata.department+`</td>
                                <td>`+studata.year+`</td>
                                <td>`+studata.percentage+`</td>
                                
                        </tr>
                            
                            </table>
                        `);
                    }
                    setTimeout(() => {
                        $('#resalert').remove();
                    }, 3000);
                });
            });
    </script>
</body>
</html>