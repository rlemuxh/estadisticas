<?php
require_once "ConectaBD.php";

class ConsultasEstadisticas extends ConectaBD
{
    private $results;

    public function __construct()
    {
        parent::__construct();
        $this->results = array();
        $setChartSet = "set names 'utf8'";
        $execCharSet = $this->_db->query($setChartSet);
    }

    public function consultaRecetasOrdinarias($unidad) {
        $this->results = array();
        $consultaRecetasOrdinarias = "select semana, num_recetas_simf from est_simf.tbl_ind_recetas where unidad like '$unidad'";
        $execConsultaRecetasOrdinarias = $this->_db->query($consultaRecetasOrdinarias);
        while($resultsConsultaRecetasOrdinarias = $execConsultaRecetasOrdinarias->fetch_array(MYSQLI_ASSOC)){
            $this->results[] = $resultsConsultaRecetasOrdinarias;
        }
        //var_dump($this->results);
        return $this->results;
    }

    public function consultaUnidades() {
        $this->results = array();
        $consultaUnidades = "SELECT num_unidad, nombre_unidad FROM est_simf.tbl_cat_unidades where num_unidad not like '1' order by num_unidad";
        $execConsultaUnidades = $this->_db->query($consultaUnidades);
        while($resultasConsultaUnidades = $execConsultaUnidades->fetch_array(MYSQLI_ASSOC)) {
            $this->results[] = $resultasConsultaUnidades;
        }

        return $this->results;
    }

    public  function consultaUnidadesECE(){
        $this->results = array();
        $consultaUnidadesECE = "SELECT num_unidad, nombre_unidad FROM est_simf.tbl_cat_unidades where num_unidad like '1' or num_unidad like '2' or num_unidad like '8' order by num_unidad";
        $execConsultaUnidadesECE = $this->_db->query($consultaUnidadesECE);
        while($resultsConsultaUnidadesECE = $execConsultaUnidadesECE->fetch_array(MYSQLI_ASSOC)) {
            $this->results[] = $resultsConsultaUnidadesECE;
        }

        return $this->results;
    }

    public function consultaUsoSimf($unidad){
        $this->results = array();
        $consultaUsoSimf = "select semana, uso from est_simf.tbl_ind_recetas where unidad like '$unidad' order by semana";
        $execConsultaUsoSimf = $this->_db->query($consultaUsoSimf);
        while($resultsConsultaUsoSimf = $execConsultaUsoSimf->fetch_array(MYSQLI_ASSOC)){
            $this->results[] = $resultsConsultaUsoSimf;
        }
        //var_dump($this->results);
        return $this->results;
    }

    public function consultaNumIncap($unidad){
        $this->results = array();
        $consultaNumIncap = "select semana, num_incap_simf from est_simf.tbl_ind_recetas where unidad like '$unidad' order by semana";
        $execConsultaNumIncap = $this->_db->query($consultaNumIncap);
        while($resultNumIncap = $execConsultaNumIncap->fetch_array(MYSQLI_ASSOC)) {
            $this->results[] = $resultNumIncap;
        }

        return $this->results;
    }

    public function consultaTotRecetaResurtible($unidad) {
        $this->results = array();
        $consultaTotRecetaResurt = "select semana, tot_recetas_resurtibles from est_simf.tbl_rec_resurtible where unidad like '$unidad' order by semana";
        $execTotRecetaResurt = $this->_db->query($consultaTotRecetaResurt);
        while($resultTotRecResurtible = $execTotRecetaResurt->fetch_array(MYSQLI_ASSOC)) {
            $this->results[] = $resultTotRecResurtible;
        }

        return $this->results;

    }

    public function consultaTotRecetaTranscripcion($unidad){
        $this->results = array();
        $consultaTotRecetaTranscripcion = "select semana, tot_rec_transcripcion from est_simf.tbl_rec_transcripcion where unidad like '$unidad' order by semana";
        $execTotRecetaTranscripcion = $this->_db->query($consultaTotRecetaTranscripcion);
        while($resultTotRecTranscripcion = $execTotRecetaTranscripcion->fetch_array(MYSQLI_ASSOC)) {
            $this->results[] = $resultTotRecTranscripcion;
        }

        return $this->results;
    }

    public function consultaUsoConsultasECE($unidad){
        $this->results = array();
        $consultaTotConsultasECE = "select semana, uso_consultas from est_simf.tbl_ind_ece where unidad like '$unidad' order by semana";
        $execTotConsultasECE = $this->_db->query($consultaTotConsultasECE);
        while($resultTotConsultasECE = $execTotConsultasECE->fetch_array(MYSQLI_ASSOC)) {
            $this->results[] = $resultTotConsultasECE;
        }

        return $this->results;
    }

    public function consultaUsoRecetasECE($unidad) {
        $this->results = array();
        $consultaUsoRecetasECE = "select semana, uso_recetas from est_simf.tbl_ind_ece where unidad like '$unidad' order by semana";
        $execUsoRecetasECE = $this->_db->query($consultaUsoRecetasECE);
        while($resultUsoRecetasECE = $execUsoRecetasECE->fetch_array(MYSQLI_ASSOC)) {
            $this->results[] = $resultUsoRecetasECE;
        }

        return $this->results;
    }

    public function consultaUsoIncapacidades($unidad) {
        $this->results = array();
        $consultaUsoIncapacidades = "select semana, uso_incapacidades from est.tbl_ind_ece where unidad like '$unidad' order by semana";
        $execUsoIncapacidades = $this->_db->query($consultaUsoIncapacidades);
        while($resultUsoIncapacidades = $execUsoIncapacidades->fetch_array(MYSQLI_ASSOC)) {
            $this->results[] = $resultUsoIncapacidades;
        }

        return $this->results;
    }
}