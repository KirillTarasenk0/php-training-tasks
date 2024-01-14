<?php

interface Idb
{
    public function connect(string $host, string $dbName, string $userName, string $password): bool;
    public function getData(string $selectQuery): array;
    public function writeData(string $insertQuery, array $dataToAdd): void;
    public function updateData(string $updateQuery, array $dataToUpdate): void;
    public function deleteData(string $deleteQuery, array $dataToDelete): void;
    public function log(): void;
}