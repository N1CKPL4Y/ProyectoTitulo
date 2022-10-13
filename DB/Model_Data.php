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

    public function addBenefi($rut, $nombre, $apellido, $fecha_nac, $genero, $direccion, $comuna, $c_identidad, $teleton, $creden, $pension, $ch_soli, $rs_hogar, $prevision) {
        $sql = "INSERT INTO `beneficiario` (`ID`, `RUT`, `nombre`, `apellido`, `fecha_nac`, `genero`, `direccion`, `comuna`, `c_identidad`, `teleton`, `c_discapacidad`, `pension`, `chile_solidario`, `r_s_hogares`, `prevision`) VALUES (NULL, '$rut', '$nombre', '$apellido', '$fecha_nac', '$genero', '$direccion', '$comuna', '$c_identidad', '$teleton', '$creden', '$pension', '$ch_soli', '$rs_hogar', '$prevision');";
        $this->con->query($sql);
    }

    public function addTutor($rut, $nombre, $fecha_nac, $direccion, $comuna, $c_identidad, $n_escolar, $ocuapcion, $telefono, $email, $prevision) {
        $sql = "INSERT INTO `tutor` (`ID`, `RUT`, `nombre`, `fecha_nac`, `direccion`, `comuna`, `c_identidad`, `n_escolar`, `ocupacion`, `telefono`, `email`, `prevision`) VALUES (NULL, '$rut', '$nombre', '$fecha_nac', '$direccion', '$comuna', '$c_identidad', '$n_escolar', '$ocuapcion', '$telefono', '$email', '$prevision');";
        $this->con->query($sql);
    }

    public function addParentezo($nombre, $beneficiario, $tutor) {
        $sql = "INSERT INTO `parentesco` (`ID`, `parecido`, `beneficiario`, `tutor`) VALUES (NULL, '$nombre', '$beneficiario', '$tutor');";
        $this->con->query($sql);
    }

    public function addRegisSocial($copia, $porcentaje, $tipoDocu, $beneficiario) {
        $sql = "INSERT INTO `registro_socialh` (`ID`, `copia_cartola`, `porcentaje`, `tipoDocumento`, `beneficiario`) VALUES (NULL, '$copia', $porcentaje, '$tipoDocu', '$beneficiario');";
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

    public function addGeneral($motivo, $derivacion, $atencion, $rut) {
        $sql = "INSERT INTO `datosgenerales` (`ID`, `motivo`, `derivacion`, `atencion`, `beneficiario`) VALUES (NULL, '$motivo', '$derivacion', '$atencion', '$rut');";
        $query = $this->con->query($sql);
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
        $sql = "SELECT * FROM tutor where  rut = (SELECT tutor from parentesco WHERE beneficiario = '$rut')";
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

    public function getDiagCom($rut) {
        $sql = "SELECT diagnostico.codigo, condicion.nombre FROM `diagnostico` INNER JOIN condicion ON diagnostico.codigo=condicion.ID WHERE diagnostico.beneficiario='$rut';";
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

    public function getCredenByRut($rut) {
        $sql = "SELECT * FROM c_discapacidad WHERE beneficiario = '$rut';";

        $query = $this->con->query($sql);

        return $query;
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

    public function getAllUsers() {
        $sql = "SELECT usuario.id as 'id', usuario.RUT as 'rut', usuario.nombre as 'nombre', usuario.apellido as 'apellido', usuario.email as 'correo',usuario.passwd as 'passwd', usuario.telefono as 'telefono', t_usuario.nombre as 'tipo usuario', t_usuario.ID as 'id_user', a_usuario.nombre as 'area usuario', a_usuario.ID as 'a_user', cargo.nombre as 'cargo', cargo.id as 'c_user', usuario.activo as 'activo' FROM usuario INNER JOIN t_usuario ON t_usuario.id = usuario.t_user INNER JOIN a_usuario ON a_usuario.id = usuario.a_user INNER JOIN cargo ON cargo.id = usuario.cargo;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAllT_users() {
        $sql = "SELECT t_usuario.ID as 'id', t_usuario.nombre as 'nombre' from t_usuario;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAllA_users() {
        $sql = "SELECT a_usuario.ID as 'id', a_usuario.nombre as 'nombre' FROM a_usuario where activo = 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAllCargos() {
        $sql = "SELECT cargo.id as 'id', cargo.nombre as 'nombre' from cargo;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addUser($rut, $nombre, $apellido, $correo, $passwd, $telefono, $t_user, $a_user, $c_user) {
        $sql = "INSERT INTO `usuario` (`ID`, `RUT`, `nombre`, `apellido`, `email`, `passwd`, `telefono`, `t_user`, `a_user`, `cargo`, `activo`) VALUES (NULL, '$rut', '$nombre', '$apellido', '$correo', sha2('$passwd', 0), '$telefono', '$t_user', '$a_user', '$c_user', 1)";
        $query = $this->con->query($sql);
    }

    public function getAreasActivas() {
        $sql = "SELECT a_usuario.id as 'id', a_usuario.nombre as 'nombre' FROM a_usuario WHERE activo = 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAreasNoActivas() {
        $sql = "SELECT a_usuario.id as 'id', a_usuario.nombre as 'nombre' FROM a_usuario WHERE activo = 0;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addArea($nombre) {
        $sql = "INSERT INTO a_usuario (`ID`, `nombre`, `activo`) VALUES (null, '$nombre', 1)";
        $query = $this->con->query($sql);
    }

    public function existArea($nombre) {
        $sql = "SELECT COUNT(*) AS 'existe' FROM a_usuario where nombre = '$nombre'";
        $query = $this->con->query($sql);

        while ($fila = $query->fetch_row()) {
            return ($fila[0] == 1);
        }

        return false;
    }

    public function addCondicion($nombre, $codigo, $descripcion) {
        $sql = "INSERT INTO condicion (`ID`, `nombre`, `codigo`, `descripcion`) VALUES (null, '$nombre', '$codigo', '$descripcion')";
        $query = $this->con->query($sql);
    }

    public function existCondicion($nombre) {
        $sql = "SELECT COUNT(*) AS 'existe' FROM condicion where nombre = '$nombre'";
        $query = $this->con->query($sql);

        while ($fila = $query->fetch_row()) {
            return ($fila[0] == 1);
        }

        return false;
    }

    public function getAllCondiciones() {
        $sql = "SELECT condicion.nombre as 'nombre', condicion.codigo as 'codigo', condicion.descripcion as 'descripcion' FROM condicion;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addPension($pension) {
        $sql = "INSERT INTO pension (`ID`, `nombre`) VALUES (null, '$pension')";
        $query = $this->con->query($sql);
    }

    public function addPensionBene($benef, $pension) {
        $sql = "INSERT INTO beneficiario_pension (`ID`, `beneficiario`, `pension`) VALUES (null, '$benef', '$pension')";
        $query = $this->con->query($sql);
    }

    public function getAllPensiones() {
        $sql = "SELECT pension.nombre as 'nombre' FROM pension";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAllPensionesAll() {
        $sql = "SELECT * FROM pension";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getPrevForId($id) {
        $sql = "SELECT nombre FROM t_prevision where ID =$id";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getPensionById($id) {
        $sql = "SELECT * FROM pension where ID = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function existPension($nombre) {
        $sql = "SELECT COUNT(*) AS 'existe' FROM pension where nombre = '$nombre'";
        $query = $this->con->query($sql);

        while ($fila = $query->fetch_row()) {
            return ($fila[0] == 1);
        }

        return false;
    }

    public function getAllBenefi() {
        $sql = "SELECT * FROM beneficiario ";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getEdad($rut) {
        $sql = "SELECT YEAR(CURDATE())-YEAR(fecha_nac) AS 'Años', MONTH(CURDATE())-MONTH(fecha_nac) AS 'Meses' FROM beneficiario where RUT = '$rut'";
        $query = $this->con->query($sql);
        return $query;
    }

    public function updateUser($rut, $email, $passwd, $telefono, $t_user, $a_user, $cargo, $activo) {
        $sql = "UPDATE `usuario` SET `email` = '$email', `passwd` = sha2('$passwd',0), `telefono` = '$telefono', `t_user` = '$t_user', `a_user` = '$a_user', `cargo` = '$cargo', `activo` = '$activo' WHERE `usuario`.`RUT` = '$rut';";
        $query = $this->con->query($sql);
    }

    public function updatePUser($rut, $email, $passwd, $telefono, $t_user, $a_user, $cargo, $activo) {
        $sql = "UPDATE `usuario` SET `email` = '$email', `passwd` = '$passwd', `telefono` = '$telefono', `t_user` = '$t_user', `a_user` = '$a_user', `cargo` = '$cargo', `activo` = '$activo' WHERE `usuario`.`RUT` = '$rut';";
        $query = $this->con->query($sql);
    }

    public function updateArea($id, $p) {
        $sql = "UPDATE `a_usuario` SET `activo` = '$p' WHERE `a_usuario`.`ID` = '$id';";
        $query = $this->con->query($sql);
    }

    public function existBeneficiario($rut) {
        $sql = "SELECT beneficiario.RUT as 'rut' FROM beneficiario WHERE RUT = '$rut';";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getExistBen($rut) {
        $sql = "SELECT COUNT(*) AS 'existe' 
	            FROM beneficiario
	            WHERE RUT = '$rut';";

        $query = $this->con->query($sql);

        while ($fila = $query->fetch_row()) {
            return ($fila[0] == 1);
        }

        return false;
    }

    public function addEvento($title, $fecha, $color) {
        $sql = "INSERT INTO `evento` (`id`, `title`, `start`, `color`) VALUES (NULL, '$title', '$fecha', '$color');";
        $query = $this->con->query($sql);
    }

    public function getLimitEvent() {
        $sql = "select id from evento order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addConsulta($id, $rutBene, $rutProfe) {
        $sql = "INSERT INTO `consulta` (`id`, `id_evento`, `rut_bene`, `rut_profe`) VALUES (NULL, '$id', '$rutBene', '$rutProfe');";
        $query = $this->con->query($sql);
    }

    public function getProfesional() {
        $sql = "SELECT * FROM `usuario` WHERE cargo=3 OR cargo=4;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAllEvent() {
        $sql = "SELECT * FROM evento";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAllEventAdministrative() {
        $sql = "SELECT * FROM evento_admin";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getLastEventAdministrative() {
        $sql = "select * from evento_admin order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getEventProf($area, $rut) {
        $sql = "SELECT evento.* FROM `evento` INNER JOIN consulta ON consulta.id_evento=evento.id INNER JOIN usuario ON usuario.RUT=consulta.rut_profe INNER JOIN a_usuario ON usuario.a_user=a_usuario.ID WHERE usuario.a_user=$area AND usuario.RUT='$rut';";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getConsula() {
        $sql = "SELECT consulta.id as 'id',evento.id as 'evento', beneficiario.RUT,beneficiario.nombre, tutor.telefono, usuario.nombre as 'profesional' FROM consulta INNER JOIN evento on evento.id=consulta.id_evento INNER JOIN beneficiario on beneficiario.RUT=consulta.rut_bene INNER JOIN usuario ON usuario.RUT=consulta.rut_profe INNER JOIN parentesco ON beneficiario.RUT=parentesco.beneficiario INNER JOIN tutor ON tutor.RUT=parentesco.tutor;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getConsEvent($rut_bene, $rut_profe) {
        $sql = "SELECT COUNT(*) as 'Consultas' FROM consulta INNER JOIN evento ON consulta.id_evento=evento.id WHERE consulta.rut_bene='$rut_bene' AND consulta.rut_profe='$rut_profe' AND evento.start BETWEEN (SELECT CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') AS DATE)) AND (SELECT LAST_DAY(NOW()));";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCountPrograma($rut_bene, $rut_profe) {
        $sql = "SELECT COUNT(programa) as 'Programas'  FROM bitacora WHERE beneficiario='$rut_bene' AND usuario='$rut_profe' AND DATE(fecha_hora) BETWEEN (SELECT CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') AS DATE)) AND (SELECT LAST_DAY(NOW()));";
        //AND DATE(fecha_hora) BETWEEN (SELECT CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') AS DATE)) AND (SELECT LAST_DAY(NOW()))
        $query = $this->con->query($sql);
        return $query;
    }

    public function getPrograma($rut_bene, $rut_profe) {
        $sql = "SELECT programa FROM bitacora WHERE beneficiario='$rut_bene' AND usuario='$rut_profe' ORDER BY id DESC LIMIT 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addBitacora($rut_bene, $rut_profe, $programa, $t_atencion, $antecedentes, $objetivo, $actividad, $acuerdo, $observacion) {
        $sql = "INSERT INTO `bitacora` (`id`, `beneficiario`, `usuario`, `programa`, `t_atencion`, `fecha_hora`, `antecedentes_r`, `objetivo`, `actividad`, `acuerdo`, `observacion`) VALUES (NULL, '$rut_bene', '$rut_profe', $programa, $t_atencion, now(), '$antecedentes', '$objetivo', '$actividad', '$acuerdo', '$observacion');";
        $query = $this->con->query($sql);
    }

    /* public function getExisBitacora($rut) {
      $sql = "SELECT COUNT(*) AS 'existe'
      FROM bitacora
      WHERE beneficiario= '$rut';";

      $query = $this->con->query($sql);

      while ($fila = $query->fetch_row()) {
      return ($fila[0] == 1);
      }

      return false;
      } */

    public function getBitacora($rut, $profe) {
        $sql = "SELECT * from bitacora WHERE beneficiario='$rut' AND usuario='$profe';";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getBitacoraByID($id) {
        $sql = "SELECT * from bitacora WHERE id=$id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAllEspecialista() {
        $sql = "SELECT * FROM especialista";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getEspecialista($id) {
        $sql = "SELECT * FROM especialista where id = $id";
        $query = $this->con->query($sql);
        return $query;
    }

    public function updEvento($id, $title, $fecha, $color) {
        $sql = "UPDATE `evento` SET `title` = '$title', `start` = '$fecha', `color` = '$color' WHERE `evento`.`id` = $id;";
        $query = $this->con->query($sql);
    }

    public function updColorEvento($id, $color) {
        $sql = "UPDATE `evento` SET `color` = '$color' WHERE `evento`.`id` = $id;";
        $query = $this->con->query($sql);
    }

    public function dropEvent($id, $fecha, $color) {
        $sql = "UPDATE `evento` SET `start` = '$fecha', color='$color' WHERE `evento`.`id` = $id;";
        $query = $this->con->query($sql);
    }

    public function delEvento($id) {
        $sql = "DELETE from evento WHERE id = $id;";
        $query = $this->con->query($sql);
    }

    public function existEsp($nombre) {
        $sql = "SELECT COUNT(*) AS 'existe' 
	            FROM especialista
	            WHERE nombre = '$nombre';";

        $query = $this->con->query($sql);

        while ($fila = $query->fetch_row()) {
            return ($fila[0] == 1);
        }

        return false;
    }

    public function addEsp($nombre) {
        $sql = "INSERT INTO `especialista` (`ID`, `nombre`) VALUES (null, '$nombre');";
        $query = $this->con->query($sql);
    }

    public function getParentesco($rut) {
        $sql = "SELECT * FROM parentesco WHERE beneficiario = '$rut';";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getTeletonbyRut($rut) {
        $sql = "SELECT * FROM registro_teleton where beneficiario = '$rut'";
        $query = $this->con->query($sql);
        return $query;
    }

    public function updateBene($rut, $direccionB, $comunaB) {
        $sql = "UPDATE `beneficiario` SET `direccion` = '$direccionB', `comuna` = '$comunaB' WHERE RUT = '$rut'";
        $query = $this->con->query($sql);
    }

    public function updateTutor($rut, $direccionT, $comunaT, $ocupacionT, $telefonoT, $emailT) {
        $sql = "UPDATE `tutor` SET `direccion` = '$direccionT', `comuna` = '$comunaT', `ocupacion` = '$ocupacionT', `telefono` = '$telefonoT', `email` = '$emailT' WHERE RUT = '$rut'";
        $query = $this->con->query($sql);
    }

    public function getAllPrevision() {
        $sql = "SELECT * FROM `t_prevision`;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getDatosGenerales($rut) {
        $sql = "SELECT * FROM `datosgenerales` WHERE beneficiario = '$rut';";
        $query = $this->con->query($sql);
        return $query;
    }

    public function updDatosGenerales($rut_bene, $tipoAtencion) {
        $sql = "UPDATE `datosgenerales` SET `atencion` = '$tipoAtencion' WHERE beneficiario='$rut_bene';";
        $query = $this->con->query($sql);
    }

    public function getAreaById($id) {
        $sql = "SELECT * FROM a_usuario WHERE ID = $id";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getEntrevistaByRut($rut) {
        $sql = "SELECT COUNT(*) as 'existe' FROM entrevista WHERE rut_bene = '$rut';";
        $query = $this->con->query($sql);
        while ($fila = $query->fetch_row()) {
            return ($fila[0] == 1);
        };

        return false;
    }

    public function getEntrevista($rut) {
        $sql = "SELECT * FROM `entrevista` WHERE rut_bene = '$rut';";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCargobyId($id) {
        $sql = "SELECT * FROM `cargo` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    //INSERTS PARA ENTREVISTA ANTECEDENTES
    public function addEmbParto($Em_controlado, $per_control, $consumo, $indique_c, $complicaciones, $indique_com, $semanas_em, $tipo_part, $motivo_Ces, $asiste_Med) {
        $sql = "INSERT INTO `embarazoparto` (`id`, `Em_controlado`, `per_control`, `consumo`, `indique_c`, `complicaciones`, `indique_com` , `semanas_em`, `tipo_part`, `motivo_Ces`, `asiste_Med`) VALUES (NULL, $Em_controlado, '$per_control', $consumo, '$indique_c', $complicaciones, '$indique_com' , $semanas_em, $tipo_part, '$motivo_Ces', $asiste_Med);";
        $query = $this->con->query($sql);
    }

    public function getLastEmbParto() {
        $sql = "select id from embarazoparto order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addPostParto($peso, $talla, $apgar_1, $apgar_5, $hospit_nac, $motiv_Hos, $control_per, $vacunas, $obs_12m) {
        $sql = "INSERT INTO `postparto` (`id`, `peso`, `talla`, `apgar_1`, `apgar_5`, `hospit_nac`, `motiv_Hos`, `control_per`, `vacunas`, `obs_12m`) VALUES (NULL, $peso, $talla, $apgar_1, $apgar_5, $hospit_nac, '$motiv_Hos', $control_per, $vacunas, '$obs_12m');";
        $query = $this->con->query($sql);
    }

    public function getLastPostParto() {
        $sql = "select id from postparto order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addCompPostParto($idPostParto, $sintomas_12m) {
        $sql = "INSERT INTO `complementopparto` (`id`, `id_postParto`, `sintomas_12m`) VALUES (NULL, $idPostParto, '$sintomas_12m');";
        $query = $this->con->query($sql);
    }

    public function addLactancia($l_materna, $l_mixto, $l_relleno) {
        $sql = "INSERT INTO `lactancia` (`id`, `l_materna`, `l_mixto`, `l_relleno`) VALUES (NULL, '$l_materna', '$l_mixto', '$l_relleno');";
        $query = $this->con->query($sql);
    }

    public function getLastLactancia() {
        $sql = "select id from lactancia order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addDesMotriz($C_cabeza, $S_solo, $C_gatear, $C_apoyo, $S_apoyo, $E_1palabras, $E_1frases, $V_solo, $c_EsVDiurno, $c_EsVNocturno, $c_EsADiurno, $c_EsANocturno, $U_panal, $U_panalEntr, $A_bano, $indique_ABano, $A_motoraG, $T_muscG, $Es_Caminar, $C_frecuen, $D_lateral, $obs_DesMotriz) {
        $sql = "INSERT INTO `desmotriz` (`id`, `C_cabeza`, `S_solo`, `C_gatear`, `C_apoyo`, `S_apoyo`, `E_1palabras`, `E_1frases`, `V_solo`, `c_EsVDiurno`, `c_EsVNocturno`, `c_EsADiurno`, `c_EsANocturno`, `U_panal`, `U_panalEntr`, `A_bano`, `indique_ABano`, `A_motoraG`, `T_muscG`, `Es_Caminar`, `C_frecuen`, `D_lateral`, `obs_DesMotriz`) VALUES (NULL, $C_cabeza, $S_solo, $C_gatear, $C_apoyo, $S_apoyo, $E_1palabras, $E_1frases, $V_solo, $c_EsVDiurno, $c_EsVNocturno, $c_EsADiurno, $c_EsANocturno, $U_panal, $U_panalEntr, $A_bano, '$indique_ABano', '$A_motoraG', '$T_muscG', $Es_Caminar, $C_frecuen, '$D_lateral', '$obs_DesMotriz');";
        $query = $this->con->query($sql);
    }

    public function getLastDesMotriz() {
        $sql = "select id from desmotriz order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addCompDesMotrizFina($id_DesMotriz, $logro) {
        $sql = "INSERT INTO `compdesmotrizfina` (`id`, `id_DesMotriz`, `Logro`) VALUES (NULL, $id_DesMotriz, '$logro');";
        $query = $this->con->query($sql);
    }

    public function addCompDesMotrizSCog($id_DesMotriz, $signos) {
        $sql = "INSERT INTO `compdesmotrizscog` (`id`, `id_DesMotriz`, `signos`) VALUES (NULL, $id_DesMotriz, '$signos');";
        $query = $this->con->query($sql);
    }

    public function addVision($u_lentes, $obs_Vision) {
        $sql = "INSERT INTO `vision` (`id`, `u_lentes`, `obs_Vision`) VALUES (NULL, $u_lentes, '$obs_Vision');";
        $query = $this->con->query($sql);
    }

    public function getLastVision() {
        $sql = "select id from vision order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addCompVision($id_vision, $descripcion) {
        $sql = "INSERT INTO `compvision` (`id`, `id_vision`, `descripcion`) VALUES (NULL, $id_vision, '$descripcion');";
        $query = $this->con->query($sql);
    }

    public function addCompDiagVision($id_vision, $diagnostico) {
        $sql = "INSERT INTO `compdiagvision` (`id`, `id_vision`, `diagnostico`) VALUES (NULL, $id_vision, '$diagnostico');";
        $query = $this->con->query($sql);
    }

    public function addAudicion($U_audifonos, $obs_Audicion) {
        $sql = "INSERT INTO `audicion` (`id`, `U_audifonos`, `obs_Audicion`) VALUES (NULL, $U_audifonos, '$obs_Audicion');";
        $query = $this->con->query($sql);
    }

    public function getLastAudicion() {
        $sql = "select id from audicion order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addCompAudicion($id_audicion, $descripcion) {
        $sql = "INSERT INTO `compaudicion` (`id`, `id_audicion`, `descripcion`) VALUES (NULL, $id_audicion, '$descripcion');";
        $query = $this->con->query($sql);
    }

    public function addCompDiagAudicion($id_audicion, $diagnostico) {
        $sql = "INSERT INTO `compdiagaudicion` (`id`, `id_audicion`, `diagnostico`) VALUES (NULL, $id_audicion, '$diagnostico');";
        $query = $this->con->query($sql);
    }

    public function addDesLenguaje($comunicacion, $indique, $perdida_leng, $indique_Pl, $obs_DesLengua) {
        $sql = "INSERT INTO `deslengua` (`id`, `comunicacion`, `indique`, `perdida_leng`, `indique_Pl`, `obs_DesLengua`) VALUES (NULL, '$comunicacion', '$indique', $perdida_leng, '$indique_Pl', '$obs_DesLengua');";
        $query = $this->con->query($sql);
    }

    public function getLastDesLeng() {
        $sql = "select id from deslengua order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addCompDesLengua_compr($id_Des_Lengua, $caract) {
        $sql = "INSERT INTO `compdeslengua_compr` (`id`, `id_Des_Lengua`, `caract`) VALUES(NULL, $id_Des_Lengua, '$caract');";
        $query = $this->con->query($sql);
    }

    public function addCompDesLengua_expre($id_Des_Lengua, $caract) {
        $sql = "INSERT INTO `compdeslengua_expre` (`id`, `id_Des_Lengua`, `caract`) VALUES(NULL, $id_Des_Lengua, '$caract');";
        $query = $this->con->query($sql);
    }

    public function addDesSocial($react_luz, $react_sonido, $react_persona, $obs_DesSocial) {
        $sql = "INSERT INTO `dessocial` (`id`, `react_luz`, `react_sonido`, `react_persona`, `obs_DesSocial`) VALUES (NULL, '$react_luz', '$react_sonido', '$react_persona', '$obs_DesSocial');";
        $query = $this->con->query($sql);
    }

    public function getLastDesSocial() {
        $sql = "select id from dessocial order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addCompDesSocial($id_DesSocial, $desarrollo) {
        $sql = "INSERT INTO `compdessocial` (`id`, `id_DesSocial`, `desarrollo`) VALUES (NULL, $id_DesSocial, '$desarrollo');";
        $query = $this->con->query($sql);
    }

    public function addSalud($tratamiento, $Ind_tratam, $medicamento, $ind_medic, $alimentacion, $indique_ali, $talla_act, $peso_act, $peso_IMC, $c_solo, $gusta_comer, $nogusta_comer, $sueno, $hora_dormir, $duerme, $espDuerme, $humor, $indique_h, $obs_Salud) {
        $sql = " INSERT INTO `salud` (`id`, `tratamiento`, `Ind_tratam`, `medicamento`, `ind_medic`, `alimentacion`, `indique_ali`, `talla_act`, `peso_act`, `peso_IMC`, `c_solo`, `gusta_comer`, `nogusta_comer`, `sueno`, `hora_dormir`, `duerme`, `espDuerme`, `humor`, `indique_h`, `obs_Salud`) VALUES (NULL, $tratamiento, '$Ind_tratam', $medicamento, '$ind_medic', '$alimentacion', '$indique_ali' , $talla_act, $peso_act, '$peso_IMC', $c_solo, '$gusta_comer', '$nogusta_comer', '$sueno', '$hora_dormir', '$duerme', '$espDuerme', $humor, '$indique_h', '$obs_Salud');";
        $query = $this->con->query($sql);
    }

    public function getLastSalud() {
        $sql = "select id from salud order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addCompSaludActual($id_Salud, $estado) {
        $sql = "INSERT INTO `compsaludactual` (`id`, `id_Salud`, `estado`) VALUES (NULL, $id_Salud, '$estado');";
        $query = $this->con->query($sql);
    }

    public function addCompSaludNocturno($id_Salud, $estado) {
        $sql = "INSERT INTO `compsaludnocturno` (`id`, `id_Salud`, `estado`) VALUES (NULL, $id_Salud, '$estado');";
        $query = $this->con->query($sql);
    }

    public function addAntFam($pers_viven, $ant_salud, $obs_AntFam) {
        $sql = "INSERT INTO `antfam` (`id`, `pers_viven`, `ant_salud`, `obs_AntFam`) VALUES (NULL, '$pers_viven', '$ant_salud', '$obs_AntFam');";
        $query = $this->con->query($sql);
    }

    public function getLastAntFam() {
        $sql = "select id from antfam order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addAntEscolar($ingEsc, $aJardin, $antecedentes, $mod_Ensenanza, $motivo_c, $rep_curso, $c_motivorep, $situacion) {
        $sql = "INSERT INTO `antescolar` (`id`, `ingEsc`, `aJardin`, `antecedentes`, `mod_Ensenanza`, `motivo_c`, `rep_curso`, `c_motivorep`, `situacion`) VALUES (NULL, $ingEsc, $aJardin, '$antecedentes', '$mod_Ensenanza', '$motivo_c', $rep_curso, '$c_motivorep', '$situacion');";
        $query = $this->con->query($sql);
    }

    public function getLastAntEscolar() {
        $sql = "select id from antescolar order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addActFam($desem, $motivo_ins, $do_malcolegio, $otro_vamal, $do_biencolegio, $otro_biencolegio, $ambiente) {
        $sql = "INSERT INTO `actfam` (`id`, `desem`, `motivo_ins`, `do_malcolegio`, `otro_vamal`, `do_biencolegio`, `otro_biencolegio`, `ambiente`) VALUES (NULL, '$desem', '$motivo_ins', '$do_malcolegio', '$otro_vamal', '$do_biencolegio', '$otro_biencolegio', '$ambiente');";
        $query = $this->con->query($sql);
    }

    public function getLastActFam() {
        $sql = "select id from actfam order by id desc limit 1;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function addCompActFam($id_actFam, $apoyo) {
        $sql = "INSERT INTO `compactfam` (`id`, `id_actFam`, `apoyo`) VALUES (NULL, $id_actFam, '$apoyo');";
        $query = $this->con->query($sql);
    }

    public function addEntrevista($rut_bene, $rut_usuario, $id_embParto, $id_postParto, $id_Lactancia, $id_DesMotriz, $id_Vision, $id_Audicion, $id_DesLengua, $id_DesSocial, $id_Salud, $id_AntFam, $id_AntEscolar, $id_ActFam) {
        $sql = "INSERT INTO `entrevista` (`id`, `rut_bene`, `rut_usuario`, `id_embPart`, `id_postParto`, `id_lactancia`, `id_DesMotriz`, `id_Vision`, `id_Audicion`, `id_DesLengua`, `id_DesSocial`, `id_Salud`, `id_AntFam`, `id_AntEscolar`, `id_ActFam`, `fecha`) VALUES "
                . "(NULL, '$rut_bene', '$rut_usuario', '$id_embParto', '$id_postParto', '$id_Lactancia', '$id_DesMotriz', '$id_Vision', '$id_Audicion', '$id_DesLengua', '$id_DesSocial', '$id_Salud', '$id_AntFam', '$id_AntEscolar', '$id_ActFam', now());";
        $query = $this->con->query($sql);
    }

    //obtener info entrevista pdf
    public function getEmbParto($id) {
        $sql = "SELECT * FROM `embarazoparto` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getPostParto($id) {
        $sql = "SELECT * FROM `postparto` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCompPostParto($id) {
        $sql = "SELECT * FROM `complementopparto` WHERE id_postParto = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getLactancia($id) {
        $sql = "SELECT * FROM `lactancia` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getDesMotriz($id) {
        $sql = "SELECT * FROM `desmotriz` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getDesMotrizFina($id) {
        $sql = "SELECT * FROM `compdesmotrizfina` WHERE id_DesMotriz = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getDesMotrizCog($id) {
        $sql = "SELECT * FROM `compdesmotrizscog` WHERE id_DesMotriz = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getVision($id) {
        $sql = "SELECT * FROM `vision` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCompVision($id) {
        $sql = "SELECT * FROM `compvision` WHERE id_vision = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCompDiagVision($id) {
        $sql = "SELECT * FROM `compdiagvision` WHERE id_vision = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAudicion($id) {
        $sql = "SELECT * FROM `audicion` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCompAudicion($id) {
        $sql = "SELECT * FROM `compaudicion` WHERE id_audicion = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCompDiagAudicion($id) {
        $sql = "SELECT * FROM `compdiagaudicion` WHERE id_audicion = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getDesLeng($id) {
        $sql = "SELECT * FROM `deslengua` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCompDesLengExp($id) {
        $sql = "SELECT * FROM `compdeslengua_expre` WHERE id_Des_Lengua = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCompDesLengComp($id) {
        $sql = "SELECT * FROM `compdeslengua_compr` WHERE id_Des_lengua = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getDesSocial($id) {
        $sql = "SELECT * FROM `dessocial` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCompDesSocial($id) {
        $sql = "SELECT * FROM `compdessocial` WHERE id_DesSocial = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getSalud($id) {
        $sql = "SELECT * FROM `salud` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCompSaludActual($id) {
        $sql = "SELECT * FROM `compsaludactual` WHERE id_Salud = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCompSaludNocturno($id) {
        $sql = "SELECT * FROM `compsaludnocturno` WHERE id_Salud = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAntFam($id) {
        $sql = "SELECT * FROM `antfam` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getAntEscolar($id) {
        $sql = "SELECT * FROM `antescolar` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getActFam($id) {
        $sql = "SELECT * FROM `actfam` WHERE id = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function getCompActFam($id) {
        $sql = "SELECT * FROM `compactfam` WHERE id_actFam = $id;";
        $query = $this->con->query($sql);
        return $query;
    }

    public function updateBeneCred($rut) {
        $sql = "UPDATE `beneficiario` SET `c_discapacidad` = '1' WHERE `beneficiario`.`RUT` = '$rut';";
        $query = $this->con->query($sql);
    }

    public function updateBeneHogar($rut) {
        $sql = "UPDATE `beneficiario` SET `r_s_hogares` = '1' WHERE `beneficiario`.`RUT` = '$rut';";
        $query = $this->con->query($sql);
    }

}
?>



