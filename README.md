CodeIgniter-Doctrine-Profiler
=============================

Doctrine Profiler

Nasıl Entegre Edilir?

1. application klasörünü codeigniter klasörünüzün üzerine yazdırın.
2. application/library/Doctrine.php açın ve aşağıdaki satırı bulun.
$config = new \Doctrine\ORM\Configuration;
Hemen altına

//Profiler
$logger = new \Doctrine\DBAL\Logging\Profiler;
$config->setSQLLogger($logger);

ekleyin.
