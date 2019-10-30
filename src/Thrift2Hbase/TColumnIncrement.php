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

/**
 * Represents a single cell and the amount to increment it by
 */
class TColumnIncrement
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'family',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'qualifier',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'amount',
            'isRequired' => false,
            'type' => TType::I64,
        ),
    );

    /**
     * @var string
     */
    public $family = null;
    /**
     * @var string
     */
    public $qualifier = null;
    /**
     * @var int
     */
    public $amount = 1;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['family'])) {
                $this->family = $vals['family'];
            }
            if (isset($vals['qualifier'])) {
                $this->qualifier = $vals['qualifier'];
            }
            if (isset($vals['amount'])) {
                $this->amount = $vals['amount'];
            }
        }
    }

    public function getName()
    {
        return 'TColumnIncrement';
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
                        $xfer += $input->readString($this->family);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->qualifier);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->amount);
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
        $xfer += $output->writeStructBegin('TColumnIncrement');
        if ($this->family !== null) {
            $xfer += $output->writeFieldBegin('family', TType::STRING, 1);
            $xfer += $output->writeString($this->family);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->qualifier !== null) {
            $xfer += $output->writeFieldBegin('qualifier', TType::STRING, 2);
            $xfer += $output->writeString($this->qualifier);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->amount !== null) {
            $xfer += $output->writeFieldBegin('amount', TType::I64, 3);
            $xfer += $output->writeI64($this->amount);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
