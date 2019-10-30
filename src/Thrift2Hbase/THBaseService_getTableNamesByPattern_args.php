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

class THBaseService_getTableNamesByPattern_args
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'regex',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'includeSysTables',
            'isRequired' => true,
            'type' => TType::BOOL,
        ),
    );

    /**
     * The regular expression to match against
     * 
     * @var string
     */
    public $regex = null;
    /**
     * set to false if match only against userspace tables
     * 
     * @var bool
     */
    public $includeSysTables = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['regex'])) {
                $this->regex = $vals['regex'];
            }
            if (isset($vals['includeSysTables'])) {
                $this->includeSysTables = $vals['includeSysTables'];
            }
        }
    }

    public function getName()
    {
        return 'THBaseService_getTableNamesByPattern_args';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->regex);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->includeSysTables);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('THBaseService_getTableNamesByPattern_args');
        if ($this->regex !== null) {
            $xfer += $output->writeFieldBegin('regex', TType::STRING, 1);
            $xfer += $output->writeString($this->regex);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->includeSysTables !== null) {
            $xfer += $output->writeFieldBegin('includeSysTables', TType::BOOL, 2);
            $xfer += $output->writeBool($this->includeSysTables);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
