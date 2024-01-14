<?php

interface Contactable
{
    public function addContactPhone(string $contactName, string $contactPhone): void;
    public function changeContactPhone(string $contactName, string $phoneForChange): void;
    public function deleteContactPhone(string $contactName): void;
    public function addContactPost(string $contactName, string $contactPost): void;
    public function changeContactPost(string $contactName, string $contactPostForChange): void;
    public function deleteContactPost(string $contactName): void;
    public static function addContactsToArray(WorkersAddressBook $worker): void;
}