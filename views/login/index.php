<script>
    $(document).ready(function() {
        $('#dialog').dialog({
            autoOpen: true,
            width: 350,
            buttons: {
                "Login": function() { 
                  f1.submit();
                   // $(this).dialog("close"); 
                }, 
                "Cancel": function() { 
                    $(this).dialog("close"); 
                } 
            }
        });

    });
</script>

<div id="dialog" title="Login">
    <form action="<?php echo URL; ?>login/login/" method="post" id="f1">
        <table>
            <tr>
                <td>username</td>
                <td><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password"/></td>
            </tr>
        </table>
    </form>
</div>


