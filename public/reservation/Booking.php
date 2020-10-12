<?php
require_once ('../../private/initialize.php');
class Booking
{

    private $dbh;

    private $bookingsTableName = 'bookings';

    /**
     * Booking constructor.
     * @param string $database
     * @param string $host
     * @param string $databaseUsername
     * @param string $databaseUserPassword
     */
    public function __construct($database, $host, $databaseUsername, $databaseUserPassword)
    {
        try {

            $this->dbh =
                new PDO(sprintf('mysql:host=%s;dbname=%s', $host, $database),
                    $databaseUsername,
                    $databaseUserPassword
                );

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function index()
    {
        $statement = $this->dbh->query('SELECT * FROM ' . $this->bookingsTableName);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add(DateTimeImmutable $bookingDate)
    {
        $time = date('G:i');
        $time = ''.rand(8,20).':00';
        $id_client = $_SESSION['client_id'];
        $id_terrain = $_SESSION['id_terrain_reserv'];
        $statement = $this->dbh->prepare(
            'INSERT INTO ' . $this->bookingsTableName . ' (booking_date,booking_time,id_client,id_terrain) VALUES (:bookingDate,:time,:id_client,:id_terrain)'
        );

        if (false === $statement) {
            throw new Exception('Invalid prepare statement');
        }

        if (false === $statement->execute([
                ':bookingDate' => $bookingDate->format('Y-m-d'),
                ':time' => $time,
                ':id_client' => $id_client,
                ':id_terrain' => $id_terrain,
            ])) {
            throw new Exception(implode(' ', $statement->errorInfo()));
        }
    }

    public function delete($id)
    {
        $statement = $this->dbh->prepare(
            'DELETE from ' . $this->bookingsTableName . ' WHERE id = :id'
        );
        if (false === $statement) {
            throw new Exception('Invalid prepare statement');
        }
        if (false === $statement->execute([':id' => $id])) {
            throw new Exception(implode(' ', $statement->errorInfo()));
        }
    }

}
?>