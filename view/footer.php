            <div class="row">
                <div class="col-xs-12">
                    <hr />
                    <footer class="text-center well">
                    <?php
                        echo "Usuario: ".$_SESSION['usuario']."<br/>";
                        echo "claveApi: ".$_SESSION['claveApi']."<p/></br></br>";
                        echo '<p>Si detectas un error no dudes en contactarnos al siguiente correo: Alexis.tuz1@gmail.com <br>';
                        echo '<br><a href="correo.html" >Enviar correo</a> <br>';
                        echo '<br><a href="?c=Pedido&a=logout" class="btn btn-info" >Cerrar sesión</a>';
                        
                    ?>
                    </footer>
                </div>
            </div>
        </div>

        <script src="assets/js/bootstrap.min.js"></script>
        <!-- <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/js/ini.js"></script>
        <script src="assets/js/jquery.anexsoft-validator.js"></script> -->
    </body>
</html>
