    <form action="create" method="post">
        @csrf
        <table>
            <tr>
                <td><label>name</label></td>
                <td><input type="text" name="name" id="name"> </td>
            </tr>
            <tr>
                <td><label>e-mail</label></td>
                <td>
                    <input type = "text" id="email" name="email">
    
                </input>
                </td>
            </tr>
            <td> <input type="submit" name="Add" value="Add contact" /></td>
            </tr>
        </table>
    </form>
