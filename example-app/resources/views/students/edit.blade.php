<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Form</title>
    <style>
      #email{
        display: inline;
      }
      .form-group {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
  }
      .form-group label {
    margin-right: 10px;
  }

    </style>
</head>
<body>
  <h1>Welcome To Student Form</h1>
  <p>Xyz  College Form</p>
  <div  class="form-group">
  {{-- @dd($student) --}}
    <form action="{{ route('students.update',['id'=>$student->id])}}" method="post">
      @csrf
      @method('PUT')
      <label for="fname">First name:</label>
      <input type="text" id="fname" name="fname" value="{{$student->fname}}"><br><br><br>
      <label for="lname">Last name:</label>
      <input type="text" id="lname" name="lname" value="{{$student->lname}}"><br><br><br>
      <div class= "form-group">
      <label for="email">E-mail:</label>
      <input type="text" id="email" name="email" value="{{$student->email}}">
      </div> <br>
      <label for="telnum">Telephone Number:</label>
      <input type="number" id="telnum" name="telnum" value="{{$student->telnum}}"><br><br><br>
      <label for="rollno">Roll Number:</label>
      <input type="number" id="rollno" name="rollno" value="{{$student->rollno}}"><br><br><br>
      <input type="submit" value="Submit" >

    </form>
    
</body>
</html>