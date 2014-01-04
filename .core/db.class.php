<?php

class DB
{
    // Setup class public variables

    // Setup class private variables
    private $connection = false;
    private $errors = array();
    private $result = false;

    // Setup Public Functions
    public function __construct($settings = false)
    {
        // Get the settings
        if ($settings == false) {
            $settings = $GLOBALS['SITE']->getSettings();
        }
        // Ceate connection from settings defined
        $returnValue = $this->connection = mysql_connect(
            $settings['database']['host'],
            $settings['database']['username'],
            $settings['database']['password']
        );
        $this->errorLog();
        if ($returnValue != false) {
            $returnValue = mysql_select_db($settings['database']['databasename'], $this->connection);
            $this->errorLog();
        }
        unset($settings);
        return $returnValue;
    }

    public function __destruct()
    {
        // Unset the connection
        unset($this->connection);
        // Unset the errors
        unset($this->errors);
        // Unset the object
        unset($this);
    }

    public function query($sql)
    {
        // If we have a connection
        if ($this->connection != false) {
            // Query using the defined connection
            $returnValue = mysql_query($sql, $this->connection);
            $this->result = $returnValue;
        } else {
            // We don't have a connection, return false
            $returnValue = false;
        }
        $this->errorLog();
        return $returnValue;
    }

    public function getRow()
    {
        // If we have a connection
        if ($this->result != false) {
            // Get the next row from result
            $returnValue = mysql_fetch_row($this->result);
        } else {
            // We don't have a connection, return false
            $returnValue = false;
        }
        $this->errorLog();
        return $returnValue;
    }

    public function getAssociativeRow()
    {
        // If we have a connection
        if ($this->result != false) {
            // Get the next associative row from result
            $returnValue = mysql_fetch_assoc($this->result);
        } else {
            // We don't have a connection, return false
            $returnValue = false;
        }
        $this->errorLog();
        return $returnValue;
    }

    public function getResult()
    {
        // If we have a connection
        if ($this->result != false) {
            $returnValue = array();
            // Get each row from result
            while ($tempValue = mysql_fetch_row($this->result)) {
                array_push($returnValue, $tempValue);
            }
        } else {
            // We don't have a connection, return false
            $returnValue = false;
        }
        $this->errorLog();
        return $returnValue;
    }

    public function getAssociativeResult()
    {
        // If we have a connection
        if ($this->result != false) {
            $returnValue = array();
            // Get each associative row from result
            while ($tempValue = mysql_fetch_assoc($this->result)) {
                array_push($returnValue, $tempValue);
            }
        } else {
            // We don't have a connection, return false
            $returnValue = false;
        }
        $this->errorLog();
        return $returnValue;
    }

    public function close()
    {
        // If we have a connection
        if ($this->connection != false) {
            // Close the connection
            mysql_close($this->connection);
        }
        $this->__destruct();
        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    // Setup Private Functions
    private function errorLog()
    {
        if ($this->connection != false) {
            $error = mysql_error();
            if ($error != false) {
                array_push($this->errors, $error);
            }
            unset($error);
        }
    }
}

;
?>