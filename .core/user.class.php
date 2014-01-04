<?php
// Start sessions
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

class User
{
    // Setup class public variables

    // Setup class private variables
    private $userID;
    private $firstName;
    private $lastName;
    private $permissions;

    // Setup Constructor
    public function __construct($email, $password)
    {
        // Pull the required classes
        class_exists('DB', true);

        // Get user details
        $db = new DB();
        $db->query('SELECT id, firstName, lastName, password, email FROM users');
        $result = $db->getAssociativeResult();
        // Check that email matches
        if ($email == $result[0]['email']) {
            // Check if password matches
            if ($this->verifyPassword($password, $result[0]['password'])) {
                // Login the user setup sessions
                $this->startSession();
                $this->userID = $result[0]['id'];
                $this->firstName = $result[0]['firstName'];
                $this->lastName = $result[0]['lastName'];
                // Get permissions
                $db->query('SELECT name FROM permissions WHERE userID = "' . $this->userID . '"');
                $result2 = $db->getAssociativeResult();
                foreach ($result2 as $row => $value) {
                    $this->permissions[] = $value['name'];
                }
            } else {
                // Passwords did not match
                return false;
            }
        } else {
            // Email did not match
            return false;
        }
    }

    // Setup Public Functions
    public function getSettings()
    {
        return $this->settings;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function hasPermission($permission)
    {
        return isset($this->permissions[$permission]);
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function endSession()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            unset($_SESSION);
            session_destroy();
        }
    }

    // Setup Private Functions
    private function startSession()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    private function __autoload($class_name)
    {
        require_once strtolower($class_name) . 'class.php';
    }

    private function verifyPassword($password, $hash)
    {
        return ($this->encryptPassword($password) == $hash);
    }

    private function encryptPassword($password)
    {
        $userSettings = $GLOBALS['SITE']->getSettings();
        $userSettings = $userSettings['users'];
        return hash('sha512', $password . $userSettings['salt']);
    }
}

?>