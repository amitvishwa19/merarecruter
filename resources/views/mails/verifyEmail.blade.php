<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>

   Click <a href="{{route('auth.verifyemail',['email'=>$user->email,'token'=>$user->verifyToken])}}">Verify</a> to verify and activate your account.

   
</body>
</html>