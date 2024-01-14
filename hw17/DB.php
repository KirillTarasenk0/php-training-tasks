<?php

require_once "Idb.php";

class DB implements Idb
{
    private object $pdo;
    private array $logger = [];
    public static array $instances = [];
    private function __construct() {}
    public static function getInstance(): DB
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }
        return self::$instances[$cls];
    }
    public function connect(string $host = "localhost", string $dbName = "tmslessons", string $userName = "root", string $password = ""): bool
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbName", $userName, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
            return true;
        } catch (PDOException $exception) {
            $this->logger[] = $exception->getMessage();
            echo "<p>Не удалось подключиться к базе данных. Проверьте введённые данные.</p>";
            return false;
        }
    }
    public function getData(string $selectQuery): array
    {
        if ($this->connect()) {
            $result = [];
            try {
                $statement = $this->pdo->query($selectQuery);
                $count = $statement->rowCount();
                for ($i = 0; $i < $count; $i++) {
                    $result[] = $statement->fetch();
                }
                if (count($result) === 0) {
                    $this->logger[] = "Не удалось получить данные. Проверьте введённый запрос.";
                }
            } catch(PDOException $exception) {
                $this->logger[] = $exception->getMessage();
                echo "<p>Не удалось получить данные. Проверьте введённый вами запрос.</p>";
            }
            return $result;
        } else {
            $this->logger[] = "Во время попытки получения данных не удалось подключиться к базе данных. Проверьте ваше подключение.";
            echo "<p>Не удалось подключиться к базе данных. Проверьте ваше подключение.</p>";
            return [];
        }
    }
    public function writeData(string $insertQuery, array $dataToAdd): void
    {
        if ($this->connect()) {
            try {
                $this->pdo->prepare($insertQuery)->execute($dataToAdd);
            } catch (PDOException $exception) {
                $this->logger[] = $exception->getMessage();
                echo "<p>Не удалось записать данные. Проверьте введённый вами запрос.</p>";
            }
        } else {
            $this->logger[] = "Во время попытки записи данных произошла ошибка подключения. Пожалуйста, проверьте соединение с базой данных.";
        }
    }
    public function updateData(string $updateQuery, array $dataToUpdate): void
    {
        if ($this->connect()) {
            try {
                $this->pdo->prepare($updateQuery)->execute($dataToUpdate);
            } catch (PDOException $exception) {
                $this->logger[] = $exception->getMessage();
                echo "<p>Во время попытки обновления данных произошла ошибка. Проверьте введённый вами запрос</p>";
            }
        } else {
            $this->logger[] = "Во время попытки обновления данных произошла ошибка подключения. Пожалуйста, проверьте соединение с базой данных.";
        }
    }
    public function deleteData(string $deleteQuery, array $dataToDelete): void
    {
        if ($this->connect()) {
            try {
                $this->pdo->prepare($deleteQuery)->execute($dataToDelete);
            } catch (PDOException $exception) {
                $this->logger[] = $exception->getMessage();
                echo "<p>Во время попытки удаления данных произошла ошибка. Проверьте введённый вами запрос.</p>";
            }
        } else {
            $this->logger[] = "Во время попытки удаления данных произошла ошибка подключения. Пожалуйста, проверьте соединение с базой данных.";
        }
    }
    public function log(): void
    {
        echo "<pre>";
        print_r($this->logger);
        echo "</pre>";
    }
}