<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
<div class="row justify-content-center" style="margin-top: 30px;">
<div class="col-md-6">
<div class="card ">
<div class="card-body"><center></center>
<h4>Your school has created an <strong> TWIS </strong> count for you.</h4>
<p>Below is your creditentials. use them and <a href="../../../../localhost:8000/login">click here </a> to login and edit your profile account</p>
<div class="alert alert-light">Username: <strong>{{$username}}</strong> <br />Password: <strong>{{$password}}</strong></div>
<div class="alert alert-light"><a class="btn btn-primary btn-sm" href="../../../../localhost:8000/login"> Login here </a></div>
<div class="alert alert-dark">If is not you please ignore the message</div>
</div>
</div>
</div>
</div>
</body>

</html>