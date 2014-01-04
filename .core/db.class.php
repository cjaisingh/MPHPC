<?php
/**
 * Class DB
 */
class DB
{
    // Setup class public variables

    // Setup class private variables
    private $connection = false;
    private $errors = array();
    private $result = false;

    // Setup Public Functions

    /**
     * Database Constructor
     * This sets up the database connection, and selects the database
     * @param options
     */
    public function __construct($options = array())
    {

        // Get the settings
        if (!isset($options['settings'])) {
            $options['settings'] = $GLOBALS['SITE']->getSettings();
        }
        // Ceate connection from settings defined
        $returnValue = $this->connection = mysql_connect(
            $options['settings']['database']['host'],
            $options['settings']['database']['username'],
            $options['settings']['database']['password']
        );

        // Check for errors
        $this->errorLog();

        // If we managed to get a connection
        if ($returnValue != false) {
            // Select the database
            $returnValue = mysql_select_db( $options['settings']['database']['databasename'], $this->connection);
            // Check for errors
            $this->errorLog();
        }

        return $returnValue;
    }

    /**
     * Database Destructor
     * This closes the database connection, and unsets variables
     */
    public function __destruct()
    {
        // Unset the connection
        unset($this->connection);
        // Unset the errors
        unset($this->errors);
        // Unset the object
        unset($this);
    }

    /**
     * Database Query
     * This runs an sql query
     * @param sql - input sql query
     * @return integer
     */
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

    /**
     * Database Get Row
     * This returns a row from the last result
     * @return array
     */
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

    /**
     * Database Get Associative Row
     * This returns a associative row from the last result
     * @return array
     */
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

    /**
     * Database Get Result
     * This returns a result from the last result
     * @return array
     */
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

    /**
     * Database Get Associative Result
     * This returns a associative Result from the last result
     * @return array
     */
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

    /**
     * Database Close
     * This closes the mysql connection
     */
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

    /**
     * Database Get Errors
     * This returns all the previous errors logged on this connection
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    // Setup Private Functions

    /**
     * Database Error Log
     * This adds the latest mysql error to the log
     * @return integer
     */
    private function errorLog()
    {
        if ($this->connection != false) {
            $error = mysql_error();
            if ($error != false) {
                array_push($this->errors, $error);
            }
            unset($error);
            return true;
        }
        return false;
    }
}
?>