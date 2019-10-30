<?php
namespace Luffy\Thrift2Hbase;

/**
 * Autogenerated by Thrift Compiler (0.12.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

interface THBaseServiceIf
{
    /**
     * Test for the existence of columns in the table, as specified in the TGet.
     * 
     * @return true if the specified TGet matches one or more keys, false if not
     * 
     * @param string $table the table to check on
     * 
     * @param \Luffy\Thrift2Hbase\TGet $tget the TGet to check for
     * 
     * @return bool
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function exists($table, \Luffy\Thrift2Hbase\TGet $tget);
    /**
     * Test for the existence of columns in the table, as specified by the TGets.
     * 
     * This will return an array of booleans. Each value will be true if the related Get matches
     * one or more keys, false if not.
     * 
     * @param string $table the table to check on
     * 
     * @param \Luffy\Thrift2Hbase\TGet[] $tgets a list of TGets to check for
     * 
     * @return bool[]
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function existsAll($table, array $tgets);
    /**
     * Method for getting data from a row.
     * 
     * If the row cannot be found an empty Result is returned.
     * This can be checked by the empty field of the TResult
     * 
     * @return the result
     * 
     * @param string $table the table to get from
     * 
     * @param \Luffy\Thrift2Hbase\TGet $tget the TGet to fetch
     * 
     * @return \Luffy\Thrift2Hbase\TResult if no Result is found, row and columnValues will not be set.
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function get($table, \Luffy\Thrift2Hbase\TGet $tget);
    /**
     * Method for getting multiple rows.
     * 
     * If a row cannot be found there will be a null
     * value in the result list for that TGet at the
     * same position.
     * 
     * So the Results are in the same order as the TGets.
     * 
     * @param string $table the table to get from
     * 
     * @param \Luffy\Thrift2Hbase\TGet[] $tgets a list of TGets to fetch, the Result list
     * will have the Results at corresponding positions
     * or null if there was an error
     * 
     * @return \Luffy\Thrift2Hbase\TResult[]
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function getMultiple($table, array $tgets);
    /**
     * Commit a TPut to a table.
     * 
     * @param string $table the table to put data in
     * 
     * @param \Luffy\Thrift2Hbase\TPut $tput the TPut to put
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function put($table, \Luffy\Thrift2Hbase\TPut $tput);
    /**
     * Atomically checks if a row/family/qualifier value matches the expected
     * value. If it does, it adds the TPut.
     * 
     * @return true if the new put was executed, false otherwise
     * 
     * @param string $table to check in and put to
     * 
     * @param string $row row to check
     * 
     * @param string $family column family to check
     * 
     * @param string $qualifier column qualifier to check
     * 
     * @param string $value the expected value, if not provided the
     * check is for the non-existence of the
     * column in question
     * 
     * @param \Luffy\Thrift2Hbase\TPut $tput the TPut to put if the check succeeds
     * 
     * @return bool
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function checkAndPut($table, $row, $family, $qualifier, $value, \Luffy\Thrift2Hbase\TPut $tput);
    /**
     * Commit a List of Puts to the table.
     * 
     * @param string $table the table to put data in
     * 
     * @param \Luffy\Thrift2Hbase\TPut[] $tputs a list of TPuts to commit
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function putMultiple($table, array $tputs);
    /**
     * Deletes as specified by the TDelete.
     * 
     * Note: "delete" is a reserved keyword and cannot be used in Thrift
     * thus the inconsistent naming scheme from the other functions.
     * 
     * @param string $table the table to delete from
     * 
     * @param \Luffy\Thrift2Hbase\TDelete $tdelete the TDelete to delete
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function deleteSingle($table, \Luffy\Thrift2Hbase\TDelete $tdelete);
    /**
     * Bulk commit a List of TDeletes to the table.
     * 
     * Throws a TIOError if any of the deletes fail.
     * 
     * Always returns an empty list for backwards compatibility.
     * 
     * @param string $table the table to delete from
     * 
     * @param \Luffy\Thrift2Hbase\TDelete[] $tdeletes list of TDeletes to delete
     * 
     * @return \Luffy\Thrift2Hbase\TDelete[]
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function deleteMultiple($table, array $tdeletes);
    /**
     * Atomically checks if a row/family/qualifier value matches the expected
     * value. If it does, it adds the delete.
     * 
     * @return true if the new delete was executed, false otherwise
     * 
     * @param string $table to check in and delete from
     * 
     * @param string $row row to check
     * 
     * @param string $family column family to check
     * 
     * @param string $qualifier column qualifier to check
     * 
     * @param string $value the expected value, if not provided the
     * check is for the non-existence of the
     * column in question
     * 
     * @param \Luffy\Thrift2Hbase\TDelete $tdelete the TDelete to execute if the check succeeds
     * 
     * @return bool
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function checkAndDelete($table, $row, $family, $qualifier, $value, \Luffy\Thrift2Hbase\TDelete $tdelete);
    /**
     * @param string $table the table to increment the value on
     * 
     * @param \Luffy\Thrift2Hbase\TIncrement $tincrement the TIncrement to increment
     * 
     * @return \Luffy\Thrift2Hbase\TResult if no Result is found, row and columnValues will not be set.
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function increment($table, \Luffy\Thrift2Hbase\TIncrement $tincrement);
    /**
     * @param string $table the table to append the value on
     * 
     * @param \Luffy\Thrift2Hbase\TAppend $tappend the TAppend to append
     * 
     * @return \Luffy\Thrift2Hbase\TResult if no Result is found, row and columnValues will not be set.
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function append($table, \Luffy\Thrift2Hbase\TAppend $tappend);
    /**
     * Get a Scanner for the provided TScan object.
     * 
     * @return Scanner Id to be used with other scanner procedures
     * 
     * @param string $table the table to get the Scanner for
     * 
     * @param \Luffy\Thrift2Hbase\TScan $tscan the scan object to get a Scanner for
     * 
     * @return int
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function openScanner($table, \Luffy\Thrift2Hbase\TScan $tscan);
    /**
     * Grabs multiple rows from a Scanner.
     * 
     * @return Between zero and numRows TResults
     * 
     * @param int $scannerId the Id of the Scanner to return rows from. This is an Id returned from the openScanner function.
     * 
     * @param int $numRows number of rows to return
     * 
     * @return \Luffy\Thrift2Hbase\TResult[]
     * @throws \Luffy\Thrift2Hbase\TIOError
     * @throws \Luffy\Thrift2Hbase\TIllegalArgument if the scannerId is invalid
     * 
     */
    public function getScannerRows($scannerId, $numRows);
    /**
     * Closes the scanner. Should be called to free server side resources timely.
     * Typically close once the scanner is not needed anymore, i.e. after looping
     * over it to get all the required rows.
     * 
     * @param int $scannerId the Id of the Scanner to close *
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     * @throws \Luffy\Thrift2Hbase\TIllegalArgument if the scannerId is invalid
     * 
     */
    public function closeScanner($scannerId);
    /**
     * mutateRow performs multiple mutations atomically on a single row.
     * 
     * @param string $table table to apply the mutations
     * 
     * @param \Luffy\Thrift2Hbase\TRowMutations $trowMutations mutations to apply
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function mutateRow($table, \Luffy\Thrift2Hbase\TRowMutations $trowMutations);
    /**
     * Get results for the provided TScan object.
     * This helper function opens a scanner, get the results and close the scanner.
     * 
     * @return between zero and numRows TResults
     * 
     * @param string $table the table to get the Scanner for
     * 
     * @param \Luffy\Thrift2Hbase\TScan $tscan the scan object to get a Scanner for
     * 
     * @param int $numRows number of rows to return
     * 
     * @return \Luffy\Thrift2Hbase\TResult[]
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function getScannerResults($table, \Luffy\Thrift2Hbase\TScan $tscan, $numRows);
    /**
     * Given a table and a row get the location of the region that
     * would contain the given row key.
     * 
     * reload = true means the cache will be cleared and the location
     * will be fetched from meta.
     * 
     * @param string $table
     * @param string $row
     * @param bool $reload
     * @return \Luffy\Thrift2Hbase\THRegionLocation
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function getRegionLocation($table, $row, $reload);
    /**
     * Get all of the region locations for a given table.
     * 
     * 
     * @param string $table
     * @return \Luffy\Thrift2Hbase\THRegionLocation[]
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function getAllRegionLocations($table);
    /**
     * Atomically checks if a row/family/qualifier value matches the expected
     * value. If it does, it mutates the row.
     * 
     * @return true if the row was mutated, false otherwise
     * 
     * @param string $table to check in and delete from
     * 
     * @param string $row row to check
     * 
     * @param string $family column family to check
     * 
     * @param string $qualifier column qualifier to check
     * 
     * @param int $compareOp comparison to make on the value
     * 
     * @param string $value the expected value to be compared against, if not provided the
     * check is for the non-existence of the column in question
     * 
     * @param \Luffy\Thrift2Hbase\TRowMutations $rowMutations row mutations to execute if the value matches
     * 
     * @return bool
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function checkAndMutate($table, $row, $family, $qualifier, $compareOp, $value, \Luffy\Thrift2Hbase\TRowMutations $rowMutations);
    /**
     * Get a table descriptor.
     * @return the TableDescriptor of the giving tablename
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $table the tablename of the table to get tableDescriptor
     * 
     * @return \Luffy\Thrift2Hbase\TTableDescriptor Thrift wrapper around
     * org.apache.hadoop.hbase.client.TableDescriptor
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function getTableDescriptor(\Luffy\Thrift2Hbase\TTableName $table);
    /**
     * Get table descriptors of tables.
     * @return the TableDescriptor of the giving tablename
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName[] $tables the tablename list of the tables to get tableDescriptor
     * 
     * @return \Luffy\Thrift2Hbase\TTableDescriptor[]
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function getTableDescriptors(array $tables);
    /**
     * 
     * @return true if table exists already, false if not
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $tableName the tablename of the tables to check
     * 
     * @return bool
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function tableExists(\Luffy\Thrift2Hbase\TTableName $tableName);
    /**
     * Get table descriptors of tables that match the given pattern
     * @return the tableDescriptors of the matching table
     * 
     * 
     * @param string $regex The regular expression to match against
     * 
     * @param bool $includeSysTables set to false if match only against userspace tables
     * 
     * @return \Luffy\Thrift2Hbase\TTableDescriptor[]
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function getTableDescriptorsByPattern($regex, $includeSysTables);
    /**
     * Get table descriptors of tables in the given namespace
     * @return the tableDescriptors in the namespce
     * 
     * 
     * @param string $name The namesapce's name
     * 
     * @return \Luffy\Thrift2Hbase\TTableDescriptor[]
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function getTableDescriptorsByNamespace($name);
    /**
     * Get table names of tables that match the given pattern
     * @return the table names of the matching table
     * 
     * 
     * @param string $regex The regular expression to match against
     * 
     * @param bool $includeSysTables set to false if match only against userspace tables
     * 
     * @return \Luffy\Thrift2Hbase\TTableName[]
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function getTableNamesByPattern($regex, $includeSysTables);
    /**
     * Get table names of tables in the given namespace
     * @return the table names of the matching table
     * 
     * 
     * @param string $name The namesapce's name
     * 
     * @return \Luffy\Thrift2Hbase\TTableName[]
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function getTableNamesByNamespace($name);
    /**
     * Creates a new table with an initial set of empty regions defined by the specified split keys.
     * The total number of regions created will be the number of split keys plus one. Synchronous
     * operation.
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableDescriptor $desc table descriptor for table
     * 
     * @param string[] $splitKeys rray of split keys for the initial regions of the table
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function createTable(\Luffy\Thrift2Hbase\TTableDescriptor $desc, array $splitKeys);
    /**
     * Deletes a table. Synchronous operation.
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $tableName the tablename to delete
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function deleteTable(\Luffy\Thrift2Hbase\TTableName $tableName);
    /**
     * Truncate a table. Synchronous operation.
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $tableName the tablename to truncate
     * 
     * @param bool $preserveSplits whether to  preserve previous splits
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function truncateTable(\Luffy\Thrift2Hbase\TTableName $tableName, $preserveSplits);
    /**
     * Enalbe a table
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $tableName the tablename to enable
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function enableTable(\Luffy\Thrift2Hbase\TTableName $tableName);
    /**
     * Disable a table
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $tableName the tablename to disable
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function disableTable(\Luffy\Thrift2Hbase\TTableName $tableName);
    /**
     * 
     * @return true if table is enabled, false if not
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $tableName the tablename to check
     * 
     * @return bool
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function isTableEnabled(\Luffy\Thrift2Hbase\TTableName $tableName);
    /**
     * 
     * @return true if table is disabled, false if not
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $tableName the tablename to check
     * 
     * @return bool
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function isTableDisabled(\Luffy\Thrift2Hbase\TTableName $tableName);
    /**
     * 
     * @return true if table is available, false if not
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $tableName the tablename to check
     * 
     * @return bool
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function isTableAvailable(\Luffy\Thrift2Hbase\TTableName $tableName);
    /**
     *  * Use this api to check if the table has been created with the specified number of splitkeys
     *  * which was used while creating the given table. Note : If this api is used after a table's
     *  * region gets splitted, the api may return false.
     *  *
     *  * @return true if table is available, false if not
     * *
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $tableName the tablename to check
     * 
     * @param string[] $splitKeys keys to check if the table has been created with all split keys
     * 
     * @return bool
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function isTableAvailableWithSplit(\Luffy\Thrift2Hbase\TTableName $tableName, array $splitKeys);
    /**
     * Add a column family to an existing table. Synchronous operation.
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $tableName the tablename to add column family to
     * 
     * @param \Luffy\Thrift2Hbase\TColumnFamilyDescriptor $column column family descriptor of column family to be added
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function addColumnFamily(\Luffy\Thrift2Hbase\TTableName $tableName, \Luffy\Thrift2Hbase\TColumnFamilyDescriptor $column);
    /**
     * Delete a column family from a table. Synchronous operation.
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $tableName the tablename to delete column family from
     * 
     * @param string $column name of column family to be deleted
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function deleteColumnFamily(\Luffy\Thrift2Hbase\TTableName $tableName, $column);
    /**
     * Modify an existing column family on a table. Synchronous operation.
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableName $tableName the tablename to modify column family
     * 
     * @param \Luffy\Thrift2Hbase\TColumnFamilyDescriptor $column column family descriptor of column family to be modified
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function modifyColumnFamily(\Luffy\Thrift2Hbase\TTableName $tableName, \Luffy\Thrift2Hbase\TColumnFamilyDescriptor $column);
    /**
     * Modify an existing table
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TTableDescriptor $desc the descriptor of the table to modify
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function modifyTable(\Luffy\Thrift2Hbase\TTableDescriptor $desc);
    /**
     * Create a new namespace. Blocks until namespace has been successfully created or an exception is
     * thrown
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TNamespaceDescriptor $namespaceDesc descriptor which describes the new namespace
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function createNamespace(\Luffy\Thrift2Hbase\TNamespaceDescriptor $namespaceDesc);
    /**
     * Modify an existing namespace.  Blocks until namespace has been successfully modified or an
     * exception is thrown
     * 
     * 
     * @param \Luffy\Thrift2Hbase\TNamespaceDescriptor $namespaceDesc descriptor which describes the new namespace
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function modifyNamespace(\Luffy\Thrift2Hbase\TNamespaceDescriptor $namespaceDesc);
    /**
     * Delete an existing namespace. Only empty namespaces (no tables) can be removed.
     * Blocks until namespace has been successfully deleted or an
     * exception is thrown.
     * 
     * 
     * @param string $name namespace name
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function deleteNamespace($name);
    /**
     * Get a namespace descriptor by name.
     * @retrun the descriptor
     * 
     * 
     * @param string $name name of namespace descriptor
     * 
     * @return \Luffy\Thrift2Hbase\TNamespaceDescriptor Thrift wrapper around
     * org.apache.hadoop.hbase.NamespaceDescriptor
     * 
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function getNamespaceDescriptor($name);
    /**
     * @return all namespaces
     * 
     * 
     * @return \Luffy\Thrift2Hbase\TNamespaceDescriptor[]
     * @throws \Luffy\Thrift2Hbase\TIOError
     */
    public function listNamespaceDescriptors();
}
