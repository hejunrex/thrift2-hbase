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

class THBaseService_getAllRegionLocations_result
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        0 => array(
            'var' => 'success',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\Luffy\Thrift2Hbase\THRegionLocation',
                ),
        ),
        1 => array(
            'var' => 'io',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Luffy\Thrift2Hbase\TIOError',
        ),
    );

    /**
     * @var \Luffy\Thrift2Hbase\THRegionLocation[]
     */
    public $success = null;
    /**
     * @var \Luffy\Thrift2Hbase\TIOError
     */
    public $io = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['success'])) {
                $this->success = $vals['success'];
            }
            if (isset($vals['io'])) {
                $this->io = $vals['io'];
            }
        }
    }

    public function getName()
    {
        return 'THBaseService_getAllRegionLocations_result';
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
                case 0:
                    if ($ftype == TType::LST) {
                        $this->success = array();
                        $_size232 = 0;
                        $_etype235 = 0;
                        $xfer += $input->readListBegin($_etype235, $_size232);
                        for ($_i236 = 0; $_i236 < $_size232; ++$_i236) {
                            $elem237 = null;
                            $elem237 = new \Luffy\Thrift2Hbase\THRegionLocation();
                            $xfer += $elem237->read($input);
                            $this->success []= $elem237;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->io = new \Luffy\Thrift2Hbase\TIOError();
                        $xfer += $this->io->read($input);
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
        $xfer += $output->writeStructBegin('THBaseService_getAllRegionLocations_result');
        if ($this->success !== null) {
            if (!is_array($this->success)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('success', TType::LST, 0);
            $output->writeListBegin(TType::STRUCT, count($this->success));
            foreach ($this->success as $iter238) {
                $xfer += $iter238->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->io !== null) {
            $xfer += $output->writeFieldBegin('io', TType::STRUCT, 1);
            $xfer += $this->io->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
