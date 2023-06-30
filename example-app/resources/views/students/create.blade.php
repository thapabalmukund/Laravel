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
  @if ($errors->any())
    <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <p>Xyz  College Form</p>
  <div class="form-group">
    <form action="{{url('students')}}" method="POST">
      @csrf
      <label for="fname">First name:</label>
      <input type="text" id="fname" name="fname" value="{{ old('fname') }}"><br><br><br>
      <label for="lname">Last name:</label>
      <input type="text" id="lname" name="lname" value="{{ old('lname') }}"><br><br><br>
      <div class= "form-group">
      <label for="email">E-mail:</label>
      <input type="text" id="email" name="email" value="{{ old('email') }}">
      </div> <br>
      <label for="telnum">Telephone Number:</label>
      <input type="number" id="telnum" name="telnum" value="{{ old('telnum') }}"><br><br><br>
      <label for="rollno">Roll Number:</label>
      <input type="number" id="rollno" name="rollno" value="{{ old('rollno') }}"><br><br><br>
      <input type="submit" value="Submit" >
    </form>    
</body>
</html>