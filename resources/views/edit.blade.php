
<form method="post" action="{{route('update', ['id' => $contact->id])}}" >
        @csrf
        <table>
            <tr>
                <td><label>name</label></td>
                <td><input type="text" name="name" id="name" value = '{{$contact->name}}'> </td>
            </tr>
            <tr>
                <td><label>e-mail</label></td>
                <td>
                    <input type = "text" id="email" name="email" value = '{{$contact->email}}'>
    
                </input>
                </td>
            </tr>
            <td> <input type="submit" name="edit" value="edit contact" /></td>
            </tr>
        </table>
    </form>