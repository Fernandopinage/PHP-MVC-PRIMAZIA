<?php

include_once "../../layout/heard.php";

?>
<link href="../../layout/css/cliente_login.css" rel="stylesheet">
<div class="container-fluid">
    <div class="text-center">
        <img id="logo" src="../../images/primazia.png" class="img"><br>
    </div>

    <div class="title text-center">
        <p>LOGIN CLIENTE</p>
    </div>
    <div class="container">
        <form class="row g-4" id="form">
            <div class="col-12">
                <label for="exampleInputEmail1" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-12">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2 col-3 mx-auto">
                <button type="submit" class="btn btn-lg orangered">ENVIAR</button>
            </div>
        </form>
    </div>

</div>


<?php

include_once "../../layout/footer.php";
?>