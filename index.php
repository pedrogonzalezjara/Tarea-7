
    <?php
        $soapClient = new SoapClient('http://sebastian.cl/isw-ws/wsISW?wsdl');
        function validaRequerido($valor){
        if(trim($valor) == ''){
            return false;
            }else{
            return true;
            }
        }
        if(isset($_POST['enviar']))
        {
        
        $mensaje=$_POST["mensaje"];
        $rut=$_POST["rut"];
            if(validaRequerido($mensaje)&&  validaRequerido($rut))
            {
                $arreglo=array("rut"=>$rut,"mensaje"=>$mensaje);
                $resultado=$soapClient->guardarMensaje($arreglo);
                echo "mensaje agregado<br>";
                $mensaje=$resultado->return->mensaje;
                echo $mensaje;
            }
            else
                echo "Uno de los Campos esta Vacio";
        }
        if(isset($_POST['integrantes']))
        {
        echo "Pedro Gonzalez<br>";
        echo "Camilo Candia<br>";
        echo "Andres Mardones<br>";
        echo "Fecha : ";
        echo date("d-m-Y H:i:s");
        }
        if(isset($_GET['buscar']))
        {
            $rut2=$_GET["rut"];
            if(validaRequerido($rut2))
            {
                
                $arreglo2=array("rut"=>$rut2);
                $buscar = $soapClient->__soapCall("getMensajesPorRut",$arreglo2);
                $mostrar=$buscar->return->mensaje;
                echo $mostrar;
            }
            else
                echo "Uno de los Campos esta Vacio";
                
        }
        ?>
                
        
        
        