<?php

abstract class AbstractHandler
{
    /** * @var AbstractHandler
     */
    protected $_next;

    /** * Send request by
     * @param mixed $message
     */
    abstract public function sendRequest($message);

    /** * @param AbstractHandler $next
     */
    public function setNext($next)
    {
        $this->_next = $next;
    }

    /** * @return AbstractHandler
     */
    public function getNext()
    {
        return $this->_next;
    }
}

class ConcreteHandlerA extends AbstractHandler
{
    public function sendRequest($message)
    {
        if ($message == 1) {
            echo "ConcreteHandlerA processed this message\n";
        } else {
            if ($this->getNext()) {
                $this->getNext()->sendRequest($message);
            }
        }
    }
}

class ConcreteHandlerB extends AbstractHandler
{
    public function sendRequest($message)
    {
        if ($message == 2) {
            echo "ConcreteHandlerB processed this message\n";
        } else {
            if ($this->getNext()) {
                $this->getNext()->sendRequest($message);
            }
        }
    }
}

echo "Task 1 Result\n";
$handler = new ConcreteHandlerA();
$handler->setNext(new ConcreteHandlerB());
$handler->sendRequest(1); // Handled by A
$handler->sendRequest(2); // Passed to B