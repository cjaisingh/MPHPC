<?php

class Page
{
    // Setup class public variables
    public $body = '';

    // Setup class private variables
    private $settings;

    // Setup public functions
    public function __construct(&$settings)
    {
        // Include forms if requested
        if (isset($settings['forms'])) {
            if ($settings['forms'] == true) {
                require_once('forms/form.class.php');
                require_once('forms/button.class.php');
                require_once('forms/checkbox.class.php');
                require_once('forms/textinput.class.php');
            }
        }
        if (isset($settings['authentication'])) {
            if ($settings['authentication'] == true) {
                if (!isset($_SESSION['user'])) {
                    header('Location: ' . PROTOCOL . '://' . SITE_DOMAIN);
                    exit();
                }
            }
        }
        $this->settings = $settings;
        return true;
    }

    public function render()
    {
        if (isset($this->settings['views'])) {
            // If defined, render footer
            foreach ($this->settings['views'] as $row => $value) {
                if ($value == true) {
                    if ($row == 'body') {
                        echo $this->body;
                    } else {
                        // Render default view that was defined
                        echo $this->getView($row, $value);
                    }
                } else if (is_array($value)) {
                    // Render view with defined settings
                    echo $this->getView($row, $value);
                }
            }
        }
        return true;
    }

    public function renderView($view)
    {
        if (isset($this->settings['views'][$view])) {
            // Render header
            echo $this->getView($view, $this->settings['views'][$view]);
        }
        return true;
    }

    // Setup private functions
    private function getView(&$viewName, $viewSettings)
    {
        // If view exists
        if (is_file('../.views/' . $viewName . '.php')) {
            ob_start();
            include('../.views/' . $viewName . '.php');
            $contents = ob_get_contents();
            ob_end_clean();
            return $contents;
        }
        return false;
    }
}

?>