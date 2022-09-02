<?php

class Data {

    private $con_info = [
        "host" => "localhost",
        "user" => "root",
        "passwd" => "",
        "database" => "fund_afenix",
        "port" => 3306
    ];
    private $con = null;

    public function __construct() {
        $this->con = new mysqli($this->con_info["host"], $this->con_info["user"],
                $this->con_info["passwd"], $this->con_info["database"],
                $this->con_info["port"]);

        if ($this->con->connect_error) {
            die("Error de conexión! : " . $this->con->connect_error);
        }
    }

    public function getConnection() {
        return $this->con;
    }

    public function isUserPassValid($rut, $pass) {
        $sql = "SELECT COUNT(*) AS 'existe' 
	            FROM usuario
	            WHERE RUT = '$rut' AND passwd = sha2('$pass',0)";

        $query = $this->con->query($sql);

        while ($fila = $query->fetch_row()) {
            return ($fila[0] == 1);
        }

        return false;
    }

    public function getUserbyRut($rut) {
        $sql = "SELECT * FROM usuario where RUT = '$rut'";
        $query = $this->con->query($sql);
        return $query;
    }
    
    public function addBenefi($rut, $nombre, $apellido, $fecha_nac, $genero, $direccion, $comuna, $c_identidad, $teleton, $pension, $ch_soli, $rs_hogar) {
        $sql = "INSERT INTO `beneficiario` (`ID`, `RUT`, `nombre`, `apellido`, `fecha_nac`, `genero`, `direccion`, `comuna`, `c_identidad`, `teleton`, `pension`, `chile_solidario`, `r_s_hogares`) VALUES (NULL, '$rut', '$nombre', '$apellido', '$fecha_nac', '$genero', '$direccion', '$comuna', '$c_identidad', '$teleton', '$pension', '$ch_soli', '$rs_hogar');";
        $this->con->query($sql);
    }
    
    public function addPension($pension,$pensionBas, $subsidioD, $p_sobrevi, $a_duplo, $rut) {
        $sql = "INSERT INTO `pension` (`ID`, `pension`, `pension_basicaS`, `subsidioD_mental`, `p_sobrevivencia`, `a_dublo`, `beneficiario`) VALUES (NULL, '$pension', '$pensionBas', '$subsidioD', '$p_sobrevi', '$a_duplo', '$rut');";
        $this->con->query($sql);
    }
    
    public function addTutor($rut, $nombre, $fecha_nac, $direccion, $comuna, $c_identidad, $n_escolar, $ocuapcion, $telefono, $email, $prevision) {
        $sql = "INSERT INTO `tutor` (`ID`, `RUT`, `nombre`, `fecha_nac`, `direccion`, `comuna`, `c_identidad`, `n_escolar`, `ocupacion`, `telefono`, `email`, `prevision`) VALUES (NULL, '$rut', '$nombre', '$fecha_nac', '$direccion', '$comuna', '$c_identidad', '$n_escolar', '$ocuapcion', '$telefono', '$email', '$prevision');";
        $this->con->query($sql);
    }
       
    public function addParentezo($nombre, $beneficiario, $tutor) {
        $sql = "INSERT INTO `parentezco` (`ID`, `parecido`, `beneficiario`, `tutor`) VALUES (NULL, '$nombre', '$beneficiario', '$tutor');";
        $this->con->query($sql);
    }
    
    public function addRegisSocial($copia, $tipoDocu, $beneficiario) {
        $sql = "INSERT INTO `registro_socialh` (`ID`, `copia_cartola`, `tipoDocumento`, `beneficiario`) VALUES (NULL, '$copia', '$tipoDocu', '$beneficiario');";
        $this->con->query($sql);
    }
    
    public function addTeleton($registro, $beneficiario) {
        $sql = "INSERT INTO `registro_teleton` (`ID`, `registro`, `beneficiario`) VALUES (NULL, '$registro', '$beneficiario');";
        $this->con->query($sql);
    }
    
    public function addDiagnos($espec, $ultiControl, $inf_Diagnos, $tipoDocu, $benefi, $cod) {
        $sql = "INSERT INTO `diagnostico` (`id`, `especialista`, `fecha_u_control`, `informe_diagnostico`, `tipoDocumento`, `beneficiario`, `codigo`) VALUES (NULL, '$espec', '$ultiControl', '$inf_Diagnos', '$tipoDocu', '$benefi', '$cod');";
        $this->con->query($sql);
    }
    
    public function addCredencialD($numCreden, $o_Princ, $o_Secund, $porcen, $grado, $movilidad, $creden_Front, $creden_Back, $benefi) {
        $sql = "INSERT INTO `c_discapacidad` (`ID`, `n_credencial`, `o_principal`, `o_secundario`, `porcentaje`, `grado`, `movilidad`, `c_parte_delantera`, `c_parte_trasera`, `beneficiario`) VALUES (NULL, '$numCreden', '$o_Princ', '$o_Secund', '$porcen', '$grado', '$movilidad', '$creden_Front', '$creden_Back', '$benefi');";
        $query = $this->con->query($sql);
    }
    
    public function addGeneral($motivo,$derivacion,$atencion,$rut) {
        $sql="INSERT INTO `datosgenerales` (`ID`, `motivo`, `derivacion`, `atencion`, `beneficiario`) VALUES (NULL, '$motivo', '$derivacion', '$atencion', '$rut');";
        $query= $this->con->query($sql);
    }
    
    public function getBenefi($rut) {
        $sql = "SELECT * FROM beneficiario where RUT = '$rut'";
        $query = $this->con->query($sql);
        return $query;
    }
    
    public function getTutor($rut) {
        $sql = "SELECT * FROM tutor where RUT = '$rut'";
        $query = $this->con->query($sql);
        return $query;
    }
    
    public function getTutorForBen($rut) {
        $sql = "SELECT * FROM tutor where  rut = (SELECT tutor from parentezco WHERE beneficiario = '$rut')";
        $query = $this->con->query($sql);
        return $query;
    }
    
    public function getDiagnostico($rut) {
        $sql = "SELECT * FROM diagnostico where beneficiario = '$rut';";
        $query = $this->con->query($sql);
        return $query;
    }
    
    public function getAllCondition() {
        $sql = "SELECT * FROM condicion";
        $query = $this->con->query($sql);
        return $query;
    }
    
    public function getConditionCode($code) {
        $sql = "SELECT * FROM condicion where ID = '$code'";
        $query = $this->con->query($sql);
        return $query;
    }
    
    public function getCreden($rut) {
        $sql = "SELECT COUNT(*) AS 'existe' 
	            FROM c_discapacidad
	            WHERE beneficiario = '$rut';";

        $query = $this->con->query($sql);

        while ($fila = $query->fetch_row()) {
            return ($fila[0] == 1);
        }

        return false;
    }
    
    public function getDiagValid($rut) {
        $sql = "SELECT COUNT(*) AS 'existe' 
	            FROM diagnostico
	            WHERE beneficiario = '$rut';";

        $query = $this->con->query($sql);

        while ($fila = $query->fetch_row()) {
            return ($fila[0] == 1);
        }

        return false;
    }
    
}
?>



