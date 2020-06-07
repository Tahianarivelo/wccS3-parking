<?php

class Util extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function formatNumber(string $seq, int $ordre)
    {
        if (strlen(trim($seq)) >= $ordre) {
            throw new Exception("Format impossible !");
        }
        $ret = "";
        for ($i = 0; $i < $ordre - strlen(trim($seq)); $i++) {
            $ret .= "0";
        }
        return $ret . $seq;
    }
    public  function getNextVal(string $sequence)
    {
        $requette = "select nextval('" . $sequence . "') as nb";

        $query = $this->db->query($requette);

        $nb = "";
        foreach ($query->result_array() as $row) {
            $nb=$row['nb'];
        }
        return $nb;
    }
    public function getToken()
    {
        $date = new DateTime();
        $time=time();
        date_add($date, date_interval_create_from_date_string('2 minutes'));
        $token = "%s%s";
        $token = sprintf($token, $date->format("Y-m-d H:i:s"), $time);
        $token = sha1($token);
        return $token;
    }
    public function getDiffenHeure($date/*en string*/){//date en string no atsofoka
        $dateNow = new DateTime();
        $date1 = strtotime($dateNow->format("Y-m-d H:i:s"));
        $date2 = strtotime($date);
        $diff = $date1 - $date2;
        return $diff/3600;
    }
}
