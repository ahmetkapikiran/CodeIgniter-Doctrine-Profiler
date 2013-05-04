<?php
namespace Doctrine\DBAL\Logging;

class Profiler implements SQLLogger
{
    public $start = null;

    private $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    /**
     * {@inheritdoc}
     */
    public function startQuery($sql, array $params = null, array $types = null)
    {
        $this->start = microtime(true);
        $this->last_query = $sql;
    }

    /**
     * {@inheritdoc}
     */
    public function stopQuery()
    {
        $this->ci->doctrine_queries[] = array('time'=>substr(microtime(true)-$this->start,0,6), 'query'=>$this->last_query);
    }
}