<?php
// This is a basic validator class that ensures that the data passed in matches the schema.

/* example schema
$schema = [
    'name' => ['required' => true],
    'age' => ['required' => true],
    'is_subscribed' => ['required' => false],
    'preferences' => ['required' => false],
];
*/

class Validator {
    private $schema;
    private $data;
    private $errors = [];

    public function __construct($schema, $data) {
        $this->schema = $schema;
        $this->data = $data;
    }

    public function validate() {
        foreach ($this->schema as $key => $options) {
            if (!isset($this->data[$key])) {
                if (isset($options['required']) && $options['required'] === true) {
                    $this->errors[$key] = "Missing $key parameter";
                }
                continue;
            }

            if (empty($this->data[$key])) {
                $this->errors[$key] = "$key cannot be empty";
                continue;
            }
        }

        if (!empty($this->errors)) {
            $this->exitWithError();
        }
        else {
            return true;
        }
    }

    public function getErrors() {
        return $this->errors;
    }

	private function exitWithError(){
		$errors = $this->getErrors();
		http_response_code(400);
        header('Content-Type: application/json');
		echo json_encode(['message' => $errors]);
		exit;
	}
}