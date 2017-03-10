<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
  <h2> Email received From contact page  {{ $name }}</h2>
  <blockquote>
  	<h2>{{$email}}</h2>
  	<h3>Subject:</h3>
  	<p>{{$subject}}</p>
  	<p>{{$mail_message}}</p>
  </blockquote>
  <h5>This message send for you by using the contact form of larablog.com</h5>
</body>
</html>		