<?php


interface HandlerInterface {
    public function setNext(HandlerInterface $next);
    public function handle($request = null);
    public function next($request = null);
}



abstract class AbstractHandler implements HandlerInterface {
    protected $next;
    public function setNext(HandlerInterface $next)
    {
        $this->next = $next;
    }

    public function next($request = null)
    {
        if ($this->next) {
            $this->next->handle($request);
        }
    }
}

class IpCheck extends AbstractHandler {

    const BANNED_IP = ['192.168.0.1'];

    /**
     * @throws Exception
     */
    public function handle($request = null)
    {

        var_dump(__METHOD__ . 'Method ip check called');

        if (in_array($request['ip'],self::BANNED_IP)) {
            throw  new Exception('invalid ip');
        }

        return $this->next($request);
    }
}

class MustBeLogedIn extends AbstractHandler {

    public function handle($request = null)
    {
        var_dump(__METHOD__ . 'Method mustbelogedin called');
        if (empty($request['user_id'])) {
            throw new Exception('user is not a loged in');
        }

        return $this->next($request);
    }
}

class MustBeAdmin extends AbstractHandler {
    public function handle($request = null)
    {
        var_dump(__METHOD__ . 'Method mustbeadmin called');
        if ($request['is_admin'] == false) {
            throw new Exception('user is not a admin');
        }

        return $this->next($request);
    }
}


$request = [
    'ip' => '192.168.0.2',
    'user_id' => 1,
    'is_admin' => true
];

$ipcheck = New IpCheck();
$mustbeadmin = new MustBeAdmin();
$mustbelogedin = new MustBeLogedIn();

$ipcheck->setNext($mustbelogedin);
$mustbelogedin->setNext($mustbeadmin);

$ipcheck->handle($request);