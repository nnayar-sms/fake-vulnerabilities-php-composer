<?php

require 'vendor/autoload.php'; // Make sure Zend\Db is installed via Composer

use Zend\Db\Adapter\Platform\Mysql;
use Zend\Db\Adapter\Platform\Postgresql;
use Zend\Db\Adapter\Platform\Sql92;
use Zend\Db\Adapter\Platform\SqlServer;
use Zend\Db\Adapter\Platform\Sqlite;
use Zend\Db\Adapter\Platform\IbmDb2;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Delete;

// -------------------- Platform Classes --------------------

$value = "O'Reilly";
$valueList = ["John", "O'Reilly", "Alice"];

$mysql = new Mysql();
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $mysql->quoteValue($value) . PHP_EOL;
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $mysql->quoteValueList($valueList) . PHP_EOL;

$pgsql = new Postgresql();
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $pgsql->quoteValue($value) . PHP_EOL;
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $pgsql->quoteValueList($valueList) . PHP_EOL;

$sql92 = new Sql92();
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $sql92->quoteValue($value) . PHP_EOL;
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $sql92->quoteValueList($valueList) . PHP_EOL;

$sqlServer = new SqlServer();
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $sqlServer->quoteValue($value) . PHP_EOL;
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $sqlServer->quoteValueList($valueList) . PHP_EOL;

$sqlite = new Sqlite();
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $sqlite->quoteValue($value) . PHP_EOL;
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $sqlite->quoteValueList($valueList) . PHP_EOL;

$ibmdb2 = new IbmDb2();
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $ibmdb2->quoteValue($value) . PHP_EOL;
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $ibmdb2->quoteValueList($valueList) . PHP_EOL;

// -------------------- SQL Object Classes --------------------

// Fake adapter to simulate SQL generation
$adapter = new Zend\Db\Adapter\Adapter([
    'driver' => 'Pdo_Sqlite',
    'database' => ':memory:',
]);

$sql = new Sql($adapter);
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $sql->getSqlStringForSqlObject($select) . PHP_EOL;


$select = new Select();
$select->from('users')->where(['id' => 1]);
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $select->getSqlString($adapter->getPlatform());


$insert = new Insert('users');
$insert->values(['name' => 'John']);
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $insert->getSqlString($adapter->getPlatform());


$update = new Update('users');
$update->set(['name' => 'Jane'])->where(['id' => 1]);
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $update->getSqlString($adapter->getPlatform());


$delete = new Delete('users');
$delete->where(['id' => 1]);
// ruleid: ssc-663b99dd-df93-f57a-0d8b-59488e349e8a
echo $delete->getSqlString($adapter->getPlatform());
