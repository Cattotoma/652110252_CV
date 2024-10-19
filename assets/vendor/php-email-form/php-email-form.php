<?php

class PHP_Email_Form {
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $ajax;
    private $messages = [];

    public function add_message($content, $label, $priority = 0) {
        $this->messages[] = [
            'content' => $content,
            'label' => $label,
            'priority' => $priority
        ];
    }

    public function send() {
        $body = "";
        foreach ($this->messages as $message) {
            $body .= $message['label'] . ": " . $message['content'] . "\n";
        }

        $headers = "From: " . $this->from_email;
        return mail($this->to, $this->subject, $body, $headers);
    }
}
?>
