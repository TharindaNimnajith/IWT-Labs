<!DOCTYPE html>
<html lang="en_US">
    <head>
        <meta charset="utf-8">
        <title>Employee Management System</title>    
    </head>
    <body bgcolor="#f0f0f0">
        <h1>Hello There!</h1>
        <h2>Insert Records Below</h2>
        <table style="text-align:center">
            <form action="insert.php" method="post" name="frm1">
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Salary: </td>
                    <td><input type="text" name="salary"></td>
                </tr>
                <tr>
                    <td>Designation: </td>
                    <td><input type="text" name="des"></td>
                </tr>
                <tr>                    
                    <td>ID: </td>
                    <td><input type="text" name="id" ></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Insert Data">
                    </td>
                </tr>
            </form>
        </table>
        <h3>To Retrieve Records</h3>
        <a href="find.php">Click Here</a>
    </body>
</html>

