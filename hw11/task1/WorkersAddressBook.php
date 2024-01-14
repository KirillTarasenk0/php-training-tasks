<?php

require_once "Contactable.php";

class WorkersAddressBook implements Contactable
{
    private string $contactName;
    private string $contactPhone;
    private string $contactPost;
    private array $contactsInfo = [];
    public static array $contactsList = [];
    public function __construct($contactName, $contactPhone = "", $contactPost = "")
    {
        $this->contactName = $contactName;
        $this->contactPhone = $contactPhone;
        $this->contactPost = $contactPost;
        $this->contactsInfo["contactName"] = $contactName;
        if ($contactPhone !== "") {
            $this->contactsInfo["contactPhone"] = $contactPhone;
        }
        if ($contactPost !== "") {
            $this->contactsInfo["contactPost"] = $contactPost;
        }
    }
    public function addContactPhone(string $contactName, string $contactPhone): void
    {
        foreach ($this->contactsInfo as $value) {
            if ($value === $contactName && !array_key_exists("contactPhone", $this->contactsInfo)) {
                $this->contactsInfo["contactPhone"] = $contactPhone;
            }
        }
    }
    public function changeContactPhone(string $contactName, string $phoneForChange): void
    {
        foreach ($this->contactsInfo as $value) {
            if ($value === $contactName && array_key_exists("contactPhone", $this->contactsInfo)) {
                $this->contactsInfo["contactPhone"] = $phoneForChange;
            }
        }
    }
    public function deleteContactPhone(string $contactName): void
    {
        foreach ($this->contactsInfo as $value) {
            if ($value === $contactName && array_key_exists("contactPhone", $this->contactsInfo)) {
                unset($this->contactsInfo["contactPhone"]);
            }
        }
    }
    public function addContactPost(string $contactName, string $contactPost): void
    {
        foreach ($this->contactsInfo as $value) {
            if ($value === $contactName && !array_key_exists("contactPost", $this->contactsInfo)) {
                $this->contactsInfo["contactPost"] = $contactPost;
            }
        }
    }
    public function changeContactPost(string $contactName, string $contactPostForChange): void
    {
        foreach ($this->contactsInfo as $value) {
            if ($value === $contactName && array_key_exists("contactPost", $this->contactsInfo)) {
                $this->contactsInfo["contactPost"] = $contactPostForChange;
            }
        }
    }
    public function deleteContactPost(string $contactName): void
    {
        foreach ($this->contactsInfo as $value) {
            if ($value === $contactName && array_key_exists("contactPost", $this->contactsInfo)) {
                unset($this->contactsInfo["contactPost"]);
            }
        }
    }
    public static function addContactsToArray(WorkersAddressBook $worker): void
    {
        self::$contactsList[][] = "Имя контакта: " . $worker->contactName . " " . "Телефон контакта: " . $worker->contactsInfo['contactPhone'] . " " . "Должность контакта: " . $worker->contactsInfo['contactPost']  . " ";
    }
    public function __toString(): string
    {
        $string = "<br>Название контакта: " . $this->contactsInfo["contactName"];
        if (array_key_exists("contactPhone", $this->contactsInfo)) {
            $string .= "<br>Телефон контакта: " . $this->contactsInfo["contactPhone"];
        }
        if (array_key_exists("contactPost", $this->contactsInfo)) {
            $string .= "<br>Должность контакта: " . $this->contactsInfo["contactPost"];
        }
        return $string;
    }
}