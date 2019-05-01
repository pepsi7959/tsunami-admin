<?php
/**
Aes encryption
*/
class AES {
   
    protected $key;
    protected $data;
    protected $method;
    protected $iv;
    public $default_hashkey = 'e019cfdf67b617c4f10f16b9b7051bf9';
    /**
     * Available OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING
     *
     * @var type $options
     */
    protected $options = 0;
    /**
     * 
     * @param type $data
     * @param type $key
     * @param type $blockSize
     * @param type $mode
     */
    function __construct() {
        
    }

    public function init($data = null, $key = null, $blockSize = null, $mode = 'CBC'){
        $this->setData($data);
        $this->setMethode($blockSize, $mode);
		
		$salt = pack("C*", 12, 211, 36, 78, 121, 255, 128, 5, 99, 192);
		$AESKeyLength = 32;
		$AESIVLength = 16;
		$pbkdf2 = hash_pbkdf2("SHA1", $key, $salt, 1000, $AESKeyLength + $AESIVLength, TRUE);
		
		$this->setKey(substr($pbkdf2, 0, $AESKeyLength));
		$this->setIV(substr($pbkdf2, $AESKeyLength, $AESIVLength));
    }

    /**
     * 
     * @param type $data
     */
    public function setData($data) {
        $this->data = $data;
    }
    /**
     * 
     * @param type $key
     */
    public function setKey($key) {
        $this->key = $key;
    }
    /**
     * 
     * @param type $iv
     */
    public function setIV($iv) {
        $this->iv = $iv;
    }
    /**
     * CBC 128 192 256 
      CBC-HMAC-SHA1 128 256
      CBC-HMAC-SHA256 128 256
      CFB 128 192 256
      CFB1 128 192 256
      CFB8 128 192 256
      CTR 128 192 256
      ECB 128 192 256
      OFB 128 192 256
      XTS 128 256
     * @param type $blockSize
     * @param type $mode
     */
    public function setMethode($blockSize, $mode = 'CBC') {
        if($blockSize==192 && in_array('', array('CBC-HMAC-SHA1','CBC-HMAC-SHA256','XTS'))){
            $this->method=null;
             throw new Exception('Invlid block size and mode combination!');
        }
        $this->method = 'AES-' . $blockSize . '-' . $mode;
    }
    /**
     * 
     * @return boolean
     */
    public function validateParams() {
        if ($this->data != null &&
                $this->method != null ) {
            return true;
        } else {
            return FALSE;
        }
    }
	//it must be the same when you encrypt and decrypt
     protected function getIV() {
        return $this->iv;
     }
    /**
     * @return type
     * @throws Exception
     */
    public function encrypt() {
        if ($this->validateParams()) { 
            return trim(openssl_encrypt($this->data, $this->method, $this->key, $this->options,$this->getIV()));
        } else {
            throw new Exception('Invlid params!');
        }
    }
    /**
     * 
     * @return type
     * @throws Exception
     */
    public function decrypt() {
        if ($this->validateParams()) {
           $ret=openssl_decrypt($this->data, $this->method, $this->key, $this->options,$this->getIV());
          
           return   trim($ret); 
        } else {
            throw new Exception('Invlid params!');
        }
    }
}

?>