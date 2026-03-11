<?php
declare(strict_types=1);

namespace Demo\MessageQueues\Model;

class Consumer
{
    /**
     * Consume messages from topic notifycustomer.massmail
     *
     * @param string $message
     * @return void
     */
    public function process(string $message): void
    {
        // TODO: implement your mass-mail notification logic here.
        // Example: decode JSON payload, load customers, send emails, etc.
        $data = json_decode($message, true);
        if (!is_array($data)) {
            return;
        }

        // Example logic: perform notification or update database.
        // Replace with your own business logic.
        foreach ($data as $item) {
            // Your processing code here.
        }
    }
}
