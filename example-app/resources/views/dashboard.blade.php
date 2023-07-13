{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student table</title>
    <style>
        body{
            background: lightblue;
        }
        h1 {
      font-family: Arial, sans-serif;
      font-size: 24px;
      color: #333;
      background-color: #f2f2f2;
      padding: 10px;
      margin: 0;
    }
          table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  /* Example additional styles */
  table {
    font-family: Arial, sans-serif;
  }

  th {
    color: #333;
  }

  tr:hover {
    background-color: #f9f9f9;
  }
  table, th, td {
      border: 1px solid black;
      padding: 5px;
    }

    .edit-button, .delete-button {
      padding: 5px 10px;
      cursor: pointer;
    }

    .edit-button {
      background-color: #4CAF50;
      color: white;
      border: none;
    }

    .delete-button {
      background-color: #f44336;
      color: white;
      border: none;
    }
    .alert {
        padding: 1rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
    .navbar {
  background-color: #333;
  padding: 10px;
  color: #fff;
}

.navbar-brand a {
  color: #fff;
  font-weight: bold;
  text-decoration: none;
}

.navbar-menu {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.navbar-menu li {
  display: inline-block;
  margin-right: 10px;
}

.navbar-menu li a {
  color: #fff;
  text-decoration: none;
}

.navbar-menu li a:hover {
  text-decoration: underline;
} 
    </style>
</head>
<body>
  <header>
    <nav class="navbar">
  <div class="navbar-brand">
  </div>
  <ul class="navbar-menu">
    <li><a href="{{route('students.create')}}">Fill a form</a></li>
  </ul>
</nav>
</header>
  

  
      @if(session('success'))
      <div class="alert alert-success"> 
        {{ session('success') }}
      </div>
      @endif
  


    <h1>
        Welcome to Student Table
    </h1>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Phone Number</th>
                <th>Roll Number</th>
                <th>Action</th>
            </tr>
        </thead>
            
        <tbody>
        
          @foreach ($students as $student)
          <tr>

                <td>{{ $student->fname }} </td>
                <td>{{ $student->lname }} </td>
                <td>{{ $student->email }} </td>
                <td>{{ $student->telnum }} </td>
                <td>{{ $student->rollno }} </td>
                <td> 
                  <button><a href="{{ route('students.index', $student->id) }}">View</a></button>
                  <button><a href="{{ route('students.edit', $student->id) }}">Edit</a></button>
                  <button><a href="{{ route('students.delete', $student->id) }}">Delete</a></button> 
                </td>
              </tr> 
              @endforeach

        </tbody>

        

    </table>
    <p>This is a demo website for making a website using Laravel</p>
    <footer>End of the page</footer>
</body>
</html>