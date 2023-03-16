<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    
</head>
<body>
    @if(session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
    @endif
    
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
             
Contacts - <a href="/create">create contact</a>

        <table>
            <tr>
                <td><h3>Name </h3></td>
                <td><h3>E-mail </h3></td>
                <td><h3>Action </h3></td>
                <td>{{$contacts->links()}}</td>
            </tr>

        @foreach ($contacts as $contact)
        
            <tr>
                <td><label>{{ $contact->name }}</label></td>
                <td><label>{{ $contact->email }}</label></td>
                <td><a href="{{route('edit', ['id' => $contact->id])}}">edit</a> / <a href="{{route('delete', ['id' => $contact->id])}}">delete</a></td>
            </tr>
            
        @endforeach
        </table>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
<h1></h1>

   
    
   
    
</body>
</html>